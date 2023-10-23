@extends('front.layout.app')
@section('pageTitle', $program->title)
@section('content')


<div class="page-wrapper">
	<section class="page-banner">
		<div class="container">
			<div class="page-breadcrumbs">
				<ul class="list-unstyled">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li>Program Details</li>
				</ul>
			</div>
			<div class="page-banner-title">
				<h3>{{ $program->title }}</h3>
			</div>
		</div>			
	</section>
	<section class="service-details-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="service-details-image">
						<img src="{{ asset($program->featured_image) }}" class="img-fluid" alt="img-146">
					</div>
					<div class="service-details-content-box">
						<h3 class="service-details-title">{{ $program->title }}</h3>
                        {!! $program->description !!}
                    </div>
					<a href="{{ route('login') }}" class="btn btn-primary">Login to Apply</a>

				</div>
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="sidebar">
						<div class="sidebar-widget-list-inner">
							<ul>
                                @foreach ($allprograms as $programs)
                                <li><a href="{{ route('programs.show', $programs->id) }}">{{ $programs->title }}<i class="fa-solid fa-arrow-right-long"></i></a></li>
                                @endforeach
                            </ul>
						</div>
						{{-- <div class="sidebar-widget sidebar-widget-card">
							<div class="sidebar-widget-card-icon">
								<i class="flaticon-question"></i>
							</div>
							<div class="sidebar-widget-card-content">
								<h3><a href="contact.html">Get Any Help?</a></h3>
								<p>There are many variations of passages of lorem ipsum is simply free text available in the marke.</p>
							</div>
						</div>
						<div class="sidebar-widget">
							<div class="sidebar-widget-box-icon">
								<i class="flaticon-pdf"></i>
							</div>
							<div class="sidebar-widget-box-content">
								<h3>Company briefing update of the <br> 2022 year</h3>
						<a class="btn btn-primary">Download</a>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
</div>	
@endsection