@extends('layouts.app')
@section('title', 'Log In')


@section('content')

    <form action=" {{ route ('login') }}" method="POST">
        @csrf 
        <input type="email" name="email" placeholder="Email"> <br> <br>
        <input type="password" name="password" placeholder="Password"> <br> <br>
        <button type="submit" class="btn btn-primary" >Login</button>
    </form>

@endsection