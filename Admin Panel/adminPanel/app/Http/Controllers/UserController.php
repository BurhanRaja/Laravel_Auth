<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // To Show the Register Page
    public function index()
    {
        return view('auth.register');
    }

    // To Save new User data to Database and Login
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $hashPass = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashPass,
        ]);

        auth()->login($user);

        return redirect('/user/dashboard');
    }

    // Login Page
    public function login()
    {
        return view('auth.login');
    }

    // To Authenticate or login
    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $userValid = auth()->attempt($credentials);

        if ($userValid) {
            $request->session()->regenerate();

            return redirect('/user/dashboard');
        } else {
            return redirect('/user/login');
        }
    }

    // To logout
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    // Getting user data
    public function show()
    {
        // $users = User::with(['product' => function($query){
        //     $query->sum('amount');
        // }])->get();

        // $users = User::with(['product' => function ($query) {
        //     $query->groupBy('user_id')->select('user_id', DB::raw('SUM(amount) AS amount_sum'));
        // }])->get();

        $users_query = Product::groupBy('user_id')->select("user_id", DB::raw('SUM(amount) AS amount_sum'));

        $users = User::leftjoin(DB::raw("({$users_query->toSql()}) AS pAmount"), 'pAmount.user_id', '=', 'users.id')
            ->mergeBindings($users_query->getQuery())
            ->select('users.*', 'amount_sum')
            ->get();

        // $userAmount[] = [];
        // foreach ($users as $key => $user) {
        //     $userAmount[$key] = $user->product->sum->amount;
        // }

        return view('panel.pages.User', [
            'users' => $users
        ]);
    }
}
