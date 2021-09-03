<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'Login';
        return view('pages.auth.login', [
            'title' => $title,
        ]);
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['nik_karyawan' => $request->nik_karyawan, 'password' => $request->password])) {
            // Authentication was successful...
            if (Auth::user() && Auth::user()->roles == "ADMIN") {
                return redirect('/dashboard');
            } elseif (Auth::user() && Auth::user()->roles == "USER") {
                return redirect('/home');
            }
        }
        return redirect('/')->with([
            'loginError' => 'Gagal Login!.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
