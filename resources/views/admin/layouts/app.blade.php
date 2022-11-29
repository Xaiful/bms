<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.includes.head')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="{{ asset('images/logos/loader.gif') }}" alt="MyADC" height="70"
                width="70">
        </div>

        <!-- Navbar -->
        @include('admin.layouts.includes.topnav')

        <!-- Main Sidebar Container -->
        @include('admin.layouts.includes.sidenav')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $menu }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a>Home</a></li>
                                <li class="breadcrumb-item active">{{ $menu }}</li>
                                <li class="breadcrumb-item active">{{ $submenu }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                {{-- @if (session('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="message">
                        {{ session('success') }}
                    </div>
                </div>
                @endif --}}
                @if (session('success'))
                    <div class="message alert alert-success alert-block">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session('error'))
                    <div class="message alert text-denger">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                @yield('content')
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        {{-- <footer class="main-footer">
            <strong>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> <a href="https://github.com/mr-mamun-50" target="blank">Mamunur Rashid
                    Mamun</a>.
            </strong>
            All rights reserved.
            <div class="float-ri{{ session('success') }}ght d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div> --}}
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('admin.layouts.includes.scripts')
    
    <script>
           $("document").ready(function(){
        setTimeout(function(){
            $("div.message").remove();
        },3000);
    });
    </script>
<script>
    let del = document.querySelectorAll('.cross');
        let image = document.querySelectorAll('.image');
        del.forEach(function(x){
            x.addEventListener('click', function(e){
                x.classList.add('d-none')
                x.previousElementSibling.remove()
            })
        });
    function removeImage(event){
        $("#deleted-images").append('<input id="image" value="'+$(event).data("src")+'" type="hidden" name="deleted_images[]" multiple/>')
    }
</script>
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('admin.layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html> --}}
