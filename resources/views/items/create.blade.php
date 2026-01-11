<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>


    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <form action="{{ route('items.store') }}" method="POST">
    @csrf
    NAME: <input type="text" name="name" placeholder="NAME"> <br> <br>
    QUANTITY: <input type="number" name="quantity" placeholder="QUANTITY"> <br> <br>
    PRICE: <input type="number" name="price" placeholder="PRICE"> <br>
    <input type="submit" value="Submit">
</form>

</body>
</html>