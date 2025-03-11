<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body>
    @include('layout.topbar')
    @include('layout.sidebar')
 
    <div class="page-wrapper">
        @yield('main')
    </div>
    
    @yield('scripts')


</body>
</html>

