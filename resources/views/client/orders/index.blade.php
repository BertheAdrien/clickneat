@extends('layout.client.main')

@section('main')
    <div class="container mt-4">
        <h2>Ma commande en cours</h2>
            <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Commande #{{ $order->id }}
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
                            </div>
                        </div>
                    </div>
            </div>
    </div>
@endsection