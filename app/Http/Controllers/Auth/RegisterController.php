<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store()
    {
    }
}
