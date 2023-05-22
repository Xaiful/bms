<aside class="main-sidebar elevation-2 sidebar-primary bg-white">
    <!-- Brand Logo -->
    {{-- <a href="{{ route('admin.dashboard') }}" class="brand-link navbar-primary"> --}}
        <img style=  "width: 100%; padding:20px" src="{{ asset('images/logos/logo.png') }}" alt="UROSD" class="brand-image">
        {{-- <span class="brand-text font-weight-ligh text-white">UROSD</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 pb-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cows.index') }}"
                        class="nav-link {{ (request()->is('admin/cows*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house"></i>
                        <p> Cows </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house"></i>
                        <p> Categories </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subcategories.index') }}"
                        class="nav-link {{ (request()->is('admin/subcategories*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house"></i>
                        <p> Subcategories </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('medicines.index') }}"
                        class="nav-link {{ (request()->is('admin/medicines*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house"></i>
                        <p> Medicines </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cow-medicines.index') }}"
                        class="nav-link {{ (request()->is('admin/cow-medicines*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house"></i>
                        <p> Feedings </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
