@extends('admin.layout.app')
@section('pageTitle', 'Register Yourself')
@section('content')

    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Applications</a></li>
                                <li class="breadcrumb-item active">Empowerment Programs</li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div id="error-message" class="alert alert-danger" style="display: none;"></div>

            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Jigawa State Empowernment and EMployment Agency (JISYEEA)</h4>
                            <p class="card-title-desc">Please complete the following form to Register yourself.</p>

                            <form id="form-horizontal" class="form-horizontal form-wizard-wrapper"
                                action="{{ route('application.submit') }}" method="POST" enctype="multipart/form-data">
                                <h3>Personal Information</h3>
                                <fieldset>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h3>Personal Information</h3>
                                            <div class="mandatory-info">
                                                Fields marked with <span class="text-danger">*</span> are mandatory.
                                            </div>
                                        </div>
                                    </div>

                                    <style>
                                        /* CSS styles for the custom file input button */
                                        .custom-file-input {
                                            position: absolute;
                                            top: 0;
                                            right: 0;
                                            width: 100%;
                                            height: 100%;
                                            opacity: 0;
                                            cursor: pointer;
                                        }

                                        /* CSS styles for the custom file input button wrapper */
                                        .custom-file-wrapper {
                                            position: relative;
                                            display: inline-block;
                                            border-radius: 5px;
                                            overflow: hidden;
                                        }

                                        /* CSS styles for the image preview */
                                        .img-preview {
                                            width: 100px;
                                            height: 100px;
                                            object-fit: cover;
                                            border-radius: 5px;
                                        }

                                        /* CSS styles for the upload button */
                                        .upload-button {
                                            display: inline-block;
                                            padding: 6px 12px;
                                            background-color: #007bff;
                                            color: #fff;
                                            border: none;
                                            border-radius: 4px;
                                            transition: background-color 0.3s ease;
                                            cursor: pointer;
                                        }

                                        .upload-button:hover {
                                            background-color: #0056b3;
                                        }
                                    </style>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="profile-picture" class="col-lg-2 col-form-label">Profile Picture<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <div class="input-group">
                                                        <div class="custom-file-wrapper">
                                                            <img id="profile-picture-preview" src="/default.png" alt="No Image" class="img-thumbnail img-preview">
                                                            <label for="profile-picture" class="upload-button">Change</label>
                                                            <input id="profile-picture" name="profile-picture" type="file" class="form-control custom-file-input">
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted">Upload an image in PNG or JPG format.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                    document.getElementById('profile-picture').addEventListener('change', function(event) {
                                        const previewImage = document.getElementById('profile-picture-preview');
                                        const selectedFile = event.target.files[0];
                                        
                                        if (selectedFile) {
                                            const reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                                previewImage.src = e.target.result;
                                            };
                                            
                                            reader.readAsDataURL(selectedFile);
                                        } else {
                                            previewImage.src = '/default.png'; // Reset to default image
                                        }
                                    });
                                    </script>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="full-name" class="col-lg-2 col-form-label">Full Name<span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <input id="full-name" name="full-name" type="text"
                                                        class="form-control mandatory" value="{{ auth()->user()->name }}"
                                                        placeholder="Enter your full name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="date-of-birth" class="col-lg-2 col-form-label">Date of
                                                    Birth<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <input id="date-of-birth" name="date-of-birth" type="date"
                                                        class="form-control mandatory"
                                                        placeholder="Enter your Date of Birth">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="gender" class="col-lg-2 col-form-label">Gender<span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <select id="gender" name="gender" class="form-select mandatory"
                                                        placeholder="Choose your Gender">
                                                        <option value=""></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="contact-number" class="col-lg-2 col-form-label">Contact
                                                    Number<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <input id="contact-number" name="contact-number" type="text"
                                                        class="form-control mandatory"
                                                        placeholder="Enter your contact number" value="{{ auth()->user()->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="address" class="col-lg-2 col-form-label">Address<span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <textarea id="address" name="address" class="form-control mandatory" rows="3"
                                                        placeholder="Enter your address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="email" class="col-lg-2 col-form-label">Email
                                                    Address</label>
                                                <div class="col-lg-10">
                                                    <input id="email" name="email" type="email"
                                                        class="form-control mandatory"
                                                        placeholder="Enter your email address" value="{{ auth()->user()->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="lga-origin" class="col-lg-2 col-form-label">LGA of
                                                    Origin<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">

                                                    <select class="form-select mandatory"
                                                        aria-label="Select Local Government Area" id="lga-origin"
                                                        name="lga-origin" placeholder="Choose your LGA">
                                                        <option value=""></option>
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
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="ward" class="col-lg-2 col-form-label">Ward<span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <select id="ward" name="ward" class="form-select mandatory"
                                                        placeholder="Enter your Ward">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="marital-status" class="col-lg-2 col-form-label">Marital
                                                    Status<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <select id="marital-status" name="marital-status"
                                                        class="form-select mandatory"
                                                        placeholder="Choose Your Marital Status">
                                                        <option value=""></option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="divorced">Divorced</option>
                                                        <option value="widowed">Widowed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="nin" class="col-lg-2 col-form-label">National Identity Number (NIN)</label>
                                                <div class="col-lg-10">
                                                    <input id="nin" name="nin" type="text"
                                                        class="form-control"
                                                        placeholder="Enter your NIN Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="voter" class="col-lg-2 col-form-label">Permanent Voters Card Number (PVC)</label>
                                                <div class="col-lg-10">
                                                    <input id="voter" name="voter" type="text"
                                                        class="form-control"
                                                        placeholder="Enter your PVC Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="interests" class="col-lg-2 col-form-label">Interests or Hobbies</label>
                                                <div class="col-lg-10">
                                                    <input id="interests" name="interests" type="text" class="form-control"
                                                        placeholder="Enter your interests or hobbies">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    


                                </fieldset>
                                <h3>Education and Skills</h3>
                                <fieldset>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h3>Education and Skills</h3>
                                            <div class="mandatory-info">
                                                Fields marked with <span class="text-danger">*</span> are mandatory.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="highest-education" class="col-lg-2 col-form-label">Highest
                                                    Education<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <select id="highest-education" name="highest-education"
                                                        class="form-select mandatory"
                                                        placeholder="Choose your Highest Qualification ">
                                                        <option value=""></option>
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
                                        </div>
                                    </div>

                                    <div class="row" id="institution-of-study-div" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="institution-of-study"
                                                    class="col-lg-2 col-form-label">Institution</label>
                                                <div class="col-lg-10">
                                                    <input id="institution-of-study" name="institution-of-study"
                                                        type="text" class="form-control"
                                                        placeholder="Enter your Institution of study">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="area-of-study-div" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="course-of-study" class="col-lg-2 col-form-label">Course of
                                                    Study</label>
                                                <div class="col-lg-10">
                                                    <input id="area-of-study" name="area-of-study" type="text"
                                                        class="form-control" placeholder="Enter your area of study">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="artisan-skills" class="col-lg-2 col-form-label">Artisan
                                                    Skills<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <select id="artisan-skills" name="artisan-skills"
                                                        class="form-select mandatory"
                                                        placeholder="Choose your Artisan Skill">
                                                        <option value=""></option>
                                                        <option value="No Skill">No Skill</option>
                                                        <option value="plumbing">Plumbing</option>
                                                        <option value="carpentry">Carpentry</option>
                                                        <option value="electrician">Electrician</option>
                                                        <option value="painting">Painting</option>
                                                        <option value="welding">Welding</option>
                                                        <option value="masonry">Masonry</option>
                                                        <option value="bricklaying">Bricklaying</option>
                                                        <option value="tiling">Tiling</option>
                                                        <option value="roofing">Roofing</option>
                                                        <option value="landscaping">Landscaping</option>
                                                        <option value="furniture-making">Furniture Making</option>
                                                        <option value="metalworking">Metalworking</option>
                                                        <option value="blacksmithing">Blacksmithing</option>
                                                        <option value="glassblowing">Glassblowing</option>
                                                        <option value="pottery">Pottery</option>
                                                        <option value="sculpting">Sculpting</option>
                                                        <option value="leatherworking">Leatherworking</option>
                                                        <option value="weaving">Weaving</option>
                                                        <option value="embroidery">Embroidery</option>
                                                        <option value="basket-weaving">Basket Weaving</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="computer-skills" class="col-lg-2 col-form-label">Computer
                                                    Skills<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <select id="computer-skills" name="computer-skills"
                                                        class="form-select mandatory"
                                                        placeholder="Choose your Computer Skill">
                                                        <option value=""></option>
                                                        <option value="No Skill">No Skill</option>
                                                        <option value="programming">Programming</option>
                                                        <option value="networking">Networking</option>
                                                        <option value="database">Database Management</option>
                                                        <option value="graphic-design">Graphic Design</option>
                                                        <option value="web-development">Web Development</option>
                                                        <option value="data-analysis">Data Analysis</option>
                                                        <option value="video-editing">Video Editing</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </fieldset>
                                <h3>Employment Information</h3>


                                {{-- <fieldset>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h3>Choice of Program</h3>
                                            <div class="mandatory-info">
                                                Fields marked with <span class="text-danger">*</span> are mandatory.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="category" class="col-lg-2 col-form-label">Category<span class="text-danger"> *</span></label>
                                                <div class="col-lg-10">
                                                    <select id="category" name="category" class="form-select mandatory">
                                                        @if ($program)
                                                            <option value="{{ $program->category->id }}" selected>{{ $program->category->name }}</option>
                                                        @else
                                                        <option value=""></option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    

                                </fieldset> --}}


                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="employment-status" class="col-lg-2 col-form-label">Employment Status</label>
                                                <div class="col-lg-10">
                                                    <select id="employment-status" name="employment-status" class="form-select mandatory"
                                                        placeholder="Choose your employment status" onchange="toggleFields(this)">
                                                        <option value=""></option>
                                                        <option value="employed">Employed</option>
                                                        <option value="small-business">Small Business</option>
                                                        <option value="student">Student</option>
                                                        <option value="housewife">Housewife</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div id="employment-fields" style="display: none;">
                                        <!-- Fields related to employment details -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 row">
                                                    <label for="job-title" class="col-lg-2 col-form-label">Job Title</label>
                                                    <div class="col-lg-10">
                                                        <input id="job-title" name="job-title" type="text" class="form-control"
                                                            placeholder="Enter your job title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 row">
                                                    <label for="company-name" class="col-lg-2 col-form-label">Company Name</label>
                                                    <div class="col-lg-10">
                                                        <input id="company-name" name="company-name" type="text" class="form-control"
                                                            placeholder="Enter your company name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div id="business-fields" style="display: none;">
                                        <!-- Fields related to small business details -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 row">
                                                    <label for="business-name" class="col-lg-2 col-form-label">Business Name</label>
                                                    <div class="col-lg-10">
                                                        <input id="business-name" name="business-name" type="text" class="form-control"
                                                            placeholder="Enter your business name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 row">
                                                    <label for="business-type" class="col-lg-2 col-form-label">Business Type</label>
                                                    <div class="col-lg-10">
                                                        <select id="business-type" name="business-type" class="form-select" placeholder="Select your business type">
                                                            <option value=""></option>
                                                            <option value="Provision Store">Provision Store</option>
                                                            <option value="Electronics Shop">Electronics Shop</option>
                                                            <option value="Clothing Store">Clothing Store</option>
                                                            <option value="Restaurant/Café">Restaurant/Café</option>
                                                            <option value="Food Stall">Food Stall</option>
                                                            <option value="Bakery">Bakery</option>
                                                            <option value="Hair Salon/Barbershop">Hair Salon/Barbershop</option>
                                                            <option value="Tailoring/Fashion Design">Tailoring/Fashion Design</option>
                                                            <option value="Repair Services">Repair Services</option>
                                                            <option value="Cleaning Services">Cleaning Services</option>
                                                            <option value="Poultry Farming">Poultry Farming</option>
                                                            <option value="Fish Farming">Fish Farming</option>
                                                            <option value="Crop Farming">Crop Farming</option>
                                                            <option value="Handicrafts">Handicrafts</option>
                                                            <option value="Artwork">Artwork</option>
                                                            <option value="Taxi Service">Taxi Service</option>
                                                            <option value="Motorcycle Taxi (Achaba)">Motorcycle Taxi (Achaba)</option>
                                                            <option value="Delivery Services">Delivery Services</option>
                                                            <option value="Pharmacy/Chemist">Pharmacy/Chemist</option>
                                                            <option value="Traditional Medicine">Traditional Medicine</option>
                                                            <option value="Mobile Phone Repair">Mobile Phone Repair</option>
                                                            <option value="Digital Marketing">Digital Marketing</option>
                                                            <option value="App Development">Software Development</option>
                                                            <option value="Tutoring">Tutoring</option>
                                                            <option value="Computer Business Center">Computer Business Center</option>
                                                            <option value="Hardware Store">Hardware Store</option>
                                                            <option value="Furniture Making">Furniture Making</option>
                                                            <option value="Jewelry Making">Jewelry Making</option>
                                                            <option value="Event Planning">Event Planning</option>
                                                            <option value="Catering Services">Catering Services</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                
                                    <div id="student-fields" style="display: none;">
                                        <!-- Fields related to student details -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 row">
                                                    <label for="student-details" class="col-lg-2 col-form-label">Student Details</label>
                                                    <div class="col-lg-10">
                                                        <textarea id="student-details" name="student-details" class="form-control" rows="3"
                                                            placeholder="Enter your student details (e.g. institution, level and course)"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="program-category" class="col-lg-2 col-form-label">Preferred Program Category</label>
                                                <div class="col-lg-10">
                                                    <select id="program-category" name="program-category" class="form-select mandatory"
                                                        placeholder="Choose your preferred program category">
                                                        <option value=""></option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                                
                                <script>
                                function toggleFields(selectElement) {
                                    const selectedOption = selectElement.value;
                                    const employmentFields = document.getElementById("employment-fields");
                                    const businessFields = document.getElementById("business-fields");
                                    const studentFields = document.getElementById("student-fields");
                                
                                    // Reset the visibility of all fields
                                    employmentFields.style.display = "none";
                                    businessFields.style.display = "none";
                                    studentFields.style.display = "none";
                                
                                    // Show or hide fields based on the selected option
                                    if (selectedOption === "employed") {
                                        employmentFields.style.display = "block";
                                    } else if (selectedOption === "small-business") {
                                        businessFields.style.display = "block";
                                    } else if (selectedOption === "student") {
                                        studentFields.style.display = "block";
                                    }
                                }
                                </script>
                                
                                


                                <h3>Uploads</h3>
                                <fieldset>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h3>File Uploads</h3>
                                            <div class="mandatory-info">
                                                Fields marked with <span class="text-danger">*</span> are mandatory.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="cv-upload" class="col-lg-2 col-form-label">CV Upload</label>
                                                <div class="col-lg-10">
                                                    <input id="cv-upload" name="cv-upload" type="file"
                                                        class="form-control" accept=".pdf,.doc,.docx">
                                                    <small class="form-text text-muted">Upload your CV (PDF, Word)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="nysc-certificate-upload" class="col-lg-2 col-form-label">NYSC
                                                    Certificate Upload</label>
                                                <div class="col-lg-10">
                                                    <input id="nysc-certificate-upload" name="nysc-certificate-upload"
                                                        type="file" class="form-control"
                                                        accept=".pdf,.jpg,.jpeg,.png">
                                                    <small class="form-text text-muted">Upload your NYSC certificate (PDF,
                                                        JPG, PNG)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="other-uploads" class="col-lg-2 col-form-label">Other Relevant
                                                    Uploads</label>
                                                <div class="col-lg-10">
                                                    <input id="other-uploads" name="other-uploads" type="file"
                                                        class="form-control" multiple>
                                                    <small class="form-text text-muted">Upload other relevant documents
                                                        (PDF, JPG, PNG, etc.)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-10">
                                                    <button type="submit" class="btn btn-success" id="submit-btn">
                                                        Submit Your Form
                                                    </button>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- End Page-content -->


    @endsection

    @section('js')


        <!-- form wizard -->
        <script src="/admin/libs/jquery-steps/build/jquery.steps.min.js"></script>

        <!-- form wizard init -->
        <script src="/admin/js/pages/form-wizard.init.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <script>
            $(document).ready(function() {
                // Function to show a loading indicator
                function showLoadingIndicator() {
                    var programsDropdown = $('#programs');
                    programsDropdown.empty(); // Clear existing options
                    programsDropdown.append('<option value="" selected>Loading...</option>');
                }
        
                function updateProgramsDropdown(categoryId) {
                    var programsDropdown = $('#programs');
                    showLoadingIndicator(); // Show loading indicator
        
                    $.get('/programs-by-category/' + categoryId, function(data) {
                        programsDropdown.empty(); // Clear loading message
                        programsDropdown.append('<option value="" selected>Choose your Preferred Program</option>');
                        data.forEach(function(program) {
                            programsDropdown.append('<option value="' + program.id + '">' + program.title + '</option>');
                        });
                    });
                }
        
                $('#category').change(function() {
                    var categoryId = $(this).val();
                    updateProgramsDropdown(categoryId);
                });
            });
        </script>
        

        

        <script>
            $(document).ready(function() {
                // Form submission event
                $('#form-horizontal').on('submit', function(e) {
                    e.preventDefault();

                    $('#error-message').hide().empty();
                    $('.mandatory').removeClass('is-invalid');

                    // Validate mandatory fields
                    var isValid = true;
                    var emptyFields = [];

                    $('.mandatory').each(function() {
                        var value = $(this).val().trim();
                        var placeholder = $(this).attr('placeholder');
                        var labelText = $(this).siblings('label').text().trim();
                        var fieldName = placeholder || labelText;

                        if (value === '' || (value === null && placeholder === '')) {
                            isValid = false;
                            emptyFields.push(fieldName);
                            $(this).addClass('is-invalid');
                        }
                    });

                    // Display error message and highlight empty fields
                    if (!isValid) {
                        var errorMessage = 'The following fields are mandatory:<br><ul>';

                        emptyFields.forEach(function(field) {
                            errorMessage += '<li>' + field + '</li>';
                        });

                        errorMessage += '</ul>';

                        $('#error-message').html(errorMessage).show();
                        toastr.warning('Some fields are required.');
                        return;
                    }

                    var formData = new FormData(this);

                    var submitButton = $('#submit-btn');
                    submitButton.prop('disabled', true);

                    var spinner = '<div class="spinner-border" style="height: 15px; width: 15px;" role="status"></div> &nbsp; Submitting . . .';
                    submitButton.html(spinner);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('pre-registration') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // Reset form and display success message
                            $('#form-horizontal').trigger('reset');
                            toastr.success('Application submitted successfully.');

                            setTimeout(() => {
                                window.location.href = "{{ route('pre-registration') }}";
                            }, 2000);

                        },
                        error: function(xhr, status, error) {
                            if (xhr.responseJSON && xhr.responseJSON.error ===
                                'User already has an application') {
                                toastr.error('User already has an application');
                                submitButton.prop('disabled', false);
                            } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                                var errors = xhr.responseJSON.errors;
                                var errorMessage = '<ul>';
                                for (var key in errors) {
                                    if (errors.hasOwnProperty(key)) {
                                        errorMessage += '<li>' + errors[key][0] + '</li>';
                                    }
                                }
                                errorMessage += '</ul>';
                                toastr.error(errorMessage);
                                submitButton.prop('disabled', false);
                                submitButton.html("Submit your Form")
                            } else {
                                toastr.error('An error occurred. Please try again later.');
                                submitButton.prop('disabled', false);
                                submitButton.html("Submit your Form")

                            }
                        }

                    });



                });
            });
        </script>




        <script>
            $(document).ready(function() {
                const lgaWards = {
                    Auyo: ["Auyo Ward", "Ayan Ward", "Auyaki Ward", "Ayama Ward", "Gatafa Ward",
                        "Gamafoi Ward", "Gamsarka Ward", "Kafur Ward", "Tsidir Ward", "Unik Ward"
                    ],
                    Babura: ["Kuzunzumi Ward", "Batali Ward", "Jigawa Ward", "Babura Ward", "Garu Ward",
                        "Insharuwa Ward", "Kanya Ward", "Kyambo Ward", "Dorawa Ward", "Gasakoli Ward",
                        "Takwasawa Ward"
                    ],
                    Biriniwa: ["Kachallare Ward", "Machinamari  Ward", "Kazura Ward", "Diginsa Ward",
                        "Nguwa Ward", "Fagi Ward", "Batu Ward", "Birniwa Ward", "Dangwaleri Ward",
                        "Karanka Ward", "Matamu Ward"
                    ],
                    BirninKudu: ["Birnin Kudu Ward ", "Kiyako Ward", "Wurno ward",
                        "Kangire ward", "Yalwan Damai ward", "Unguwar Ya Ward", "Lafia Ward",
                        "Kwangwara ward", "Sundumina Ward", "Kantoga Ward", "Surko Ward"
                    ],
                    Buji: ["Gantsa ward", "Kukuma Ward", "Yayari Ward", "Ahoto Ward", "Kayawa Ward",
                        "Lelen Kudu Ward", "Falageri Ward", "Madabe Ward", "Chirbin Ward", "Buji Ward"
                    ],
                    Dutse: ["Ayan Ward", "Chamo Ward", "Duru Ward", "Dundubus Ward", "Limawa Ward", "Kachi Ward",
                        "J/Tsada Ward", "Sakwaya Ward", "Kudai Ward", "Madobi Ward", "Karnaya Ward"
                    ],
                    Gagarawa: ["Madaka Ward", "Maikilili Ward", "Zarada Ward", "Yalawa Ward", "Tasha Ward",
                        "Medu Ward", "Gari Ward", "Garin Chiroma Ward", "Maiaduwa Ward",
                        "Korebalatu Ward"
                    ],
                    Garki: ["Gwarzo Ward", "Doko Ward", "Sayori Ward", "Buduru Ward", "Kargo Ward", "Jirima Ward",
                        "Rafin Marke Ward", "Kanya Ward", "Kore Ward", "Muku Ward", "Garki Ward"
                    ],
                    Gumel: ["Dantanoma Ward", "Gusau Ward", "Dan Ama Ward", "Garin Gambo Ward", "Hammado Ward",
                        "Galagamma Ward", "Kofar Arewa Ward", "Kofar Yamma Ward", "Garin Barka Ward",
                        "Zango Ward", "Baikarya Ward"
                    ],
                    Guri: ["Garbagal Ward", "Adiyani Ward", "Lafiya Ward", "Guri Ward", "Margadu Ward",
                        "Matara Babba Ward", "Dawa Ward", "Abunabo Ward", "Musari Ward", "Kadira Ward"
                    ],
                    Gwaram: ["Gwaram Ward", "Zandam Nagogo Ward", "Sara Ward", "Maruta Ward", "Tsangarwa Ward",
                        "Fagam Ward", "Basirka Ward", "Farin Dutse Ward", "Dingaya Ward", "Kwandiko Ward",
                        "Kila Ward"
                    ],
                    Gwiwa: ["Dabi Ward", "Rurau Ward", "Yola Ward", "Firjin Yamma Ward", "Buntusu Ward",
                        "Darina Ward", "Korayal Ward", "Shafi Ward", "Zauma Ward", "Guntai Ward"
                    ],
                    Hadejia: ["Atafi Ward", "Dubantu Ward", "Gagulmari Ward", "Kasuwar Kuda Ward",
                        "Majema Ward", "Matsaro Ward", "Rumfa Ward", "Sabon Garu Ward", "Yankoli Ward",
                        "Yayari Ward", "Kasuwar Kofa Ward"
                    ],
                    Jahun: ["Jahun Ward", "Aujara Ward", "Gauza Tazara Ward", "Kali Ward", "Kanwa Ward",
                        "Gunka Ward", "Gangawa Ward", "Jabarna Ward", "Indaduna Ward", "Harbo Sabuwa Ward",
                        "Harbo Tsohuwa Ward"
                    ],
                    KafinHausa: ["Kafin Hausa Ward", "Kwazalewa Ward", "Dumadumin Toka Ward", "Sarawa Ward",
                        "Gafaya Ward", "Jabo Ward", "Zago Ward", "Majawa Ward", "Mezan Ward",
                        "Bulangu Ward", "Ruba Ward"
                    ],
                    Kaugama: ["Kaugama Ward", "Dakayyaawa Ward", "Askandu Ward", "Marke Ward", "Ja‘E Ward",
                        "Unguwar Jibrin Ward", "Dabuwaran Ward", "Arbus Ward", "Hadin Ward", "Yalo Ward",
                        "Jarkasa Ward"
                    ],
                    Kazaure: ["Gabas Ward", "Mardawa Ward", "Sabaru Ward", "Arewa Ward",
                        "Baauzune Ward", "Yamma Ward", "Kanti Ward", "Gada Ward", "Dandi Ward",
                        "Dabaza Ward", "Daba Ward"
                    ],
                    Kirikasamma: ["Madaci Ward", "Doleri Ward", "Fandum Ward", "Kirikasamma Ward",
                        "Turabu Ward", "Marma Ward", "Gayin Ward", "Tasheguwa Ward", "Bulunchai Ward",
                        "Baturiya Ward"
                    ],
                    Kiyawa: ["Balago Ward", "Katuka Ward", "Kwanda Ward", "Kiyawa Ward", "Fake Ward",
                        "Katanga Ward", "Andaza Ward", "Gurduba Ward", "Maje Ward", "Garko Ward", "Tsirma Ward"
                    ],
                    Maigatari: ["Maigatari Arewa Ward", "Maigatari Kudu Ward", "Matoya Ward", "Fulata Ward",
                        "Madana Ward", "Turbus Ward", "Dan kumbo Ward", "Jajire Ward", "Kukayisku Ward",
                        "Galadi Ward", "Balarabe Ward"
                    ],
                    MalamMadori: ["Dunari Ward", "Arki Ward", "G/Gabas Ward", "Takwaro Ward",
                        "Tonikutari Ward", "Futuka Ward", "Mairakumi Ward", "Mukaddari Ward",
                        "Malam Madori Ward", "Tashena Ward", "Shayya Ward"
                    ],
                    Miga: ["Hantsu Ward", "Tsakuwawa Ward", "S/Takanebu Ward", "Garba Ward", "Zareku Ward",
                        "Miga Ward", "Dangyatin Ward", "Sansani Ward", "Koya Ward", "Yanduna Ward"
                    ],
                    Ringim: ["Chai-Chai Ward", "Yandutse Ward", "Karshi Ward", "Tofa Ward", "Dabi Ward",
                        "Saltimawa Ward", "Sankara Ward", "Ringim Ward", "Kyarama Ward",
                        "Kafin Babushi Ward"
                    ],
                    Roni: ["Amaryawa Ward", "Baragumi Ward", "Dansure Ward", "Fara Ward", "Gora Ward",
                        "Kwaita Ward", "Sankau Ward", "Tunas Ward", "Yanzaki Ward",
                        "Zugai Ward", "Roni Ward"
                    ],
                    SuleTankarkar: ["Albasu Ward", "Danzomo Ward", "Takatsaba Ward", "Shabaru Ward",
                        "Amanga Ward", "Jeke Ward", "Yandamo Ward", "Dangwanki Ward",
                        "Suletankarkar Ward", "Danladi Ward"
                    ],
                    Taura: ["Majia Ward", "Cukuta Ward", "Kwalam Ward", "Gujungu Ward", "Cakwaikwaiwa Ward",
                        "Sabongari Yaya Ward", "Maje Ward", "Kirikasamma Ward", "Aujara Ward", "Taura Ward"
                    ],
                    Yankwashi: ["Yankwashi Ward", "Acilafiya Ward", "Belas Ward", "Dawangayo Ward", "Gurjiya Ward",
                        "Gwarta Ward", "Karkarna Ward", "Kuda Ward", "Ringim Ward", "Zungumba Ward"
                    ],
                    // Add the remaining LGAs and their respective wards
                    // ...
                };


                // Get references to the LGA and Ward select elements
                const lgaSelect = $("#lga-origin");
                const wardSelect = $("#ward");

                // Event listener for LGA selection change
                lgaSelect.on("change", function() {
                    const selectedLGA = $(this).val();
                    const selectedWards = lgaWards[selectedLGA] || [];

                    // Clear existing options
                    wardSelect.empty();

                    // Populate the Ward select options
                    $.each(selectedWards, function(index, ward) {
                        const option = $("<option></option>").text(ward).val(ward);
                        wardSelect.append(option);
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#highest-education').change(function() {
                    var selectedEducation = $(this).val();
                    var areaOfStudyField = $('#area-of-study-div');
                    var institutionOfStudyField = $('#institution-of-study-div');

                    if (selectedEducation === 'diploma' || selectedEducation === 'bachelors-degree' ||
                        selectedEducation === 'masters-degree' || selectedEducation === 'doctorate') {
                        areaOfStudyField.show();
                        institutionOfStudyField.show();
                    } else {
                        areaOfStudyField.hide();
                        institutionOfStudyField.hide();
                    }
                });
            });
        </script>

    @endsection
