@extends('admin.layout.app')

@section('pageTitle', 'Blog Posts')

@section('content')



<div class="main-content">

    <div class="page-content">

          <!-- start page title -->
      <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Blog Posts</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Blogs</li>
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
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog Post</a>
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
                                            <th style="width: 30%">Title</th>
                                            <th style="width: 20%">Body</th>
                                            <th>Created By</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                            <tr>
                                                <td>
                                                    @if($blog->featured_image)
                                                        <img src="{{ asset($blog->featured_image) }}" width="60" height="50" alt="Thumbnail" class="img-thumbnail">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ Str::limit(strip_tags($blog->body), 50) }}</td>
                                                <td>{{ @$blog->creator->name }}</td>
                                                <td>{{ $blog->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-secondary">Edit</a>
                                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</button>
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
