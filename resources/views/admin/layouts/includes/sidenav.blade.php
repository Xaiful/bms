<aside class="main-sidebar elevation-2 sidebar-primary bg-white">
    <!-- Brand Logo -->
    {{-- <a href="{{ route('admin.dashboard') }}" class="brand-link navbar-primary"> --}}
        <img style="width: 100px " src="{{ asset('images/logos/logo.png') }}" alt="UROSD" class="brand-image">
        <span class="brand-text font-weight-ligh text-white">UROSD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 pb-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}">
                        <i class="fa-brands fa-yelp"></i>
                        <p> Category </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('post.index') }}"
                        class="nav-link {{ (request()->is('admin/post*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p> Post </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p> HSC Exam <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Current year</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Previous records</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p> Teachers <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>All teachers</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('students_xi.index') }}"
                                class="nav-link @if ($submenu == 'Students_xi') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Administrators</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a 
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Science</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a 
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Humanities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a 
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Business</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p> Admission <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Manage admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a 
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Security code</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">others</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cloud-download-alt"></i>
                        <p> Download <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a 
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Testimonial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Transfer Certificate</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
