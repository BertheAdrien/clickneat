@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <h4 class="card-title">Modification item</h4>

                            <!-- Nom de l'item -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="{{ $item->name }}">
                                </div>
                            </div>

                            <!-- Coût de l'item -->
                            <div class="form-group row">
                                <label for="cost" class="col-sm-3 text-end control-label col-form-label">Coût</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cost" name="cost" placeholder="Coût" value="{{ $item->cost }}">
                                </div>
                            </div>

                            <!-- Prix de l'item -->
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 text-end control-label col-form-label">Prix</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Prix" value="{{ $item->price }}">
                                </div>
                            </div>

                            <!-- Catégorie de l'item -->
                            <div class="form-group row">
                                <label for="category_id" class="col-sm-3 text-end control-label col-form-label">Catégorie</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Choisir une catégorie</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body text-end">
                                <a href="{{ route('items.index') }}" class="btn btn-secondary">Retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
