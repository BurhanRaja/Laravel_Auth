@extends('layout')


@section('content')

<h2 class="mb-2 py-4">Sales and Revenue</h2>

@include('components.salesRevenue')
<div class="m-4"></div>
@include('components.salesChart')

@endsection
