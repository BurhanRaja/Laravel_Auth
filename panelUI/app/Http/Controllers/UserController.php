<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('userAuth.register');
    }

    public function store(Request $request) {
        $validator = $request->validate([
            'name'=> 'required|min:2',
            'email'=> 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $hashPassword = bcrypt($request->password);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => $hashPassword
        ]);

        if ($user) {
            auth()->login($user);
            return redirect('/dashboard')->with('message', 'Successfully Registered');
        } else {
            return redirect('/')->with('message', 'Some Error Occured');
        }
    }

    public function login() {
        return view('userAuth.login');
    }

    public function authenticate(Request $request) {
        $validator = $request->validate([
            'email'=> 'required|email|unique:users',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = auth()->attempt($credentials);

        if ($user) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('message', 'Successfully Logged in.');
        } else {
            return redirect('/')->with('message', 'Some Error Occured');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('message', 'Successfully Logged Out.');
    }

}
