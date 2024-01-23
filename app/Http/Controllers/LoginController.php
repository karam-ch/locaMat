<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function loginG() {
        Auth::logout();
        return view('login');
    }

    public function loginP(Request $request) {
        $validate = $request->validate([
            'email' => 'required|max:30|regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
            'password' => 'required|max:30'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->new) {
                return redirect()->to('reset');
            }
            return redirect()->to('home');
        }

        return redirect()->back()->withErrors(['msg' => 'Incorrect password or email address.'])->withInput();
    }

    public function resetG() {
        return view('reset');
    }

    public function resetP(Request $request) {
        $validate = $request->validate([
            'password' => 'required|max:30|confirmed',
        ]);
        Auth::user()->password = Hash::make($request->input('password'));
        Auth::user()->new = false;
        Auth::user()->save();
        return redirect()->intended('home');
    }
}
