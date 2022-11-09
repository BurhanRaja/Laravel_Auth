<div class="card">
    <div class="card-header">
        <h3 class="card-title">Permission Table</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm">
                <a href="/create/permissions" type="button" class="btn btn-primary mx-2">Add Item <i class="fas fa-plus"></i></a>
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
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $key => $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td><a href="/edit/permissions/{{$permission->id}}" type="button"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="/permissions/delete/{{$permission->id}}" method="POST">
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
