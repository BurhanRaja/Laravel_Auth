<div class="card">
    <div class="card-header">
        <h3 class="card-title">Responsive Hover Table</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm">
                @if (auth('admin')->user()->can('create-product'))
                    <a href="/create/product" type="button" class="btn btn-primary mx-2">Add Item <i
                            class="fas fa-plus"></i></a>
                @endif
            </div>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Products</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>₹ {{ $product->amount }}</td>
                        @if (auth('admin')->user()->can('edit-product'))
                            <td><a href="/edit/product/{{ $product->id }}" type="button"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                        @endcan
                        @if (auth('admin')->user()->can('delete-product'))
                            <td>
                                <form action="/products/{{ $product->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
