@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Détails de l'Utilisateur</h4>

                        <ul class="list-unstyled">
                            <li><strong>id : </strong>{{ $user->id }}</li>
                            <li><strong>Nom : </strong>{{ $user->name }}</li>
                            <li><strong>Email : </strong>{{ $user->email }}</li>
                            <li><strong>Rôle : </strong>{{ $user->role }}</li>
                            <li><strong>Créé le : </strong>{{ $user->created_at }}</li>
                            <li><strong>Mis à jour le : </strong>{{ $user->updated_at }}</li>
                        </ul>

                        <hr>

                        <!-- Boutons d'action -->
                        <div class="text-end">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
