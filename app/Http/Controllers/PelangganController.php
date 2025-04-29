<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PelangganController extends Controller
{
    // Display a listing of the customers
    public function index()
    {
        $pelanggans = User::all();
        return view('pelanggans.index', compact('pelanggans'));
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('pelanggans.create');
    }

    // Store a newly created customer in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'phone' => 'required|string|max:15',
            'file' => 'nullable',
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('image/menu/'), $fileName);

        }

        User::create([
            'nama_222339' => $request->name,
            'alamat_222339' => $request->email,
            'hp_222339' => $request->phone,
            'foto_222339' => $request->foto,
        ]);

        return redirect()->route('pelanggans.index')->with('success', 'Customer created successfully!');
    }

    // Display a specific customer's details
    public function show($id)
    {
        $pelanggan = User::findOrFail($id);
        return view('pelanggans.show', compact('pelanggan'));
    }

    // Show the form for editing a customer's details
    public function edit($id)
    {
        $pelanggan = User::findOrFail($id);
        return view('pelanggans.edit', compact('pelanggan'));
    }

    // Update a specific customer's information
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email,'.$id,
            'phone' => 'required|string|max:15',
        ]);

        $pelanggan = User::findOrFail($id);
        $pelanggan->update($validated);

        return redirect()->route('pelanggans.index')->with('success', 'Customer updated successfully!');
    }

    // Delete a specific customer
    public function destroy($id)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggans.index')->with('success', 'Customer deleted successfully!');
    }
}
