@if(Auth::check())
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/home">Academic Services</a>
          </div>


<div class="p-3 hide-sidebar-mini">
                        <div class="media">
                            <figure class="avatar mr-2 avatar">
                                    <img src="http://localhost:8000/template/img/avatar/avatar-1.png" class="mr-3 rounded-circle"  alt="Avatar image">
                                    <i class="avatar-presence online"></i>
                            </figure>
                            <div class="media-body">
                                <h6 class="mt-1 mb-0"> <a href="/profile" class="nav-item text-truncate">{{ Auth::user()->email }}</a></h6>
                                <p class="mb-0">{{Auth::user()->roles->pluck('name')[0]}}</p>
                            </div>
                        </div>
                    </div>


          @if(Auth::user()->roles->pluck('name')[0] == 'Client' || Auth::user()->roles->pluck('name')[0] == 'Student' || Auth::user()->roles->pluck('name')[0] == 'Student/Client')
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
        @if(Auth::user()->roles->pluck('name')[0] == 'Admin')
        <li class="menu-header">System Setup</li>
              <li class="nav-item">
                <a href="/requests" class="nav-link"><i class="fas fa-file"></i><span>Requests</span></a>
              </li>
              <li class="nav-item">
                <a href="/steps" class="nav-link"><i class="fas fa-shoe-prints"></i><span>Steps</span></a>
              </li>
              <li class="nav-item">
                <a href="/requirements" class="nav-link"><i class="far fa-clipboard"></i><span>Requirements</span></a>
              </li>
        <li class="menu-header">User Management</li>
              <li class="nav-item">
                <a href="/user" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
              </li>
              <li class="nav-item">
                <a href="/role" class="nav-link"><i class="fas fa-user-cog"></i><span>Roles</span></a>
              </li>
        @endif
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <button type="submit" class="btn btn-danger btn-lg btn-block btn-icon-split logout-btn" 
                        name="logout_btn" onclick="event.preventDefault();document.getElementById('logout-form-2').submit();">
                            Logout <i class="fas fa-sign-out-alt"></i>
                        </button>
                        <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                        </form>
         </div>
        </ul>
        </aside>
      </div>
@endif