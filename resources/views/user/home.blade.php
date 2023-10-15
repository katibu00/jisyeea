@extends('admin.layout.app')
@section('pageTitle', 'User Dashboard')
@section('content')

<div class="main-content">

  <div class="page-content">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
          <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item active">Welcome to Jigawa State Youth Empowerment Agency</li>
            </ol>
          </div>

        </div>
      </div>
    </div>
    <!-- end page title -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="row">
      <div class="col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
           

            <div class="row">
              <div class="col">
                <h5 class="card-title mb-4">Total Submitted Applications</h5>
                <h3 class="font-weight-bold">{{ $totalApplications }}</h3>
                {{-- <p class="text-muted mb-0"></p> --}}
              </div>
              <div class="col-auto">
                <div class="avatar-md bg-light rounded-circle">
                  <i class="bx bx-file font-size-24 text-primary"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title mb-4">Approved Applications</h5>
                <h3 class="font-weight-bold">{{ $approvedApplications }}</h3>
                {{-- <p class="text-muted mb-0">This year</p> --}}
              </div>
              <div class="col-auto">
                <div class="avatar-md bg-light rounded-circle">
                  <i class="bx bx-check-circle font-size-24 text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title mb-4">Pending Applications</h5>
                <h3 class="font-weight-bold">{{ $pendingApplications }}</h3>
                {{-- <p class="text-muted mb-0">This year</p> --}}
              </div>
              <div class="col-auto">
                <div class="avatar-md bg-light rounded-circle">
                  <i class="bx bx-hourglass font-size-24 text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title mb-4">Rejected Applications</h5>
                <h3 class="font-weight-bold">{{ $rejectedApplications }}</h3>
                {{-- <p class="text-muted mb-0">This year</p> --}}
              </div>
              <div class="col-auto">
                <div class="avatar-md bg-light rounded-circle">
                  <i class="bx bx-x-circle font-size-24 text-danger"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Ongoing Programs</h4>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Program Name</th>
                        <th>Date Range</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                    <tr>
                        <td>{{ $program->title }}</td>
                        <td>{{ $program->start_date_formatted }} - {{ $program->end_date_formatted }}</td>
                        <td>
                            @if ($program->status === 'Upcoming')
                                <span class="badge bg-success">Upcoming</span>
                            @elseif ($program->status === 'Ongoing')
                                <span class="badge bg-warning">Ongoing</span>
                            @else
                                <span class="badge bg-secondary">Closed</span>
                            @endif
                        </td>
                        <td>
                            @if ($program->status === 'Upcoming' || $program->status === 'Ongoing')
                                <a href="{{ route('apply', ['program' => $program->slug]) }}" class="btn btn-primary btn-sm">Register</a>
                            @else
                                <button class="btn btn-primary btn-sm" disabled>Closed</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Updates</h4>
            <div class="timeline mt-4">
              @foreach ($recentUpdates as $update)
              <div class="timeline-item">
                <i class="mdi mdi-checkbox-blank-circle text-primary me-3"></i>
                <div class="d-flex">
                  <div class="flex-1">
                    <h5 class="font-size-15">{{ $update['title'] }}</h5>
                    <p class="text-muted mb-0">{{ $update['date'] }}</p>
                  </div>
                  <div class="ms-auto">
                    <a href="{{ route('blogs.show', $update['slug']) }}" class="btn btn-primary btn-sm">Read More</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->

  </div>
  <!-- End Page-content -->
@endsection
