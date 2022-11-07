<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/products', function () {
    return view('pages.products');
});

Route::get('/customers', function () {
    return view('pages.customers');
});

Route::get('/messages', function () {
    return view('pages.messages');
});

Route::get('/salesandrevenue', function () {
    return view('pages.salesAndRevenue');
});

Route::get('/contacts', function () {
    return view('pages.contacts');
});
