<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Product</title>
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
                    <h3>Display User Table</h3>
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
            <h2>Create a New Product</h2>
            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <label for="first_name">Product Name:</label><br>
                <input type="text" id="product_name" name="product_name"><br>
                <label for="last_name">Product Category:</label><br>
                <input type="text" id="product_category" name="product_category"><br>
                <label for="price">Price</label><br>
                <input type="double" id="product_price" name="product_price"><br>
                <label for="phone_number">In Stock:</label><br>
                <input type="text" id="In_stock" name="In_stock">
                <input type="submit" value="Submit">
            </form>
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
    </div>

</body>

</html>