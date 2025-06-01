<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Komentar;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stringable;

class HomeController extends Controller
{

    protected $onCart;

    public function __construct()
    {
        if (Auth::check()) {
            $this->onCart = Cart::with('menu')->where('username_222339', '=', Auth::user()['username_222339'])->where('status_222339', '=', 'belum');
        }
    }

    public function index()
    {
        $datas = Menu::limit(4)->get();
        return view('homepage', compact('datas'));
    }

    public function cart()
    {
        $menus = Menu::limit(5)->get();
        $datas = $this->onCart->get();

        if ($datas->isNotEmpty()) {

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
                    'gross_amount' => ($datas->sum('total_222339') + 5000),
                )
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('cart', compact('datas', 'menus', 'snapToken'));
        }

        return view('cart', compact('datas', 'menus'));
    }

    public function DelFormCart($id)
    {
        $data = Cart::with('menu')->findOrFail($id);
        $jumlahAwal = $data['jumlah_222339'];
        $jumlahAkhir = $jumlahAwal - 1;
        $harga = $data->menu['harga_222339'] * $jumlahAkhir;

        if ($jumlahAkhir > 0) {
            $data->update([
                'jumlah_222339' => $jumlahAkhir,
                'total_222339' => $harga,
            ]);
        } else {
            $data->delete();
        }

        return redirect()->back();
    }

    public function DestroyFormCart($id)
    {
        $data = Cart::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }



    public function AddToCart(Request $request, $id)
    {
        // dd(Auth::check());

        $cart = $this->onCart->where('nama_menu_222339', $id)->get();
        $menu = Menu::find($id);
        // dd($cart, $menu);
        if ($cart->isEmpty()) {
            $harga = $menu['harga_222339'] * 1;
            $jumlah = $menu['stok_222339'];

            if ($jumlah < 1) {
                return redirect()->back()->with('error', 'Stok Tak Cukup');
            }

            Cart::create([
                'nama_menu_222339' => $menu['nama_222339'],
                'username_222339' => Auth::user()['username_222339'],
                'jumlah_222339' => 1,
                'status_222339' => 'belum',
                'total_222339' => $harga,
                'tanggal_222339' => now(),
            ]);
        } else {
            $cart = $cart->first();
            $qty = $cart->menu['stok_222339'];

            if ($request->has('jumlah')) {
                $jumlah = $request->jumlah;
                $harga = $menu['harga_222339'] * $jumlah;
                // dd($request->all(), $jumlah);
            } else {
                $jumlah = $cart['jumlah_222339'] + 1;
                $harga = $menu['harga_222339'] * $jumlah;
            }

            if ($jumlah < $qty) {
                $cart->update([
                    'jumlah_222339' => $jumlah,
                    'username_222339' => Auth::user()['username_222339'],

                    'total_222339' => $harga,
                ]);
            } else {
                return redirect()->back()->with('error', 'Stok Tak Cukup');
            }
        }

        return redirect('/cart');
    }

    public function detail($id)
    {
        $data = Menu::findOrFail($id);
        $komentar = [];
        $komentarKu = [];

        if (Auth::check()) {
            $komentar = Komentar::with('user', 'menu')
                ->where('username_222339', '!=', Auth::user()['username_222339'])
                ->where('nama_menu_222339', $id)
                ->get();
            $komentarKu = Komentar::with('user', 'menu')
                ->where('username_222339', Auth::user()['username_222339'])
                ->where('nama_menu_222339', $id)
                ->get();
        }
        return view('detail', compact('data', 'komentar', 'komentarKu'));
    }

    public function checkout($id)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-Z1wor21RYqGLWs223U0EVf6u';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $datas = $this->onCart->get();

        $status = \Midtrans\Transaction::status($id)->status_code;

        $isKodeOnCart = Cart::where('kode_222339', $id)->get()->isNotEmpty();
        $isDriverConfirm = Pesanan::where('kode_222339', $id)->where('konfirmasi_driver_222339', '=', 'selesai')
            ->get()->isNotEmpty();
        $isUserConfirm = Pesanan::where('kode_222339', $id)->where('konfirmasi_pelanggan_222339', '=', 'selesai')
            ->get()->isNotEmpty();
        $pesanan = Pesanan::where('kode_222339', $id);
        // dd($id, $pesanan->get(), $isDriverConfirm, !$isUserConfirm, $isKodeOnCart, $status, $datas);

        if ($pesanan->get()->isNotEmpty() && $isDriverConfirm && !$isUserConfirm) {
            $pesanan->update([
                'konfirmasi_pelanggan_222339' => 'selesai',
            ]);
        }

        if ($isKodeOnCart && $status == '200' && $datas->isNotEmpty()) {

            foreach ($datas as $data) {
                $data->menu->update([
                    'stok_222339' => $data->menu['stok_222339'] - $data['jumlah_222339'],
                ]);
            }

            $driver = User::where('role_222339', 'driver')->inRandomOrder()->first();
            // dd($datas);
            $pelanggan = $datas[0]->pelanggan;

            $datas->update([
                'status_222339' => 'selesai',
                'kode_222339' => $id,
            ]);


            Pesanan::create([
                "konfirmasi_pelanggan_222339" => "pending",
                "konfirmasi_driver_222339" => "pending",
                "foto_konfirmasi_222339" => "pending",
                'status_222339' => 'pending',
                "driver_222339" => $driver['username_222339'],
                "user_222339" => $pelanggan['username_222339'],
                "kode_222339" => $id,
            ]);

            $isDriverConfirm = false;
            $isUserConfirm = false;
        }


        return view('checkout', compact('isDriverConfirm', 'isUserConfirm'));
    }

    public function riwayat()
    {

        $datas = Cart::where('username_222339', Auth::user()['username_222339'] ?? null)->get();

        return view('riwayat', compact('datas'));
    }
}
