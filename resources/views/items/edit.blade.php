@extends('layout.main')

@section('main')
    <h1>Modification item</h1>

    <a href="{{ route('items.index') }}">Retour à la liste</a>

    <form action="{{ route('items.update', $item->id ) }}" method="POST">
        @csrf 
        @method('put')
        <div>
            <label for="name">Nom : </label>
            <input type="text" id="name" name="name" placeholder="Nom" value="{{ $item->name }}">
        </div>
        <div>
            <label for="cost">Coût : </label>
            <input type="text" id="cost" name="cost" placeholder="Coût" value="{{ $item->cost }}">
        </div>
        <div>
            <label for="price">Prix : </label>
            <input type="text" id="price" name="price" placeholder="Prix" value="{{ $item->price }}">
        </div>

        <div>
            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id">
                <option value="">Choisir une categorie</option>
                @foreach($categories as $category)
                    @if($category->id == $item->category_id)
                        <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit">Envoyer</button>
    </form>
    
@endsection