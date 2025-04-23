<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $onCart;

    public function __construct()
    {
        if(Auth::check()){
            $this->onCart = Cart::with('menu')->where('222339_id_user', '=', Auth::user()['222339_id_user'])->where('222339_status', '=', 'belum');
        }
    }

    public function index(){
        $datas = Menu::limit(4)->get();
        return view('homepage', compact('datas'));
    }

    public function cart(){
        $menus = Menu::limit(5)->get();
        $datas = $this->onCart->get();

        if($datas->isNotEmpty()){

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-Z1wor21RYqGLWs223U0EVf6u';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
             'transaction_details' => array(
                 'order_id' => rand(),
                 'gross_amount' => $datas->sum('222339_total'),
                 )
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);

                return view('cart', compact('datas', 'menus', 'snapToken'));
        }

        return view('cart', compact('datas', 'menus'));

    }

    public function DelFormCart($id){
        $data = Cart::with('menu')->findOrFail($id);
        $jumlahAwal = $data['222339_jumlah'];
        $jumlahAkhir = $jumlahAwal - 1;
        $harga = $data->menu['222339_harga'] * $jumlahAkhir;

        if($jumlahAkhir > 0){
            $data->update([
                '222339_jumlah' => $jumlahAkhir,
                '222339_total' => $harga,
            ]);
        }else{
            $data->delete();
        }

        return redirect()->back();
    }

    public function DestroyFormCart($id){
        $data = Cart::findOrFail($id);
        $data->delete();
        return redirect()->back();



    }



    public function AddToCart(Request $request, $id){
        // dd(Auth::check());

        if(Auth::check()){
            $cart = $this->onCart->where('222339_id_menu', $id)->get();
            $menu = Menu::find($id);
            // dd($cart);
            if($cart->isEmpty()){
                $harga = $menu['222339_harga'] * 1;
                Cart::create([
                    '222339_id_menu' => $menu['222339_id_menu'],
                    '222339_id_user' => Auth::user()['222339_id_user'],
                    '222339_kode' => '',
                    '222339_jumlah' => 1,
                    '222339_status' => 'belum',
                    '222339_total' => $harga,
                    '222339_tanggal' => now(),
                ]);
            }else{
                $cart = $cart->first();
                $qty = $cart->menu['222339_stok'];

                if($request->has('jumlah')){
                    $jumlah = $request->jumlah;
                    $harga = $menu['222339_harga'] * $jumlah;
                    // dd($request->all(), $jumlah);
                }else{
                    $jumlah = $cart['222339_jumlah'] + 1;
                    $harga = $menu['222339_harga'] * $jumlah;
                }

                if($jumlah < $qty){
                    $cart->update([
                        '222339_jumlah' => $jumlah,
                        '222339_id_user' => Auth::user()['222339_id_user'],

                        '222339_total' => $harga,
                    ]);
                }else{
                    return redirect()->back()->with('error', 'Stok Tak Cukup');
                }
            }

            return redirect('/cart');

        }else{
            return redirect('/login');
        }


    }

    public function detail($id){
        $data=Menu::findOrFail($id);
        $komentar = [];
        $komentarKu = [];

        if(Auth::check()){
            $komentar = Komentar::with('user', 'menu')
                                ->where('222339_id_user', '!=',Auth::user()['222339_id_user'])
                                ->where('222339_id_menu', $id)
                                ->get();
            $komentarKu = Komentar::with('user', 'menu')
                                ->where('222339_id_user', Auth::user()['222339_id_user'])
                                ->where('222339_id_menu', $id)
                                ->get();
        }
        return view('detail', compact('data', 'komentar', 'komentarKu'));
    }

    public function checkout($id){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-Z1wor21RYqGLWs223U0EVf6u';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $datas = $this->onCart;
        $status = \Midtrans\Transaction::status($id);


        $isKodeOnCart = Cart::where('222339_kode', $id)->get()->isEmpty();

        if($isKodeOnCart){

            foreach($datas->get() as $data){
                $data->menu->update([
                    '222339_stok' => $data->menu['222339_stok'] - $data['222339_jumlah'],
                ]);
            }

            $datas->update([
                '222339_status' => 'selesai',
                '222339_kode' => $id,
            ]);
        }


        return redirect('/cart');

    }

    public function riwayat(){

        $datas = Cart::where('222339_id_user', Auth::user()['222339_id_user'] ?? null)->get();

        return view('riwayat', compact('datas'));
    }

}
