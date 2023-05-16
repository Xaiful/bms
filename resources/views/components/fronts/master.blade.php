<!DOCTYPE html>
<html lang="en">

<!-- head start-->
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Xaiful is a personal portfolio HTML5 template with clean and elegant design">
	    <meta name="keywords" content="bootstrap,clean,cv,minimal,onepage particle,personal,portfolio,resume,vcard ">
	    <title>Home</title>
	    <link rel="stylesheet"  href={{ asset("frontend/css/bootstrap.min.css") }}>
	    <link rel="stylesheet" href={{ asset("frontend/css/normalize.css") }}>
	    <link rel="stylesheet" href={{ asset("frontend/css/animate.css") }}>
	    <link rel="stylesheet" href={{ asset("frontend/css/owl.carousel.min.css") }}>
	    <link rel="stylesheet" href={{ asset("frontend/css/owl.theme.default.min.css") }}>
	    <link rel="stylesheet" href={{ asset("frontend/css/lightbox.css") }}>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href={{asset ("frontend/style.css") }}>
	    <link rel="shortcut icon" href={{asset ("frontend/Favicon.png") }}>
		{{-- <link rel="stylesheet" href="{{ mix('css/owl.carousel.css') }}"> --}}
		
	</head>

	<body>
				
	{{ $slot }}							  
	<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="ba2e9b89b7d4998012ba0d0d-|49" defer="">
	</script>
    
	</body>
	
	
   	<script src={{ asset("frontend/js/jquery-1.10.2.min.js") }}></script>
    <script src={{ asset("frontend/js/bootstrap.min.js") }}></script>
    <script src={{ asset("frontend/js/jquery.sticky.js") }}></script>
    <script src={{ asset("frontend/js/wow.min.js") }}></script>
	{{-- <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/owl.carousel.js') }}"></script> --}}
    <script src={{ asset("frontend/js/owl.carousel.min.js") }}></script>
    <script src={{ asset("frontend/js/main.js") }}></script>
    <script>
        new WOW().init();
    </script>
    

</html>




