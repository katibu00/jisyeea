@extends('admin.layout.app')

@section('pageTitle', 'Edit Collection')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Edit Collection</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('collections.index') }}">Collections</a></li>
                                <li class="breadcrumb-item active">Edit Collection</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Collection</h5>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="card-body">
                            <form method="POST" action="{{ route('collections.update', $collection->id) }}">
                                @csrf
                                @method('PATCH')
                                <!-- Edit form fields go here -->
                                <div class="form-group mb-2">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $collection->title }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control">{{ $collection->description }}</textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="max_users">Maximum Users (0 or empty for unlimited)</label>
                                    <input type="number" name="max_users" id="max_users" class="form-control" value="{{ $collection->max_users }}">
                                </div>
                                <!-- Add more fields as needed -->
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
