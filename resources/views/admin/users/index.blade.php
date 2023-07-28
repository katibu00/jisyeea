@extends('admin.layout.app')

@section('pageTitle', 'Regular Users')

@section('content')



    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Regular Users</li>
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
                            <h5 class="card-title">Blog Posts</h5>
                            {{-- <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog Post</a> --}}
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
                                            <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Phone</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">User Type</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->id }}</td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->name }}</td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->phone }}</td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->email }}</td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->user_type }}
                                                </td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->created_at }}
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
