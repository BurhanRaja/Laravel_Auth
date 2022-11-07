@extends('layout')

@section('content')

<h2 class="mb-2 py-4">Home</h2>
@include('components.cards')

<div class="d-flex">
    @include('components.salesChart')
    @include('components.productPieChart')
</div>

<div class="d-flex justify-content-evenly">
    @include('components.toDo')
    @include('components.recentProducts')
</div>

@endsection
