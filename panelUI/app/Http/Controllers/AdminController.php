<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

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


    // CRUD
    public function index() {
        $admin = Admin::all();

        return view('pages.createAdmins', [
            'admins' => $admin
        ]);
    }
    public function create()
    {
        $roles = Role::all();
        return view('admincrud.create', ['roles' => $roles]);
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

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashPassword
        ]);

        if ($admin) {
            $role = Role::findById($request->role, 'admin');
            $admin->assignRole($role);
            return redirect('/dashboard/createadmins');
        }

    }

    public function edit($id) {
        $admin = Admin::find($id);
        $roles = Role::all();
        $roleName = $admin->getRoleNames()->first();

        return view('admincrud.edit', [
            'admin' => $admin,
            'roleName' => $roleName,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, Admin $admin) {
        $admin->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $role = Role::findById($request->role, 'admin');
        $admin->assignRole($role);

        return redirect('/dashboard/createadmins');
    }

    public function delete(Admin $admin) {
        $admin->delete();
        return redirect('/dashboard/createadmins');
    }
}
