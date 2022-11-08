@extends('layout')

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/product/created" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{old('name')}}">
          @error('name')
          <div class="text-danger text-sm">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <textarea class="form-control" name="description" id="exampleInputPassword1">
          {{old('description')}}</textarea>
          @error('description')
          <div class="text-danger text-sm">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Amount</label>
          <input type="number" name="amount" class="form-control" id="exampleInputPassword1" value="{{old('amount')}}">
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

