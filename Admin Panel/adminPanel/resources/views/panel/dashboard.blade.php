@extends('home')

@section('content')
<div class="d-flex">
    @include('partials.sideNav')
    <div class="nav-content w-100" style="height: 100vh;">
        @include('partials.dashnav')
        @yield('dash')
    </div>
</div>


@endsection
