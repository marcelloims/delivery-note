<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request  $request)
    {
        $request->validate([
            "username"  => 'required',
            "password"  => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!'
        ]);

        $data = [
            'username'  => $request->username,
            'password'  => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('dashboard');
        } else {
            return redirect('/')->with(['message' => 'Username atau Password salah!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
