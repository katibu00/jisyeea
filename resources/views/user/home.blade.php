@extends('admin.layout.app')
@section('pageTitle','Home')
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
                        <h4 class="card-title">Jquery Steps Wizard</h4>
                        <p class="card-title-desc">A powerful jQuery wizard plugin that supports
                            accessibility and HTML5</p>

                        <form id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                            <h3>Personal Information</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                      <h3>Personal Information</h3>
                                    </div>
                                  </div>
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="full-name" class="col-lg-2 col-form-label">Full Name</label>
                                        <div class="col-lg-10">
                                          <input id="full-name" name="full-name" type="text" class="form-control" placeholder="Enter your full name">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="date-of-birth" class="col-lg-2 col-form-label">Date of Birth</label>
                                        <div class="col-lg-10">
                                          <input id="date-of-birth" name="date-of-birth" type="date" class="form-control">
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
                                            <option value="">Select gender</option>
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
                                        <label for="contact-number" class="col-lg-2 col-form-label">Contact Number</label>
                                        <div class="col-lg-10">
                                          <input id="contact-number" name="contact-number" type="text" class="form-control" placeholder="Enter your contact number">
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
                                        <label for="nationality" class="col-lg-2 col-form-label">Nationality</label>
                                        <div class="col-lg-10">
                                          <input id="nationality" name="nationality" type="text" class="form-control" placeholder="Enter your nationality">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="email" class="col-lg-2 col-form-label">Email Address</label>
                                        <div class="col-lg-10">
                                          <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email address">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="state-origin" class="col-lg-2 col-form-label">State of Origin</label>
                                        <div class="col-lg-10">
                                          <input id="state-origin" name="state-origin" type="text" class="form-control" placeholder="Enter your state of origin">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="local-govt" class="col-lg-2 col-form-label">Local Government Area</label>
                                        <div class="col-lg-10">
                                          <input id="local-govt" name="local-govt" type="text" class="form-control" placeholder="Enter your local government area">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="marital-status" class="col-lg-2 col-form-label">Marital Status</label>
                                        <div class="col-lg-10">
                                          <select id="marital-status" name="marital-status" class="form-select">
                                            <option value="">Select marital status</option>
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
                                    <label for="highest-education" class="col-lg-2 col-form-label">Highest Education</label>
                                    <div class="col-lg-10">
                                        <select id="highest-education" name="highest-education" class="form-control">
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

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                    <label for="area-of-study" class="col-lg-2 col-form-label">Area of Study</label>
                                    <div class="col-lg-10">
                                        <input id="area-of-study" name="area-of-study" type="text" class="form-control" placeholder="Enter your area of study">
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                    <label for="certifications" class="col-lg-2 col-form-label">Certifications</label>
                                    <div class="col-lg-10">
                                        <textarea id="certifications" name="certifications" class="form-control" rows="3" placeholder="Enter your certifications"></textarea>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                    <label for="skills" class="col-lg-2 col-form-label">Skills</label>
                                    <div class="col-lg-10">
                                        <select id="skills" name="skills" class="form-control" multiple>
                                        <option value="communication">Communication</option>
                                        <option value="problem-solving">Problem Solving</option>
                                        <option value="teamwork">Teamwork</option>
                                        <option value="leadership">Leadership</option>
                                        <option value="time-management">Time Management</option>
                                        <option value="technical-skills">Technical Skills</option>
                                        <option value="analytical-skills">Analytical Skills</option>
                                        <option value="creativity">Creativity</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="languages" class="col-lg-2 col-form-label">Languages</label>
                                        <div class="col-lg-10">
                                          <select id="languages" name="languages" class="form-control" multiple>
                                            <option value="english">English</option>
                                            <option value="hausa">Hausa</option>
                                            <option value="yoruba">Yoruba</option>
                                            <option value="igbo">Igbo</option>
                                            <option value="french">French</option>
                                            <option value="spanish">Spanish</option>
                                            <option value="other">Other</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="computer-skills" class="col-lg-2 col-form-label">Computer Skills</label>
                                        <div class="col-lg-10">
                                          <textarea id="computer-skills" name="computer-skills" class="form-control" rows="3" placeholder="Enter your computer skills"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="volunteer-experience" class="col-lg-2 col-form-label">Volunteer Experience</label>
                                        <div class="col-lg-10">
                                          <textarea id="volunteer-experience" name="volunteer-experience" class="form-control" rows="3" placeholder="Enter your volunteer experience"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>                                  


                            </fieldset>
                            <h3>Employment History</h3>
                            <fieldset>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                      <h3>Employment History</h3>
                                    </div>
                                  </div>
                                  
                                  <div id="employment-history-container"></div>

                                  <div class="row">
                                    <div class="col-md-12">
                                      <button type="button" id="add-employment-history" class="btn btn-primary">Add Employment</button>
                                    </div>
                                  </div>
                                  
                                
                                  
                            </fieldset>
                            <h3>Additional Information</h3>
                            <fieldset>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                      <h3>Additional Information</h3>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="preferred-industries" class="col-lg-2 col-form-label">Preferred Industries</label>
                                        <div class="col-lg-10">
                                          <textarea id="preferred-industries" name="preferred-industries" class="form-control" rows="3" placeholder="Enter your preferred industries"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="job-expectations" class="col-lg-2 col-form-label">Job Expectations</label>
                                        <div class="col-lg-10">
                                          <textarea id="job-expectations" name="job-expectations" class="form-control" rows="3" placeholder="Enter your job expectations"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="challenges-faced" class="col-lg-2 col-form-label">Challenges Faced</label>
                                        <div class="col-lg-10">
                                          <textarea id="challenges-faced" name="challenges-faced" class="form-control" rows="3" placeholder="Enter the challenges you face in finding employment"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="training-programs" class="col-lg-2 col-form-label">Interest in Training Programs</label>
                                        <div class="col-lg-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="training-interest" id="training-interest-yes" value="yes">
                                            <label class="form-check-label" for="training-interest-yes">
                                              Yes
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="training-interest" id="training-interest-no" value="no">
                                            <label class="form-check-label" for="training-interest-no">
                                              No
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="availability" class="col-lg-2 col-form-label">Availability</label>
                                        <div class="col-lg-10">
                                          <select id="availability" name="availability" class="form-control">
                                            <option value="">Select availability</option>
                                            <option value="full-time">Full-time</option>
                                            <option value="part-time">Part-time</option>
                                            <option value="contract">Contract</option>
                                            <option value="freelance">Freelance</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label for="salary-expectation" class="col-lg-2 col-form-label">Salary Expectation</label>
                                        <div class="col-lg-10">
                                          <input id="salary-expectation" name="salary-expectation" type="text" class="form-control" placeholder="Enter your salary expectation">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label">Resume/CV</label>
                                        <div class="col-lg-10">
                                          <input type="file" class="form-control-file" id="resume-cv" name="resume-cv">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label"></label>
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary">Submit Your Application</button>
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


