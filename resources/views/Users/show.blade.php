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

    <h2>Categories</h2>
    <ul>
        @foreach($user->categories as $category)
        <li><a href="{{ route('categories.show', $category->id) }}" title="Voir la category">{{ $category->name }}</a></li>
        @endforeach
    </ul>

    <h2>Items</h2>
    <ul>
        @foreach($user->categories as $category)
            @foreach($category->items as $item)
                <li><a href="{{ route('items.show', $item->id) }}" title="Voir l'item">{{ $item->name }}</a></li>
            @endforeach
        @endforeach
    </ul>
    
@endsection