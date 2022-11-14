@extends('layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/admins/store" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('name') }}">
                    @error('email')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    @foreach ($roles as $role)
                        <div class="d-flex flex-column justify-content-center">
                            <div class="d-flex flex-column">
                                <label class="d-inline-flex align-items-center mt-3">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-primary" name="role"
                                        value="{{ $role->id }}" id="disable-equipment-checkboxes"><span
                                        class="ml-2 text-gray-700">{{ $role->name }}</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ old('name') }}">
                    @error('password')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password"
                        value="{{ old('name') }}">
                    @error('password')
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

    <!-- jQuery -->
    @push('scripts')
    <script>
        $(document).on("change", "#disable-equipment-checkboxes", function() {
            if ($(this).prop('checked')) {
                $(".equipment-disabling-checkbox").prop('disabled', true);
            } else {
                $(".equipment-disabling-checkbox").prop('disabled', false);
            }
        });
    </script>
@endpush
@endsection
