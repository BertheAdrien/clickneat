<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav" class="pt-4">
          <li class="sidebar-item {{ request()->routeIs('dashboard.*') ? 'selected' : '' }}">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href={{ route('dashboard.admin') }}
              aria-expanded="false"
              ><i class="mdi mdi-view-dashboard"></i
              ><span class="hide-menu">Dashboard</span></a
            >
          </li>
          <li class="sidebar-item {{ request()->routeIs('restaurants.*') ? 'selected' : '' }}">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href={{ route('restaurants.index') }}
              aria-expanded="false"
              ><i class="mdi mdi-silverware"></i
              ><span class="hide-menu">Restaurant</span></a
            >
          </li>
          <li class="sidebar-item {{ request()->routeIs('categories.*') ? 'selected' : '' }}">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href={{ route('categories.index') }}
              aria-expanded="false"
              ><i class="mdi mdi-chart-scatterplot-hexbin"></i
              ><span class="hide-menu">Categories</span></a
            >
          </li>
          <li class="sidebar-item {{ request()->routeIs('items.*') ? 'selected' : '' }}">   
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href={{ route('items.index') }}
              aria-expanded="false"
              ><i class="mdi mdi-border-inside"></i
              ><span class="hide-menu">Items</span></a
            >
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>