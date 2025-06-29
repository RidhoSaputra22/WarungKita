<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use App\Http\Requests\StoreKurirRequest;
use App\Http\Requests\UpdateKurirRequest;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KurirController extends Controller
{


    public function pending(Request $request)
    {
        $driver = Auth::user();
        $datas = Pesanan::where('id_driver_222339', $driver['id_user_222339'])
            ->where('konfirmasi_driver_222339', 'pending')
            ->latest()->get();
        // dd($datas, $driver);
        // dd($datas[0]->cart[0]->pelanggan, $driver);

        return view('driver.pending', compact('datas', 'request'));
    }

    public function konfirmasi($id)
    {
        Pesanan::findOrFail($id)->update([
            'konfirmasi_driver_222339' => 'selesai'
        ]);

        return redirect('driver/pending')->with('sukses', "Konfirmasi Berhasil");
    }

    public function selesai(Request $request)
    {
        $driver = Auth::user();
        $datas = Pesanan::where('id_driver_222339', $driver['id_user_222339'])
            ->where('konfirmasi_driver_222339', 'selesai')
            ->latest()->get();

        return view('driver.selesai', compact('datas', 'request'));
    }
}
