@extends('layout.client.main')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <h2 class="section-title"><strong>{{ $restaurant->name }}</strong></h2>
                <hr>
            </div>        
            <section class="py-5 overflow-hidden">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                                <h2 class="section-title">Categories</h2>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="btn btn-primary me-2 view-all-btn">Voir tout</a>
                                    <div class="swiper-buttons">
                                        <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                                        <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="category-carousel swiper">
                                <div class="swiper-wrapper">
                                    @foreach($restaurant->categories as $category)
                                        <a href="#" class="nav-link swiper-slide text-center category-link" data-category="{{ $category->id }}">
                                            <img src="{{ asset('template-client/images/category-thumb-1.jpg') }}" class="rounded-circle" alt="Category Thumbnail">
                                            <h4 class="fs-6 mt-3 fw-normal category-title">{{ $category->name }}</h4>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <section class="pb-5">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header d-flex flex-wrap justify-content-between my-4">
                                <h2 class="section-title">Produits</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                                @foreach($restaurant->categories as $category)
                                    @foreach($category->items as $item)
                                        <div class="col" data-category="{{ $category->id }}">
                                            <div class="product-item">
                                                <figure>
                                                    <a title="{{ $item->name }}">
                                                        <img src="{{ asset('template-client/images/product-thumb-1.png') }}" alt="Product Thumbnail" class="tab-image">
                                                </a>
                                            </figure>
                                            <div class="d-flex flex-column text-center">
                                                <h3 class="fs-6 fw-normal">{{ $item->name }}</h3>
                                                <div class="d-flex justify-content-center align-items-center gap-2">
                                                    <span class="text-dark fw-semibold">{{ $item->price }} €</span>
                                                </div>
                                                <div class="button-area p-3 pt-0">
                                                    <form action="{{ route('order.addItem') }}" method="POST" class="add-to-cart-form">
                                                        @csrf
                                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                                        <input type="hidden" name="active_category" class="active-category-input" value="">
                                                        <input type="hidden" name="scroll_position" class="scroll-position-input" value="">
                                                        <div class="row g-1 mt-2">
                                                            <div class="col-3">
                                                                <input type="number" name="quantity" class="form-control border-dark-subtle input-number quantity" value="1" min="1">
                                                            </div>
                                                            <div class="col-9">
                                                                <button type="submit" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart">
                                                                    <svg width="18" height="18"><use xlink:href="#cart"></use></svg> Ajouter
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>  
@endsection

