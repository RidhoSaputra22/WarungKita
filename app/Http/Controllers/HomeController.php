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
            $this->onCart = Cart::with('menu')->where('id_user_222118', '=', Auth::user()['id_user_222118'])->where('status_222118', '=', 'belum');
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
                 'gross_amount' => $datas->sum('total_222118'),
                 )
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);

                return view('cart', compact('datas', 'menus', 'snapToken'));
        }

        return view('cart', compact('datas', 'menus'));

    }

    public function DelFormCart($id){
        $data = Cart::with('menu')->findOrFail($id);
        $jumlahAwal = $data->jumlah_222118;
        $jumlahAkhir = $jumlahAwal - 1;
        $harga = $data->menu['222118_harga'] * $jumlahAkhir;

        if($jumlahAkhir > 0){
            $data->update([
                'jumlah_222118' => $jumlahAkhir,
                'total_222118' => $harga,
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
            $cart = $this->onCart->where('id_menu_222118', $id)->get();
            $menu = Menu::find($id);
            // dd($cart);
            if($cart->isEmpty()){
                $harga = $menu['222118_harga'] * 1;
                Cart::create([
                    'id_menu_222118' => $menu['222118_id_menu'],
                    'id_user_222118' => Auth::user()['id_user_222118'],
                    'kode_222118' => '',
                    'jumlah_222118' => 1,
                    'status_222118' => 'belum',
                    'total_222118' => $harga,
                    'tanggal_222118' => now(),
                ]);
            }else{
                $cart = $cart->first();
                $qty = $cart->menu['222118_stok'];

                if($request->has('jumlah')){
                    $jumlah = $request->jumlah;
                    $harga = $menu['222118_harga'] * $jumlah;
                    // dd($request->all(), $jumlah);
                }else{
                    $jumlah = $cart['jumlah_222118'] + 1;
                    $harga = $menu['222118_harga'] * $jumlah;
                }

                if($jumlah < $qty){
                    $cart->update([
                        'jumlah_222118' => $jumlah,
                        'id_user_222118' => Auth::user()['id_user_222118'],

                        'total_222118' => $harga,
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
                                ->where('222118_id_user', '!=',Auth::user()['id_user_222118'])
                                ->where('222118_id_menu', $id)
                                ->get();
            $komentarKu = Komentar::with('user', 'menu')
                                ->where('222118_id_user', Auth::user()['id_user_222118'])
                                ->where('222118_id_menu', $id)
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


        $isKodeOnCart = Cart::where('kode_222118', $id)->get()->isEmpty();

        if($isKodeOnCart){

            foreach($datas->get() as $data){
                $data->menu->update([
                    '222118_stok' => $data->menu['222118_stok'] - $data['jumlah_222118'],
                ]);
            }

            $datas->update([
                'status_222118' => 'selesai',
                'kode_222118' => $id,
            ]);
        }


        return redirect('/cart');

    }

    public function riwayat(){

        $datas = Cart::where('id_user_222118', Auth::user()['id_user_222118'] ?? null)->get();

        return view('riwayat', compact('datas'));
    }

}
