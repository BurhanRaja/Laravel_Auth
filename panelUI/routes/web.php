<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;

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

    Route::get('permissions', [PermissionController::class, 'index']);
    Route::get('roles', [RoleController::class, 'index']);
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


// Permission CRUD
// GET
Route::get('/create/permissions', [PermissionController::class, 'create']);
Route::get('/edit/permissions/{id}', [PermissionController::class, 'edit']);

// POST
Route::post('/permissions/create', [PermissionController::class, 'store']);
// PUT
Route::put('/permissions/edit/{permission}', [PermissionController::class, 'update']);
// DELETE
Route::delete('/permissions/delete/{permission}', [PermissionController::class, 'delete']);


// Role CRUD
// GET
Route::get('/create/roles', [RoleController::class, 'create']);
Route::get('/edit/roles/{id}', [RoleController::class, 'edit']);

// POST
Route::post('/roles/create', [RoleController::class, 'store']);
// PUT
Route::put('/roles/edit/{role}', [RoleController::class, 'update']);
// DELETE
Route::delete('/roles/delete/{route}', [RoleController::class, 'delete']);
