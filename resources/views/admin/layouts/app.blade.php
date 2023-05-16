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
                            <h1 class="m-0"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a>Home</a></li>
                                <li class="breadcrumb-item active"></li>
                                <li class="breadcrumb-item active"></li>
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