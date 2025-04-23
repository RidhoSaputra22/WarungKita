<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Cart;



class LaporanController extends Controller
{
    public function index()
    {
         //
         $datas = [
            'pelanggan' => User::count(),
            'menu' => Menu::count(),
            'pesanan_selesai' => Cart::where('222339_status', 'selesai')->count(),
            'pesanan_belum' => Cart::where('222339_status', 'belum')->count(),
            'order' => Cart::all(),
        ];
        return view('admin.laporan.index', compact('datas'));
}
}
