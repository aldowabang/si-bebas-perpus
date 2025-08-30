<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data = [
            'title' => 'Login',
            'description' => 'Halaman ini digunakan untuk login.',
            'breadcrumbs' => [
                ['label' => 'Login', 'url' => route('login-form')],
            ],
        ];
        return view('login', $data);
    }

    public function autenticete(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if(Auth::attempt(($data))){
            // Authentication passed..
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }else{
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-form')->with('success', 'You have been logged out.');
    }
}
