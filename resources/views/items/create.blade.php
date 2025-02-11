@extends('layout.main')

@section('main')
    <h1>Creation item</h1>

    <a href="{{ route('items.index') }}">Retour à la liste</a>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
            <div>
            <label for="name">Nom : </label>
            <input type="text" id="name" name="name" placeholder="Nom">
            </div>
            <div>
            <label for="cost">Coût : </label>
            <input type="text" id="cost" name="cost" placeholder="Coût">
            </div>
            <div>
            <label for="price">Prix : </label>
            <input type="text" id="price" name="price" placeholder="Prix">
            </div>
            <div>
                <label for="category_id">Categorie</label>
                <select name="category_id" id="category_id">
                    <option value="">Choisir une categorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Envoyer</button>
    </form>
@endsection