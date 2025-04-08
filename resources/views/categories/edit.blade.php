@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <h4 class="card-title">Modification catégorie</h4>

                            <!-- Nom de la catégorie -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="{{ $category->name }}">
                                </div>
                            </div>

                            <!-- Restaurant associé -->
                            <div class="form-group row">
                                <label for="restaurant_id" class="col-sm-3 text-end control-label col-form-label">Restaurant</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="restaurant_id" id="restaurant_id">
                                        <option value="">Choisir un restaurant</option>
                                        @foreach($restaurants as $restaurant)
                                            <option value="{{ $restaurant->id }}" {{ $restaurant->id == $category->restaurant->id ? 'selected' : '' }}>
                                                {{ $restaurant->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body text-end">
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
