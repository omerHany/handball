{{-- تسجيل لاعب --}}

@extends('parant')
@section('title', 'اضافة اداري')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">اضافة اداري</h5>
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
                                        <input type="text" class="form-control" id="name"
                                            placeholder="الاسم" aria-label="الاسم"
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">رقم
                                    الهوية</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-id-card"></i></span>
                                        <input type="number" id="id_number" class="form-control"
                                            placeholder="222555888" aria-label="ACME Inc."
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">رقم الجوال</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="bx bx-phone"></i></span>
                                        <input type="number" id="phone_number"
                                            class="form-control phone-mask" placeholder="658 799 8941"
                                            aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="defaultSelect" class="col-sm-2 form-label">الوظيفة</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">

                                <select id="job" class="form-select">
                                  <option>اداري </option>
                                  <option>مدرب</option>
                                  <option>مساعد مدرب</option>
                                  <option>مسعف</option>
                                </select>
                              </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                                <label for="formFileMultiple" class="col-sm-2 form-label">اضافة صوره</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="file" id="image" name="img[]"
                                            multiple="">
                                    </div>
                                </div>
                            </div>



                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">انشاء</button>
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
            formData.append('name', document.getElementById('name').value);
            formData.append('id_number', document.getElementById('id_number').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('job', document.getElementById('job').value);
            if (document.getElementById('image').files.length > 0) {
                formData.append('image', document.getElementById('image').files[0]);
            }

            axios.post('{{route('manegars.store')}}',
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