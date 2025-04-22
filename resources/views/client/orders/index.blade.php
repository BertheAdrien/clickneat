@extends('layout.client.main')

@section('main')
    <div class="container mt-4">
        <h2>Mes Commande en cours</h2>
        
        @if($orders->isEmpty())
            <div class="alert alert-info">
                Vous n'avez pas de commandes en cours.
            </div>
        @else
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Commande #{{ $order->id }} - {{ $order->restaurant->name }}
                                </h5>
                                <p class="card-text">
                                    <strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}<br>
                                    <strong>Statut :</strong> 
                                    @if($order->status == 'validated')
                                        <span class="badge bg-warning">En attente</span>
                                    @else
                                        <span class="badge bg-success">Prête</span>
                                    @endif
                                </p>
                                <p class="card-text">
                                    <strong>Total :</strong> {{ $order->total_price }} €
                                </p>
                                <a href="{{ route('client.orders.show', $order->id) }}" class="btn btn-primary">
                                    Voir les détails
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection