@extends('admin.layout.app')
@section('pageTitle', $program->title)
@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Programs</a></li>
                                <li class="breadcrumb-item active">{{ $program->title }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
    
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    <div class="card">
                        <div class="card-body"> 
                            
                         <img src="{{ asset($program->featured_image) }}" class="img-fluid" alt="{{ $program->title }}">
                          
                        <h3 class="page-title my-2 font-size-18">{{ $program->title }}</h3>

                           {!! $program->description !!}

                           <a href="{{ route('apply', ['program' => $program->slug]) }}" class="btn btn-success">Apply Now</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection

    @section('js')


    @endsection
