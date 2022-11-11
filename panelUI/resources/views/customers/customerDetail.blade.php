@extends('layout')


@section('content')
    <h2 class="mb-2 py-4">Customers Details</h2>

    <div class="card card-primary card-outline">
        <div class="card-body box-profile position-relative">
            <div class="edit position-absolute" style="right: 35px;">
                <a href="" type="button" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
            <div class="text-center">
                <img class="profile-user-img rounded-circle" src="{{ asset('/user/images/' . $user->userimage) }}"
                    alt="User profile picture" style="width: 160px; height: 160px;">
            </div>

            <h3 class="profile-username text-center mb-4 mt-1">{{ $user->name }}</h3>

            <div class="row">
                <ul class="list-group list-group-unbordered mb-3 mx-3 col">
                    <li class="list-group-item">
                        <b>Email:</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Gender:</b> <a class="float-right">{{ $user->gender }}</a>
                    </li>
                </ul>
                <ul class="list-group list-group-unbordered mb-3 mx-3 col">
                    <li class="list-group-item">
                        <b>Phone Number:</b> <a class="float-right">{{ $user->phone_number }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Date of Birth</b> <a class="float-right">{{ $user->date_of_birth }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
