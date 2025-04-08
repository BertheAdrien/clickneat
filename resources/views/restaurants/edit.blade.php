@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('restaurants.update', $restaurant->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <h4 class="card-title">Modification restaurant</h4>

                            <!-- Nom du restaurant -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="{{ $restaurant->name }}">
                                </div>
                            </div>

                            <!-- Ajoute d'autres champs si nécessaire, comme l'adresse, téléphone, etc. -->

                        </div>
                        <div class="border-top">
                            <div class="card-body text-end">
                                <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
