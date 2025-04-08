@extends('layout.admin.main')

@section('main')
    <h1>Modification utilisateur</h1>

    <a href="{{ route('users.index') }}">Retour à la liste</a>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="name">Nom : </label>
            <input type="text" id="name" name="name" placeholder="Nom" value="{{ $user->name }}">
        </div>
        <div>
            <label for="email">Email : </label>
            <input type="email" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
        </div>
        <div>
            <label for="role">Rôle : </label>
            <input type="text" id="role" name="role" placeholder="Rôle" value="{{ $user->role }}">
        </div>
    </form>

@endsection