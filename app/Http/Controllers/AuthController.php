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
            'user_hash' => Hash::make($username.':'.$password),
            'username' => $username,
        ]);

        $user = Auth::user();

        // check credentials
        if($user['admin']) {
            return redirect(route('admin.home'));
        } else {
            $request->session()->forget('user_hash');
            $request->session()->forget('username');
        }

        return view('login', [
            'login_failed' => true,
        ]);
    }

    public function logout(Request $request) {
        $request->session()->forget('user_hash');
        $request->session()->forget('username');

        return redirect('/');
    }
}
