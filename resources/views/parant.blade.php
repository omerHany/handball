<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('titel','handball')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('handdd/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('handdd/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('handdd/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('handdd/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('handdd/css/style.css')}}" rel="stylesheet">
    @yield('style')

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
      
<!-- Spinner Start -->
<div id="spinner"
    class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
        <!-- Sidebar Start -->
        @auth        
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                {{-- <a href="index.html" class="navbar-brand mx-4 mb-3"> --}}
                    <h4 class="text-primary"> &nbsp; الاتحاد الفلسطيني لكرة اليد </h4>
                {{-- </a> --}}
                   
               <br> <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('handdd/img/hand.jpg')}}" alt="" style="width: 50px; height: 50px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        @auth
                             <h6 class="mb-0" style="color:rgb(212, 22, 22)">{{auth()->user()->name}}</h6>
                        @endauth
                        <span>كرة اليد</span>
                    </div>
                </div>
               <div class="col-md-6 text-center">
               <h5 style="right" >   التسجيل  </h5>
            </div>
                {{-- <div class="navbar-nav w-100">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>التسجيل</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{route('loginn')}}" class="dropdown-item"><i class="fas fa-sign-in-alt"></i> &nbsp; تسجيل الدخول</a>
                    </div>
                </div>
                </div> --}}
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-sign-in-alt"></i>  &nbsp; تسجيل لاعبين</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('players.create')}}" class="dropdown-item"><i class="fas fa-plus-circle"></i> &nbsp; اضافة لاعب</a>
                            <a href="{{route('players.index')}}" class="dropdown-item"><i class="fas fa-list-ul"></i> &nbsp; عرض اللاعبين</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-sign-in-alt"></i>  &nbsp; تسجيل
                            اداريين</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('manegars.create')}}" class="dropdown-item"><i class="fas fa-plus-circle"></i>  &nbsp; اضافة اداري</a>
                            <a href="{{route('manegars.index')}}" class="dropdown-item"><i class="fas fa-list-ul"></i> &nbsp; عرض الاداريين</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-cogs"></i> &nbsp;  الاعدادات</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('changepass')}}" class="dropdown-item"><i class="fas fa-unlock-alt"></i>  &nbsp; تغير كلمة السر</a>
                            <a href="{{route('logout')}}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> &nbsp; تسجيل الخروج</a>
                        </div>
                    </div>
                </div>
                
                
                
                @if (auth()->user()->role == 'admin')

            <div class="col-md-6 text-center">
                <br>
                <h5 style="right"> Admin </h5>
            </div>
            <div class="navbar-nav w-100">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="far fa-file-alt me-2"></i>اضافة خبر</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{route('news.create')}}" class="dropdown-item"><i class="fas fa-plus-circle"></i> &nbsp; اضافة خبر</a>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-sign-in-alt"></i>  &nbsp; تسجيل الاندية</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('clubs.create')}}" class="dropdown-item"><i class="fas fa-plus-circle"></i> &nbsp; اضافة
                                نادي </a>
                            <a href="{{route('clubs.index')}}" class="dropdown-item"><i class="fas fa-list-ul"></i> &nbsp; عرض
                                الاندية</a>
                        </div>
                    </div>
                </div> 
                 <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-list"></i>  &nbsp; الصفحات الرئيسية</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('form_edit.index')}}" class="dropdown-item"><i class="fas fa-edit"></i> &nbsp; تعديل الصفحات  </a>
                        </div>
                    </div>
                </div> 
            </div>
            @endif
                {{-- <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    
                </div> --}}
            </nav>
        </div>
        @endauth
        <!-- Sidebar End -->
 
        <!-- Content Start -->

        <div class="content @if(!auth()->check()) open @endif" >

            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="بحث">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('aboutt')}}"> من نحن</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('legann')}}">لجان الاتحاد </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cupp')}}">الاندية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('btolatt')}}">البطولات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('homee')}}">الرئيسية</a>
                            </li>
                        </ul>
                    
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

@yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="{{route('homee')}}">الاتحاد الفلسطيني لكرة اليد</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                          <a href="#">handball@gmail.com</a>: البريد الالكتروني
                            <br> 
                            
                          <a href="#">0599999999</a>: رقم الجوال                           

                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('handdd/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('handdd/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('handdd/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('handdd/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('handdd/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('handdd/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('handdd/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('handdd/js/main.js')}}"></script>
    <script src="{{asset('js/axios.js')}}"></script>
    <script src="{{asset('js/sweet.js')}}"></script>
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>

    @yield('script')
</body>

</html>