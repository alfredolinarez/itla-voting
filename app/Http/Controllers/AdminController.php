<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function logout(Request $request) {
        $request->session()->forget('user_hash');
        $request->session()->forget('username');

        return redirect('/');
    }
}
