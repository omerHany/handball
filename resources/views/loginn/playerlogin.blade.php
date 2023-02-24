{{-- تسجيل لاعب --}}

@extends('parant')
@section('titel','اضافة لاعب')

@section('content')

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-7">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4"> بطاقة اللاعب</h6>
                <form method="POST" action="{{route('players.store')}}">
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
                        <label for="name" class="col-sm-2 col-form-label">اسم اللاعب</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_number" class="col-sm-2 col-form-label">رقم الهوية</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="id_number" id="id_number" min="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number" class="col-sm-2 col-form-label">رقم الجوال</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="phone_number" id="phone_number" min="0">
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


{{-- @section('script')

<script>
    
    function performStore(){
     axios.post('/players',{name: document.getElementById('name','id_number','phone_number').value})

        .then(function (response) {
            // handle success
            console.log(response);
            toaster.success(response.data.message);
        })
        .catch(function (error) {
            // handle error
            console.log(error);  
            toaster.error(error.response.data.message);
        }) 
        
    }
    
</script>

@endsection --}}

