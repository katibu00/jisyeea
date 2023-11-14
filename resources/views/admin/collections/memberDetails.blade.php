@extends('admin.layout.app')

@section('pageTitle', $memberDetails['user']->name.' Details')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Member Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('collections.index') }}">Collections</a></li>
                            <li class="breadcrumb-item active">Member Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Collection Details</h5>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li><strong>Name:</strong> {{ $memberDetails['user']->name }}</li>
                            <li><strong>YEEA Number:</strong> {{ $memberDetails['preRegistration']->yeea_number ?? 'N/A' }}</li>
                            <li><strong>Date of Birth:</strong> {{ $memberDetails['preRegistration']->date_of_birth ?? 'N/A' }}</li>
                            <li><strong>Gender:</strong> {{ $memberDetails['preRegistration']->gender ?? 'N/A' }}</li>
                            <li><strong>Contact Number:</strong> {{ $memberDetails['preRegistration']->contact_number ?? 'N/A' }}</li>
                            <li><strong>Address:</strong> {{ $memberDetails['preRegistration']->address ?? 'N/A' }}</li>
                            <li><strong>Email:</strong> {{ $memberDetails['preRegistration']->email ?? 'N/A' }}</li>
                            <li><strong>LGA Origin:</strong> {{ $memberDetails['preRegistration']->lga_origin ?? 'N/A' }}</li>
                            <li><strong>Ward:</strong> {{ $memberDetails['preRegistration']->ward ?? 'N/A' }}</li>
                            <li><strong>Marital Status:</strong> {{ $memberDetails['preRegistration']->marital_status ?? 'N/A' }}</li>
                            <li><strong>Highest Education:</strong> {{ $memberDetails['preRegistration']->highest_education ?? 'N/A' }}</li>
                            <li><strong>Institution of Study:</strong> {{ $memberDetails['preRegistration']->institution_of_study ?? 'N/A' }}</li>
                            <li><strong>Area of Study:</strong> {{ $memberDetails['preRegistration']->area_of_study ?? 'N/A' }}</li>
                            <li><strong>NIN:</strong> {{ $memberDetails['preRegistration']->nin ?? 'N/A' }}</li>
                            <li><strong>Voter:</strong> {{ $memberDetails['preRegistration']->voter ?? 'N/A' }}</li>
                            <li><strong>Interests:</strong> {{ $memberDetails['preRegistration']->interests ?? 'N/A' }}</li>
                            <li><strong>Artisan Skills:</strong> {{ $memberDetails['preRegistration']->artisan_skills ?? 'N/A' }}</li>
                            <li><strong>Computer Skills:</strong> {{ $memberDetails['preRegistration']->computer_skills ?? 'N/A' }}</li>
                            <li><strong>Preferred Category:</strong> {{ $memberDetails['preRegistration']->preferred_category ?? 'N/A' }}</li>
                            <li><strong>Status:</strong> {{ $memberDetails['preRegistration']->status ?? 'N/A' }}</li>
                            <li><strong>CV Upload:</strong> {{ $memberDetails['preRegistration']->cv_upload ?? 'N/A' }}</li>
                            <li><strong>NYSC Certificate Upload:</strong> {{ $memberDetails['preRegistration']->nysc_certificate_upload ?? 'N/A' }}</li>
                            <li><strong>Other Uploads:</strong> {{ $memberDetails['preRegistration']->other_uploads ?? 'N/A' }}</li>
                            <li><strong>Employment Status:</strong> {{ $memberDetails['preRegistration']->employment_status ?? 'N/A' }}</li>
                            <li><strong>Business Name:</strong> {{ $memberDetails['preRegistration']->business_name ?? 'N/A' }}</li>
                            <li><strong>Business Type:</strong> {{ $memberDetails['preRegistration']->business_type ?? 'N/A' }}</li>
                            <li><strong>Student Details:</strong> {{ $memberDetails['preRegistration']->student_details ?? 'N/A' }}</li>
                            <li><strong>Job Title:</strong> {{ $memberDetails['preRegistration']->job_title ?? 'N/A' }}</li>
                            <li><strong>Company Name:</strong> {{ $memberDetails['preRegistration']->company_name ?? 'N/A' }}</li>
                            <!-- Add any other details you want to display -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

