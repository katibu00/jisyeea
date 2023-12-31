<header class="header">
	<div class="topbar">
		<div class="topbar-inner">
			<div class="topbar-left">
				<div class="topbar-socials">
					<a href="#"><i class="fa-brands fa-twitter"></i></a>
					<a href="#"><i class="fa-brands fa-facebook"></i></a>
					{{-- <a href="#"><i class="fa-brands fa-pinterest-p"></i></a> --}}
					<a href="#"><i class="fa-brands fa-instagram"></i></a>
				</div><!--topbar-socials-->
				<div class="topbar-info">
					<ul>
						<li>
							<div class="topbar-icon">
								<i class="fa-solid fa-envelope"></i>
							</div><!-- topbar-icon -->
							<div class="topbar-text">
								<a href="mailto:info@yeea.jg.gov.ng">info@yeea.jg.gov.ng</a>
							</div><!-- topbar-text -->
						</li>
						<li>
							<div class="topbar-icon">
								<i class="fa-solid fa-clock"></i>
							</div><!-- topbar-icon -->
							<div class="topbar-text">
								<span>Open Hours: Mon - Fri 8.00 am - 5.00 pm</span>
							</div><!-- topbar-text -->
						</li>
					</ul><!-- ul -->
				</div><!--topbar-info-->
			</div><!-- topbar-left -->
			<div class="topbar-right">
				<ul>
					<li><a href="{{ route('programs.all') }}">Programs</a></li>
					<li><a href="{{ route('about') }}">About Us</a></li>
					<li><a href="{{ route('contact') }}">Complaints</a></li>
				</ul><!-- ul -->
			</div><!--topbar-right-->
		</div><!-- topbar-inner -->
	</div><!--topbar-->
	<div class="main-menu sticky-header">
		<div class="main-menu-inner">
			<div class="main-menu-left">
				<div class="main-menu-logo">
					<a href="{{ route('home') }}"><img src="/images/logo.jpeg" alt="img-1" width="60"></a>
				</div><!-- main-menu-logo -->
				<div class="navigation">
					<ul class="main-menu-list list-unstyled">
						
                     
						<li><a href="{{ route('home') }}">Home</a>
						</li>
						<li><a href="{{ route('programs.all') }}">Programs</a></li>
						<li><a href="{{ route('financial-report') }}">Financial Report</a></li>
						<li><a href="#">News</a></li>
						<li><a href="{{ route('about') }}">About Us</a>
						<li><a href="{{ route('contact') }}">Contact Us</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="main-menu-right">
				<div class="mobile-menu-button mobile-nav-toggler">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="search-box">
					<a href="#" class="search-toggler">
						<i class="flaticon-search-interface-symbol"></i>
					</a>
				</div><!-- search-box -->
				<div class="main-menu-right-button">
					<a href="{{ route('login') }}" class="btn btn-primary">Login/Register</a>
				</div><!-- main-menu-right-button -->
			</div><!-- main-menu-right -->
		</div>
	</div>
</header><!--header-->