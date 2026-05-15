<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function auth(Request $req)
    {
        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ])) {

            return redirect('/products');
        }

        return redirect('/login')
            ->with('msg', 'Email atau password salah');
    }
}