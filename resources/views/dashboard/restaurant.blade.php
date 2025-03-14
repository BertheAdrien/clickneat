@extends('layout.restaurant.main')

@section('main')
    
    <h1>Dashboard Restaurant</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection