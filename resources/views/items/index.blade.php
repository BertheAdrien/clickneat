@extends('layout.admin.main')

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
        <h2 class="page-title mb-3">Items</h2>
        <a href="{{ route('items.create') }}" class="btn btn-primary mb-3 ">Créer un item</a>
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
                                    <th>Categorie</th>
                                    <th>Prix</th>
                                    <th>Coût</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->cost }}</td>
                                        <td>
                                            <div style="display: flex;">
                                                <a class="btn btn-outline-success" style="margin-right: 8px;" href="{{ route('items.show', $item->id) }}">Voir</a>
                                                <a class="btn btn-outline-warning" style="margin-right: 8px;" href="{{ route('items.edit', $item->id) }}">Modifier</a>
                                                <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
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
