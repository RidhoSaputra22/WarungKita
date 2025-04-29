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
            $this->onCart = Cart::with('menu')->where('id_user_222339', '=', Auth::user()['id_user_222339'])->where('status_222339', '=', 'belum');
        }
    }

    public function index(){
        $datas = Menu::limit(4)->get();
        // dd($datas);
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
                 'gross_amount' => $datas->sum('total_222339'),
                 )
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);

                return view('cart', compact('datas', 'menus', 'snapToken'));
        }

        return view('cart', compact('datas', 'menus'));

    }

    public function DelFormCart($id){
        $data = Cart::with('menu')->findOrFail($id);
        $jumlahAwal = $data['jumlah_222339'];
        $jumlahAkhir = $jumlahAwal - 1;
        $harga = $data->menu['harga_222339'] * $jumlahAkhir;

        if($jumlahAkhir > 0){
            $data->update([
                'jumlah_222339' => $jumlahAkhir,
                'total_222339' => $harga,
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
            $cart = $this->onCart->where('id_menu_222339', $id)->get();
            $menu = Menu::find($id);
            // dd($cart);
            if($cart->isEmpty()){
                $harga = $menu['harga_222339'] * 1;
                Cart::create([
                    'id_menu_222339' => $menu['id_menu_222339'],
                    'id_user_222339' => Auth::user()['id_user_222339'],
                    'kode_222339' => '',
                    'jumlah_222339' => 1,
                    'status_222339' => 'belum',
                    'total_222339' => $harga,
                    'tanggal_222339' => now(),
                ]);
            }else{
                $cart = $cart->first();
                $qty = $cart->menu['stok_222339'];

                if($request->has('jumlah')){
                    $jumlah = $request->jumlah;
                    $harga = $menu['harga_222339'] * $jumlah;
                    // dd($request->all(), $jumlah);
                }else{
                    $jumlah = $cart['jumlah_222339'] + 1;
                    $harga = $menu['harga_222339'] * $jumlah;
                }

                if($jumlah < $qty){
                    $cart->update([
                        'jumlah_222339' => $jumlah,
                        'id_user_222339' => Auth::user()['id_user_222339'],

                        'total_222339' => $harga,
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
                                ->where('id_user_222339', '!=',Auth::user()['id_user_222339'])
                                ->where('id_menu_222339', $id)
                                ->get();
            $komentarKu = Komentar::with('user', 'menu')
                                ->where('id_user_222339', Auth::user()['id_user_222339'])
                                ->where('id_menu_222339', $id)
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


        $isKodeOnCart = Cart::where('kode_222339', $id)->get()->isEmpty();

        if($isKodeOnCart){

            foreach($datas->get() as $data){
                $data->menu->update([
                    'stok_222339' => $data->menu['stok_222339'] - $data['jumlah_222339'],
                ]);
            }

            $datas->update([
                'status_222339' => 'selesai',
                'kode_222339' => $id,
            ]);
        }


        return redirect('/cart');

    }

    public function riwayat(){

        $datas = Cart::where('id_user_222339', Auth::user()['id_user_222339'] ?? null)->get();

        return view('riwayat', compact('datas'));
    }

}
