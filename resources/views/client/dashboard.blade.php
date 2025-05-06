@extends('layout.client.main')

@section('main')

    <section id="latest-blog" class="pb-4">
        <div class="container-lg">
            <div class="row">
                <div class="section-header d-flex align-items-center justify-content-between my-4">
                    <h2 class="section-title">Restaurants disponibles</h2>
                </div>
                <div class="mb-3 search-border">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un restaurant...">
                </div>
            </div>
            <div class="row" id="restaurantList">
                @foreach ($restaurants as $restaurant)
                    <div class="col-md-4 restaurant-item">
                        <article class="post-item card shadow-sm p-3 mt-3 ">
                            <div class="image-holder zoom-effect">
                                <a href="{{ route('client.restaurantShow', $restaurant->id) }}">
                                    <img src="{{ asset('template-client/images/post-thumbnail-1.jpg') }}" alt="post" class="card-img-top">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                    <div class="meta-date"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg>22 Aug 2021</div>
                                    <div class="meta-categories"><svg width="16" height="16"><use xlink:href="#category"></use></svg>tips & tricks</div>
                                </div>
                                <div class="post-header">
                                    <h3 class="post-title">
                                        <a href="{{ route('client.restaurantShow', $restaurant->id) }}" class="text-decoration-none">{{ $restaurant->name }}</a>
                                    </h3>
                                    <p>DESCRIPTION</p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .post-item{
            border-color: #6BB252 !important;
        }
        .search-border{
            border: 3px solid #6BB252;
            border-radius: 10px;
            
        }
    </style>
@endsection
