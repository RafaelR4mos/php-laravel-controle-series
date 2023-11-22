<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $userData = $request->only(['email', 'password']);

        if(!Auth::attempt($userData)) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        }

        return redirect()->route('series.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
