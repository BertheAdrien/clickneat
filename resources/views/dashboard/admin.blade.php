@extends('layout.admin.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4">Dashboard Admin</h1>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liens utiles</h4>
                    </div>

                    <!-- Row to align cards on the same line, centered -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3 col-lg-2 col-xlg-3 mb-4">
                            <a href="{{ route('restaurants.index') }}" class="btn btn-link card card-hover text-decoration-none">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white">
                                        <i class="mdi mdi-silverware"></i>
                                    </h1>
                                    <h6 class="text-white">Gérer les restaurants</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xlg-3 mb-4">
                            <a href="{{ route('categories.index') }}" class="btn btn-link card card-hover text-decoration-none">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white">
                                        <i class="mdi mdi-chart-scatterplot-hexbin"></i>
                                    </h1>
                                    <h6 class="text-white">Gérer les catégories</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xlg-3 mb-4">
                            <a href="{{ route('items.index') }}" class="btn btn-link card card-hover text-decoration-none">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">
                                        <i class="mdi mdi-border-inside"></i>
                                    </h1>
                                    <h6 class="text-white">Gérer les items</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xlg-3 mb-4">
                            <a href="{{ route('users.index') }}" class="btn btn-link card card-hover text-decoration-none">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white">
                                        <i class="mdi mdi-account-multiple"></i>
                                    </h1>
                                    <h6 class="text-white">Gérer les utilisateurs</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Cards for Quick Stats -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-4"> <!-- Same color as "Gérer les restaurants" -->
                            <div class="card-body">
                                <h5 class="card-title">Total Restaurants</h5>
                                <p class="card-text">{{ $restaurants->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-4"> <!-- Same color as "Gérer les catégories" -->
                            <div class="card-body">
                                <h5 class="card-title">Total Categories</h5>
                                <p class="card-text">{{ $categories->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-4"> <!-- Same color as "Gérer les items" -->
                            <div class="card-body">
                                <h5 class="card-title">Total Items</h5>
                                <p class="card-text">{{ $items->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-4"> <!-- Same color as "Gérer les utilisateurs" -->
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">{{ $users->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Recent Activity</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>John Doe</strong> added a new item <em>Pizza Margherita</em>
                                <small class="text-muted">3 hours ago</small>
                            </li>
                            <li class="list-group-item">
                                <strong>Jane Smith</strong> updated the category <em>Italian Cuisine</em>
                                <small class="text-muted">5 hours ago</small>
                            </li>
                            <li class="list-group-item">
                                <strong>Admin</strong> added a new restaurant <em>Delicious Bites</em>
                                <small class="text-muted">1 day ago</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
