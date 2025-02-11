@extends('layout.main')

@section('main')
    <h1>Category</h1>
    <a href="{{ route('categories.index') }}">Retour à la liste</a>

    <ul>
        <li>id : {{ $category->id }}</li>
        <li>nom : {{ $category->name }}</li>
        <li>created_at : {{ $category->created_at }}</li>
        <li>updated_at : {{ $category->updated_at }}</li>
    </ul>