{{-- تسجيل لاعب --}}

@extends('parant')
@section('titel','اضافة نادي')

@section('content')

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-7">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4"> النادي </h6>
                <form onsubmit="event.preventDefault();performStore()" id="form_create" method="POST" action="{{route('clubs.store')}}">
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
                        <label for="name" class="col-sm-2 col-form-label">اسم النادي</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">كلمة السر</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" id="password" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"> &nbsp; حفظ  &nbsp;</button>
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
     axios.post('/admin/clubs',{
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
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