<script>
  var employmentCount = 1;

  $(document).ready(function() {
    $('#add-employment-history').click(function() {
      employmentCount++; alert(123);

      var employmentRow = `
        <div class="row employment-history-row">
          <div class="col-md-12">
            <div class="mb-3 row">
              <label for="company-name-${employmentCount}" class="col-lg-2 col-form-label">Company Name</label>
              <div class="col-lg-4">
                <input id="company-name-${employmentCount}" name="company-name[]" type="text" class="form-control" placeholder="Enter company name">
              </div>
              <label for="job-title-${employmentCount}" class="col-lg-2 col-form-label">Job Title</label>
              <div class="col-lg-4">
                <input id="job-title-${employmentCount}" name="job-title[]" type="text" class="form-control" placeholder="Enter job title">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="employment-period-${employmentCount}" class="col-lg-2 col-form-label">Employment Period</label>
              <div class="col-lg-4">
                <input id="employment-period-${employmentCount}" name="employment-period[]" type="text" class="form-control" placeholder="Enter employment period">
              </div>
              <label for="job-description-${employmentCount}" class="col-lg-2 col-form-label">Job Description</label>
              <div class="col-lg-4">
                <textarea id="job-description-${employmentCount}" name="job-description[]" class="form-control" rows="3" placeholder="Enter job description"></textarea>
              </div>
            </div>
          </div>
        </div>
      `;

      $('#employment-history-container').append(employmentRow);
    });
  });
</script>

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
  </script>
  
  

@endsection
