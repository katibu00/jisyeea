@extends('front.layout.app')
@section('pageTitle', 'Home')
@section('content')

    @include('front.layout.slider')

<style>
.mobile-button {
    display: none; /* Initially hide the button */
    background-color: #ff5733; /* Your desired color for mobile */
    color: #fff; /* Text color for mobile */
    padding: 10px 20px; /* Adjust padding as needed */
    border: none;
    border-radius: 5px;
    text-decoration: none;
}

@media screen and (max-width: 768px) {
    .mobile-button {
        display: block; /* Show the button on smaller screens */
    }
}

</style>

    <section class="department-section">
        <div class="container">
            <div class="department-section-inner">
              

                <div class="row row-gutter-y-40">
                    

                    <div class="col-xl-2 col-lg-4 col-md-6">
                        
                        <div class="department-card">
                            <a href="{{ route('login') }}" class="btn btn-primary mb-5 mobile-button">Login/Register</a>
                            <div class="department-card-icon">
                                <a href="#"><i class="flaticon-parthenon"></i></a>
                            </div>
                            <div class="department-card-content">
                                <h5><a href="#">Training Programs</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="department-card">
                            <div class="department-card-icon">
                                <a href="departments.html"><i class="flaticon-suitcase"></i></a>
                            </div>
                            <div class="department-card-content">
                                <h5><a href="#">Job Placement</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="department-card">
                            <div class="department-card-icon">
                                <a href="departments.html"><i class="flaticon-industry"></i></a>
                            </div>
                            <div class="department-card-content">
                                <h5><a href="#">Entrepreneurship Support</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="department-card">
                            <div class="department-card-icon">
                                <a href="#"><i class="flaticon-bus"></i></a>
                            </div>
                            <div class="department-card-content">
                                <h5><a href="#">Stakeholder Collaboration</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="department-card">
                            <div class="department-card-icon">
                                <a href="#"><i class="flaticon-lotus"></i></a>
                            </div>
                            <div class="department-card-content">
                                <h5><a href="#">Policy Development</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="department-card">
                            <div class="department-card-icon">
                                <a href="#"><i class="flaticon-balance-1"></i></a>
                            </div>
                            <div class="department-card-content">
                                <h5><a href="#">Monitoring and Evaluation</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="department-search-section">
            <div class="container">
                <form class="department-search-form">
                    {{-- <a href="{{ route('login') }}" class="mx-1">Login</button>
                    <a href="{{ route('register') }}" class="mx-1">Register</button> --}}
                </form>
            </div>
        </div>
    </section>
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="about-image">
                        <div class="about-image-inner img-one">
                            <img src="/images/gov.jpeg" class="img-fluid" alt="img-2">
                            <div class="sign-text">Umar Namadi</div>
                            <div class="about-image-caption">
                                <div class="about-image-caption-inner">
                                    {{-- <span class="about-caption-number">Excellence</span> --}}
                                    <span class="about-caption-text">His Excellency</span>
                                </div>
                            </div>
                        </div>
                        <div class="about-image-inner img-two">
                            <img src="/theme/image/shapes/about-3.jpg" class="floated-image" alt="img-3">
                            <img src="/images/map.jpeg" class="img-fluid" alt="img-4">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-inner">
                        <div class="section-title-box">
                            <div class="section-tagline" style="margin-top: -70px">Message from the Governor</div>
                            <p> Welcome to the Jigawa State Youth Empowerment/Employment Agency (JISYEEA). Established with a vision to empower our youth with essential skills, opportunities, and resources, our agency is committed to fostering meaningful employment and sustainable development in Jigawa State. Our goal is to create a dynamic and inclusive ecosystem that unlocks the potential within our youth, paving the way for a brighter future for our state. Together, let's build a thriving community where every young individual can thrive, contribute, and lead towards progress and success.</p>
                        </div>
                       
                        <div class="about-author-box">
                            <div class="about-author-image">
                                <img src="/images/gov.png" class="img-fluid" alt="img-5" width="100">
                            </div>
                            <div class="about-author-box-meta">
                                <h5>Malam Umar A. Namadi, Fca</h5>
                                <span>Executive Governor, Jigawa State.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="event-three-section">
        <div class="container">
            <div class="portfolio-two-box">
                <div class="section-title-box text-center">
                    <div class="section-tagline">Our Programs</div>
                    <h2 class="section-title">Register for Program</h2>
                </div>
            </div>
        </div>
		<div class="event-section-outer" style="margin-top: -50px">
			<div class="container">
				<div class="row row-gutter-y-30">
                   
                    @foreach ($programs as $program)
                    <div class="col-12 col-lg-6 col-xl-6">
						<div class="event-card">
							<div class="event-card-image">
								<div class="event-card-image-inner">
									<a href="{{ route('programs.show', $program->slug) }}"><img src="{{ $program->featured_image }}" width="200" class="img-fluid" alt="img-164"></a>		
								</div>
							</div>
							<div class="event-card-content">
								<div class="event-card-info">
									<ul class="list-unstyled">
										<li>
											<i class="fa-solid fa-clock"></i>
											<span>{{  date('M d, Y', strtotime($program->start_date)) . ' - ' . date('M d, Y', strtotime($program->end_date)) }}
                                            </span>
										</li>
										<li>
                                            <i class="fa-sharp fa-solid fa-users"></i>
											<span>{{ @$program->category->name }}</span>
										</li>
									</ul>
								</div>
								<div class="event-card-title">
									<h4><a href="{{ route('programs.show', $program->slug) }}">{{ $program->title }}</a></h4>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
                <a href="{{ route('login') }}" class="btn btn-primary mb-5 mobile-button">Login/Register</a>
			</div>
		</div>
	</section>

    <section class="funfact-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="funfact-counter-item">
                        <div class="funfact-counter-box">
                            <div class="funfact-counter-icon">
                                <i class="flaticon-running-man"></i>
                            </div>
                            <div class="funfact-counter-number">
                                <h3 class="counter-number">8590</h3>
                                <span class="funfact-counter-number-postfix"></span>
                            </div>
                        </div>
                        <p class="funfact-text">Number of Youth Empowered</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="funfact-counter-item">
                        <div class="funfact-counter-box">
                            <div class="funfact-counter-icon">
                                <i class="flaticon-coverage"></i>
                            </div>
                            <div class="funfact-counter-number">
                                <h3 class="counter-number">3350</h3>
                                <span class="funfact-counter-number-postfix"></span>
                            </div>
                        </div>
                        <p class="funfact-text">Employment Success Rate</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="funfact-counter-item">
                        <div class="funfact-counter-box">
                            <div class="funfact-counter-icon">
                                <i class="flaticon-landscape"></i>
                            </div>
                            <div class="funfact-counter-number">
                                <h3 class="counter-number">4388</h3>
                                <span class="funfact-counter-number-postfix"></span>
                            </div>
                        </div>
                        <p class="funfact-text">Startups launched with JISYEEA support</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="funfact-counter-item">
                        <div class="funfact-counter-box">
                            <div class="funfact-counter-icon">
                                <i class="flaticon-barn-3"></i>
                            </div>
                            <div class="funfact-counter-number">
                                <h3 class="counter-number">888</h3>
                                <span class="funfact-counter-number-postfix"></span>
                            </div>
                        </div>
                        <p class="funfact-text">Training Program Reach</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mayor-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mayor-box">
                        <div class="section-title-box">
                            <div class="section-tagline">From The Executive Secretary</div>
                            <h2 class="section-title">Major Voice of City Government</h2>
                            <p>Dear Youth of Jigawa State,<br />I am honored to serve as the Executive Secretary of JISYEEA.
                                Together, let us embark on a journey of empowerment, innovation, and opportunity. Your
                                skills, dreams, and potential are our priority as we work towards your success and a
                                brighter future for Jigawa State.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mayor-img">
                        <img src="/theme/image/shapes/shape-1.png" class="floated-image-one" alt="img-7">
                        <img src="/images/director3.jpeg" alt="img-8">
                        <div class="mayor-name">
                            Dr. Habib Muhammad Ubale
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="client-section">
        <h5 class="client-text">Our partners & suppoters</h5>
        <div class="container">
            <div class="client-carousel owl-carousel owl-theme">
                <div class="item">
                    <img src="/images/partner1.jpeg" width="190%" height="190%" class="img-fluid" alt="partner logo">
                </div>
                <div class="item">
                    <img src="/images/partner2.jpeg"  width="190%" height="190%" class="img-fluid" alt="partner logo">
                </div>
                <div class="item">
                    <img src="/images/partner3.jpeg"  width="190%" height="190%" class="img-fluid" alt="partner logo">
                </div>
                <div class="item">
                    <img src="/images/partner4.jpeg"  width="190%" height="190%" class="img-fluid" alt="partner logo">
                </div>
                <div class="item">
                    <img src="/images/partner5.jpeg"  width="190%" height="190%" class="img-fluid" alt="partner logo">
                </div>
            </div>
        </div>
    </section>


    <section class="blog-section">
        <div class="container">
            <div class="blog-box">
                <div class="section-title-box text-center">
                    <div class="section-tagline">Discover Our Latest Blog Posts</div>
                    <h2 class="section-title">Explore News and Articles</h2>
                </div>
            </div>
            <div class="row row-gutter-y-155">

                @foreach ($blogs as $blog)
                    <div class="col-lg-4">
                        <div class="blog-card">
                            <div class="blog-card-image">
                                @if ($blog->featured_image)
                                    <img src="{{ asset($blog->featured_image) }}" class="img-fluid" alt="Featured Image">
                                @else
                                    <img src="/theme/image/blog/blog-placeholder.jpg" class="img-fluid"
                                        alt="Placeholder Image">
                                @endif
                                <a href="{{ route('blogs.show', $blog->slug) }}"></a>
                            </div>
                            <div class="blog-card-date">
                                <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->created_at->format('d M y') }}</a>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-card-meta">
                                    <span class="author">
                                        by <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->creator->name }}</a>
                                    </span>
                                    <span class="comment">
                                        <a href="{{ route('blogs.show', $blog->slug) }}"></a>
                                    </span>
                                </div>
                                <h4><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h4>
                                <p>{{ Str::limit(strip_tags($blog->body), 50) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <section class="cta-two-section">
        <div class="container">
            <div class="cta-two-section-inner">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="cta-two-title">
                            <div class="cta-two-card-icon">
                                <i class="flaticon-envelope-2"></i>
                            </div>
                            <div class="cta-two-card-content">
                                <p>Stay Connected</p>
                                <h3>Join Our Newsletter</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <form action="/theme/inc/sendemail.php" class="cta-two-form" method="post">
                            <div class="cta-two-form-group">
                                <input type="email" id="email" class="input-text" placeholder="Email address"
                                    name="email" required>
                            </div>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

    @if ($popUp)
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'info',
                title: 'Notification',
                html: {!! json_encode(htmlspecialchars_decode($popUp->body)) !!},
                confirmButtonText: 'Close',
                allowOutsideClick: false,
            });
        });
    </script>
@endif
@endsection

