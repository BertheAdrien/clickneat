@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <h4 class="card-title">Modification utilisateur</h4>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-sm-3 text-end control-label col-form-label">Rôle</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role" id="role">
                                        <option value="">Choisir</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="restaurant" {{ $user->role === 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                                        <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Client</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body text-end">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
