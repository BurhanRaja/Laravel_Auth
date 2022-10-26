@extends('layout')

@section('content')
<div class="user-register w-75 mx-auto p-4">

    <h2 class="text-center">User Form</h2>
    <form action="/user/auth/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value={{old('email')}}>

            @error('email')
                <div class="text-warning">{{$message}}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" value={{old('password')}}>
            @error('password')
                <div class="text-warning">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
