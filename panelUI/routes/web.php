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

Route::get('/', function() {
    return view('home');
});

// User
Route::prefix('user')->group(function() {
    Route::get('register', [UserController::class, 'index']);
    Route::get('login', [UserController::class, 'login']);
    Route::get('logout', [UserController::class, 'logout']);

    Route::post('auth/register', [UserController::class, 'store']);
    Route::post('auth/login', [UserController::class, 'authenticate']);
});

// Admin
Route::prefix('admin')->group(function() {
    Route::get('register', [AdminController::class, 'index']);
    Route::get('login', [AdminController::class, 'login']);
    Route::get('logout', [AdminController::class, 'logout']);

    Route::post('auth/register', [AdminController::class, 'store']);
    Route::post('auth/login', [AdminController::class, 'authenticate']);
});

Route::prefix('dashboard')->group(function() {
    Route::get('', function () {
        return view('pages.home');
    });

    Route::get('products', [ProductController::class, 'show']);

    Route::get('customers', function () {
        return view('pages.customers');
    });

    Route::get('messages', function () {
        return view('pages.messages');
    });

    Route::get('salesandrevenue', function () {
        return view('pages.salesAndRevenue');
    });

    Route::get('contacts', function () {
        return view('pages.contacts');
    });
});


// Product CRUD
// GET
Route::get('/create/product', [ProductController::class, 'create'])->middleware('can:create-product');
Route::get('/edit/product/{id}', [ProductController::class, 'edit'])->middleware('can:edit-product');
// POST
Route::post('/product/created', [ProductController::class, 'store']);
// PUT
Route::put('/products/edit/{product}', [ProductController::class, 'update']);
// DELETE
Route::delete('/products/{product}', [ProductController::class, 'delete'])->middleware('can:delete-product');
