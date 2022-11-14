<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 1.5rem;">Leads Tabel</h3>
        @include('components.search')
<<<<<<< HEAD
        <a href="/download/excel"><button class="btn btn-primary">Excel</button></a>
        <a href="/download/pdf"><button class="btn btn-primary">PDF</button></a>
=======
>>>>>>> 89877422d97cb20677346675c02b6fd90e6edda4
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
<<<<<<< HEAD

=======
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
>>>>>>> 89877422d97cb20677346675c02b6fd90e6edda4
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<<<<<<< HEAD


@push('scripts')

<script>
// $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
$('#search').on('keyup', function(){
    search();
});

search();

function search() {
    var keyword = $('#search').val();
    $.post('{{route('leads.search')}}',
    {
        _token: '{{csrf_token()}}',
        keyword: keyword
    },
    function(data) {
        table_post_row(data);
        console.log(data);
    }
    );

    function table_post_row(res) {
        let htmlView = '';
        if (res.leads.length <= 0) {
            htmlView += `
                <tr>
                    <td colspan="4">No data.</td>
                </tr>
                `
            }

            for (let i = 0; i < res.leads.length; i++) {
                htmlView += `
                <tr>
                    <td>${res.leads[i].id}</td>
                    <td>${res.leads[i].name}</td>
                    <td>${res.leads[i].email}</td>
                    <td>${res.leads[i].country_code}</td>
                <td>${res.leads[i].mobile}</td>
                <td>${res.leads[i].country}</td>
                <td>${res.leads[i].state}</td>
                <td>${res.leads[i].city}</td>
                <td>${res.leads[i].subject}</td>
                <td><a href="/edit/leads/${ res.leads[i].id }" type="button"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <form action="/leads/${ res.leads[i].id }" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        `
        }

        $('tbody').html(htmlView);
    }
}
</script>
@endpush
=======
>>>>>>> 89877422d97cb20677346675c02b6fd90e6edda4
