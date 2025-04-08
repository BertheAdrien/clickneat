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
            <label for="role">Rôle</label>
            <select name="role" id="role">
                <option value="">Choisir un rôle</option>
                @foreach($roles as $role)
                    @if($role->id == $user->role)
                        <option value="{{ $role->id }}" selected="selected">{{ $role->name }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit">Envoyer</button>
    </form>

@endsection