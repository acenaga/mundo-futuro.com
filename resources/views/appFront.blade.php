<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mundo Futuro - Noticias Geek, desarrollo y Juegos</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{ asset('/front-assets/img/favicon.ico') }}" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('/front-assets/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/front-assets/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/front-assets/css/slicknav.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/front-assets/css/owl.carousel.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/front-assets/css/magnific-popup.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/front-assets/css/animate.css') }}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset('/front-assets/css/style.css') }}"/>
	<!-- Scripts -->
	@routes
	<script src="{{ mix('js/app.js') }}" defer></script>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
    @inertia

    <!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="footer-left-pic">
				<img src="{{ asset('/front-assets/img/footer-left-pic.png') }}" alt="">
			</div>
			<div class="footer-right-pic">
				<img src="{{ asset('/front-assets/img/footer-right-pic.png') }}" alt="">
			</div>
			<a href="#" class="footer-logo">
				<img src="{{ asset('/front-assets/img/logo.png') }}" alt="">
			</a>
			<ul class="main-menu footer-menu">
				<li><a href="">Home</a></li>
				<li><a href="">Games</a></li>
				<li><a href="">Reviews</a></li>
				<li><a href="">News</a></li>
				<li><a href="">Contact</a></li>
			</ul>
			<div class="footer-social d-flex justify-content-center">
				<a href="https://www.instagram.com/mundofuturoca/" target="__blank"><i class="fa fa-instagram"></i></a>
				<a href="https://www.facebook.com/mundofuturoca" target="__blank"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/mundofuturoca" target="__blank"><i class="fa fa-twitter"></i></a>
			</div>
			<div class="copyright"><a href="">Colorlib</a> 2018 @ All rights reserved</div>
		</div>
	</footer>
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
<script src="{{ asset('/front-assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/front-assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/front-assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('/front-assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/front-assets/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('/front-assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/front-assets/js/main.js') }}"></script>


</body>
</html>