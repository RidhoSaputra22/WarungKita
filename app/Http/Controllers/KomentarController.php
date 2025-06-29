<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Http\Requests\StoreKomentarRequest;
use App\Http\Requests\UpdateKomentarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'komentar' => 'required',
            'menu' => 'required',
        ]);


        Komentar::create([
            'komentar_222339' => $request->komentar,
            'id_menu_222339' => $request->menu,
            'id_user_222339' => Auth::user()['id_user_222339']
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required'
        ]);


        Komentar::findOrFail($id)->update([
            'komentar_222339' => $request->komentar,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Komentar::findOrFail($id)->delete();
        return redirect()->back();
    }
}
