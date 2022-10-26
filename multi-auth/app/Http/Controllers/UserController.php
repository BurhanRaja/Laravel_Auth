<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create() {
        return view('user.register');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name'=> 'required|min:5',
            'email'=> 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $password = bcrypt($validate['password']);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password
            ]);

            auth()->login($user);

            return redirect('/user/dashboard');

        } catch (\Throwable $th) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }
    }

    public function login() {
        return view('user.loginForm');
    }

    public function authenticate(Request $request) {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password'=> $request->password
        ];

        $userValid = auth()->attempt($credentials);

        if ($userValid) {
            $request->session()->regenerate();

            return redirect('/user/dashboard');
        }
        else {
            return redirect('/user/login');
        }
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/');
    }
}
