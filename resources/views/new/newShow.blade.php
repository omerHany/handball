<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
        <title>كرة اليد | الاخبار</title>

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
                        <a href="{{route('homee')}}" class="btn rounded-pill btn-icon btn-outline-primary">
                            <span class="tf-icons bx bx-arrow-back"></span>
                        </a>
                    </div>
                    @endif
                    @if (!auth()->check())
                    <div class="demo-inline-spacing" style="color: #ffffff">
                        <a href="{{route('homee')}}" class="btn rounded-pill btn-icon btn-outline-primary">
                            <span class="tf-icons bx bx-arrow-back"></span>
                        </a>
                    </div>
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
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-56">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-primary text-uppercase">الاتحاد الفلسطيني لكرة اليد</h2>
                <h1 class="mb-0">أخبار كرة اليد </h1>
            </div>
            <div>
                {{-- <img src="{{Storage::url($news->image)}}" class="align-items-center" width="300" height="200"> --}}
                <h3>{!! $news->content !!}</h3>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <!-- Footer Start -->

<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-6 footer-about">
                <div
                    class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                    <img class="rounded-circle " style="width: 100px; height: 100px;"
                        src="{{ asset('hand/assets/img/avatars/hand.jpg') }}" alt="">
                    <a class="navbar-brand">
                        <br>
                        <h1 class="m-0 text-white">الاتحاد الفلسطيني لكرة اليد</h1>
                    </a>
                    <p class="mt-3 mb-4">تأسس الاتحاد الفسطيني لكرة اليد في عام 1980 </p>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">التواصل</h3>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Gaza</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">handball@gmail.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">0592196569</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">الوصول السريع</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="{{route('homee')}}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>الرئيسية</a>
                            <a class="text-light mb-2" href="{{route('legann')}}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>لجان الاتحاد</a>
                            <a class="text-light mb-2" href="{{route('cupp')}}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>الاندية</a>
                            <a class="text-light mb-2" href="{{route('btolatt')}}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>البطولات</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-white" style="background: #061429;">
    <div class="container text-center">
        <div class="row justify-content-end">
            <div class="col-lg-8 col-md-6">
                <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                    <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Omar Hany AboZaid</a>. All
                        Rights
                        Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed by
                    </p>

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

    <!-- Template Javascript -->
    <script src="{{ asset('userInter/js/main.js') }}"></script>
    <script>
        function confirmDistroy(id, reference) {
            Swal.fire({
                title: 'هل تريد حذف الخبر؟',
                text: "!لا يمكن التراجع عن هذه الخطوة",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#d33',
                confirmButtonText: 'حذف',
                cancelButtonText: 'الغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    performDelete(id, reference)
                }
            });
        }

        function performDelete(id, reference) {
            axios.delete('/admin/news/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    showMessage(response.data);
                    document.getElementById('div_' + id).remove();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showMessage(error.response.data);
                })

        }

        function showMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
</body>

</html>
