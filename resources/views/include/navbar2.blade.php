<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="{{URL:: to('/admin')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Gadgets</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="{{URL:: to('/addcategory')}}">
                  <i class="bi bi-circle"></i><span>Add an category</span>
                </a>
              </li>
              <li>
          <li>
            <a href="{{URL:: to('/addgadget')}}">
              <i class="bi bi-circle"></i><span>Add an gadget</span>
            </a>
          </li>
         
          <li>
            <a href="{{URL:: to('/gadgetslist')}}">
              <i class="bi bi-circle"></i><span>List of gadgets</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End gadgets Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#sliders-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Sliders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sliders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          
            <a href="/addslider">
              <i class="bi bi-circle"></i><span>Add an slider</span>
            </a>
          </li>
          
          <li>
            <a href="/sliders">
              <i class="bi bi-circle"></i><span>List of sliders</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End gadgets Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{URL:: to('/orderslist')}}">
          <i class="bi bi-cart"></i>
          <span>Orders</span>
        </a>
      </li>

      <!-- Start gadgets Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{URL:: to('/userslist')}}">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li>
    <!-- End gadgets Nav -->
      

     <!-- Start Profile Nav -->
      {{--<li class="nav-item">
        <a class="nav-link collapsed" href="{{URL:: to('/profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      --}}
       

    </ul>

  </aside><!-- End Sidebar-->
