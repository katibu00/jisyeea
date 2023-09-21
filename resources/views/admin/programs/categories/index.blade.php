@extends('admin.layout.app')

@section('pageTitle', 'Program categories')

@section('content')
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Programs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Program categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Program categories</h5>
                        <a href="{{ route('programs.categories.create') }}" class="btn btn-primary"> New Program category</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background-color: #f2f2f2;">
                                        <th style="padding: 10px; border: 1px solid #ddd;">#</th>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $key => $program)
                                        <tr>
                                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $key+1 }}</td>
                                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $program->name }}</td>
                                            <td style="padding: 10px; border: 1px solid #ddd;">
                                                <a href="{{ route('programs.categories.edit', $program->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('programs.categories.destroy', $program->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Program category?')">Delete</button>
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
@endsection
