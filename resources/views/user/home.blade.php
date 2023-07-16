@extends('admin.layout.app')
@section('pageTitle', 'Home')
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
                                <li class="breadcrumb-item active">Graduate Programs</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Jigawa State Empowerment Application</h4>
                            <p class="card-title-desc">Please complete the following form to apply for the empowerment program in Jigawa State.</p>

                            <form id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                                <h3>Personal Information</h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Personal Information</h3>
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
                                    
                                    <script>
                                      document.addEventListener('DOMContentLoaded', function() {
                                        var fileInput = document.getElementById('profile-picture');
                                        var uploadButton = document.querySelector('.upload-button');
                                    
                                        uploadButton.addEventListener('click', function() {
                                          fileInput.click();
                                        });
                                    
                                        fileInput.addEventListener('change', function() {
                                          var previewImage = document.getElementById('profile-picture-preview');
                                          var file = this.files[0];
                                          var reader = new FileReader();
                                    
                                          reader.onload = function(e) {
                                            previewImage.src = e.target.result;
                                          };
                                    
                                          reader.readAsDataURL(file);
                                        });
                                      });
                                    </script>
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="mb-3 row">
                                          <label for="profile-picture" class="col-lg-2 col-form-label">Profile Picture</label>
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
                                    

                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="full-name" class="col-lg-2 col-form-label">Full Name</label>
                                                <div class="col-lg-10">
                                                    <input id="full-name" name="full-name" type="text"
                                                        class="form-control" placeholder="Enter your full name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="date-of-birth" class="col-lg-2 col-form-label">Date of
                                                    Birth</label>
                                                <div class="col-lg-10">
                                                    <input id="date-of-birth" name="date-of-birth" type="date"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="gender" class="col-lg-2 col-form-label">Gender</label>
                                                <div class="col-lg-10">
                                                    <select id="gender" name="gender" class="form-select">
                                                        <option value=""></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="contact-number" class="col-lg-2 col-form-label">Contact
                                                    Number</label>
                                                <div class="col-lg-10">
                                                    <input id="contact-number" name="contact-number" type="text"
                                                        class="form-control" placeholder="Enter your contact number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="address" class="col-lg-2 col-form-label">Address</label>
                                                <div class="col-lg-10">
                                                    <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="email" class="col-lg-2 col-form-label">Email Address</label>
                                                <div class="col-lg-10">
                                                    <input id="email" name="email" type="email" class="form-control"
                                                        placeholder="Enter your email address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="lga-origin" class="col-lg-2 col-form-label">LGA of
                                                    Origin</label>
                                                <div class="col-lg-10">

                                                    <select class="form-select" aria-label="Select Local Government Area"
                                                        id="lga-origin">
                                                        <option selected disabled></option>
                                                        <option value="Auyo">Auyo</option>
                                                        <option value="Babura">Babura</option>
                                                        <option value="Biriniwa">Biriniwa</option>
                                                        <option value="Birnin Kudu">Birnin Kudu</option>
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
                                                        <option value="Kafin Hausa">Kafin Hausa</option>
                                                        <option value="Kaugama">Kaugama</option>
                                                        <option value="Kazaure">Kazaure</option>
                                                        <option value="Kirikasamma">Kirikasamma</option>
                                                        <option value="Kiyawa">Kiyawa</option>
                                                        <option value="Maigatari">Maigatari</option>
                                                        <option value="Malam Madori">Malam Madori</option>
                                                        <option value="Miga">Miga</option>
                                                        <option value="Ringim">Ringim</option>
                                                        <option value="Roni">Roni</option>
                                                        <option value="Sule Tankarkar">Sule Tankarkar</option>
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
                                                <label for="local-govt" class="col-lg-2 col-form-label">Ward</label>
                                                <div class="col-lg-10">
                                                    <select id="ward" name="ward" class="form-select"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="marital-status" class="col-lg-2 col-form-label">Marital
                                                    Status</label>
                                                <div class="col-lg-10">
                                                    <select id="marital-status" name="marital-status"
                                                        class="form-select">
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

                                </fieldset>
                                <h3>Education and Skills</h3>
                                <fieldset>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Education and Skills</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="highest-education" class="col-lg-2 col-form-label">Highest
                                                    Education</label>
                                                <div class="col-lg-10">
                                                    <select id="highest-education" name="highest-education"
                                                        class="form-control">
                                                        <option value="">Select your highest education</option>
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
                                                <label for="area-of-study" class="col-lg-2 col-form-label">Course of
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
                                                    Skills</label>
                                                <div class="col-lg-10">
                                                    <select id="artisan-skills" name="artisan-skills"
                                                        class="form-control">
                                                        <option value="">No Skill</option>
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
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label for="computer-skills" class="col-lg-2 col-form-label">Computer
                                                    Skills</label>
                                                <div class="col-lg-10">
                                                    <select id="computer-skills" name="computer-skills"
                                                        class="form-control">
                                                        <option value="">No Skill</option>
                                                        <option value="programming">Programming</option>
                                                        <option value="networking">Networking</option>
                                                        <option value="database">Database Management</option>
                                                        <option value="graphic-design">Graphic Design</option>
                                                        <option value="web-development">Web Development</option>
                                                        <option value="data-analysis">Data Analysis</option>
                                                        <option value="video-editing">Video Editing</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </fieldset>
                                <h3>Choice of Program</h3>
                                <fieldset>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Choice of Program</h3>
                                        </div>
                                    </div>

                                    <script>
                                      // Populate the programs based on the selected category
                                      function populatePrograms() {
                                        var categorySelect = document.getElementById('category');
                                        var programsSelect = document.getElementById('programs');
                                        var selectedCategory = categorySelect.value;
                                    
                                        // Clear the existing options
                                        programsSelect.innerHTML = '';
                                    
                                        // Define the programs for each category
                                        var programs = {
                                          student: ['','Student Loan', 'Scholarship', 'NECO/WAEC/JAMB'],
                                          unemployed: ['','Vocational training'],
                                          entrepreneur: ['','MSMEs Grand'],
                                          graduate: ['','Digital Literacy'],
                                          farmer: ['','FarmRise Program']
                                        };
                                    
                                        // Populate the programs select field with options
                                        programs[selectedCategory].forEach(function(program) {
                                          var option = document.createElement('option');
                                          option.value = program;
                                          option.text = program;
                                          programsSelect.appendChild(option);
                                        });
                                      }
                                    
                                      // Event listener for category change
                                      document.getElementById('category').addEventListener('change', populatePrograms);
                                    </script>
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="mb-3 row">
                                          <label for="category" class="col-lg-2 col-form-label">Category</label>
                                          <div class="col-lg-10">
                                            <select id="category" name="category" class="form-control">
                                              <option value=""></option>
                                              <option value="student">Student</option>
                                              <option value="unemployed">Un-Employed</option>
                                              <option value="entrepreneur">Entrepreneur</option>
                                              <option value="graduate">Graduate</option>
                                              <option value="farmer">Farmer</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="mb-3 row">
                                          <label for="programs" class="col-lg-2 col-form-label">Programs</label>
                                          <div class="col-lg-10">
                                            <select id="programs" name="programs" class="form-control">
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    



                                </fieldset>
                                <h3>Uploads</h3>
                                <fieldset>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>File Uploads</h3>
                                        </div>
                                    </div>



                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="mb-3 row">
                                          <label for="cv-upload" class="col-lg-2 col-form-label">CV Upload</label>
                                          <div class="col-lg-10">
                                            <input id="cv-upload" name="cv-upload" type="file" class="form-control" accept=".pdf,.doc,.docx">
                                            <small class="form-text text-muted">Upload your CV (PDF, Word)</small>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="mb-3 row">
                                          <label for="nysc-certificate-upload" class="col-lg-2 col-form-label">NYSC Certificate Upload</label>
                                          <div class="col-lg-10">
                                            <input id="nysc-certificate-upload" name="nysc-certificate-upload" type="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                            <small class="form-text text-muted">Upload your NYSC certificate (PDF, JPG, PNG)</small>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="mb-3 row">
                                          <label for="other-uploads" class="col-lg-2 col-form-label">Other Relevant Uploads</label>
                                          <div class="col-lg-10">
                                            <input id="other-uploads" name="other-uploads" type="file" class="form-control" multiple>
                                            <small class="form-text text-muted">Upload other relevant documents (PDF, JPG, PNG, etc.)</small>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    



                                  
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-10">
                                                    <button type="submit" class="btn btn-primary">Submit Your
                                                        Application</button>
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


        <script>
            $(function() {
                // On form submit
                $("#form-horizontal").submit(function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Perform form validation here if needed
                    // ...

                    // Collect form data
                    var formData = $(this).serializeArray();

                    // Print form data to the console (you can replace this with your desired logic)
                    console.log(123);

                    // Optionally, you can send the form data to a server using AJAX
                    // Uncomment the code below to send the form data using AJAX
                    /*
                    $.ajax({
                      url: "your-server-url",
                      method: "POST",
                      data: formData,
                      success: function(response) {
                        console.log("Form data submitted successfully!");
                        // Optionally, perform any success actions here
                      },
                      error: function(xhr, status, error) {
                        console.error("Form data submission failed:", error);
                        // Optionally, perform any error handling here
                      }
                    });
                    */

                    // Optionally, you can redirect the user to a different page after form submission
                    // Uncomment the code below and replace "your-page-url" with the desired URL
                    /*
                    window.location.href = "your-page-url";
                    */
                });
            });

            $(document).ready(function() {
                const lgaWards = {
                    Auyo: ["Auyo Ward", "Baganaye Ward", "Balangu Ward", "Buji Ward", "Gishiru Ward",
                        "Gujungu Ward", "Kanya Ward", "Magajiya Ward", "Mainari Ward", "Ningi Ward",
                        "Randawa Ward", "Zangon Baji Ward"
                    ],
                    Babura: ["Babura Ward", "Babura East Ward", "Babura West Ward", "Bande Ward", "Gabarin Ward",
                        "Kaugama Ward", "Kilasu Ward", "Marwara Ward", "Wazari Ward", "Yargaba Ward"
                    ],
                    Biriniwa: ["Biriniwa Ward", "Birniwa East Ward", "Birniwa West Ward", "Dauwar Fada Ward",
                        "Gwaran Ward", "Harbo Ward", "Hayi Ward", "Kumawa Ward", "Yallo Ward", "Yatsumbaki Ward"
                    ],
                    BirninKudu: ["Birnin Kudu Ward 1", "Birnin Kudu Ward 2", "Birnin Kudu Ward 3",
                        "Birnin Kudu Ward 4", "Birnin Kudu Ward 5", "Birnin Kudu Ward 6", "Birnin Kudu Ward 7",
                        "Birnin Kudu Ward 8", "Birnin Kudu Ward 9", "Birnin Kudu Ward 10"
                    ],
                    Buji: ["Buji Ward", "Aguji Ward", "Burki Ward", "Dagel Ward", "Dangyatin Ward", "Dawaki Ward",
                        "Doguwa Ward", "Fago Ward", "Garin Gambo Ward", "Tasheguwa Ward"
                    ],
                    Dutse: ["Dutse Ward A", "Dutse Ward B", "Dutse Ward C", "Dutse Ward D", "Dutse Ward E",
                        "Dutse Ward F", "Dutse Ward G", "Dutse Ward H", "Dutse Ward I", "Dutse Ward J"
                    ],
                    Gagarawa: ["Gagarawa Ward", "Basirka Ward", "Dankoli Ward", "Fago Ward", "Gantsa Ward",
                        "Garki Ward", "Gungun Sarki Ward", "Jandutse Ward", "Kafinsabuwa Ward",
                        "Mijinjirawa Ward"
                    ],
                    Garki: ["Garki Ward", "Azurawa Ward", "Bargo Ward", "Baska Ward", "Burani Ward", "Dorawa Ward",
                        "Goma Ward", "Joga Ward", "Kalgo Ward", "Zauru Ward"
                    ],
                    Gumel: ["Gumel Ward", "Aujara Ward", "Babaruwa Ward", "Bukkuyum Ward", "Garin Malam Ward",
                        "Gundutse Ward", "Jakwanawa Ward", "Maiyama Ward", "Sabon Gari Ward", "Yakasai Ward"
                    ],
                    Guri: ["Guri Ward", "Babura Ward", "Bakin Kogi Ward", "Baturiya Ward", "Bubara Ward",
                        "Chadi Ward", "Chalawa Ward", "Damagaran Ward", "Dangaladima Ward", "Dangamau Ward"
                    ],
                    Gwaram: ["Gwaram Ward", "Arawa Ward", "Badara Ward", "Dankoli Ward", "Dingaya Ward",
                        "Dogo Ward", "Doma Ward", "Gabasawa Ward", "Garin Alkali Ward", "Hantsi Ward"
                    ],
                    Gwiwa: ["Gwiwa Ward", "Basirka Ward", "Baza Ward", "Doguwa Ward", "Gajuwaka Ward",
                        "Garin Wakil Ward", "Kargo Ward", "Kumurya Ward", "Rantiya Ward", "Zangon Jari Ward"
                    ],
                    Hadejia: ["Hadejia North Ward", "Hadejia South Ward", "Balangu Ward", "Dan Maliki Ward",
                        "Galamawa Ward", "Gara Ward", "Harbo Ward", "Kargo Ward", "Kargari Ward", "Kumurya Ward"
                    ],
                    Jahun: ["Jahun Ward", "Albasu Ward", "Basirka Ward", "Dankoli Ward", "Fago Ward",
                        "Gabasawa Ward", "Garin Alkali Ward", "Garki Ward", "Kargo Ward", "Kargo Maijari Ward"
                    ],
                    KafinHausa: ["Kafin Hausa Ward", "Baballe Ward", "Bakin Dutse Ward", "Damagaran Ward",
                        "Garin Daji Ward", "Garin Boka Ward", "Garin Wakil Ward", "Jaruwa Ward", "Kalgo Ward",
                        "Wuro Ladde Ward"
                    ],
                    Kaugama: ["Kaugama Ward", "Balarabe Ward", "Babura Ward", "Gidan Sarki Ward", "Guri Ward",
                        "Jakwanawa Ward", "Kargari Ward", "Karkarna Ward", "Kumurya Ward", "Yantsai Ward"
                    ],
                    Kazaure: ["Kazaure North Ward", "Kazaure South Ward", "Balarabe Ward", "Bomo Ward",
                        "Dankoli Ward", "Gabasawa Ward", "Gwiwa Ward", "Gwamagwami Ward", "Jigawar Sarki Ward",
                        "Katanga Ward"
                    ],
                    Kirikasamma: ["Kirikasamma Ward", "Basirka Ward", "Basirka Fulani Ward", "Garin Alkali Ward",
                        "Guma Ward", "Gwadabawa Ward", "Harbo Ward", "Jama'are Ward", "Jarga Ward", "Miga Ward"
                    ],
                    Kiyawa: ["Kiyawa Ward", "Amagu Ward", "Bakanawa Ward", "Bungur Ward", "Gidan Fulani Ward",
                        "Guradi Ward", "Gwiwa Ward", "Jatau Ward", "Kanya Ward", "Karkarna Ward"
                    ],
                    Maigatari: ["Maigatari Ward", "Barkirya Ward", "Basirka Ward", "Garin Daji Ward",
                        "Garin Tiku Ward", "Gumel Ward", "Jargo Ward", "Kanya Ward", "Kurnawa Ward",
                        "Lingayawa Ward"
                    ],
                    MalamMadori: ["Malam Madori Ward", "Amagu Ward", "Babarawa Ward", "Dausayi Ward",
                        "Garin Alkali Ward", "Garin Daji Ward", "Garin Gada Ward", "Garin Mallam Ward",
                        "Garin Wakil Ward", "Gumel Ward"
                    ],
                    Miga: ["Miga Ward", "Bakwai Ward", "Basirka Ward", "Danwata Ward", "Garin Alkali Ward",
                        "Garin Dauwa Ward", "Garin Gada Ward", "Garin Wakil Ward", "Hantsi Ward", "Horo Ward"
                    ],
                    Ringim: ["Ringim Ward", "Bachirawa Ward", "Bazai Ward", "Dabai Ward", "Garin Alkali Ward",
                        "Garin Babba Ward", "Garin Baka Ward", "Garin Bawa Ward", "Garin Daji Ward",
                        "Garin Gabas Ward"
                    ],
                    Roni: ["Roni Ward", "Balangu Ward", "Bursari Ward", "Dala Ward", "Garin Gada Ward",
                        "Garin Alkali Ward", "Garin Dangora Ward", "Garin Kaya Ward", "Garin Sarki Ward",
                        "Garin Tiku Ward"
                    ],
                    SuleTankarkar: ["Sule Tankarkar Ward", "Baka Ward", "Garin Alkali Ward", "Garin Chiroma Ward",
                        "Garin Gabas Ward", "Garin Rijiya Ward", "Garin Sarki Ward", "Garin Shaku Ward",
                        "Garin Tofa Ward", "Garin Wakil Ward"
                    ],
                    Taura: ["Taura Ward", "Aujara Ward", "Babaldu Ward", "Babban Gari Ward", "Danyata Ward",
                        "Dingimari Ward", "Galamawa Ward", "Gariyawa Ward", "Kalgaram Ward", "Miga Ward"
                    ],
                    Yankwashi: ["Yankwashi Ward", "Bamu Ward", "Barkirya Ward", "Dankoli Ward", "Galamawa Ward",
                        "Gwiwa Ward", "Gwaramin Kadawa Ward", "Hantsi Ward", "Jama'are Ward", "Kanya Ward"
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
