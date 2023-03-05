{{-- تسجيل لاعب --}}

@extends('parant')
@section('titel', 'تغيير كلمة السر')

@section('content')

    <!-- Blank Start -->
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
    </div>
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
                    // handle success
                    // console.log(response);   
                    Toast.fire({
                        icon: "success",
                        title: response.data.message,
                    });
                    document.getElementById('form_create').reset()
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    Toast.fire({
                        icon: "error",
                        title: error.response.data.message,
                    });
                })

        }
    </script>

@endsection
