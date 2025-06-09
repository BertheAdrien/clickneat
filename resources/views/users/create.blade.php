@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Création d'un Utilisateur</h4>

                        <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom :</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe :</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role :</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="restaurant">Restaurant</option>
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
