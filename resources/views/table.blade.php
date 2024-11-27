<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <link rel="stylesheet" href="/css/table_style.css">
</head>

<body>
    <div class="dashboard">
        <h1>User Dashboard</h1>
    </div>
    <div class="main_div">
        <div class="flex_1">
            <a href="{{ route('user.table') }}">
                <div class="box">
                    <h3>Display Tables</h3>
                </div>
            </a>
            <a href="{{ route('user.create') }}">
                <div class="box">
                    <h3>Create New User</h3>
                </div>
            </a>
            <a href="{{ route('product.create') }}">
                <div class="box">
                    <h3>Create New Product</h3>
                </div>
            </a>
        </div>
        <div class="flex_2">
            <h2>User Table</h2>
            <table style="width: 80%;">
                @if (App\Models\User::exists())
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th></th>
                    <th></th>
                </tr>
                @endif
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td><a href="{{ route('user.edit', $user->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; color: red; border: none;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table><br>
            <h2>Products</h2>
            <table style="width: 80%;">
            @if (App\Models\Product::exists())
                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>In Stock</th>
                    <th></th>
                    <th></th>
                </tr>
                @endif
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_category}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->In_stock}}</td>
                    <td><a href="{{ route('product.edit', $product->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; color: red; border: none;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>