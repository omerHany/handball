<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
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

</head>

<body>
    <!-- Navbar & Carousel Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="d-inline-flex align-items-center" style="height: 100px;">

                <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
                    <a href="{{ route('loginn') }}" class="nav-item nav-link">
                        <h4 class="m-0" style="color: #ffffff"><i class="fa fa-user-tie me-2"></i> تسجيل الدخول </h4>
                    </a>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img class="rounded-circle" style="width: 70px; height: 70px;"
                                    src="{{ asset('hand/assets/img/avatars/hand.jpg') }}" alt="">
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="contact.html"class="nav-item nav-link">البطولات</a>
                            <a href="service.html"class="nav-item nav-link">الاندية</a>
                            <a href="about.html" class="nav-item nav-link">لجان الاتحاد</a>
                            <a href="index.html" class="nav-item nav-link active">الرئيسية</a>
                        </div>
                        <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal"
                            data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>

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
