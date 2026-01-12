@extends('layouts.app')
@section('title','Create item')


@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class"h1">CREATE ITEM</h1>
    
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <label > Name:</label>
        <input class="form-control" type="text" name="name" placeholder="NAME"> <br> <br>
        <label for="">Quantity:</label>
        <input class="form-control" type="number" name="quantity" placeholder="QUANTITY"> <br> <br>
        <label >Price: </label>
        <input class="form-control" type="number" name="price" placeholder="PRICE"> <br>
        <input type="submit" value="Submit" class="btn btn-primary" > <br> <br>
    </form>

    <button type="button" class="btn btn-success" onclick="window.location='{{ route('items.index') }}'">Back to list </button></td>

@endsection