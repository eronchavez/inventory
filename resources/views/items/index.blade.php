@extends('layouts.app')
@section('title','Show All')

@section('content')
    <h1 class="h1" >Dashboard</h1>
    <table border="1" cellpadding="5" cellspacing="0"  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions<th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                    <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                    
                    <td><button type="button" class="btn btn-primary" onclick="window.location='{{ route('items.show',$item->id) }}'">SHOW</button></td>
                    <td> <button type="button" class="btn btn-primary" onclick="window.location='{{ route('items.edit', $item->id) }}'">UPDATE</button></td>
                    <td>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <br> <br>
    
    <button type="button"  class="btn btn-success"  onclick="window.location='{{ route('items.create')}}'">ADD NEW ITEM</button>

    
@endsection
