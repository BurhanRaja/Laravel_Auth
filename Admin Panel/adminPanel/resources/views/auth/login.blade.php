@extends('home')

@section('content')
<h2>User Login</h2>
    <form class="w-75 mx-auto" action="/auth/user" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ old('email') }}">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                value="{{ old('password') }}">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
