<?php

use App\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
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

    Route::get('/home', [UserController::class, 'show']);
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

    Route::get('products', [ProductController::class, 'show'])->middleware('permission:show-product,admin');

    Route::get('customers', [UserController::class, 'getData']);

    Route::get('messages', function () {
        return view('pages.messages');
    });

    Route::get('salesandrevenue', function () {
        return view('pages.salesAndRevenue');
    });

    Route::get('contacts', function () {
        return view('pages.contacts');
    });

    Route::get('permissions', [PermissionController::class, 'index'])->middleware('permission:show-permissions,admin');
    Route::get('roles', [RoleController::class, 'index'])->middleware('permission:show-roles,admin');
    Route::get('createadmins', [AdminController::class, 'index'])->middleware('permission:show-admin-user,admin');
});


// Product CRUD
// GET
Route::get('/create/product', [ProductController::class, 'create'])->middleware('permission:create-product,admin');
Route::get('/edit/product/{id}', [ProductController::class, 'edit'])->middleware('permission:edit-product,admin');
// POST
Route::post('/product/created', [ProductController::class, 'store']);
// PUT
Route::put('/products/edit/{product}', [ProductController::class, 'update']);
// DELETE
Route::delete('/products/{product}', [ProductController::class, 'delete'])->middleware('permission:delete-product,admin');


// Permission CRUD
// GET
Route::get('/create/permissions', [PermissionController::class, 'create'])->middleware('permission:create-permissions,admin');
Route::get('/edit/permissions/{id}', [PermissionController::class, 'edit'])->middleware('permission:edit-permissions,admin');

// POST
Route::post('/permissions/create', [PermissionController::class, 'store']);
// PUT
Route::put('/permissions/edit/{permission}', [PermissionController::class, 'update']);
// DELETE
Route::delete('/permissions/delete/{permission}', [PermissionController::class, 'delete'])->middleware('permission:delete-permissions,admin');


// Role CRUD
// GET
Route::get('/create/roles', [RoleController::class, 'create'])->middleware('role:super-admin,admin');
Route::get('/edit/roles/{id}', [RoleController::class, 'edit'])->middleware('permission:edit-roles,admin');

// POST
Route::post('/roles/create', [RoleController::class, 'store']);
// PUT
Route::put('/roles/edit/{role}', [RoleController::class, 'update']);
// DELETE
Route::delete('/roles/delete/{role}', [RoleController::class, 'delete'])->middleware('permission:delete-roles,admin');


// Admins CRUD
// GET
Route::get('/create/admins', [AdminController::class, 'create'])->middleware('permission:create-admin-user,admin');
Route::get('/edit/admins/{id}', [AdminController::class, 'edit'])->middleware('permission:edit-admin-user,admin');
// POST
Route::post('/admins/store', [AdminController::class, 'store']);
// PUT
Route::put('/admins/edit/{admin}', [AdminController::class, 'update']);
// DELETE
Route::delete('/admins/delete/{admin}', [AdminController::class, 'delete'])->middleware('permission:delete-admin-user,admin');


// Customers
// Login via super-admin
Route::group(['middleware' => ['web']], function() {
    Route::post('/impersonate/{id}', [ImpersonateController::class, 'impersonateIn'])->name('impersonateIn');
});
Route::get('/impersonate/logout', [ImpersonateController::class, 'impersonateOut']);
// Detail Page
Route::get('/details/{id}', [UserController::class, 'details']);
