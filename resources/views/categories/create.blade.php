@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Création d'une Catégorie</h4>

                        <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom de la Catégorie :</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de la catégorie" required>
                            </div>

                            <div class="mb-3">
                                <label for="restaurant_id" class="form-label">Restaurant :</label>
                                <select name="restaurant_id" id="restaurant_id" class="form-select" required>
                                    <option value="">Choisir un restaurant</option>
                                    @foreach($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
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