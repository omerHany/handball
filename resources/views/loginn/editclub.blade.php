{{-- تسجيل لاعب --}}

@extends('parant')
@section('titel','تعديل لاعب')

@section('content')

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-7">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4"> النادي</h6>
                <form method="POST" action="{{route('clubs.update',$club->id)}}">
                    @method('PUT')
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
                         @if (session()->has('message'))
                            <div style="color: rgb(140, 12, 12)" class="alert @if(session('status')) alert-success @else alert-danger @endif alert-dismissible fade show" role="alert">
                                <i class="fa-solid  @if (session('status')) circle-check @else  fa-regular fa-circle-xmark @endif">{{session('message')}}</i>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                            </div>
                        @endif
                        <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">اسم النادي</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" 
                            @if (old('name')) value="{{old('name')}}" @else value="{{$club->name}}" @endif id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gmail" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-6">
                            <input type="gmail" class="form-control" name="gmail" 
                            @if (old('gmail')) value="{{old('gmail')}}" @else value="{{$club->gmail}}" @endif id="gmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">كلمة السر</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" id="password">
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

