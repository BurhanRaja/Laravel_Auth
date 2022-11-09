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
            return redirect('/dashboard/permissions')->with('message', 'Permission Successfully Created');

        } else {
            return redirect('/create/permissions')->with('message', 'Some Error Ocurred.');
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

        $permission->update([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);

        return redirect('/dashboard/permissions')->with('message', 'Permission Successfully Updated');
    }

    public function delete(Permission $permission) {
        $permission->delete();
        return redirect('/dashboard/permissions')->with('message', 'Permission Successfully Deleted');
    }
}
