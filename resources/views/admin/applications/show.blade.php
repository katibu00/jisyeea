@extends('admin.layout.app')

@section('pageTitle', 'Application Details')
@section('css')
    <link href="/admin/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Application Details</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Application Information</h5>
                                <div class="row">
                                    <div class="col-md-8">

                                        @if ($application->user_id)
                                            <h2>Personal Information</h2>
                                            <ul>
                                                <li><strong>Application Number:</strong> {{ $application->yeea_number }}
                                                </li>
                                                <li><strong>User Name:</strong> {{ $application->user->name }}</li>
                                                <li><strong>User Email:</strong> {{ $application->user->email }}</li>
                                                <li><strong>User Phone:</strong> {{ $application->user->phone }}</li>
                                                <li><strong>Date of Birth:</strong> {{ $application->date_of_birth }}</li>
                                                <li><strong>Gender:</strong> {{ $application->gender }}</li>
                                                <li><strong>Marital Status:</strong> {{ $application->marital_status }}</li>
                                                <li><strong>Address:</strong> {{ $application->address }}</li>
                                                <li><strong>Contact Number:</strong> {{ $application->contact_number }}</li>
                                                <li><strong>Local Government Area:</strong> {{ $application->lga_origin }}
                                                </li>
                                                <li><strong>Ward:</strong> {{ $application->ward }}</li>
                                            </ul>
                                        @endif

                                        @if ($application->highest_education || $application->institution_of_study || $application->area_of_study)
                                            <h2>Educational Background</h2>
                                            <ul>
                                                @if ($application->highest_education)
                                                    <li><strong>Highest Education:</strong>
                                                        {{ $application->highest_education }}</li>
                                                @endif
                                                @if ($application->institution_of_study)
                                                    <li><strong>Institution of Study:</strong>
                                                        {{ $application->institution_of_study }}</li>
                                                @endif
                                                @if ($application->area_of_study)
                                                    <li><strong>Area of Study:</strong> {{ $application->area_of_study }}
                                                    </li>
                                                @endif
                                            </ul>
                                        @endif

                                        @if ($application->artisan_skills || $application->computer_skills || $application->category || $application->programs)
                                            <h2>Choice of Program</h2>
                                            <ul>
                                                @if ($application->artisan_skills)
                                                    <li><strong>Artisan Skills:</strong> {{ $application->artisan_skills }}
                                                    </li>
                                                @endif
                                                @if ($application->computer_skills)
                                                    <li><strong>Computer Skills:</strong>
                                                        {{ $application->computer_skills }}</li>
                                                @endif
                                                @if ($application->category)
                                                    <li><strong>Category:</strong> {{ $application->category }}</li>
                                                @endif
                                                @if ($application->programs)
                                                    <li><strong>Programs:</strong> {{ $application->programs }}</li>
                                                @endif
                                            </ul>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="mt-0 font-size-14">Profile Picture</h5>
                                            <a class="image-popup-no-margins"
                                                    href="{{ asset('uploads/' .$application->user->picture) }}">
                                                    <img class="img-fluid" alt=""
                                                        src="{{ asset('uploads/' . $application->user->picture) }}"
                                                        width="75">
                                                </a>
                                    </div>
                                </div>

                                <div class="row">

                                    @if ($application->cv_upload != null)
                                        <div class="col-md-4">
                                            <div>
                                                <li><strong>CV Upload:</strong><br />
                                                    <a class="btn btn-success"
                                                        href="{{ asset('uploads/' . $application->cv_upload) }}" download>
                                                        Download CV
                                                    </a>
                                                </li>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($application->nysc_certificate_upload != null)
                                        <div class="col-md-4">
                                            <div>
                                                <h5 class="mt-0 font-size-14">NYSC Certificate</h5>
                                                <a class="image-popup-no-margins"
                                                    href="{{ asset('uploads/' . $application->nysc_certificate_upload) }}">
                                                    <img class="img-fluid" alt=""
                                                        src="{{ asset('uploads/' . $application->nysc_certificate_upload) }}"
                                                        width="75">
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($application->other_uploads != null)
                                        <div class="col-md-4">
                                            <div>
                                                <h5 class="mt-0 font-size-14">Other Uploads</h5>
                                                <a class="image-popup-no-margins"
                                                    href="{{ asset('uploads/' . $application->other_uploads) }}">
                                                    <img class="img-fluid" alt=""
                                                        src="{{ asset('uploads/' . $application->other_uploads) }}"
                                                        width="75">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('applications.index') }}" class="btn btn-secondary">Back to Applications</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script src="/admin/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

        <script src="/admin/js/pages/lightbox.init.js"></script>

    @endsection
