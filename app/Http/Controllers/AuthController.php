<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function authView()
    {
        return view('auth.authenticate');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name'          => 'required|string|unique:users',
                'email'         => 'required|email|unique:users',
                'password'      => 'required|min:6|confirmed',
                'accept_policy' => 'required',
            ]);
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('form_type', 'register');
        }

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Registro correcto');
        }

        return redirect()->route('auth.view')
            ->withErrors($request->only('email', 'username'))
            ->with('form_type', 'register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_email'    => 'required|email',
            'user_password' => 'required',
        ]);

        $credentials = [
            'email' => $request->get('user_email'),
            'password' => $request->get('user_password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withInput($request->except('user_password'))->with('error', 'Error de credenciales.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
