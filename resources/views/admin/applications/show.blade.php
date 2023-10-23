@extends('admin.layout.app')

@section('pageTitle', 'Application Details')

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

                                <ul>
                                    <li><strong>Application Number:</strong> {{ $application->yeea_number }}</li>
                                    <li><strong>User Name:</strong> {{ $application->user->name }}</li>
                                    <li><strong>User Email:</strong> {{ $application->user->email }}</li>
                                    <li><strong>User Phone:</strong> {{ $application->user->phone }}</li>
                                    <li><strong>Date of Birth:</strong> {{ $application->date_of_birth }}</li>
                                    <li><strong>Gender:</strong> {{ $application->gender }}</li>
                                    <li><strong>Marital Status:</strong> {{ $application->marital_status }}</li>
                                    <li><strong>Highest Education:</strong> {{ $application->highest_education }}</li>
                                    <li><strong>Address:</strong> {{ $application->address }}</li>
                                    <li><strong>Local Government Area:</strong> {{ $application->lga_origin }}</li>
                                    <li><strong>Ward:</strong> {{ $application->ward }}</li>
                                    <li><strong>Contact Number:</strong> {{ $application->contact_number }}</li>
                                    <li><strong>Institution of Study:</strong> {{ $application->institution_of_study }}</li>
                                    <li><strong>Area of Study:</strong> {{ $application->area_of_study }}</li>
                                    <li><strong>Artisan Skills:</strong> {{ $application->artisan_skills }}</li>
                                    <li><strong>Computer Skills:</strong> {{ $application->computer_skills }}</li>
                                    <li><strong>Category:</strong> {{ $application->category }}</li>
                                    <li><strong>Programs:</strong> {{ $application->programs }}</li>
                                    <li><strong>Status:</strong> {{ $application->status }}</li>

                                    @if ($application->cv_upload != null)
                                        <li><strong>CV Upload:</strong> <img src="{{ asset('uploads/' . $application->cv_upload) }}" alt="CV"></li>
                                    @endif

                                    @if ($application->nysc_certificate_upload != null)
                                        <li><strong>NYSC Certificate Upload:</strong> <img src="{{ asset('uploads/' . $application->nysc_certificate_upload) }}" alt="NYSC Certificate"></li>
                                    @endif

                                    @if ($application->other_uploads != null)
                                        <li><strong>Other Uploads:</strong> <img src="{{ asset('uploads/' . $application->other_uploads) }}" alt="Other Uploads"></li>
                                    @endif

                                </ul>
                                
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
