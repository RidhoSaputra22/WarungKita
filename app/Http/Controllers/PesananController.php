<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $datas = Pesanan::all(); // Fetch all datas
        return view('admin.pesanan.index', compact('datas'));
    }
    public function print(Request $request)
    {
        $datas = Pesanan::all(); // Fetch all datas

        if($request->has('hari') && $request->has('bulan') && $request->has('tahun') && $request->has('pilihan')){
            $start = ($request->hari != 0) ? Carbon::create($request->tahun, $request->bulan, $request->hari)->startOfDay() : Carbon::create($request->tahun, $request->bulan, 1)->startOfDay();
            if($request->pilihan == 1){
                $end = $start->copy()->endOfDay()->format('Y-m-d H:i:s');
            }else if($request->pilihan == 2){
                $end = $start->copy()->addDay(7)->endOfDay()->format('Y-m-d H:i:s');
            }else if($request->pilihan == 3){
                $start = Carbon::create($request->tahun, $request->bulan, 1)->startOfDay();
                $end = $start->copy()->endOfMonth()->format('Y-m-d H:i:s');
            }


            $datas = Pesanan::whereBetween('tanggal_222339', [$start->toDateString(), $end])->get();
        }

        return view('admin.pesanan.print', compact('datas', 'request'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        return view('admin.pesanan.create');
    }

    /**
     * Store a newly created order in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);

        Pesanan::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Pesanan created successfully!');
    }

    /**
     * Display the specified order details.
     */
    public function show($id)
    {
        $order = Pesanan::findOrFail($id);
        return view('admin.pesanan.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit($id)
    {
        $order = Pesanan::findOrFail($id);
        return view('admin.pesanan.edit', compact('order'));
    }

    /**
     * Update the specified order in the database.
     */
    public function update(Request $request, $id)
    {
        $data = Pesanan::findOrFail($id);

        $data->update([
            'status_222339' => 'selesai'
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified order from the database.
     */
    public function destroy($id)
    {
        $order = Pesanan::findOrFail($id);
        $order->delete();

        return redirect()->back();

    }
}
