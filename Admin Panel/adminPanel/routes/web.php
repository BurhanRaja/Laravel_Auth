<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    if (auth('admin')->user()) {
        return redirect('/admin/dahsboard');
    } else if (auth()->user()) {
        return redirect('/user/dahsboard');
    } else {
        return view('home');
    }
});

// User Authentication
// GET
Route::get('/user/register', [UserController::class, 'index']);
Route::get('/user/login', [UserController::class, 'login']);
Route::get('/user/logout', [UserController::class, 'logout']);

// POST
Route::post('/register/auth/user', [UserController::class, 'store']);
Route::post('/auth/user', [UserController::class, 'authenticate'])->name('login');

// Admin Authentication
// GET
Route::get('/admin/register', [AdminController::class, 'index']);
Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

// POST
Route::post('/register/auth/admin', [AdminController::class, 'store']);
Route::post('/auth/admin', [AdminController::class, 'authenticate']);


// Dashboard
// GET
Route::get('/user/dashboard', function () {
    return view('panel.pages.Home');
});
Route::get('/admin/dashboard', function () {
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
