@extends('layouts.app')

@section('title', 'Show Item')

@section('content')
    <h1>{{ $item->name }}</h1>
    <p>Sarap nyan, for only {{$item->price}}</p>

    <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>

    
@endsection
