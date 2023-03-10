{{-- الرئيسية --}}

@extends('parant')
@section('titel', 'الرئيسية')


@section('content')

    <div class="container-fluid pt-4 px-4 col-sm-12 col-xl-10">

    <div class="row vh-100 bg-secondary rounded  justify-content-center mx-0">
    <div class="col-md-6 text-center">

    <div class="container-fluid pt-3 px-3 ">
        <div class="row g-4">
            @foreach ($data as $new)
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                        {{-- <i class="fa fa-chart-line fa-3x text-primary"></i> --}}
                        <div class="ms-3">
                            <a href="{{route('showw',$new->id)}}">
                                <img src="{{ Storage::url($new->image) }}" alt="news-image" width="100" height="90"
                                    style="border-radius: 10px;">
                            </a>
                            <a href="{{route('showw',$new->id)}}">{{ $new->title }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
    {{ $data->links() }}
        </div>
    </div>


    </div>
        </div>
        
    </div>
    {{-- {{ $data->links() }} --}}

@endsection
