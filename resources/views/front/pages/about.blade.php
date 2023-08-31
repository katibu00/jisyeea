@extends('front.layout.app')
@section('pageTitle', 'About Us')
@section('content')

<section class="page-banner">
    <div class="container">
        <div class="page-breadcrumbs">
            <ul class="list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About</li>
            </ul><!-- list-unstyled -->
        </div><!-- page-breadcrumbs -->
        <div class="page-banner-title">
            <h3>About</h3>
        </div><!-- page-banner-title -->
    </div><!-- container -->			
</section><!--page-banner-->
<section class="about-one-section">
    <div class="container">
        <div class="row row-gutter-y-40">
            <div class="col-lg-12 col-xl-6">
                <div class="about-one-inner">
                    <div class="section-tagline">
                        Our introductions
                    </div><!-- section-tagline -->
                    {{-- <h2 class="section-title">Empowering Youth for Bright Futures</h2> --}}
                        <p>
                            Welcome to the Jigawa State Youth Empowerment/Employment Agency (JISYEEA). We are dedicated to propelling the youth of Jigawa State towards success by equipping them with essential skills, fostering opportunities, and providing the resources they need to flourish in today's ever-evolving landscape. </p>
                            
                            <p>Our agency is firmly committed to fostering not only employment but also sustainable development. With a vision to create a more prosperous future for Jigawa State, we've established a dynamic ecosystem that centers on the growth and empowerment of our youth. </p>
                            
                                <p>Through innovative training initiatives, strategic collaborations, and a steadfast pursuit of excellence, we are cultivating an environment that facilitates the achievement of our youth's full potential. By working hand in hand with government entities, industry experts, educational institutions, and local communities, we are bridging the gap between education and professional success. </p>
                            
                                    <p> Led by the visionary Executive Secretary, Dr. Habib Muhammad Ubale, and backed by the steadfast support of the state government, our agency operates on core values such as empowerment, partnership, effectiveness, efficiency, and innovation. Our shared goal is to arm the youth of Jigawa State with the necessary tools to not only excel in their careers but also play a meaningful role in the growth of our society. </p>
                            
                                        <p>Join us as we embark on this transformative journey. Together, we can create a future that thrives on talent, innovation, and collaboration, empowering the youth to lead us into a brighter tomorrow.
                            
                       
                        <h5 class="about-one-inner-text">Warm regards,
                            The JISYEEA Team</h5>
                    
                </div><!-- about-one-inner -->
            </div><!--col-lg-6-->
            <div class="col-lg-12 col-xl-6">
                <div class="about-one-image">
                    <img src="/theme/image/shapes/shape-1.png" class="floated-image-one" alt="img-58">
                    <img src="/images/director.jpeg" alt="img-59" class="img-fluid">
                </div><!--about-one-image-->
            </div><!--col-lg-6-->
        </div><!-- row -->
    </div><!-- container -->
</section><!--about-one-section-->
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

<section class="team-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                <div class="team-inner">
                    <div class="section-tagline">team members</div>
                    <h2 class="section-title">Meet Our Dedicated Team</h2>
                </div><!--team-inner-->
            </div><!--col-12 col-md-12 col-lg-6 col-xl-6-->
            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                <div class="team-box">
                    <p>Discover the passionate individuals driving JISYEEA's mission forward with expertise, commitment, and a shared vision for youth empowerment.</p>	
                </div><!--team-box-->
            </div><!--col-12 col-md-12 col-lg-6 col-xl-6-->
        </div><!-- row -->
        <div class="row row-gutter-y-30">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="/theme/image/team/team-1.jpg" class="img-fluid" alt="img-67">
                        <div class="team-card-icon">
                            <a href="#" class="pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                        </div><!-- team-card-icon -->
                    </div><!-- team-card-img -->
                    <div class="team-card-content">
                        <h4><a href="team-details.html">Sarah Albert</a></h4>
                        <p>Consultant</p>
                    </div><!-- team-card-content -->
                </div><!--team-card-->
            </div><!--col-12 col-md-6 col-xl-3-->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="/theme/image/team/team-2.jpg" class="img-fluid" alt="img-68">
                        <div class="team-card-icon">
                            <a href="#" class="pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                        </div><!-- team-card-icon -->
                    </div><!-- team-card-img -->
                    <div class="team-card-content">
                        <h4><a href="team-details.html">Mike Hardson</a></h4>
                        <p>Consultant</p>
                    </div><!-- team-card-content -->
                </div><!--team-card-->
            </div><!--col-12 col-md-6 col-xl-3-->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="/theme/image/team/team-3.jpg" class="img-fluid" alt="img-69">
                        <div class="team-card-icon">
                            <a href="#" class="pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                        </div><!-- team-card-icon -->
                    </div><!-- team-card-img -->
                    <div class="team-card-content">
                        <h4><a href="team-details.html">Christine Eve</a></h4>
                        <p>Consultant</p>
                    </div><!-- team-card-content -->
                </div><!--team-card-->
            </div><!--col-12 col-md-6 col-xl-3-->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="/theme/image/team/team-4.jpg" class="img-fluid" alt="img-70">
                        <div class="team-card-icon">
                            <a href="#" class="pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                        </div><!-- team-card-icon -->
                    </div><!-- team-card-img -->
                    <div class="team-card-content">
                        <h4><a href="team-details.html">John Martin</a></h4>
                        <p>Consultant</p>
                    </div><!-- team-card-content -->
                </div><!--team-card-->
            </div><!--col-12 col-md-6 col-xl-3-->
        </div><!-- row -->
    </div><!-- container -->
</section><!--team-section-->

@endsection