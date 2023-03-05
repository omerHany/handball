{{-- تسجيل الدخول --}}


{{-- @extends('parant') --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>تسجيل الدخول</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('handdd/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('handdd/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('handdd/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('handdd/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('js/Toasts.css') }}">
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">

                            <h2 style="color: rgb(227, 20, 20) ">تسجيل الدخول</h2>
                            <div class="position-relative">
                                <img class="rounded-circle" src="{{ asset('handdd/img/hand.jpg') }}" alt=""
                                    style="width: 100px; height: 80px;">
                                {{-- <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                                </div> --}}
                            </div>
                        </div>
                        <form>
                            <div for="email" class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" placeholder="email">
                                <label for="floatingInput">البريد الالكتروني</label>
                            </div>
                            <div for="password" class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                                <label for="floatingPassword">كلمة السر</label>
                            </div>
                            <div for="remember" class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="exampleCheck1">تذكرني</label>
                                </div>
                                <a href="">نسيت كلمة السر</a>
                            </div>
                            <button type="button" onclick="login()"
                                class="btn btn-primary py-3 w-100 mb-4">الدخول</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('handdd/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('handdd/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('handdd/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('handdd/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('handdd/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('handdd/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('handdd/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('handdd/js/main.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/sweet.js') }}"></script>
    <script src="{{ asset('js/Crud.js') }}"></script>
    <script src="{{ asset('js/Toasts.js') }}"></script>
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
    <script>
        function login(){
            axios.post('{{route('login')}}',{
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                remember: document.getElementById('remember').checked
            })
                .then(function(response) {
                    // handle success
                    window.location.href = '{{route('homee')}}';
                })
            .catch(function(error) {
                // handle error
                // console.log(error.response);
                Toast.fire({
                    icon: "error",
                    title: error.response.data.message,
                });
            })
        }
    </script>

</body>

</html>
