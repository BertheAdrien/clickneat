<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav" class="pt-4">
          <li class="sidebar-item {{ request()->routeIs('managerRestaurant.dashboard*') ? 'selected' : '' }}">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href={{ route('managerRestaurant.dashboard') }}
              aria-expanded="false"
              ><i class="mdi mdi-view-dashboard"></i
              ><span class="hide-menu">Dashboard</span></a
            >
          </li>
          <li class="sidebar-item {{ request()->routeIs('managerRestaurant.categories.index*') ? 'selected' : '' }}">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href={{ route('managerRestaurant.categories.index') }}
              aria-expanded="false"
              ><i class="mdi mdi-chart-scatterplot-hexbin"></i
              ><span class="hide-menu">Categories</span></a
            >
          </li>
          <li class="sidebar-item {{ request()->routeIs('managerRestaurant.items.*') ? 'selected' : '' }}">   
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href={{ route('managerRestaurant.items.index') }}
              aria-expanded="false"
              ><i class="mdi mdi-border-inside"></i
              ><span class="hide-menu">Items</span></a
            >
          </li>
          <li class="sidebar-item {{ request()->routeIs('managerRestaurant.orders.*') ? 'selected' : '' }}"><a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href={{ route('managerRestaurant.orders.index') }}><i class="mdi mdi-border-inside"></i><span class="hide-menu">Orders</span></a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>