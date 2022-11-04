<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// User Authentication
// GET
Route::get('/', function () {
    return view('home');
});
Route::get('/user/register', [UserController::class, 'index']);
Route::get('/user/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

// POST
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate'])->name('login');

// Dashboard
// GET
Route::get('/user/dashboard', function () {
    return view('panel.pages.Home');
});
Route::get('/dashboard/orders', function () {
    return view('panel.pages.Order');
});
Route::get('/dashboard/users', [UserController::class, 'show']);

Route::get('/dashboard/products', [ProductController::class, 'show']);

// Product CRUD
// GET
Route::get('/create/product', [ProductController::class, 'create']);
Route::get('/edit/products/{id}', [ProductController::class, 'edit']);
// POST
Route::post('/products/created', [ProductController::class, 'store']);
// PUT
Route::put('/products/{product}', [ProductController::class, 'update']);
// DELETE
Route::delete('/products/{product}', [ProductController::class, 'delete']);
