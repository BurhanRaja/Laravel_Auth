@extends('authlayout')

@section('authcontent')

<div class="container w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container user-btn d-flex flex-column w-25">
        <a href="/user/login"><button type="button" class="btn btn-primary m-4">User Login</button></a>
        <a href="/user/register"><button type="button" class="btn btn-primary m-4">User Register</button></a>
    </div>
    <div class="container user-btn d-flex flex-column w-25">
        <a href="/admin/login"><button type="button" class="btn btn-dark m-4">Admin Login</button></a>
    </div>
</div>

@endsection
