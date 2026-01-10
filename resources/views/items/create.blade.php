<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form action="{{ route('items.store') }}" method="POST">
    @csrf
    NAME: <input type="text" name="name" placeholder="NAME"> <br> <br>
    LASTNAME: <input type="text" name="lastname" placeholder="LASTNAME"> <br>
    <input type="submit" value="Submit">
</form>

</body>
</html>