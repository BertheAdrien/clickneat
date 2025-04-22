@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Création d'une Catégorie</h4>

                        <a href="{{ route('managerRestaurant.categories.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

                        <form action="{{ route('managerRestaurant.categories.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="restaurant_id" value="{{ Auth::user()->restaurant_id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom de la Catégorie :</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de la catégorie" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection