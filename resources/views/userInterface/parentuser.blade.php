<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>كرة اليد | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('userInter/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userInter/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('userInter/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('userInter/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('hand/assets/vendor/fonts/boxicons.css')}}" />


</head>

<body>
    <!-- Navbar & Carousel Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="d-inline-flex align-items-center" style="height: 100px;">

                <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
                     @if (auth()->check())
                        <div class="demo-inline-spacing" style="color: #ffffff">
                            <a href="{{route('dashboard')}}"
                                class="btn rounded-pill btn-icon btn-outline-primary">
                                <span class="tf-icons bx bx-arrow-back"></span>
                                
                            </a>
                        </div>
                    @endif
                    @if (!auth()->check())
                        <a href="{{ route('loginn') }}" class="nav-item nav-link">
                            <h4 class="m-0" style="color: #ffffff"><i class="fa fa-user-tie me-2"></i> تسجيل الدخول
                            </h4>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars"></span>
                        </button>
                    @endif
                   
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{route('btolatt')}}" class="nav-item nav-link @if (Route::currentRouteName()=='btolatt') active @endif">البطولات</a>
                            <a href="{{route('cupp')}}"class="nav-item nav-link @if (Route::currentRouteName()=='cupp') active @endif" >الاندية</a>
                            <a href="{{route('legann')}}" class="nav-item nav-link @if (Route::currentRouteName()=='legann') active @endif" >لجان الاتحاد</a>
                            <a href="{{route('homee')}}" class="nav-item nav-link @if (Route::currentRouteName()=='homee') active @endif">الرئيسية</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img class="rounded-circle " style="width: 70px; height: 70px;"
                                    src="{{ asset('hand/assets/img/avatars/hand.jpg') }}" alt="">
                            </div>
                        </div>
                        {{-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal"
                            data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> --}}

                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->




    <!-- Blog Start -->
    @yield('userContent')
    <!-- Footer Start -->
    <!-- Footer Start -->


    <div class="container-fluid text-white" style="background: #061429; position: fixed; bottom: 0">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-12 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        &nbsp; &nbsp; &nbsp; <a href="#">0599999999</a>: رقم الجوال &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; <a href="#">handball@gmail.com</a>: البريد الالكتروني
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('userInter/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('userInter/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('userInter/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('userInter/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('userInter/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/sweet.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>



    <!-- Template Javascript -->
    <script src="{{ asset('userInter/js/main.js') }}"></script>

    @yield('scriptuser')
    
</body>

</html>
