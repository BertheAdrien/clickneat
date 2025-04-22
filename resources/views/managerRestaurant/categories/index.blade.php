@extends('layout.restaurant.main')

@section('main')

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
    <div class="page-breadcrumb">
        <h2 class="page-title mb-3">Categories</h2>
        <a href="{{ route('managerRestaurant.categories.create') }}" class="btn btn-primary mb-3 ">Créer une categorie</a>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                            id="zero_config"
                            class="table table-striped table-bordered"
                        >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <div style="display: flex;">
                                                <a class="btn btn-outline-success" style="margin-right: 8px;" href="{{ route('managerRestaurant.categories.show', $category->id) }}">Voir</a>
                                                <a class="btn btn-outline-warning" style="margin-right: 8px;" href="{{ route('managerRestaurant.categories.edit', $category->id) }}">Modifier</a>
                                                <form action="{{ route('managerRestaurant.categories.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                                    <button class="btn btn-outline-danger" type="submit">Supprimer</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

