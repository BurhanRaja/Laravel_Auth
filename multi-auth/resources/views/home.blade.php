@extends('layout')

@section('content')

<div class="login-container d-flex w-100 justify-content-end p-3 align-items-center">
    <div class="user-login mx-2">
        <a href="/user/login"><button class="user-btn rounded border-0 text-white bg-dark p-2">User Login</button></a>
    </div>
    <div class="admin-login mx-2">
        <a href="/admin/login"><button class="admin-btn rounded border-0 text-white bg-dark p-2">Admin Login</button></a>
    </div>
</div>

<div class="register-container d-flex flex-column w-100 justify-content-center align-items-center">
    <div class="user-auth m-2">
        <a href="/user/register"><button class="user-btn rounded border-0 bg-primary text-white p-2">User Register</button></a>
    </div>
    <div class="admin-auth m-2">
        <a href="/admin/register"><button class="admin-btn rounded border-0 bg-primary text-white p-2">Admin Register</button></a>
    </div>
</div>

@endsection
