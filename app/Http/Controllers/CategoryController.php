<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CategoryController
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        $datas = Category::all();
        return view('admin.kategori.index', compact('datas'));
    }
     public function print(Request $request)
    {
        $datas = Category::all();

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


            $datas = Category::whereBetween('created_at', [$start->toDateString(), $end])->get();
        }

        return view('admin.kategori.print', compact('datas', 'request'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'kategori' => 'required',
        ]);

        Category::create([
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('kategori.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datas = Category::findOrFail($id);

        return view('Admin.kategori.show', compact('datas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        Category::findOrFail($id)->update([
            'kategori' => $request['kategori']
        ]);

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
