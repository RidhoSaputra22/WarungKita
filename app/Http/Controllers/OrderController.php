<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $datas = Cart::with('menu')->get(); // Fetch all datas
        return view('admin.order.index', compact('datas'));
    }
    public function print(Request $request)
    {
        $datas = Cart::with('menu', 'pelanggan')->get(); // Fetch all datas

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


            $datas = Cart::whereBetween('tanggal_222339', [$start->toDateString(), $end])->get();
        }

        return view('admin.order.print', compact('datas', 'request'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        return view('admin.order.create');
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

        Cart::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Cart created successfully!');
    }

    /**
     * Display the specified order details.
     */
    public function show($id)
    {
        $order = Cart::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit($id)
    {
        $order = Cart::findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified order in the database.
     */
    public function update(Request $request, $id)
    {
        $data = Cart::findOrFail($id);

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
        $order = Cart::findOrFail($id);
        $order->delete();

        return redirect()->back();

    }
}
