<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> كرة اليد | تسجيل الدخول </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('login/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('login/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('login/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('js/toastr/toastr.min.css') }}">

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img class="rounded-circle" style="width: 60px; height: 60px;"
          src="{{asset('hand/assets/img/avatars/hand.jpg')}}" alt=""><br>
        <a href="{{route('homee')}}" class="h3"><b>الاتحاد الفلسطيني </b>لكرة اليد</a>
      </div>
      <div class="card-body">
        <form onsubmit="event.preventDefault();login();">
          <div class="input-group mb-3">
            <input type="email" class="form-control" id="email" placeholder="Email">
            <div class="input-group-append">

            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" placeholder="Password">
            <div class="input-group-append">

            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
          </div>

          <div class="social-auth-links text-center mt-2 mb-3">
            <button class="btn btn-primary d-grid w-100" type="button" onclick="login()"> تسجيل الدخول
            </button>
          </div>
        </form>


        {{-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{asset('login/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('login/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('login/dist/js/adminlte.min.js')}}"></script>
  

  <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
  <script src="{{ asset('js/axios.js') }}"></script>
  <script src="{{ asset('js/Crud.js') }}"></script>
  <script src="{{ asset('js/sweet.js') }}"></script>

  <script>
    // function login(){
    //     axios.post('{{route('login')}}',{
    //         email: document.getElementById('email').value,
    //         password: document.getElementById('password').value,
    //         remember: document.getElementById('remember').checked
    //     })
    //         .then(function(response) {
    //             // handle success
    //             window.location.href = '{{route('dashboard')}}';
    //         })
    //     .catch(function(error) {
    //         // handle error
    //         // console.log(error.response);
    //         Toast.fire({
    //             icon: "error",
    //             title: error.response.data.message,
    //         });
    //     })
    // }
     function login() {
            let formData = new FormData();
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('remember', document.getElementById('remember').value);
            axios.post('{{route('login')}}',
                    formData
                )

                .then(function(response) {
                    toastr.success(response.data.message);
                    console.log(response);
                    window.location.href = '{{route('dashboard')}}';
                })
                .catch(function(error) {
                    toastr.error(error.response.data.message);
                    console.log(error);
                });

        }
  </script>

</body>

</html>