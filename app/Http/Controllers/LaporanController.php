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
            'pesanan_selesai' => Cart::where('status_222118', 'selesai')->count(),
            'pesanan_belum' => Cart::where('status_222118', 'belum')->count(),
            'order' => Cart::all(),
        ];
        return view('admin.laporan.index', compact('datas'));
}
}
