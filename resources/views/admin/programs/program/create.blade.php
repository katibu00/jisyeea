<!-- resources/views/blogs/create.blade.php -->

@extends('admin.layout.app')

@section('pageTitle', 'Create a New Program')
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
                        <h4 class="page-title mb-0 font-size-18">Create Program</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Create Program</li>
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
                            <h4 class="card-title mb-4">Create New Program</h4>
                            <form method="POST" action="{{ route('programs.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="title" class="col-form-label col-lg-2">Program Name</label>
                                    <div class="col-lg-10">
                                        <input id="title" name="title" type="text" class="form-control" placeholder="Enter Program Name..." value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="category_id" class="col-form-label col-lg-2">Program Category</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="category_id" id="category_id">
                                            <option value=""></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Program Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor" name="description">{!! old('description') !!}</textarea>
                                    </div>
                                </div>
                            
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Program Date</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="form-control" id="start_date" value="{{ old('start_date') }}" placeholder="Start Date" name="start_date" />
                                            <input type="text" class="form-control" id="end_date" value="{{ old('end_date') }}" placeholder="End Date" name="end_date" />
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group row mb-4">
                                    <label for="max_applicants" class="col-form-label col-lg-2">Max. Applicants</label>
                                    <div class="col-lg-10">
                                        <input id="max_applicants" name="max_applicants" type="text" placeholder="Maximun applicants (0 or empty for unlimited)" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="max_age" class="col-form-label col-lg-2">Max. Age</label>
                                    <div class="col-lg-10">
                                        <input id="max_age" name="max_age" type="text" placeholder="Maximun Age (0 or empty for unlimited)" class="form-control">
                                    </div>
                                </div>
                            
                                <div class="form-group row mb-4">
                                    <label for="education_level" class="col-form-label col-lg-2">Education Level</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="education_level" id="education_level">
                                            <option value="all">All</option>
                                            <option value="none">None</option>
                                            <option value="primary-school">Primary School</option>
                                            <option value="secondary-school">Secondary School</option>
                                            <option value="vocational-training">Vocational Training</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="bachelors-degree">Bachelor's Degree</option>
                                            <option value="masters-degree">Master's Degree</option>
                                            <option value="doctorate">Doctorate</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row mb-4">
                                    <label for="gender" class="col-form-label col-lg-2">Gender</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="all">All</option>
                                            <option value="male">Male</option>
                                             <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="category_interest" class="col-form-label col-lg-2">Program Category of Interest</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="category_interest" id="category_interest">
                                            <option value="all">All</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row mb-4">
                                    <label for="lga_origin" class="col-form-label col-lg-2">LGA of Origin</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" name="lga_origin" id="lga_origin">
                                            <option value="all">All</option>
                                            <option value="Auyo">Auyo</option>
                                            <option value="Babura">Babura</option>
                                            <option value="Biriniwa">Biriniwa</option>
                                            <option value="BirninKudu">Birnin Kudu</option>
                                            <option value="Buji">Buji</option>
                                            <option value="Dutse">Dutse</option>
                                            <option value="Gagarawa">Gagarawa</option>
                                            <option value="Garki">Garki</option>
                                            <option value="Gumel">Gumel</option>
                                            <option value="Guri">Guri</option>
                                            <option value="Gwaram">Gwaram</option>
                                            <option value="Gwiwa">Gwiwa</option>
                                            <option value="Hadejia">Hadejia</option>
                                            <option value="Jahun">Jahun</option>
                                            <option value="KafinHausa">Kafin Hausa</option>
                                            <option value="Kaugama">Kaugama</option>
                                            <option value="Kazaure">Kazaure</option>
                                            <option value="Kirikasamma">Kirikasamma</option>
                                            <option value="Kiyawa">Kiyawa</option>
                                            <option value="Maigatari">Maigatari</option>
                                            <option value="MalamMadori">Malam Madori</option>
                                            <option value="Miga">Miga</option>
                                            <option value="Ringim">Ringim</option>
                                            <option value="Roni">Roni</option>
                                            <option value="SuleTankarkar">Sule Tankarkar</option>
                                            <option value="Taura">Taura</option>
                                            <option value="Yankwashi">Yankwashi</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row mb-4">
                                    <label for="taskbudget" class="col-form-label col-lg-2">Featured Image</label>
                                    <div class="col-lg-10">
                                        <img id="featured_image_preview" class="featured-image-preview" src="#" alt="Featured Image Preview">
                                        <div id="featured_image_placeholder" class="featured-image-placeholder">No Image Selected</div>
                                        <input type="file" name="featured_image" id="featured_image" class="form-control-file" onchange="previewFeaturedImage(event)">
                                    </div>
                                </div>
                            
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Create Program</button>
                                    </div>
                                </div>
                            </form>
                            

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

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
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    @endsection
