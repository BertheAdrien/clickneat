<!DOCTYPE html>
<html lang="en">
@include('layout.restaurant.head')
<body>
    @include('layout.restaurant.topbar')
    @include('layout.restaurant.sidebar')
 
    <div class="page-wrapper">
        @yield('main')
    </div>
    
    @yield('scripts')
    @include('layout.restaurant.scripts')


</body>
</html>

