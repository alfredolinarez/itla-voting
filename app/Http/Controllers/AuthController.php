<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request) {
        $intended = session('url.intended');
        $request->session()->forget('url.intended');

        return view('login', [
            'not_authenticated' => $intended,
        ]);
    }

    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        session([
            'user' => Hash::make($username.':'.$password)
        ]);

        // check credentials
        if(Auth::check()) {
            return redirect('home');
        }


        return view('login', [
            'login_failed' => true,
        ]);
    }

    public function logout(Request $request) {
        $request->session()->forget('user');

        return redirect('/');
    }
}
