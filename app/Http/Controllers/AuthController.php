<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function login_aksi(Request $request)
    {
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) {
            return redirect('/');
  
        } else { // false
            return back()->with('error', 'Username/Password salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function changePass()
    {
        return view('ganti-pass');
    }

    public function changePass_aksi(Request $request)
    {
        if (!Hash::check($request->oldPass, Auth::user()->password)) {
            return back()->with('error', 'Password lama tidak sesuai.');
        }

        $ubah = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->newPass)]);
        if ($ubah) {
            return redirect('/')->with('sukses', 'Sukses mengubah password');
        } else {
            return redirect('/')->with('error', 'Gagal mengubah password');
        }
    }
}
