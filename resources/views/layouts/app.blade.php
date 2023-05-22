@include('layouts.includes.head')

<body>

    <!-- Navbar-->
    @include('layouts.includes.navbar')

    <div class="container-fluid mt-5">


        @yield('content')

    </div>




    @include('layouts.includes.scripts')
</body>

</html>