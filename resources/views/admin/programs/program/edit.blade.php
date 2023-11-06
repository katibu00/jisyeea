@extends('admin.layout.app')

@section('pageTitle', 'Edit Program')
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
    <link href="/admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Edit Program</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Edit Program</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Program</h4>
                            <form method="POST" action="{{ route('programs.update', $program->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT') {{-- Use PUT method for updating --}}
                                <div class="form-group row mb-4">
                                    <label for="title" class="col-form-label col-lg-2">Program Name</label>
                                    <div class="col-lg-10">
                                        <input id="title" name="title" type="text" class="form-control"
                                            placeholder="Enter Program Name..." value="{{ old('title', $program->title) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="category_id" class="col-form-label col-lg-2">Program Category</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="category_id" id="category_id">
                                            <option value=""></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == old('category_id', $program->category_id) ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Program Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor" name="description">{{ old('description', $program->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Program Date</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="form-control" id="start_date"
                                                value="{{ old('start_date', $program->start_date) }}"
                                                placeholder="Start Date" name="start_date" />
                                            <input type="text" class="form-control" id="end_date"
                                                value="{{ old('end_date', $program->end_date) }}" placeholder="End Date"
                                                name="end_date" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="max_applicants" class="col-form-label col-lg-2">Max. Applicants</label>
                                    <div class="col-lg-10">
                                        <input id="max_applicants" name="max_applicants" type="text"
                                            placeholder="Maximun applicants (0 or empty for unlimited)" class="form-control"
                                            value="{{ old('max_applicants', $program->max_applicants) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="max_age" class="col-form-label col-lg-2">Max. Age</label>
                                    <div class="col-lg-10">
                                        <input id="max_age" name="max_age" type="text"
                                            placeholder="Maximun Age (0 or empty for unlimited)" class="form-control"
                                            value="{{ old('max_age', $program->max_age) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="education_level" class="col-form-label col-lg-2">Education Level</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="education_level" id="education_level">
                                            <option value="all"
                                                {{ old('education_level', $program->education_level) === 'all' ? 'selected' : '' }}>
                                                All</option>
                                            <option value="none"
                                                {{ old('education_level', $program->education_level) === 'none' ? 'selected' : '' }}>
                                                None</option>
                                            <option value="primary-school"
                                                {{ old('education_level', $program->education_level) === 'primary-school' ? 'selected' : '' }}>
                                                Primary School</option>
                                            <option value="secondary-school"
                                                {{ old('education_level', $program->education_level) === 'secondary-school' ? 'selected' : '' }}>
                                                Secondary School</option>
                                            <option value="vocational-training"
                                                {{ old('education_level', $program->education_level) === 'vocational-training' ? 'selected' : '' }}>
                                                Vocational Training</option>
                                            <option value="diploma"
                                                {{ old('education_level', $program->education_level) === 'diploma' ? 'selected' : '' }}>
                                                Diploma</option>
                                            <option value="bachelors-degree"
                                                {{ old('education_level', $program->education_level) === 'bachelors-degree' ? 'selected' : '' }}>
                                                Bachelor's Degree</option>
                                            <option value="masters-degree"
                                                {{ old('education_level', $program->education_level) === 'masters-degree' ? 'selected' : '' }}>
                                                Master's Degree</option>
                                            <option value="doctorate"
                                                {{ old('education_level', $program->education_level) === 'doctorate' ? 'selected' : '' }}>
                                                Doctorate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="gender" class="col-form-label col-lg-2">Gender</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="all">All</option>
                                            <option value="male"
                                                {{ old('gender', $program->gender) === 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female"
                                                {{ old('gender', $program->gender) === 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="category_interest" class="col-form-label col-lg-2">Program Category of
                                        Interest</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="category_interest" id="category_interest">
                                            <option value="all">All</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == old('category_interest', $program->category_interest) ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="lga_origin" class="col-form-label col-lg-2">LGA of Origin</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="lga_origin" id="lga_origin">
                                            <option value="all">All</option>
                                            <option value="Auyo"
                                                {{ old('lga_origin', $program->lga_origin) === 'Auyo' ? 'selected' : '' }}>
                                                Auyo</option>
                                            <option value="Babura"
                                                {{ old('lga_origin', $program->lga_origin) === 'Babura' ? 'selected' : '' }}>
                                                Babura</option>
                                            <option value="Biriniwa"
                                                {{ old('lga_origin', $program->lga_origin) === 'Biriniwa' ? 'selected' : '' }}>
                                                Biriniwa</option>
                                            <option value="BirninKudu"
                                                {{ old('lga_origin', $program->lga_origin) === 'BirninKudu' ? 'selected' : '' }}>
                                                Birnin Kudu</option>
                                            <option value="Buji"
                                                {{ old('lga_origin', $program->lga_origin) === 'Buji' ? 'selected' : '' }}>
                                                Buji</option>
                                            <option value="Dutse"
                                                {{ old('lga_origin', $program->lga_origin) === 'Dutse' ? 'selected' : '' }}>
                                                Dutse</option>
                                            <option value="Gagarawa"
                                                {{ old('lga_origin', $program->lga_origin) === 'Gagarawa' ? 'selected' : '' }}>
                                                Gagarawa</option>
                                            <option value="Garki"
                                                {{ old('lga_origin', $program->lga_origin) === 'Garki' ? 'selected' : '' }}>
                                                Garki</option>
                                            <option value="Gumel"
                                                {{ old('lga_origin', $program->lga_origin) === 'Gumel' ? 'selected' : '' }}>
                                                Gumel</option>
                                            <option value="Guri"
                                                {{ old('lga_origin', $program->lga_origin) === 'Guri' ? 'selected' : '' }}>
                                                Guri</option>
                                            <option value="Gwaram"
                                                {{ old('lga_origin', $program->lga_origin) === 'Gwaram' ? 'selected' : '' }}>
                                                Gwaram</option>
                                            <option value="Gwiwa"
                                                {{ old('lga_origin', $program->lga_origin) === 'Gwiwa' ? 'selected' : '' }}>
                                                Gwiwa</option>
                                            <option value="Hadejia"
                                                {{ old('lga_origin', $program->lga_origin) === 'Hadejia' ? 'selected' : '' }}>
                                                Hadejia</option>
                                            <option value="Jahun"
                                                {{ old('lga_origin', $program->lga_origin) === 'Jahun' ? 'selected' : '' }}>
                                                Jahun</option>
                                            <option value="KafinHausa"
                                                {{ old('lga_origin', $program->lga_origin) === 'KafinHausa' ? 'selected' : '' }}>
                                                Kafin Hausa</option>
                                            <option value="Kaugama"
                                                {{ old('lga_origin', $program->lga_origin) === 'Kaugama' ? 'selected' : '' }}>
                                                Kaugama</option>
                                            <option value="Kazaure"
                                                {{ old('lga_origin', $program->lga_origin) === 'Kazaure' ? 'selected' : '' }}>
                                                Kazaure</option>
                                            <option value="Kirikasamma"
                                                {{ old('lga_origin', $program->lga_origin) === 'Kirikasamma' ? 'selected' : '' }}>
                                                Kirikasamma</option>
                                            <option value="Kiyawa"
                                                {{ old('lga_origin', $program->lga_origin) === 'Kiyawa' ? 'selected' : '' }}>
                                                Kiyawa</option>
                                            <option value="Maigatari"
                                                {{ old('lga_origin', $program->lga_origin) === 'Maigatari' ? 'selected' : '' }}>
                                                Maigatari</option>
                                            <option value="MalamMadori"
                                                {{ old('lga_origin', $program->lga_origin) === 'MalamMadori' ? 'selected' : '' }}>
                                                Malam Madori</option>
                                            <option value="Miga"
                                                {{ old('lga_origin', $program->lga_origin) === 'Miga' ? 'selected' : '' }}>
                                                Miga</option>
                                            <option value="Ringim"
                                                {{ old('lga_origin', $program->lga_origin) === 'Ringim' ? 'selected' : '' }}>
                                                Ringim</option>
                                            <option value="Roni"
                                                {{ old('lga_origin', $program->lga_origin) === 'Roni' ? 'selected' : '' }}>
                                                Roni</option>
                                            <option value="SuleTankarkar"
                                                {{ old('lga_origin', $program->lga_origin) === 'SuleTankarkar' ? 'selected' : '' }}>
                                                Sule Tankarkar</option>
                                            <option value="Taura"
                                                {{ old('lga_origin', $program->lga_origin) === 'Taura' ? 'selected' : '' }}>
                                                Taura</option>
                                            <option value="Yankwashi"
                                                {{ old('lga_origin', $program->lga_origin) === 'Yankwashi' ? 'selected' : '' }}>
                                                Yankwashi</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="featured_image" class="col-form-label col-lg-2">Featured Image</label>
                                    @if ($program->featured_image)
                                        <div class="col-lg-10">
                                            <img src="{{ asset($program->featured_image) }}" alt="Featured Image"
                                                width="200" height="200" id="featured_image_preview"
                                                class="img-thumbnail">
                                        </div>
                                    @endif
                                    <input type="file" name="featured_image" id="featured_image"
                                        class="form-control-file" onchange="previewFeaturedImage(event)">
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="active" class="col-form-label col-lg-2">Active Status</label>
                                    <div class="col-lg-10">
                                        <input type="checkbox" class="form-check-input" id="active" name="active"
                                            {{ $program->is_open ? 'checked' : '' }}>

                                    </div>
                                </div>

                                <div class="row justify-content-end mb-5">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update Program</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    @section('js')
        <script src="/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="/admin/libs/tinymce/tinymce.min.js"></script>
        <script src="/admin/js/pages/task-create.init.js"></script>
        <script>
            function previewFeaturedImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById('featured_image_preview');
                    var placeholder = document.getElementById('featured_image_placeholder');

                    preview.src = reader.result;
                    preview.style display = 'block';
                    placeholder.style.display = 'none';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    @endsection
