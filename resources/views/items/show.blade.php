@extends('layout.admin.main')

@section('main')
    <h1>Items</h1>

    <a href="{{ route('items.index') }}">Retour à la liste</a>
    <a href="{{ route('items.create') }}">Créer un item</a>

    <ul>
        <li>id : {{ $item->id }}</li>
        <li>nom : {{ $item->name }}</li>
        <li>cost : {{ $item->cost }}</li>
        <li>price : {{ $item->price }}</li>
        <li>created_at : {{ $item->created_at }}</li>
        <li>updated_at : {{ $item->updated_at }}</li>
    </ul>

    <a href="{{ route('categories.show', $item->category->id) }}"><h2>Categorie associée {{ $item->category->name }} </h2></a>
    
    <a href="{{ route('restaurants.show', $item->category->restaurant->id) }}"><h2>Restaurant associé {{ $item->category->restaurant->name }} </h2></a>
@endsection