@extends('layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <form action="/products/edit/{{$product->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        value="{{ $product->name }}">
                </div>
                @error('name')
                    <div class="text-danger text-sm">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="description" id="exampleInputPassword1">{{$product->description}}</textarea>
                    @error('description')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input type="number" name="amount" class="form-control" id="exampleInputPassword1"
                        value="{{ $product->amount }}">
                    @error('amount')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
