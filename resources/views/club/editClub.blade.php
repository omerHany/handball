{{-- تسجيل لاعب --}}

@extends('parant')
@section('title', 'تعديل النادي')

@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">تعديل النادي</h5>
                    </div>
                    <div class="card-body">
                        <form onsubmit="event.preventDefault();performStore();" id="form">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">اسم
                                    الاداري</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" value="{{$club->name}}" id="name"
                                            placeholder="الاسم" aria-label="الاسم"
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-envelope"></i></span>
                                        <input type="email" id="email" value="{{$club->email}}"
                                            class="form-control" placeholder="email@gmail.comn" aria-label="ACME Inc."
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">كلمة السر</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="bx bx-hash"></i></span>
                                        <input type="password" id="password"
                                            class="form-control phone-mask" placeholder="....."
                                            aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
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

@endsection


@section('script')

<script>
    function performStore() {
            let formData = new FormData();
            // formData.append('club', document.getElementById('club').value);
            formData.append('_method','PUT');
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            
            axios.post('{{route('clubs.update' ,$club)}}',
                    formData
                )

                .then(function(response) {
                    toastr.success(response.data.message);
                    console.log(response);
                    document.getElementById('form').reset();
                })
                .catch(function(error) {
                    toastr.error(error.response.data.message);
                    console.log(error);
                });
            }

        
</script>

@endsection