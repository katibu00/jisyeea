@extends('admin.layout.app')

@section('pageTitle', 'Programs')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Programs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Programs</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Programs</h5>
                        <a href="{{ route('programs.create') }}" class="btn btn-primary">+ Create New Program</a>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <th style="width: 20%">Title</th>
                                        <th style="width: 20%">Description</th>
                                        <th>Date Range</th>
                                        <th>Category</th>
                                        <th># Applicants</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programs as $program)
                                        <tr>
                                            <td>
                                                @if($program->featured_image)
                                                    <img src="{{ asset($program->featured_image) }}" width="60" height="50" alt="Thumbnail" class="img-thumbnail">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $program->title }}</td>
                                            <td>{!! Str::limit(strip_tags($program->description), 50) !!}</td>
                                            <td>{{  date('M d, Y', strtotime($program->start_date)) . ' - ' . date('M d, Y', strtotime($program->end_date)) }}</td>

                                            <td>{{ $program->category->name }}</td>

                                            @php
                                                 $uniqueUsers = App\Models\UserResponse::where('program_id', $program->id)->distinct('user_id')->count('user_id');
                                            @endphp
                                            <td>  {{ $uniqueUsers }}</td>
                                            <td>
                                                @if($program->is_open)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="dropdown float-center">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{ route('programs.edit', $program->id) }}">Edit</a>
                                                        <a class="dropdown-item" href="#" onclick="if (confirm('Are you sure you want to delete this Program?')) {
                                                            event.preventDefault(); 
                                                            document.getElementById('delete-form-{{ $program->id }}').submit();
                                                        }">Delete</a>
                                                        <a class="dropdown-item" href="{{ route('form-questions.index', ['program_id' => $program->id]) }}">Application Questions</a>
                                                        <a class="dropdown-item" href="{{ route('download-applicants', ['program_id' => $program->id]) }}">Download Applicants</a>
                                                        <form id="delete-form-{{ $program->id }}" action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
