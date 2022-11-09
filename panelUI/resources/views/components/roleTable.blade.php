<div class="card">
    <div class="card-header">
        <h3 class="card-title">Role Table</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm">
                <a href="/create/roles" type="button" class="btn btn-primary mx-2">Add Item <i class="fas fa-plus"></i></a>
            </div>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Roles</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td><a href="/edit/roles/{{$role->id}}" type="button"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="/roles/delete/{{$role->id}}" method="POST">
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
