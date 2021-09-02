<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nik_karyawan' => 'required|unique:users',
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        $request->session()->flash('success', 'Registrasi successfull!');

        return redirect('/login');
    }
}
