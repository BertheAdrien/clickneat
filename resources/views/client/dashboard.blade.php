@extends('layout.client.main')

@section('main')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

    <section id="latest-blog" class="pb-4">
        <div class="container-lg">
            <div class="row">
                <div class="section-header d-flex align-items-center justify-content-between my-4">
                    <h2 class="section-title">Restaurants disponibles</h2>
                    <a href="#" class="btn btn-primary">View All</a>
                </div>
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un restaurant...">
                </div>
            </div>
            <div class="row" id="restaurantList">
                @foreach ($restaurants as $restaurant)
                    <div class="col-md-4 restaurant-item">
                        <article class="post-item card border-0 shadow-sm p-3">
                            <div class="image-holder zoom-effect">
                                <a href="#">
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
                                        <a href="#" class="text-decoration-none">{{ $restaurant->name }}</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const restaurantItems = document.querySelectorAll('.restaurant-item');

            searchInput.addEventListener('input', function() {
                const filter = searchInput.value.toLowerCase();
                restaurantItems.forEach(item => {
                    const restaurantName = item.querySelector('.post-title a').textContent.toLowerCase();
                    if (restaurantName.includes(filter)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
