@extends('layout.client.main')

@section('main')
    <section id="latest-blog" class="pb-4">
        <div class="container-lg">
            <div class="row">
                <div class="section-header d-flex align-items-center justify-content-between my-4">
                    <h2 class="section-title">Confirmation de la commande</h2>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Commande n°{{ $order->id }}</h5>
                            <p class="card-text">Date de la commande : {{ $order->created_at->format('d/m/Y H:i') }}</p>
                            <p class="card-text">Statut : {{ $order->status }}</p>
                            <p class="card-text">Total : {{ $order->total_price }} €</p>
                            <p class="card-text">Notes : {{ $order->notes }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
