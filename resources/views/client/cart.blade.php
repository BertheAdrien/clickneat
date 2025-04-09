@extends('layout.client.main')

@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section-title">Mon Panier</h2>
            <hr>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($order && $order->items->count() > 0)
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Articles commandés - {{ $order->restaurant->name }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Prix unitaire</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->item->name }}</td>
                                        <td>{{ $item->price }} €</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->getSubTotal() }} €</td>
                                        <td>
                                            <form action="{{ route('order.removeItem', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card sticky-below-nav">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Récapitulatif</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Total :</strong> {{ $order->total_price }} €</p>
                        <form action="{{ route('order.validateOrder') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes (optionnel)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Valider ma commande</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    Votre panier est vide. <a href="{{ route('restaurants.index') }}">Parcourir les restaurants</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection