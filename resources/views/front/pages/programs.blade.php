@extends('front.layout.app')
@section('pageTitle', 'Our Programs')
@section('content')

<div class="page-wrapper">
    <section class="page-banner">
        <div class="container">
            <div class="page-breadcrumbs">
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Programs</li>
                </ul>
            </div>
            <div class="page-banner-title">
                <h3>Programs</h3>
            </div>
        </div>
    </section>
    <section class="event-three-section">
        <div class="event-section-outer">
            <div class="container">
                <div class="row row-gutter-y-30">
                    <div class="col-lg-12">
                        <!-- Create tabs for program categories -->
                        <ul class="nav nav-tabs" id="programTabs" role="tablist">
                            @foreach($categories as $key => $category)
                                <li class="nav-item">
                                    <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="tab-{{ $category->id }}" data-toggle="tab" href="#category-{{ $category->id }}" role="tab" aria-controls="category-{{ $category->id }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content" id="programTabsContent">
                            @foreach($categories as $key => $category)
                                <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="category-{{ $category->id }}" role="tabpanel" aria-labelledby="tab-{{ $category->id }}">
                                    <h4>{{ $category->name }}</h4>
                                    <div class="row">
                                        @foreach($category->programs as $program)
                                            <div class="col-lg-4 mb-4">
                                                <div class="card">
                                                    <img src="{{ asset($program->featured_image) }}" class="card-img-top" alt="{{ $program->title }}">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $program->title }}</h5>
                                                        <!-- Render HTML and limit to 100 characters -->
                                                        <p class="card-text">{!! Str::limit($program->description, 100, '...') !!}</p>
                                                        <a  href="{{ route('programs.show', $program->id) }}" class="btn btn-primary">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Include Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
