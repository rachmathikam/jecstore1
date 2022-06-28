
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if(auth()->user()->can('master-permission-list'))
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('users.index')}}">
              <i class="bi bi-circle"></i><span>User</span>
            </a>

          </li>
          <li>
          <a href="{{route('roles.index')}}">
              <i class="bi bi-circle"></i><span>Role</span>
            </a>
          </li>
          <li>
            <a href="{{route('permissions.index')}}">
              <i class="bi bi-circle"></i><span>Permission</span>
            </a>

        </ul>
      </li>
      @endif
      <!-- End Components Nav  -->
      @if(auth()->user()->can('menu-data-list'))
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          @if(auth()->user()->can('list-pelanggan'))
            <a href="{{route('pelanggan.index')}}">
              <i class="bi bi-circle"></i><span>Data Pelanggan</span>
            </a>
          @endif
          </li>
          <li>
          @if(auth()->user()->can('list-pelanggan'))
            <a href="{{route ('teknisi.index')}}">
              <i class="bi bi-circle"></i><span>Data Teknisi</span>
            </a>
          @endif

          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Data Layanan</span>
            </a>
          </li>
          <li>
            <a href="{{route('sparepat.index')}}">
              <i class="bi bi-circle"></i><span>Data Sparepat</span>
            </a>
          </li>
          <li>
            <a href="{{route('komponen.index')}}">
              <i class="bi bi-circle"></i><span>Data Komponen</span>
            </a>
          </li>
          <li>
            <a href="{{route ('type.index')}}">
              <i class="bi bi-circle"></i><span>Type Device</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      @endif

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route ('contact.index')}}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route ('brand.index')}}">
            <i class="bx bxs-customize"></i>
          <span>brand</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
