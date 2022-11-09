@extends('layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Roles</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/roles/create" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    @foreach($permissions as $permission)
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex flex-column">
                            <label class="d-inline-flex align-items-center mt-3">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-primary" name="permissions[]" value="{{$permission->id}}"
                                ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
