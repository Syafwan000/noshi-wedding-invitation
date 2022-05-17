<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('apps.auth');
    }

    public function auth(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect('/apps')->with('message', 'Success');
        }

        return back()->with('failed', 'Log in failed');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('/apps/auth');
    }
}
