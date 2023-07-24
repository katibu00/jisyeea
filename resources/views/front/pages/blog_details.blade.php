@extends('front.layout.app')
@section('pageTitle', 'Home')
@section('content')


<div class="page-wrapper">
	<section class="page-banner">
		<div class="container">
			<div class="page-breadcrumbs">
				<ul class="list-unstyled">
					<li><a href="#">Home</a></li>
					<li>News</li>
				</ul>
			</div>
			<div class="page-banner-title">
				<h3>{{ $blog->title }}</h3>
			</div>
		</div>			
	</section>

	<section class="news-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-details-box-image">
                    <div class="news-details-box-image-inner">
                        <img src="{{ asset($blog->featured_image) }}" class="img-fluid" alt="{{ $blog->title }}">
                        <a href="news-details.html" class="news-details-box-date">{{ $blog->created_at->format('d M') }}</a>
                    </div>
                </div>
                <div class="news-details-meta-box">
                    <div class="news-details-meta-box-inner">
                        <span class="author">
                            by<a href="#">{{ $blog->creator->name }}</a>
                        </span>
                        <span class="comment">
                            <a href="#">0 Comments</a>
                        </span>
                    </div>
                </div>
                <div class="news-details-content-box">
                    <h4>{{ $blog->title }}</h4>
                    <p>{!! $blog->body !!}</p>
                </div>
                <div class="news-details-share-box">
                    <div class="news-details-inner">
                        <div class="news-details-list">
                            <div class="news-details-list-title">
                                <h4>Tags</h4>
                            </div>
                            <div class="news-details-list-button">
                                {{-- @foreach ($blog->tags as $tag)
                                    <a href="news-details.html" class="btn btn-primary">{{ $tag }}</a>
                                @endforeach --}}
                            </div>
                        </div>
                        <div class="news-details-list">
                            <div class="news-details-socials">
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Rest of the markup -->
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-form-content">
                        <!-- Sidebar search form -->
                    </div>
                    <div class="sidebar-widget sidebar-widget-recent-post">
                        <h4>Recent Posts</h4>
                        <div class="sidebar-recent-post">
                            <!-- Recent post 1 -->
                        </div>
                        <div class="sidebar-recent-post">
                            <!-- Recent post 2 -->
                        </div>
                        <div class="sidebar-recent-post">
                            <!-- Recent post 3 -->
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-widget-recent-category">
                        <!-- Sidebar categories -->
                    </div>
                    <div class="sidebar-widget sidebar-widget-tag">
                        <!-- Sidebar tags -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
@endsection