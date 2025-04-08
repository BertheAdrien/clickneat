<!DOCTYPE html>
<html lang="en">
@include('layout.client.head')

<body>
    @include('layout.client.svg')
    @include('layout.client.topbar')

 
    <div class="page-wrapper">
        @yield('main')
    </div>
    
    @include('layout.client.scripts')
</body>
</html>

