    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src="{{asset('./img/logo.png')}}" alt="SMS Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">School Management</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('./img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->


              <li class="nav-item">
              <a href="{{route('dashboard')}}" class="nav-link {{Request::path()=== 'dashboard' ? 'active' : ''}}">
                  <i class="nav-icon fas fa-tachometer-alt blue"></i>
                    <p>
                      Dashboard
                    </p>
                </a>
              </li>


                <li class="nav-item">
                    <a href="{{route('getStudent')}}" class="nav-link {{ (request()->is('manage/student')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Student
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('getTeacher') }}" class="nav-link {{ (request()->is('manage/teacher*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Teacher
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{request()->is('manage/class*') || request()->is('manage/section*') || request()->is('manage/subject*') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                             Academics
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('getClass')}}" class="nav-link {{ (request()->is('manage/class*')) ? 'active' : '' }}">
                                <i class="nav-icon fa fa-sitemap" aria-hidden="true"></i>
                                 <p>Class</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('getSection')}}" class="nav-link {{ (request()->is('manage/section*')) ? 'active' : '' }}">
                                <i class="nav-icon fa fa-cubes" aria-hidden="true"></i>

                                <p>Section</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('getSubject')}}" class="nav-link {{(request()->is('manage/subject*')) ? 'active' : ''}}">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p>Subject</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('getTimeTable')}}" class="nav-link {{(request()->is('manage/timetable*'))? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>TimeTable</p>
                    </a>
                </li>





              <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link">
                  <i class="nav-icon fas fa-power-off red"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>




            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

