<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();

        return view('pages.permissions', [
            'permissions' => $permissions
        ]);
    }

    public function create() {
        return view('permissioncrud.create');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required|min:5',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);


        if ($permission) {

            $superAdmin = Role::findByName('super-admin', 'admin');
            $superAdmin->givePermissionTo($permission);
            return redirect('/dashboard/permissions')->with('successMessage', 'Permission Successfully Created.');

        } else {
            return redirect('/create/permissions')->with('errorMessage', 'Some Error Ocurred.');
        }
    }

    public function edit($id) {
        $permission = Permission::findById($id, 'admin');
        return view('permissioncrud.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission) {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $updated = $permission->update([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);

        if ($updated) {
            return redirect('/dashboard/permissions')->with('successMessage', 'Permission Successfully Updated.');
        } else {
            return redirect('/dashboard/permissions')->with('errorMessage', 'Some Error Occurred.');
        }
    }

    public function delete(Permission $permission) {
        $delete = $permission->delete();

        if ($delete) {
            return redirect('/dashboard/permissions')->with('successMessage', 'Permission Successfully Deleted.');
        } else {
            return redirect('/dashboard/permissions')->with('errorMessage', 'Some Error Occurred.');
        }
    }
}
