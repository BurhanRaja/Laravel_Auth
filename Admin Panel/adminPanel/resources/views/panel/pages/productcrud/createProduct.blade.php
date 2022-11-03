@extends('panel.dashboard')

@section('dash')

<div class="back">
    <a href="{{url()->previous()}}"><button class="btn btn-light"><i class="fa-sharp fa-solid fa-arrow-left"></i></button></a>
</div>

<h3 class="text-center">Create Product</h3>
    <div class="d-flex justify-content-center align-items-center">

        <form class="w-75" action="/products/created" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" id="name" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <div class="text-danger text-sm">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label d-inline mb-1">Description</label>
                <textarea name="description" id="description" class="w-100" rows="10" value="{{old('description')}}"></textarea>
                @error('description')
                    <div class="text-danger text-sm">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productImg" class="mb-2 d-inline">Product Image</label>
                <input type="file" name="productImg" id="productImg" value="{{old('productImg')}}">
                @error('productImg')
                    <div class="text-danger text-sm">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
