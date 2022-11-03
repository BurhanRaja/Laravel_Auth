@extends('panel.dashboard')

@section('dash')

<div class="d-flex justify-content-center align-items-center">
    @include('partials.products.products')
</div>
@include('partials.products.chart')

@endsection
