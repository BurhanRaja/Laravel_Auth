<?php

namespace App\Http\Controllers;

use App\User;

class ImpersonateController extends Controller
{
    public function impersonateIn($id) {
        $user = User::find($id);
        $userName = $user->name;
        session(['impersonate'=> $id, 'backURL' => url()->previous()]);
        return redirect('/user/home')->with('userName', $userName);
    }

    public function impersonateOut() {
        $backURL = session()->get('backURL');
        session()->forget('impersonate', 'secureURL');
        return $backURL ? redirect($backURL) : redirect('/dashboard/customers');
    }
}
