<!DOCTYPE html>
<html lang="en">
@include('layout.client.head')
<body>
    {{-- @include('layout.client.topbar')
    @include('layout.client.sidebar') --}}
 
    <div class="page-wrapper">
        @yield('main')
    </div>
    
    {{-- @include('layout.client.scripts') --}}


</body>
</html>

