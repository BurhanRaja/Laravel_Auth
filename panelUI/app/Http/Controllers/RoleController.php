<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        $allPermission = Permission::all();

        return view('pages.roles', [
            'roles' => $roles,
            // 'permissions' => $permissions
        ]);
    }

    public function create() {
        $allPermission = Permission::all();

        return view('rolecrud.create', [
            'permissions' => $allPermission
        ]);
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
            $role->syncPermissions($request->permissions);
            return redirect('/dashboard/roles')->with('successMessage', 'Role Successfully Created.');
        } else {
            return redirect('/create/roles')->with('errorMessage', 'Some Error Ocurred.');
        }
    }

    public function edit($id) {
        $role = Role::findById($id, 'admin');
        $role->permissions();
        $permissions = Permission::all();

        return view('rolecrud.edit', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, Role $role) {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $updated = $role->update([
            'name' => $request->name,
        ]);

        if ($updated) {
            $role->syncPermissions($request->permissions);
            return redirect('/dashboard/roles')->with('errorMessage', 'Role Successfully Updated.');
        } else {
            return redirect('/dashboard/roles')->with('errorMessage', 'Some Error Ocurred.');
        }
    }

    public function delete(Role $role) {
        $deleted = $role->delete();
        if ($deleted) {
            return redirect('/dashboard/roles')->with('successMessage', 'Role Successfully Deleted.');
        } else {
            return redirect('/dashboard/roles')->with('errorMessage', 'Some Error Occurred.');
        }
    }
}
