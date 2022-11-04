<div class="customer-table w-100 p-5 m-4" style="background-color: #f8f8f8; border-radius:5px;">
    <div class="table-title p-3 d-flex justify-content-between">
        <h3>All Products</h3>
        <select name="userid" id="userid">
            <option value="" default>Choose a User</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <a href="/create/product"><button type="button" class="btn btn-dark">Add List <i
                    class="fa-regular fa-plus"></i></button></a>
    </div>
    <table class="table text-dark">
        <thead>
            <tr>
                <th scope="col">Sr.No</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td><img src="{{ $product->productImg ? asset('admin/images/' . $product->productImg) : 'NO Image' }}"
                            width="32" height="32" alt="" srcset="" class=""></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>₹ {{$product->amount}}</td>
                    <td><a href="/edit/product/{{ $product->id }}"><button class="btn btn-light"><i
                                    class="fa-sharp fa-solid fa-pen"></i></button></a></td>
                    <td>
                        <form action="/products/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-light"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
