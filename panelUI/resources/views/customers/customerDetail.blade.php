@extends('layout')


@section('content')

<h2 class="mb-2 py-4">Customers Details</h2>

<div class="d-flex justify-content-center align-items-center w-75 bg-light text-dark">
    <div class="container">
        <div class="name d-flex m-3">
            <h5 class="mx-3">Name:</h5>
            <div class="mx-3">{{$user->name}}</div>
        </div>
        <div class="name d-flex m-3">
            <h5 class="mx-3">Email:</h5>
            <div class="mx-3">{{$user->email}}</div>
        </div>
        <div class="name d-flex m-3">
            <h5 class="mx-3">Password:</h5>
            <div class="mx-3">{{$user->password}}</div>
        </div>
    </div>
</div>

@endsection
