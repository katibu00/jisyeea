<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JISYEEA || @yield('pageTitle')</title>
<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- plugins css -->
	<link rel="stylesheet" type="text/css" href="/theme/vendor/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/theme/vendor/reey-font/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="/theme/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/theme/vendor/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="/theme/vendor/flaticon/css/flaticon_towngov.css">
	<link rel="stylesheet" type="text/css" href="/theme/vendor/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="/theme/vendor/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="/theme/vendor/youtube-popup/youtube-popup.css">
	<link rel="stylesheet" type="text/css" href="/theme/css/style.css">
	<!-- favicons Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/theme/image/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/theme/image/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/theme/image/favicon/favicon-16x16.png">
	<link rel="manifest" href="/theme/image/favicons/site.webmanifest">
</head>
<body>
{{-- <div id="pre-loader">
    <div id="loader-logo"></div>
    <div id="loader-circle"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div> --}}

@include('front.layout.header')

<div class="page-wrapper">
	
@yield('content')
	
</div><!--page-wrapper-->

@include('front.layout.footer')

<div class="mobile-nav-wrapper">
	<div class="mobile-nav-overlay mobile-nav-toggler"></div><!-- mobile-nav-overlay -->
	<div class="mobile-nav-content">
		<a href="#" class="mobile-nav-close mobile-nav-toggler">
			<span></span>
			<span></span>
		</a><!-- mobile-nav-close -->
		<div class="logo-box">
			<a href="index.html"><img src="/theme/image/logo-light.png" width="160" height="40" alt="26"></a>
		</div><!-- logo-box -->
		<div class="mobile-nav-container"></div><!-- mobile-nav-container -->
		<ul class="mobile-nav-contact list-unstyled">
			<li>
				<i class="fa-solid fa-phone"></i>
				<a href="tel:+8898006802">+ 88 ( 9800 ) 6802</a>
			</li>
			<li>
				<i class="fa-solid fa-envelope"></i>
				<a href="mailto:needhelp@company.com">needhelp@company.com</a>
			</li>
			<li>
				<i class="fa-solid fa-map-marker-alt"></i>
				88 Broklyn Golden Road Street <br> New York. USA
			</li>
		</ul><!-- mobile-nav-contact -->
		<ul class="mobile-nav-social list-unstyled">
			<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
		</ul><!-- mobile-nav-social -->
	</div><!-- mobile-nav-content -->
</div><!--mobile-nav-wrapper-->
<div class="search-popup">
	<div class="search-popup-overlay search-toggler"></div><!-- search-popup-overlay -->
	<div class="search-popup-content">
		<form action="#">
			<label for="search" class="sr-only">search here</label><!-- sr-only -->
			<input type="text" id="search" placeholder="Search Here...">
			<button type="submit" aria-label="search submit" class="search-btn">
				<span><i class="flaticon-search-interface-symbol"></i></span>
			</button><!-- search-btn -->
		</form><!-- form -->
	</div><!-- search-popup-content -->
</div><!-- search-popup -->
<a href="#" class="scroll-to-top scroll-to-target" data-target="html"><i class="fa-solid fa-arrow-up"></i></a>
<!-- plugins js -->
<script src="/theme/vendor/jquery/jquery.min.js"></script>
<script src="/theme/vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/theme/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/theme/vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="/theme/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="/theme/vendor/counter-up/jquery.counterup.min.js"></script>
<script src="/theme/vendor/youtube-popup/youtube-popup.jquery.js"></script>
<script src="/theme/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="/theme/js/theme.js"></script>
</body>
</html>