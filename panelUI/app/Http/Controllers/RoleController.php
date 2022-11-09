<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();

        return view('pages.roles', [
            'roles' => $roles
        ]);
    }

    public function create() {
        return view('rolecrud.create');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required|min:5',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);

        if ($role) {
            return redirect('/dashboard/roles')->with('message', 'role Successfully Created');
        } else {
            return redirect('/create/roles')->with('message', 'Some Error Ocurred.');
        }
    }

    public function edit($id) {
        $role = role::findById($id, 'admin');
        return view('rolecrud.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role) {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);

        return redirect('/dashboard/roles')->with('message', 'role Successfully Updated');
    }

    public function delete(Role $role) {
        $role->delete();
        return redirect('/dashboard/roles')->with('message', 'role Successfully Deleted');
    }
}
