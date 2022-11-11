<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        return view('userAuth.register');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:2',
            'gender' => 'required',
            'phone_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);


        $poidocument = $request->file('userimage');

        $poiImg = '';

        if (!empty($poidocument)) {
            $poiImg = time() . '_1.' . $poidocument->getClientOriginalExtension();
            $path = public_path() . '/user/images';
            $poidocument->move($path, $poiImg);
        } else {
            $poidocument = '';
        }

        $hashPassword = bcrypt($request->password);

        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'userimage' => $poiImg,
            'email' => $request->email,
            'password' => $hashPassword
        ]);

        if ($user) {
            auth()->login($user);
            return redirect('/user/home')->with('successMessage', 'Successfully Registered');
        } else {
            return redirect('/')->with('errorMessage', 'Some Error Occured');
        }
    }

    public function login()
    {
        return view('userAuth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = auth()->attempt($credentials);

        if ($user) {
            $request->session()->regenerate();
            return redirect('/user/home')->with('successMessage', 'Successfully Logged in.');
        } else {
            return redirect('/')->with('errorMessage', 'Some Error Occured');
        }
    }


    public function show() {
        return view('client.home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('successMessage', 'Successfully Logged Out.');
    }

    public function getData()
    {
        $user = User::all();
        return view('pages.customers', [
            'users' => $user
        ]);
    }


    public function customerLogin($id)
    {
        $user = User::find($id);
        $userName = $user->name;
        auth()->login($user);
        return redirect('/user/home')->with('successMessage', 'Successfully logged in as a customer.')->with('userName', $userName);
    }

    public function details($id) {
        $user = User::find($id);

        return view('customers.customerDetail', [
            'user' => $user
        ]);
    }
}
