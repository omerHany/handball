{{-- الاندية --}}

@extends('userInterface.parentuser')
@section('title', 'الاندية')

@section('userContent')

    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-56">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-primary text-uppercase">الاتحاد الفلسطيني لكرة اليد</h2>
                <h1 class="mb-0">الاندية </h1>
            </div>
            <div class="row g-5">
                {!!$forms->content!!}
            </div>
        </div>
    </div>

@endsection
