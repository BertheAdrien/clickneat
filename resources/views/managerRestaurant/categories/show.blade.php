@extends('layout.restaurant.main')  

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Détails de la Catégorie</h4>

                        <ul class="list-unstyled">
                            <li><strong>id : </strong>{{ $category->id }}</li>
                            <li><strong>Nom : </strong>{{ $category->name }}</li>
                            <li><strong>Créé le : </strong>{{ $category->created_at }}</li>
                            <li><strong>Mis à jour le : </strong>{{ $category->updated_at }}</li>
                        </ul>

                        <hr>

                        <h5><strong>Items Associés</strong></h5>
                        <ul class="list-unstyled">
                            @foreach($category->items as $item)
                                <li>
                                    <a class="btn btn-outline-secondary" href="{{ route('managerRestaurant.items.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <hr>

                        <!-- Boutons d'action -->
                        <div class="text-end">
                            <a href="{{ route('managerRestaurant.categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('managerRestaurant.categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
