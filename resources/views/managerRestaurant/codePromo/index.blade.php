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
        <h2 class="page-title mb-3">Items</h2>
        <a href="{{ route('managerRestaurant.codePromo.create') }}" class="btn btn-primary mb-3 ">Créer un item</a>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
