<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name'=> 'required|min:5',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
            'confirm_password'=> 'required|same:password'
        ]);

        $hashPass = Hash::make($request->password);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $hashPass,
        ]);

        auth()->login($user);

        return redirect('/user/dashboard');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $userValid = auth()->attempt($credentials);

        if ($userValid) {
            $request->session()->regenerate();

            return redirect('/user/dashboard');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
