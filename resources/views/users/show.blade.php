@extends('layout.admin.main')

@section('main')
    <h1>Utilisateurs</h1>

    <a href="{{ route('users.index') }}">Retour à la liste</a>
    <a href="{{ route('users.create') }}">Créer un utilisateur</a>

    <ul>
        <li>id : {{ $user->id }}</li>
        <li>nom : {{ $user->name }}</li>
        <li>created_at : {{ $user->created_at }}</li>
        <li>updated_at : {{ $user->updated_at }}</li>
    </ul>
    
    
@endsection