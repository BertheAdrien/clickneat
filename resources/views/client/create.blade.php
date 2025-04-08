@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Création d'un Restaurant</h4>

                        <a href="{{ route('restaurants.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

                        <form action="{{ route('restaurants.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom du Restaurant :</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom du restaurant" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
