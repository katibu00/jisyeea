@extends('admin.layout.app')

@section('pageTitle', 'Edit Programs')
@section('css')
    <style>
        .featured-image-preview {
            display: none;
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .featured-image-placeholder {
            width: 200px;
            height: 200px;
            background-color: #f1f1f1;
            text-align: center;
            line-height: 100px;
            font-size: 20px;
            color: #999;
        }
    </style>
@endsection
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
                        <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programs</a></li>
                        <li class="breadcrumb-item active">Edit Program</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Programs</h5>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <form method="POST" action="{{ route('programs.update', $program->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $program->title) }}">
                                </div>
                               
                                <div class="form-group mb-3">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $program->start_date) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $program->end_date) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category_id">Category</label>
                                    <select class="form-select" name="category_id" id="category_id">
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $program->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $program->description) }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="featured_image">Featured Image</label>
                                    @if($program->featured_image)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset($program->featured_image) }}" alt="Featured Image" width="200" height="200" id="featured_image_preview" class="img-thumbnail">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="file" name="featured_image" id="featured_image" class="form-control-file" onchange="previewFeaturedImage(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="active" name="active" {{ $program->is_open ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>

                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
                toolbar: [
                    { name: 'document', items: ['Styles', 'Format'] },
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                    { name: 'clipboard', items: ['Undo', 'Redo', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'] },
                    { name: 'links', items: ['Link', 'Unlink'] },
                    { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                    { name: 'tools', items: ['Maximize', 'Source'] },
                    '/',
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'] }
                ]
            });
        });

        function previewFeaturedImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('featured_image_preview');

                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>
@endsection
