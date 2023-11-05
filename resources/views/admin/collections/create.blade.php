@extends('admin.layout.app')

@section('pageTitle', 'Create Collection')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Create Collection</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('collections.index') }}">Collections</a></li>
                                <li class="breadcrumb-item active">Create Collection</li>
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
                            <form method="POST" action="{{ route('collections.store') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" value="{{ old('title') }}" name="description" rows="4"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="max_users">Maximum Number of Users (0 or empty for unlimited)</label>
                                    <input type="number" class="form-control" id="max_users" name="max_users">
                                </div>


                                <button type="submit" class="btn btn-primary">Create Collection</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
