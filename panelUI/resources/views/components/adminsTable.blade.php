<div class="card">
    <div class="card-header">
        <h3 class="card-title">Permission Table</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm">
                <a href="/create/admins" type="button" class="btn btn-primary mx-2">Add Item <i class="fas fa-plus"></i></a>
            </div>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Permissions</th>
                    <th>Roles</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $key => $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->getRoleNames()->first() }}</td>
                        <td><a href="/edit/admins/{{$admin->id}}" type="button"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="/admins/delete/{{$admin->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
