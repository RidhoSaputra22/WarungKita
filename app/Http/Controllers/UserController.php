<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the admin.pelanggan.
     */
    public function index()
    {
        $datas = User::where('222339_role', 'user')->get();
        return view('admin.pelanggan.index', compact('datas'));
    }
    public function print(Request $request)
    {
        $datas = User::where('222339_role', 'user');

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


            $datas = $datas->whereBetween('created_at', [$start->toDateString(), $end])->get();
        }

        return view('admin.pelanggan.print', compact('datas', 'request'));
    }

    /**
     * Show the form for creating a new admin.pelanggan.
     */
    public function create()
    {

        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'file' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('image/user/'), $fileName);
            $request->file = $fileName;

        }

        User::create([
            '222339_nama' => $request->nama,
            '222339_alamat' => $request->alamat,
            '222339_hp' => $request->hp,
            '222339_foto' => 'image/user/'.$request->file,
            '222339_role' => 'user',
            '222339_username' => $request->username,
            '222339_password' => bcrypt($request->password),
        ]);


        return redirect()->route('pelanggan.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified admin.pelanggan.
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('admin.pelanggan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified admin.pelanggan.
     */
    public function edit(User $user)
    {
        return view('admin.pelanggan.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'file' => 'nullable',
        ]);

        $user = User::findOrFail($id);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('image/user/'), $fileName);
            $user->update([
                '222339_foto' => 'image/user/'. $fileName,
            ]);
        }

        $user->update([
            '222339_nama' => $request->nama,
            '222339_alamat' => $request->alamat,
            '222339_hp' => $request->hp,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }
}
