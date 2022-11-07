<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Display register form
    public function index()
    {
        return view('adminAuth.register');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $password = bcrypt($request->password);

        try {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'is_admin' => 1
            ]);

            auth('admin')->login($admin);

            return redirect('/admin/dashboard');

        } catch (\Throwable $th) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }
    }

    // Display login form
    public function login()
    {
        return view('adminAuth.login');
    }

    public function authenticate(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password'=> $request->password
        ];

        $adminValid = auth('admin')->attempt($credentials);
        if ($adminValid) {

            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        }
        else {
            return redirect('/admin/login');
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect('/');
    }
}
