@extends('layout.main')

@section('main')
    
    <h1>Dashboard</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
@endsection


