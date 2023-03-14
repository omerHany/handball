<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> كرة اليد | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('hand/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('hand/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('hand/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('hand/assets/vendor/css/theme-default.css')}}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('hand/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{asset('hand/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('hand/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{ asset('js/toastr/toastr.min.css') }}">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('hand/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('hand/assets/js/config.js')}}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    @auth

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <br>
                <div style="display: flex; justify-content: center; align-items: center;">
                    <img class="rounded-circle" style="width: 60px; height: 60px;"
                        src="{{asset('hand/assets/img/avatars/hand.jpg')}}" alt="">
                </div>
                <span class="app-brand-text demo menu-text fw-bolder ms-2"> الاتحاد الفلسطيني لكرة اليد </span>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text"> التسجيل </span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-plus"></i>
                            <div data-i18n="Account Settings">تسجيل لاعبين </div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('players.create')}}" class="menu-link">
                                    <div data-i18n="Account">اضافة لاعب</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('players.index')}}" class="menu-link">
                                    <div data-i18n="Notifications">عرض الاعبين</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-plus"></i>
                            <div data-i18n="Authentications">تسجيل الادارين</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('manegars.create')}}" class="menu-link">
                                    <div data-i18n="Basic">اضافة اداري </div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('manegars.index')}}" class="menu-link">
                                    <div data-i18n="Basic">عرض الادارين</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @if (auth()->user()->role == 'admin')

                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">المشرفين</span></li>
                    <!-- Forms -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Form Elements">اضافة خبر </div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('news.create')}}" class="menu-link">
                                    <div data-i18n="Basic Inputs">اضافة خبر</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-bookmark-alt-plus"></i>
                            <div data-i18n="Form Elements">تسجيل الاندية </div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('clubs.create')}}" class="menu-link">
                                    <div data-i18n="Basic Inputs">اضافة الاندية</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="{{route('clubs.index')}}" class="menu-link">
                                    <div data-i18n="Basic Inputs"> عرض الاندية</div>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-face"></i>
                            <div data-i18n="Form Elements"> اللاعبين </div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="forms-basic-inputs.html" class="menu-link">
                                    <div data-i18n="Basic Inputs"> عرض اللاعبين</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @endif
                    <li class="menu-item">

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">الاعدادات</span></li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Form Elements"> الاعدادات </div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('changepass')}}" class="menu-link">
                                    <div data-i18n="Basic Inputs"> تغير كلمة السر</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('logout')}}" class="menu-link">
                                    <div data-i18n="Basic Inputs"> تسجيل الخروج </div>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                                    aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            @auth
                            <h6 class="mb-0" style="color:#455dc8af">{{auth()->user()->name}}</h6>
                            @endauth

                            <!-- User -->
                            <a class="nav-link hide-arrow" href="{{route('dashboard')}}">
                                <div class="avatar avatar-online">
                                    <img src="{{asset('hand/assets/img/avatars/hand.jpg')}}" alt
                                        class="w-px-60 h-60 rounded-circle" />
                                </div>
                            </a>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                @yield('content')
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    @endauth
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('hand/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('hand/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('hand/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('hand/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('hand/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('hand/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('hand/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('hand/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->

    <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/Crud.js') }}"></script>
    <script src="{{ asset('js/sweet.js') }}"></script>
    @yield('script')
</body>

</html>