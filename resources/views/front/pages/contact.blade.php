@extends('front.layout.app')
@section('pageTitle', 'Contact Us')
@section('content')

<section class="page-banner">
    <div class="container">
        <div class="page-breadcrumbs">
            <ul class="list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li>Contact</li>
            </ul><!-- list-unstyled -->
        </div><!-- page-breadcrumbs -->
        <div class="page-banner-title">
            <h3>Contact</h3>
        </div><!-- page-banner-title -->
    </div><!-- container -->			
</section><!--page-banner-->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-box">
                    <div class="section-tagline">
                        WRITE A MESSAGE
                    </div><!-- section-tagline -->
                    <h1 class="section-title">Get in Touch with Us</h1>
                        <p>Have questions or feedback? Reach out to us. Our team is here to assist you. Fill out the form or use our provided contact details. We look forward to hearing from you.
                        </p>
                </div><!-- contact-box -->
            </div><!-- col-lg-4 -->
            <div class="col-lg-8">
                <form  action="assets/inc/sendemail.php" class="contact-form  contact-form-validated" method="post" >
                    <div class="row row-gutter-10">
                        <div class="col-12 col-lg-6">
                            <input type="text" id="name"  class="input-text" placeholder="Your name" name="name" aria-required="true">
                        </div><!-- col-12 col-lg-6 -->
                        <div class="col-12 col-lg-6">
                            <input type="email" id="email" class="input-text" placeholder="Email address" name="email" aria-required="true">
                        </div><!-- col-12 col-lg-6 -->
                        <div class="col-12 col-lg-6">
                            <input type="text" id="phone" class="input-text" placeholder="Phone number" name="phone" aria-required="true">
                        </div><!-- col-12 col-lg-6 -->
                        <div class="col-12 col-lg-6">
                            <input type="text" id="subject" class="input-text" placeholder="Subject" name="subject" aria-required="true">
                        </div><!-- col-12 col-lg-6 -->
                        <div class="col-12 col-lg-12">
                            <textarea name="message" placeholder="Write a message" class="input-text" aria-required="true"></textarea>
                        </div><!-- col-12 col-lg-12 -->
                        <div class="col-12 col-lg-12">
                            <button class="btn btn-primary">Send a Message</button>
                        </div><!-- col-12 col-lg-12 -->
                    </div><!-- row -->
                </form><!-- contact-form -->
            </div><!-- col-lg-8 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- contact-section -->
<div class="contact-gmap-section">
    <div class="container">
        <div class="responsive-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3448.82940345423!2d9.32901735289533!3d11.685583421353014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11abf1ae6e480729%3A0xefa4406ac0c74130!2sJigawa%20State%20Secretariat!5e0!3m2!1sen!2sng!4v1693466725409!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- responsive-map -->
    </div><!-- container -->
</div><!-- contact-gmap-section -->
<div class="cta-four-section">
    <div class="container">
        <div class="cta-four-inner">
            <div class="row row-gutter-y-20 ">
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="cta-four-content">
                        <i class="flaticon-help"></i>
                        <div class="cta-four-content-box">
                            <span>Have Question?</span>
                            <p>08022454025</p>
                        </div><!-- cta-four-content-box -->
                    </div><!-- cta-four-content -->
                </div><!-- col-12 col-lg-6 col-xl-3 -->
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="cta-four-content">
                        <i class="flaticon-envelope-3"></i>
                        <div class="cta-four-content-box">
                            <span>Write Email</span>
                            <p>info@yeea.jg.gov.ng</p>
                        </div><!-- cta-four-content-box -->
                    </div><!-- cta-four-content -->
                </div><!-- col-12 col-md-6 col-lg-6 col-xl-3 -->
                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="cta-four-content">
                        <i class="flaticon-location-pin"></i>
                        <div class="cta-four-content-box">
                            <span>Visit Office</span>
                            <p>Block A, New Secretariat Complex,3 Arms Zone,
                                Takur Dutse.</p>
                        </div><!-- cta-four-content-box -->
                    </div><!-- cta-four-content -->
                </div><!-- col-12 col-lg-6 col-xl-4 -->
                <div class="col-12 col-lg-6 col-xl-2">
                    <div class="cta-four-content">
                        <div class="cta-four-widget-socials">
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </div><!-- cta-four-widget-socials -->
                    </div><!-- cta-four-content -->
                </div><!-- col-12 col-lg-6 col-xl-2 -->
            </div><!-- row -->
        </div><!-- cta-four-inner -->
    </div><!-- container -->
</div><!-- cta-four-section -->
@endsection