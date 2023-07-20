<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>JISYEEA - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Css -->
    <link href="/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('home') }}" class="text-reset"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Welcome!</h5>
                                <p class="text-white-50 mb-0">Sign Up to continue to JISYEEA.</p>
                                <a href="#" class="logo logo-admin mt-4">
                                    <img src="/images/logo.jpeg" alt="" height="40">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <form class="form-horizontal" id="login-form">

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter your Full name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Enter Email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Enter Phone Number">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password"
                                            placeholder="Enter password">
                                    </div>

                                    

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary">
                                            Sign In </a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        {{-- <p>Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-primary">
                                Signup now </a> </p> --}}
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> JISYEEA.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="/admin/libs/jquery/jquery.min.js"></script>
    <script src="/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/libs/metismenu/metisMenu.min.js"></script>
    <script src="/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="/admin/libs/node-waves/waves.min.js"></script>
    <script src="/admin/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <script src="/admin/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#login-form').submit(function(event) {
                event.preventDefault();
                var submitButton = $(this).find('button[type="submit"]');
                submitButton.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

                var formData = new FormData(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/register',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        submitButton.prop('disabled', false).text('Login');

                        if (response.status == 200) {
                            toastr.success('Login successful. Redirecting to dashboard...');
                            setTimeout(function() {
                                window.location.href = '{{ route('login') }}';
                            }, 10);
                        }
                    },
                    error: function(xhr, status, error) {
                        submitButton.prop('disabled', false).text('Login');

                        var response = xhr.responseJSON;
                        if (response && response.errors) {
                            // Display validation errors
                            var errorMessages = Object.values(response.errors).flat();
                            errorMessages.forEach(function(errorMessage) {
                                toastr.error(errorMessage);
                            });
                        } else if (response && response.message) {
                            toastr.error(response.message);
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    },
                });
            });
        });
    </script>

</body>

</html>
