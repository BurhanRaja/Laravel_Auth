<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('adminAuth.register');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $hashPassword = bcrypt($request->password);

        try {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $hashPassword
            ]);

            $role = Role::findByName('manager', 'admin');
            $admin->assignRole($role);

            auth('admin')->login($admin);
            return redirect('/dashboard')->with('message', 'Successfully Registered');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }
    }

    public function login()
    {
        return view('adminAuth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password'=> $request->password
        ];

        $adminValid = auth('admin')->attempt($credentials);

        if ($adminValid) {

            $request->session()->regenerate();

            return redirect('/dashboard')->with('message', 'Successfully Logged in');
        }
        else {
            return redirect('/admin/login');
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect('/')->with('message', 'Successfully Logged Out.');
    }
}
