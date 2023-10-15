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
                        <a href="{{ route('programs.create') }}" class="btn btn-primary">Create New Program</a>
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
                                            <td>
                                                @if($program->is_open)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-secondary">Edit</a>
                                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this program?')">Delete</button>
                                                </form>
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
</div>
@endsection
