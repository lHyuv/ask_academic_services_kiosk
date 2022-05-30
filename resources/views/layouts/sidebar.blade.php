@if(Auth::check())
<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/home">Academic Services</a>
          </div>
       
          @if(Auth::user()->usertype->user_type_name == 'Client' || Auth::user()->usertype->user_type_name == 'Student' || Auth::user()->usertype->user_type_name == 'Student/Client')
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item">
                <a href="/home" class="nav-link"><i class="fas fa-table"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Services</li>


              <li class="nav-item">
                <a href="/request_service_home" class="nav-link"><i class="fas fa-file"></i><span>Request Service</span></a>
                <a href="/ongoing_services" class="nav-link"><i class="far fa-file"></i><span>Ongoing Service</span></a>
              </li>
              <li class="menu-header">Others</li>
              <li class="nav-item">
                <a href="/backlogs" class="nav-link"><i class="fas fa-list"></i><span>Backlogs and Queries</span></a>
              </li>
        </ul>
        @else
        <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item">
                <a href="/home" class="nav-link"><i class="fas fa-table"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Services</li>
              <li class="nav-item">
                <a href="/pending_services" class="nav-link"><i class="fas fa-file"></i><span>Pending Services</span></a>
              </li>


              <li class="menu-header">Others</li>
              <li class="nav-item">
                <a href="/backlogs" class="nav-link"><i class="fas fa-list"></i><span>Backlogs and Queries</span></a>
              </li>
       
        @endif
        @if(Auth::user()->usertype->user_type_name == 'Admin')
        <li class="menu-header">User Management</li>
              <li class="nav-item">
                <a href="/user" class="nav-link"><i class="fas fa-user"></i><span>Users</span></a>
              </li>
              <li class="nav-item">
                <a href="/role" class="nav-link"><i class="fas fa-users"></i><span>Roles</span></a>
              </li>
        @endif
        </ul>
        </aside>
      </div>
@endif