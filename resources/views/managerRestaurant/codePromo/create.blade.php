@extends('layout.managerRestaurant.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Création d'un Code Promo</h4>

                        <a href="{{ route('managerRestaurant.codePromo.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

                        <form action="{{ route('managerRestaurant.codePromo.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-label">Code :</label>
                                <input type="text" id="code" name="code" class="form-control" placeholder="Code" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="montant" class="form-label">Montant :</label>
                                <input type="text" id="montant" name="montant" class="form-control" placeholder="Montant" required>
                            </div>

                            <div class="mb-3">
                                <label for="pourcentage" class="form-label">Pourcentage :</label>
                                <input type="text" id="pourcentage" name="pourcentage" class="form-control" placeholder="Pourcentage" required>
                            </div>

                            <div class="mb-3">
                                <label for="date_debut" class="form-label">Date de début :</label>
                                <input type="date" id="date_debut" name="date_debut" class="form-control" placeholder="Date de début" required>
                            </div>

                            <div class="mb-3">
                                <label for="date_fin" class="form-label">Date de fin :</label>
                                <input type="date" id="date_fin" name="date_fin" class="form-control" placeholder="Date de fin" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_resto" class="form-label">Restaurant :</label>
                                <select name="id_resto" id="id_resto" class="form-select" required>
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
