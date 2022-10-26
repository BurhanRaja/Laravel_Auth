<?php

use App\Http\Controllers\AdminController;
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
    return view('home');
});

// ? User
Route::get('/user/login', [UserController::class, 'login']);
Route::post('/user/auth/login', [UserController::class, 'authenticate']);
Route::get('/user/logout', [UserController::class, 'logout']);
Route::post('/user/auth/registered', [UserController::class, 'store']);
Route::get('/user/register', [UserController::class, 'create']);
Route::get('/user/dashboard', function() {
    return view('user.dashboardPanel');
});

// ? Admin
Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/auth/login', [AdminController::class, 'authenticate']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::post('/admin/auth/registered', [AdminController::class, 'store']);
Route::get('/admin/register', [AdminController::class, 'create']);
Route::get('/admin/dashboard', function() {
    return view('admin.dashboardPanel');
});
