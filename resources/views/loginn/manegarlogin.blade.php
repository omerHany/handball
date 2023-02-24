{{-- تسجيل اداري --}}


@extends('parant')
@section('titel','تسجيل ادراي')

@section('content')

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4"> بطاقة اداري</h6>
                <form onsubmit="event.preventDefault();performStore()" id="form_create" method="POST" action="{{route('manegars.store')}}">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">اسم الادراي</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_number" class="col-sm-2 col-form-label">رقم الهوية</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="id_number" id="id_number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number" class="col-sm-2 col-form-label">رقم الجوال</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="phone_number" id="phone_number">
                        </div>
                    </div>
                    <label for="job" class="col-sm-2 col-form-label">الوظيفة</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="job" id="job">
                        <option selected>اداري</option>
                        <option>مدرب</option>
                        <option>مساعد مدرب</option>
                        <option>مسعف</option>
                    </select>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

@endsection

@section('script')

<script>
    function performStore(){
     axios.post('/manegars',{
        name: document.getElementById('name').value,
        id_number: document.getElementById('id_number').value,
        phone_number: document.getElementById('phone_number').value,
        job: document.getElementById('job').value,
    })

        .then(function (response) {
            // handle success
            console.log(response);
            Toast.fire({
            icon: "success",
            title: response.data.message,
            });
            document.getElementById('form_create').reset()
        })
        .catch(function (error) {
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