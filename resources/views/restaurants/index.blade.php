@extends('layout.main')

@section('main')
    <h1>Restaurants</h1>
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >

    <a href="{{ route('restaurants.create') }}">Créer un restaurant</a>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Basic Datatable</h5>
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
            @foreach($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->id }}</td>
                    <td>{{ $restaurant->name }}</td>
                    <td>
                        <div style="display: flex;">
                            <a style="margin-right: 8px;" href="{{ route('restaurants.show', $restaurant->id) }}">Voir</a>
                            <a style="margin-right: 8px;" href="{{ route('restaurants.edit', $restaurant->id) }}">Modifier</a>
                            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $restaurant->id }}">
                                <button type="submit">Supprimer</button>
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

@endsection

@section('scripts')
<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
<script src="{{ asset('extra-libs/multicheck/jquery.multicheck.js') }}"></script>
<script src="{{ asset('extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        console.log("scripts !");
        
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
@endsection


