<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New User</title>
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
            <h2>Create a New User</h2>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <label for="first_name">First name:</label><br>
                <input type="text" id="first_name" name="first_name"><br>
                <label for="last_name">Last name:</label><br>
                <input type="text" id="last_name" name="last_name"><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="phone_number">Phone Number:</label><br>
                <input type="text" id="phone_number" name="phone_number">
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