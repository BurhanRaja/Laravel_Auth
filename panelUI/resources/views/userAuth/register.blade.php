@extends('authlayout')

@section('authcontent')
    <h2 class="text-center mt-5">User Register</h2>
    <form class="w-75 mx-auto" action="/user/auth/register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
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
            <label for="" class="form-label">Gender</label>
            <br>
            <label for="gender_male" class="form-label mr-2">
                <input type="radio" name="gender" id="gender_male" value="male">
                Male</label>
            <label for="gender_female" class="form-label mx-2">
                <input type="radio" name="gender" id="gender_female" value="female">
                Female</label>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" maxlength="11">
            @error('phone_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
            @error('date_of_birth')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userimage" class="form-label">Profile Image</label>
            <input type="file" name="userimage" id="userimage" value="{{ old('userimage') }}">
            @error('userimage')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
                value="{{ old('password') }}">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword1"
                value="{{ old('confirm_password') }}">
            @error('confirm_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
