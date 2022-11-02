@extends('panel.dashboard')

@section('dash')

@include('partials.home.cards')
<div class="d-flex justify-content-center align-items-center">
    @include('partials.home.customersHome')
    @include('partials.home.productsHome')
</div>
@include('partials.home.salesChart')

@endsection
