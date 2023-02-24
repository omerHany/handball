{{-- تسجيل اداري --}}


@extends('parant')
@section('titel','تعديل ادراي')

@section('content')

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4"> بطاقة اداري</h6>
                <form method="POST" action="{{route('manegars.update',$manegar->id)}}">
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
                    <div style="color: rgb(140, 12, 12)"
                        class="alert @if(session('status')) alert-success @else alert-danger @endif alert-dismissible fade show"
                        role="alert">
                        <i
                            class="fa-solid  @if (session('status')) circle-check @else  fa-regular fa-circle-xmark @endif">{{session('message')}}</i>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                    </div>
                    @endif
                    
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">اسم الادراي</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name"
                            @if (old('name')) value="{{old('name')}}" @else value="{{$manegar->name}}" @endif id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_number" class="col-sm-2 col-form-label">رقم الهوية</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="id_number"
                            @if (old('id_number')) value="{{old('id_number')}}" @else value="{{$manegar->id_number}}" @endif id="id_number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number" class="col-sm-2 col-form-label">رقم الجوال</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="phone_number"
                           @if (old('phone_number')) value="{{old('phone_number')}}" @else value="{{$manegar->phone_number}}" @endif id="phone_number">
                        </div>
                    </div>
                    <label for="job" class="col-sm-2 col-form-label">الوظيفة</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="job"
                    @if (old('job')) value="{{old('job')}}" @else value="{{$manegar->job}}" @endif id="job">
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