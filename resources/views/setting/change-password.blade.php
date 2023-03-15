{{-- تسجيل لاعب --}}

@extends('parant')
@section('titel', 'تغيير كلمة السر')

@section('content')

    <!-- Blank Start -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">تغير كلمة السر</h5>
                    </div>
                    <div class="card-body">
                        <form onsubmit="event.preventDefault();performStore();" id="form">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname"> كلمة السر القديمة </label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-hash"></i></span>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="كلمة السر القديمة " aria-label=""
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company"> كلمة السر الجديدة</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-hash"></i></span>
                                        <input type="password" id="new_password" class="form-control"
                                            placeholder="كلمة السر الجديدة" aria-label=""
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">تاكيد كلمة السر </label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="bx bx-hash"></i></span>
                                        <input type="password" id="new_password_confirmation"
                                            class="form-control phone-mask" placeholder="تاكيد كلمة السر"
                                            aria-label="" aria-describedby="basic-icon-default-phone2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" onclick="updatepassword()" class="btn btn-primary">انشاء</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>




{{-- 
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-7">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4"> تغيير كلمة السر</h6>
                    <form onsubmit="event.preventDefault();performStore()" id="form_create">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">كلمة السر الحالية</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_password" class="col-sm-2 col-form-label">كلمة السر الجديدة</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="new_password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_password_confirmation" class="col-sm-2 col-form-label">تأكيد كلمة السر
                                الجديدة</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="new_password_confirmation" min="0">
                            </div>
                        </div>

                        <button type="button" onclick="updatepassword()" class="btn btn-primary"> &nbsp; حفظ
                            &nbsp;</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Blank End -->

@endsection


@section('script')

    <script>
        function updatepassword() {
            axios.put('{{ route('updatepass') }}', {
                    password: document.getElementById('password').value,
                    new_password: document.getElementById('new_password').value,
                    new_password_confirmation: document.getElementById('new_password_confirmation').value,
                })

                .then(function(response) {
                    toastr.success(response.data.message);
                    console.log(response);
                    document.getElementById('form');
                })
                .catch(function(error) {
                    toastr.error(error.response.data.message);
                    console.log(error);
                });

        }
    </script>

@endsection
