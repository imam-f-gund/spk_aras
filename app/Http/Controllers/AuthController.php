<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function cek_login(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::whereUsername($request->username)->first();

        if (!empty($user) && Hash::check($request->password, $user->password)) {
            $request->session()->regenerate();

            Auth::login($user);

            Alert::success('Login Berhasil', 'Selamat Datang');
            return redirect()->route('dashboard');
        } else {
            Alert::error('Gagal', 'Username atau Password Salah');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Sukses', 'Logout Berhasil');
        return redirect()->route('login');
    }
}
