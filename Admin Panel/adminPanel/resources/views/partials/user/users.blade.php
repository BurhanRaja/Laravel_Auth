<div class="customer-table w-100 p-5 m-4" style="background-color: #f8f8f8; border-radius:5px;">
    <div class="table-title p-3 d-flex justify-content-between">
        <h3>All Users</h3>
    </div>
    <table class="table text-dark">
        <thead>
            <tr>
                <th scope="col">Sr.No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if ($user->amount_sum == "")
                <td>₹ 0</td>
                @else
                <td>₹ {{$user->amount_sum}}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
