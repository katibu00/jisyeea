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
                            <li><a href="{{ route('register') }}">Scholarship <span style="display: inline-block; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px;">Register</span>                            </a></li>
                            <li><a href="{{ route('register') }}">FarmRIse Programs <span style="display: inline-block; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px;">Register</span></a></li>
                            <li><a href="{{ route('register') }}">Vocational Training <span style="display: inline-block; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px;">Register</span></a></li>
                            <li><a href="{{ route('register') }}">MSMEs Grant <span style="display: inline-block; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px;">Register</span></a></li>
                            <li><a href="{{ route('register') }}">NECO/WAEC/JAMB <span style="display: inline-block; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px;">Register</span></a></li>
                            <li><a href="{{ route('register') }}">Student Loan <span style="display: inline-block; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px;">Register</span></a></li>
                            <li><a href="{{ route('register') }}">Digital Literacy <span style="display: inline-block; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px;">Register</span></a></li>

                            
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
                                <h3 class="counter-number">30</h3>
                                <span class="funfact-counter-number-postfix">k</span>
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
                                <h3 class="counter-number">20</h3>
                                <span class="funfact-counter-number-postfix">k</span>
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
                                <h3 class="counter-number">250</h3>
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
                                <h3 class="counter-number">100</h3>
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
