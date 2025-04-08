@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Création d'un Item</h4>

                        <a href="{{ route('items.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom de l'Item :</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de l'item" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="cost" class="form-label">Coût :</label>
                                <input type="text" id="cost" name="cost" class="form-control" placeholder="Coût" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Prix :</label>
                                <input type="text" id="price" name="price" class="form-control" placeholder="Prix" required>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Catégorie :</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                    <option value="">Choisir une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
