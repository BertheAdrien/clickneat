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
        <h2 class="page-title mb-3">Commandes en attente</h2>
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
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Notes</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $order->total_price }} €</td>
                                        <td>{{ $order->notes }}</td>
                                        <td>{{ $order->user->num_telephone }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#orderDetails{{ $order->id }}">
                                                    Détails
                                                </button>
                                                <form action="{{ route('managerRestaurant.orders.complete', $order->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-success" onclick="return confirm('Êtes-vous sûr de marquer cette commande comme complétée ?')">
                                                        Compléter
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="orderDetails{{ $order->id }}" class="collapse">
                                        <td colspan="6">
                                            <div class="card mt-2">
                                                <div class="card-body">
                                                    <h5>Contenu de la commande</h5>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Produit</th>
                                                                <th>Quantité</th>
                                                                <th>Prix</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($order->items as $item)
                                                                <tr>
                                                                    <td>{{ $item->name }}</td>
                                                                    <td>{{ $item->quantity }}</td>
                                                                    <td>{{ $item->price }} €</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
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
