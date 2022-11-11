<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 1.5rem;">Leads Tabel</h3>
        @include('components.search')
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country Code</th>
                    <th>Phone Number</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Subject</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $key => $lead)
                    <tr>
                        <td>{{ $lead->id }}</td>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->country_code }}</td>
                        <td>{{ $lead->mobile }}</td>
                        <td>{{ $lead->country }}</td>
                        <td>{{ $lead->state }}</td>
                        <td>{{ $lead->city }}</td>
                        <td>{{ $lead->subject }}</td>
                        @if (auth('admin')->user()->can('edit-product'))
                            <td><a href="/edit/leads/{{ $lead->id }}" type="button"><i class="fas fa-edit"></i></a>
                            </td>
                        @endif
                        @if (auth('admin')->user()->can('delete-product'))
                            <td>
                                <form action="/leads/{{ $lead->id }}" method="POST">
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
