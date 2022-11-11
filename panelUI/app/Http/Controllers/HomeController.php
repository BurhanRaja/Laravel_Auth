<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $users = User::all()->count();
        $leads = Lead::all()->count();
        $products = Product::all()->count();


        return view('pages.home', [
            'users' => $users,
            'leads' => $leads,
            'products' => $products
        ]);
    }
}
