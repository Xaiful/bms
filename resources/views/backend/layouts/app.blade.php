<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('backend/css/main.css')}}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{asset('backend/images/avatars/avatar.jpg')}}" alt="">
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="{{asset('backend/images/avatars/avatar.jpg')}}" alt="{{auth()->user()->name}}">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">{{auth()->user()->name}}</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <form method="POST" action="{{ route('logout') }}">
                                                                        @csrf
                                                                    <a class="btn-pill btn-shadow btn-shine btn btn-focus" href="{{route('logout')}}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">Logout</a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div>
                        <img width="42" class="img-responsive" src="{{asset('backend/images/laracom.png')}}" alt="">
                    </div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                    </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            @can('dashboard-show')
                            <li class="mm-active">
                                <a href="{{URL::to('/dashboard')}}">
                                    <i class="metismenu-icon pe-7s-rocket"></i>Dashboards
                                </a>
                            </li>
                            @endcan
                            @can('permission-list')
                            <li>
                                <a href="{{route('permission.index')}}">
                                    <i class="metismenu-icon pe-7s-browser"></i>Permission
                                    {{-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> --}}
                                </a>
                            </li>
                            @endcan

                            @can('role-list')
                            <li>
                                <a href="{{route('roles.index')}}">
                                    <i class="metismenu-icon pe-7s-plugin"></i>Roles
                                </a>
                            </li>
                            @endcan

                            @can('user-list')
                            <li>
                                <a href="{{route('users.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Users
                                </a>
                            </li>
                            @endcan

                            @can('units-list')
                            <li>
                                <a href="{{route('units.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Unites
                                </a>
                            </li>
                            @endcan
                            @can('categories-list')
                            <li>
                                <a href="{{route('categories.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Category
                                </a>
                            </li>
                            @endcan

                            @can('warehouseproduct-list')
                            <li>
                                <a href="{{route('warehouseproduct.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Warehouse-Product
                                </a>
                            </li>
                            @endcan
                            
                            @can('subcategories-list')
                            <li>
                                <a href="{{route('subcategories.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>SubCategory
                                </a>
                            </li>
                            @endcan

                            @can('raw-materials-list')
                            <li>
                                <a href="{{route('rawmaterials.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Raw_materials
                                </a>
                            </li>
                            @endcan

                            @can('rawmaterialshops-list')
                            <li>
                                <a href="{{route('rawmaterialshops.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>RawmaterialShops
                                </a>
                            </li>
                            @endcan

                            @can('products-list')
                            <li>
                                <a href="{{route('products.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Products List
                                </a>
                            </li>
                            @endcan

                            @can('warehouses-list')
                            <li>
                                <a href="{{route('warehouses.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Warehouse List
                                </a>
                            </li>
                            @endcan  
                            @can('warehouses-warehouse')
                            <li>
                                <a href="{{route('warehouses.warehouse')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Warehouses
                                </a>
                            </li>
                            @endcan

                            @can('devisions-list')
                            <li>
                                <a href="{{route('devisions.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Devisions List
                                </a>
                            </li>
                            @endcan

                            @can('devisions-devisions')
                            <li>
                                <a href="{{route('devisions.devisions')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Devisions
                                </a>
                            </li>
                            @endcan

                            @can('districts-list')
                            <li>
                                <a href="{{route('districts.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Districts List
                                </a>
                            </li>
                            @endcan

                            @can('districts-districts')
                            <li>
                                <a href="{{route('districts.districts')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Districts
                                </a>
                            </li>
                            @endcan


                            @can('subdistricts-list')
                            <li>
                                <a href="{{route('subdistricts.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>SubDistricts List
                                </a>
                            </li>
                            @endcan

                            @can('subdistricts-subdistricts')
                            <li>
                                <a href="{{route('subdistricts.subdistricts')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>SubDistricts
                                </a>
                            </li>
                            @endcan

                            @can('areas-list')
                            <li>
                                <a href="{{route('areas.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Areas List
                                </a>
                            </li>
                            @endcan

                            @can('visittypes-list')
                            <li>
                                <a href="{{route('visitTypes.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>Visit Type List
                                </a>
                            </li>
                            @endcan
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                   @yield('content')
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                
                            </div>
                            <div class="app-footer-right">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .scrollbar-sidebar {
            height: calc(100vh - 70px); /* Adjust the height as needed */
            overflow-y: auto;
            border-right: 1px solid #e0e0e0; /* Add a border on the right for separation */
            background-color: #fff; /* Set the background color */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Add a shadow for visual separation */
        }
    
        .app-sidebar__inner {
            padding: 20px; /* Add padding for better readability */
        }
    
        .vertical-nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    
        .vertical-nav-menu li {
            padding: 10px 0;
        }
    
        /* Style your menu items as needed */
        .vertical-nav-menu a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 8px 0;
        }
    
        .vertical-nav-menu a:hover {
            background-color: #f0f0f0;
        }
    </style>
    <form id="delete-form" action="" method="post">
        @csrf
        <input id="method" type="hidden" name="_method" value="DELETE">
    </form>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="{{asset('backend/scripts/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on("click",".delete-row", function(e){
            e.preventDefault();
            // if(confirm("Are You Sure?")){
                let confirmStr = "Are You Sure?"
                if($(this).attr("data-confirm")){
                    confirmStr = $(this).attr("data-confirm");
                }
            if(confirm(confirmStr)){
                let href = $(this).attr("href");
                $("#delete-form").attr("action", href);
                $("#delete-form").submit();
            }
        })
        </script>
        @stack('js')
</body>
</html>