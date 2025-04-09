<header class="sticky-top bg-white shadow-sm">
  <div class="container-fluid">
    <div class="row py-3 border-bottom">
      
      <div class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
        <div class="d-flex align-items-center my-3 my-sm-0">
          <a href="{{ route('client.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#menu"></use></svg>
        </button>
      </div>
     
      <div class="col-lg-8">
        <ul class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
          <li class="nav-item active">
            <a href="{{ route('client.dashboard') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pe-3" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
            <ul class="dropdown-menu border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
              <li><a href="#" class="dropdown-item">About Us </a></li>
            </ul>
          </li>
        </ul>
      </div>
      
      <div class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
        <ul class="d-flex justify-content-end list-unstyled m-0">
          <li>
            <a href="#" class="p-2 mx-1">
              <svg width="24" height="24"><use xlink:href="#user"></use></svg>
            </a>
          </li>
          <li>
            <a href="#" class="p-2 mx-1">
              <svg width="24" height="24"><use xlink:href="#wishlist"></use></svg>
            </a>
          </li>
          <li>
            <a href="#" class="p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <svg width="24" height="24"><use xlink:href="#shopping-bag"></use></svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart">
  <div class="offcanvas-header justify-content-between">
    <h5 class="offcanvas-title">Votre panier</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fermer"></button>
  </div>

  <div class="offcanvas-body d-flex flex-column">
    <div class="order-md-last flex-grow-1">
      <h6 class="text-muted mb-3">
        Restaurant : <strong>{{ $order->restaurant->name }}</strong>
      </h6>

      {{-- Liste des items --}}
      <div class="mb-4">
        @foreach($order->items as $item)
          <div class="d-flex justify-content-between align-items-start border-bottom py-2">
            <div class="me-2">
              <div class="fw-semibold">{{ $item->name }}</div>
              {{-- Optionnel : quantité, description, etc. --}}
            </div>
            <div class="text-end">
              <span class="text-body-secondary">{{ $item->price }} €</span>
            </div>
          </div>
        @endforeach
      </div>

      <div class="d-flex justify-content-between border-top pt-3 mb-4 fw-semibold">
        <span>Total</span>
        <span>{{ $order->total_price }} €</span>
      </div>
    </div>

    <a href="{{ route('client.cart') }}" class="btn btn-primary btn-lg w-100">
      Continuer vers la commande
    </a>
  </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">

  <div class="offcanvas-header justify-content-between">
    <h4 class="fw-normal text-uppercase fs-6">Menu</h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    
  </div>
</div>