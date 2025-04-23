<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
// use illuminate\support\Facades\Session;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);



        $credentials = [
            '222339_username' => $request->username,
            'password' => $request->password
        ];

        // dd(Auth::attempt($credentials));

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $request->session()->put('current_user', Auth::user());
            // dd($user['222339_role']);

            if($user['222339_role'] === "admin"){
                return redirect('admin/laporan');

            }

            if($user['222339_role'] === "user"){
                return redirect('/');
            }

        }

        return redirect('/login')->with('error', 'Gagal Login');


    }




    public function registration()
    {
        return view('registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'username' => 'required',
            'password' => 'required',

        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect("login")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        '222339_nama' => $data['nama'],
        '222339_alamat' => $data['alamat'],
        '222339_hp' => $data['hp'],
        '222339_role' => 'user',

        '222339_username' => $data['username'],
        '222339_password' => Hash::make($data['password']),


      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            // Debug: Log successful dashboard access
            // \Log::info('User accessed dashboard: ' . Auth::user()->222339_username);
            return view('pemasukan.index');
        }

        // Debug: Log unauthorized dashboard access attempt
        \Log::warning('Unauthorized dashboard access attempt');
        return redirect("login")->withErrors('You are not allowed to access');
    }

    public function signout(){
        Session::flush();
        Auth::logout();

        return redirect('/login');
    }

}
