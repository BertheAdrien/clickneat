@extends('layout.restaurant.main')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- add restaurant id -->
            <h1 class="my-4">{{ $restaurantName->name }}</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liens utiles</h4>
                </div>

                <!-- Row to align cards on the same line, centered -->
                <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-lg-3 col-xlg-3 mb-4">
                        <a href="{{ route('managerRestaurant.categories.index') }}" class="btn btn-link text-decoration-none w-100 h-100">
                            <div class="box bg-success text-center card card-hover" style="height: 150px; display: flex; flex-direction: column; justify-content: center;">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-chart-scatterplot-hexbin"></i>
                                </h1>
                                <h6 class="text-white">Gérer les catégories</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xlg-3 mb-4">
                        <a href="{{ route('managerRestaurant.codePromo.index') }}" class="btn btn-link text-decoration-none w-100 h-100">
                            <div class="box bg-success text-center card card-hover" style="height: 150px; display: flex; flex-direction: column; justify-content: center;">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-chart-scatterplot-hexbin"></i>
                                </h1>
                                <h6 class="text-white">Gérer les codes promo</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xlg-3 mb-4">
                        <a href="{{ route('managerRestaurant.items.index') }}" class="btn btn-link text-decoration-none w-100 h-100">
                            <div class="box bg-info text-center card card-hover" style="height: 150px; display: flex; flex-direction: column; justify-content: center;">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-border-inside"></i>
                                </h1>
                                <h6 class="text-white">Gérer les items</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
