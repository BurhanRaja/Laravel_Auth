@extends('layout')


@section('content')

<h2 class="mb-2 py-4">Products</h2>
@include('components.productTable')

<div class="d-flex justify-content-between">
    @include('components.productPieChart')
    @include('components.recentProducts')
</div>

@endsection
