@extends('layout.restaurant.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Détails de l'Item</h4>

                        <ul class="list-unstyled">
                            <li><strong>id : </strong>{{ $item->id }}</li>
                            <li><strong>Nom : </strong>{{ $item->name }}</li>
                            <li><strong>Coût : </strong>{{ $item->cost }}</li>
                            <li><strong>Prix : </strong>{{ $item->price }}</li>
                            <li><strong>Créé le : </strong>{{ $item->created_at }}</li>
                            <li><strong>Mis à jour le : </strong>{{ $item->updated_at }}</li>
                        </ul>

                        <hr>

                        <!-- Lien vers la catégorie associée -->
                        <div>
                            <h5><strong>Catégorie associée</strong></h5>
                            <a class="btn btn-outline-secondary" href="{{ route('managerRestaurant.categories.show', $item->category->id) }}">
                                {{ $item->category->name }}
                            </a>
                        </div>

                        <hr>

                        <!-- Boutons d'action -->
                        <div class="text-end">
                            <a href="{{ route('managerRestaurant.items.edit', $item->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('managerRestaurant.items.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
