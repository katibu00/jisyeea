@extends('front.layout.app')
@section('pageTitle', 'Home')
@section('content')

    @include('front.layout.slider')



    <section class="department-section">
        <div class="container">
            <div class="department-section-inner">
                <div class="row row-gutter-y-40">
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="department-card">
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
                    <input type="text" placeholder="Get our quick services from the city municipal" name="search">
                    <button type="submit">View All Services</button>
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
                            <div class="section-tagline">Message from the Governor</div>
                            <h2 class="section-title">JISYEEA empowering youth for a brighter future.</h2>
                            <p>Introducing JISYEEA: Our youth empowerment agency dedicated to providing skills,
                                opportunities, and resources for meaningful employment. Join us in creating a supportive
                                ecosystem, fostering partnership, effectiveness, efficiency, and innovation for the
                                prosperous future of Jigawa State.</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="about-card">
                                    <h4 class="about-title"><i class="fa-solid fa-circle-check"></i>Empowering Youth Through
                                        Skills Development</h4>
                                    <p class="about-text">JISYEEA offers comprehensive training programs that equip youth
                                        with the skills needed for successful careers, enabling them to thrive in today's
                                        competitive job market.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="about-card">
                                    <h4 class="about-title"><i class="fa-solid fa-circle-check"></i>Fostering Partnerships
                                        for Success</h4>
                                    <p class="about-text">By collaborating with government agencies, industry partners, and
                                        educational institutions, JISYEEA creates a supportive ecosystem that amplifies
                                        youth empowerment and employment opportunities.</p>
                                </div>
                            </div>
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
    <section class="service-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="section-title-box">
                        <div class="section-tagline">Government Service</div>
                        <h2 class="section-title text-white">Explore our Online<br> Governmet Services <br> & Resources
                        </h2>
                        <div class="section-text">
                            <p>Efficient Access to Essential Support.</p>
                        </div>
                        <div class="service-arrow-image">
                            <img src="/theme/image/shapes/arrow.png" alt="img-6">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="service-card">
                        <div class="service-card-video">
                            <a href="https://www.youtube.com/watch?v=rzfmZC3kg3M" class="video-popup">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="#">Job Portal <i class="fa-solid fa-chevron-right"></i></a></li>
                            <li><a href="#">Skills Development Programs <i
                                        class="fa-solid fa-chevron-right"></i></a></li>
                            <li><a href="#">Entrepreneurship Resources <i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                            <li><a href="#">Government Programs and Grants <i
                                        class="fa-solid fa-chevron-right"></i></a></li>
                            <li><a href="#">Online Counseling Services <i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                            <li><a href="#">Youth Development Resources <i
                                        class="fa-solid fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
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
                                <h3 class="counter-number">84</h3>
                                <span class="funfact-counter-number-postfix">k</span>
                            </div>
                        </div>
                        <p class="funfact-text">Total People Lived<br>in our City</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="funfact-counter-item">
                        <div class="funfact-counter-box">
                            <div class="funfact-counter-icon">
                                <i class="flaticon-coverage"></i>
                            </div>
                            <div class="funfact-counter-number">
                                <h3 class="counter-number">3.3</h3>
                                <span class="funfact-counter-number-postfix">k</span>
                            </div>
                        </div>
                        <p class="funfact-text">Square kilometres<br> Region Covers</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="funfact-counter-item">
                        <div class="funfact-counter-box">
                            <div class="funfact-counter-icon">
                                <i class="flaticon-landscape"></i>
                            </div>
                            <div class="funfact-counter-number">
                                <h3 class="counter-number">26</h3>
                                <span class="funfact-counter-number-postfix">%</span>
                            </div>
                        </div>
                        <p class="funfact-text">Private & Domestic <br>Garden Land</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="funfact-counter-item">
                        <div class="funfact-counter-box">
                            <div class="funfact-counter-icon">
                                <i class="flaticon-barn-3"></i>
                            </div>
                            <div class="funfact-counter-number">
                                <h3 class="counter-number">4</h3>
                                <span class="funfact-counter-number-postfix">th</span>
                            </div>
                        </div>
                        <p class="funfact-text">Average Costs of Home <br> Ownership</p>
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
                        <div class="mayor-icon-box">
                            <div class="mayor-icon">
                                <i class="flaticon-professor"></i>
                            </div>
                            <h4 class="mayor-icon-title">Meet Ideological Leader for Youth Generation</h4>
                        </div>
                        <ul class="list-unstyled list-style-one">
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Personal Growth and Empowerment</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Social Impact and Change</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Innovation and Entrepreneurship</p>
                            </li>
                        </ul>
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

    {{-- <section class="portfolio-section">
	<div class="section-title-box text-center">
		<div class="section-tagline">recent work portfolio</div>
		<h2 class="section-title">Explore City Highlights <br>Portfolios</h2>
	</div>
	<div class="portfolio-content conatainer-fluid">
		<div class="portfolio-carousel owl-carousel owl-theme">
			<div class="item">
				<div class="portfolio-card">
					<img src="/theme/image/portfolio/portfolio-1.jpg" class="img-fluid" alt="img-9">
					<div class="portfolio-card-meta">
						<div class="portfolio-card-text"><a href="portfolio-details.html">Places</a></div>
						<div class="portfolio-card-title"><a href="portfolio-details.html">Broadway Road</a></div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="portfolio-card">
					<img src="/theme/image/portfolio/portfolio-2.jpg" class="img-fluid" alt="img-10">
					<div class="portfolio-card-meta">
						<div class="portfolio-card-text"><a href="portfolio-details.html">Intercity</a></div>
						<div class="portfolio-card-title"><a href="portfolio-details.html"> Grand Central Terminal</a></div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="portfolio-card">
					<img src="/theme/image/portfolio/portfolio-3.jpg" class="img-fluid" alt="img-11">
					<div class="portfolio-card-meta">
						<div class="portfolio-card-text"><a href="portfolio-details.html">Business</a></div>
						<div class="portfolio-card-title"><a href="portfolio-details.html">Empire State Building</a></div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="portfolio-card">
					<img src="/theme/image/portfolio/portfolio-4.jpg" class="img-fluid" alt="img-12">
					<div class="portfolio-card-meta">
						<div class="portfolio-card-text"><a href="portfolio-details.html">Travel</a></div>
						<div class="portfolio-card-title"><a href="portfolio-details.html">Fulton Center</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section> --}}

    <section class="client-section">
        <h5 class="client-text">Our partners & suppoters</h5>
        <div class="container">
            <div class="client-carousel owl-carousel owl-theme">
                <div class="item">
                    <img src="/images/partner1.jpeg" class="img-fluid" alt="img-13">
                </div>
                <div class="item">
                    <img src="/images/partner2.jpeg" class="img-fluid" alt="img-14">
                </div>
                <div class="item">
                    <img src="/images/partner3.jpeg" class="img-fluid" alt="img-15">
                </div>
                <div class="item">
                    <img src="/images/partner4.jpeg" class="img-fluid" alt="img-16">
                </div>
                <div class="item">
                    <img src="/images/partner5.jpeg" class="img-fluid" alt="img-16">
                </div>
            </div>
        </div>
    </section>


    {{-- <section class="testimonial-section">
	<div class="container">
		<div class="testimonial-name">TESTIMONIALS</div>
		<div class="testimonial-slider">
			<div class="swiper testimonial-reviews">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="testimonial-content">
							<div class="testimonial-ratings">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<div class="testimonial-text">
								This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in reprehenderit in esse nulla pariatur.
							</div>
							<div class="testimonial-thumb-card">
								<h5>Martin McLaughlin</h5>
								<span>Customer</span>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="testimonial-content">
							<div class="testimonial-ratings">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<div class="testimonial-text">
								This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in reprehenderit in esse nulla pariatur.
							</div>
							<div class="testimonial-thumb-card">
								<h5>Aleesha Brown</h5>
								<span>Customer</span>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="testimonial-content">
							<div class="testimonial-ratings">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<div class="testimonial-text">
								This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in reprehenderit in esse nulla pariatur.
							</div>
							<div class="testimonial-thumb-card">
								<h5>Kevin Martin</h5>
								<span>Member</span>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<div class="testimonial-thumb">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="/theme/image/testimonial/testimonial-2.jpg" class="img-fluid" alt="img-17">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="swiper-slide">
						<img src="/theme/image/testimonial/testimonial-3.jpg" class="img-fluid" alt="img-18">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="swiper-slide">
						<img src="/theme/image/testimonial/testimonial-4.jpg" class="img-fluid" alt="img-19">
						<i class="fa-solid fa-quote-left"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}


    {{-- <section class="event-section">
	<div class="container">
		<div class="event-section-inner">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title-box">
						<div class="section-tagline">LATEST EVENTS</div>
						<h2 class="section-title">Explore Upcoming City Event Schedule</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="event-content-box">
						<div class="section-text">
							<p>Aliquam viverra arcu. Donec aliquet blandit enim feugiat. 
								Suspendisse id quam sed eros tincidunt luctus sit amet eu nibh egestas tempus turpis.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-gutter-y-40">
				<div class="col-xl-5">
					<div class="event-subscribe-card">
						<div class="event-details-card-title">
							<div class="event-icon">
								<i class="flaticon-envelope"></i>
							</div>
							<h5>Subscribe</h5>
							<p>Get latest news & events details</p>
						</div>
						<div class="event-details-card-content">
							<form  action="/theme/inc/sendemail.php" class="contact-form" method="post">
								<div class="form-group">
									<input type="email" id="Email" class="input-text" placeholder="Email address" name="email" required>
								</div>
								<button class="btn btn-primary w-100">Subscribe</button>
								<p>Never share your email with others.</p>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xl-7">
					<div class="event-card">
						<div class="event-card-image">
							<div class="event-card-image-inner">
								<a href="event-details.html"><img src="/theme/image/event/event-2.jpg" class="img-fluid" alt="img-20"></a>		
								<div class="event-card-meta">
									<div class="event-meta-number">
										<span>28</span>
									</div>
									<div class="event-meta-date">
										<span>October 2022</span>
									</div>
								</div>
							</div>
						</div>
						<div class="event-card-content">
							<div class="event-card-info">
								<ul class="list-unstyled">
									<li>
										<i class="fa-solid fa-clock"></i>
										<span>08:00am - 05:00pm</span>
									</li>
									<li>
										<i class="fa-sharp fa-solid fa-location-pin"></i>
										<span>New Hyde Park, NY 11040</span>
									</li>
								</ul>
							</div>
							<div class="event-card-title">
								<h4><a href="event-details.html">Organizing 2022 city photography new contest</a></h4>
							</div>
						</div>
					</div>
					<div class="event-card">
						<div class="event-card-image">
							<div class="event-card-image-inner">
								<a href="event-details.html"><img src="/theme/image/event/event-3.jpg" class="img-fluid" alt="img-21"></a>
								<div class="event-card-meta">
									<div class="event-meta-number">
										<span>28</span>
									</div>
									<div class="event-meta-date">
										<span>October 2022</span>
									</div>
								</div>
							</div>
						</div>
						<div class="event-card-content">
							<div class="event-card-info">
								<ul class="list-unstyled">
									<li>
										<i class="fa-solid fa-clock"></i>
										<span>08:00am - 05:00pm</span>
									</li>
									<li>
										<i class="fa-sharp fa-solid fa-location-pin"></i>
										<span>New Hyde Park, NY 11040</span>
									</li>
								</ul>
							</div>
							<div class="event-card-title">
								<h4><a href="event-details.html">Organizing 2022 city photography new contest</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}


    {{-- <section class="cta-five-section">
        <div class="container">
            <div class="cta-five-card">
                <div class="cta-five-card-icon">
                    <i class="flaticon-file"></i>
                </div>
                <div class="cta-five-content">
                    <h4>Download Recent Documents</h4>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority<br> have suffered in
                        some form, by injected humour words.</p>
                </div>
                <div class="cta-five-button">
                    <a href="#" class="btn btn-primary">Download Files</a>
                </div>
                <div class="cta-five-img">
                    <i class="flaticon-file"></i>
                </div>
            </div>
        </div>
    </section> --}}


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
                                <a href="{{ route('blogs.show', $blog->id) }}"></a>
                            </div>
                            <div class="blog-card-date">
                                <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->created_at->format('d M y') }}</a>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-card-meta">
                                    <span class="author">
                                        by <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->creator->name }}</a>
                                    </span>
                                    <span class="comment">
                                        <a href="{{ route('blogs.show', $blog->id) }}"></a>
                                    </span>
                                </div>
                                <h4><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h4>
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



@endsection
