<!DOCTYPE html>
<html lang="en">
@include('layout.admin.head')
<body>
    @include('layout.admin.topbar')
    @include('layout.admin.sidebar')
 
    <div class="page-wrapper">
        @yield('main')
    </div>
    
    @yield('scripts')
    @include('layout.admin.scripts')


</body>
</html>

