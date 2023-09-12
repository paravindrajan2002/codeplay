<!doctype html>

<html lang="en" data-layout="horizontal" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="creative" data-topbar="light" data-bs-theme="light" data-layout-width="fluid" data-sidebar-image="none" data-layout-position="fixed" data-layout-style="default">
<head>

        <meta charset="utf-8">
        <title>Master Login | HumTum Baby</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- Fonts css load -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link id="fontsLink" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

        <!-- Layout config Js -->
        <script src="assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="{{asset('master-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('master-assets/css/icons.min.css" rel="stylesheet')}}" type="text/css">
        <!-- App Css-->
        <link href="{{asset('master-assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
        <!-- custom Css-->
        <link href="{{asset('master-assets/css/custom.min.css')}}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>


        <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="card mb-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-lg-5">
                                    <div class="card auth-card bg-secondary h-100 border-0 shadow-none d-none d-lg-block mb-0">
									<img style="height: 600px;"  src="{{asset('master-assets/images/login-pg.jpg')}}" alt="" class="img-fluid">
                                      
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6 mx-auto">
                                    <div class="card mb-0 border-0 shadow-none mb-0">
                                        <div class="card-body px-5 m-lg-4">
                                            <div class="text-center mt-4">
											   	<img src="{{asset('master-assets/images/logo2.png')}}" alt="" >
                                                <h5 class="fs-3xl">Welcome Back</h5>
                                                <p class="text-muted">Sign in to continue to HumTum Baby.</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                            <form method="POST" action="{{ route(config('app.prefix_url').'master-admin') }}" novalidate>
                @csrf
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                        <div class="position-relative ">
                                                
                                                            <input type="email" data-label = "Email" class="required-field form-control @error('email') is-invalid @enderror input-group-field password-input" name="email" value="{{ old('email') }}" required id="inlineFormInputGroup" placeholder="Enter your email address" autocomplete="email" autofocus>


                                                            @error('email')
                                                                <span class="invalid-feedback error-message" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <span class="error error-message"></span>
                                                    </div>
                            
                                                    <div class="mb-3">
                                                        <div class="float-end">
                                                            <a href="auth-pass-reset.html" class="text-muted">Forgot password?</a>
                                                        </div>
                                                        <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                                       
                                                            <input type="password" data-label = "Password" class="required-field form-control @error('password') is-invalid @enderror input-group-field pe-5 password-input " id="inlineFormInputGroup" placeholder="Enter your password" name="password" required autocomplete="password">


                                                           
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>

                                                            @error('password')
                                                                <span class="invalid-feedback error-message" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <span class="error error-message"></span>
                                                    </div>
                            
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                                    </div>
                            
                                                    <div class="mt-4">
                                                        <button class="btn btn-danger w-100" type="submit" id="submit-login">Sign In</button>
                                                    </div>
                            
                                                </form>
                            
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        @include('sweetalert::alert')

        <!-- JAVASCRIPT -->
        <script src="{{asset('master-assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('master-assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('master-assets/js/plugins.js')}}"></script>
        <script src="{{asset('master-assets/js/pages/password-addon.init.js')}}"></script>
        <!--Swiper slider js-->
        <script src="{{asset('master-assets/libs/swiper/swiper-bundle.min.js')}}"></script>
        <!-- swiper.init js -->
        <script src="{{asset('master-assets/js/pages/swiper.init.js')}}"></script>

    </body>
</html>