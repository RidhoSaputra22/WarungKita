<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = Menu::all();
        return view('admin.menu.index', compact('datas'));

    }
    public function print(Request $request)
    {
        //
        $datas = Menu::all();

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


            $datas = Menu::whereBetween('created_at', [$start->toDateString(), $end])->get();
        }

        return view('admin.menu.print', compact('datas', 'request'));

    }

    public function menu(Request $request)
    {
        //
        $datas = Menu::all();

        if($request->has('kategori')){
            $datas = Menu::where('id_kategori_222339', $request->kategori)->get();
        }
        if($request->has('search')){
            $datas = Menu::where('nama_222339', 'like' , '%'.$request->search.'%')->get();
        }

        $kategori = Category::all();

        return view('menu', compact('datas', 'kategori'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::all();
        return view('admin.menu.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'file' => 'nullable',
        ]);


        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('image/menu/'), $fileName);

        }

        Menu::create([
            'nama_222339' => $request['nama'],
            'harga_222339' => $request['harga'],
            'stok_222339' => $request['stok'],
            'id_kategori_222339' => $request['kategori'],
            'foto_222339' => 'image/menu/' . $fileName,

        ]);

        return redirect()->route('menu.index');


    }


    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
        $data = $menu;
        $kategori = Category::all();

        return view('admin.menu.show', compact('data', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $menu = Menu::find($id);
        $menu->update([
            'nama_222339' => $request['nama'],
            'harga_222339' => $request['harga'],
            'stok_222339' => $request['stok'],
            'id_kategori_222339' => $request['kategori'],
            ]);
        if($request->hasFile('file')){
                $file = $request->file('file');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('image/menu/'), $fileName);

                $menu->update([
                    'foto_222339' => 'image/menu/' . $fileName,
                ]);

            }
            return redirect()->route('menu.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
        $menu->delete();
        return redirect()->back();
    }
}
