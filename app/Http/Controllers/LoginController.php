<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request) {
        $validate = $request->validate([
            'email' => 'required|max:30|regex:^[^@\s]+@[^@\s]+\.[^@\s]+$',
            'password' => 'required|max:30'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->lastLogIn == null) {
                return redirect()->intended('change-password');
            }
            return redirect()->intended('home');
        } else {

        }
    }
}
