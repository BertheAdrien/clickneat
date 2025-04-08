@extends('layout.admin.main')

@section('main')
    <h1>Modification utilisateur</h1>

    <a href="{{ route('users.index') }}">Retour à la liste</a>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="name">Nom : </label>
        <input type="text" id="name" name="name" placeholder="Nom" value="{{ $user->name }}">
        <button type="submit">Envoyer</button>
    </form>
@endsection