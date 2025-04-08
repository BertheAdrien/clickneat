@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Détails du Restaurant</h4>

                        <ul class="list-unstyled">
                            <li><strong>id : </strong>{{ $restaurant->id }}</li>
                            <li><strong>Nom : </strong>{{ $restaurant->name }}</li>
                            <li><strong>Créé le : </strong>{{ $restaurant->created_at }}</li>
                            <li><strong>Mis à jour le : </strong>{{ $restaurant->updated_at }}</li>
                        </ul>

                        <hr>

                        <h5><strong>Catégories Associées</strong></h5>
                        <ul class="list-unstyled">
                            @foreach($restaurant->categories as $category)
                                <li>
                                    <a class="btn btn-outline-secondary" href="{{ route('categories.show', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <hr>

                        <h5><strong>Items Associés</strong></h5>
                        <ul class="list-unstyled">
                            @foreach($restaurant->categories as $category)
                                @foreach($category->items as $item)
                                    <li>
                                        <a class="btn btn-outline-secondary" href="{{ route('items.show', $item->id) }}">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>

                        <hr>

                        <!-- Boutons d'action -->
                        <div class="text-end">
                            <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
