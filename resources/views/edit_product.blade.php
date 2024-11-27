<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
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
            <h2>Product User</h2>
            <form action="{{ route('product.update', $product->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="product_name">Product name:</label><br>
                <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}"><br>
                <label for="product_category">Product Category:</label><br>
                <input type="text" id="product_category" name="product_category" value="{{ $product->product_category }}"><br>
                <label for="product_price">Product Price:</label><br>
                <input type="text" id="product_price" name="product_price" value="{{ $product->product_price }}"><br>
                <label for="In_stock">In_stock:</label><br>
                <input type="text" id="In_stock" name="In_stock" value="{{ $product->In_stock }}">
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