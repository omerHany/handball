{{-- الرئيسية --}}

@extends('parant')
@section('titel', 'الرئيسية')


@section('content')

<div class="container-fluid pt-4 px-4 col-sm-12 col-xl-10">

    <div class="row vh-100 bg-secondary rounded  justify-content-center mx-0">
        <div class="col-md-6 text-center">


            <div class="container-fluid pt-1 px-1">
                <div class="row g-4">
                    <div class="col-sm-20 col-xl-16">
                        <div class="bg-dark rounded d-flex p-4">
                            <h4 class="text-primary"> &nbsp; الاتحاد الفلسطيني لكرة اليد </h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid pt-4 px-4 ">
                {{-- <div class="row g-4">
                    @foreach ($data as $new)

                    <div class="col-sm-12 col-xl-12" id="div_{{$new->id}}">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-3">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>

                            <div class="ms-2">
                                <a href="{{ route('showw', $new->id) }}">
                                    <img src="{{ Storage::url($new->image) }}" alt="news-image" width="100" height="90"
                                        style="border-radius: 10px;">
                                </a>
                                <a href="{{ route('showw', $new->id) }}">{{ $new->title }}</a>
                            </div>

                            @auth
                            @if (auth()->user()->role == 'admin')
                            <div class="m-n1">
                                <a href="{{route('news.edit',$new->id)}}"
                                    class="btn btn-sm btn-sm-square btn-outline-primary m-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="confirmDistroy('{{ $new->id }}',this)"
                                    class="btn btn-sm btn-sm-square btn-outline-primary m-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                            @endif
                            @endauth

                        </div>
                    </div>
                    @endforeach
                    {{ $data->links() }}
                </div> --}}

            </div>


        </div>
    </div>

</div>
{{-- {{ $data->links() }} --}}

@endsection

@section('script')

<script>
    function confirmDistroy(id, reference){
        Swal.fire({
        title: 'هل تريد حذف الخبر؟',
        text: "!لا يمكن التراجع عن هذه الخطوة",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#d33',
        confirmButtonText: 'حذف',
        cancelButtonText: 'الغاء'
        }).then((result) => {
        if (result.isConfirmed) {
            performDelete(id, reference)
        }
        });
    }
    function performDelete(id,reference){
     axios.delete('/admin/news/'+id)
        .then(function (response) { 
            // handle success
            console.log(response);
            showMessage(response.data); 
            document.getElementById('div_'+id).remove();
        })
        .catch(function (error) {
            // handle error
            console.log(error);
            showMessage(error.response.data);   
        })
        
    }
    function showMessage(data){
        Swal.fire({
        icon: data.icon,
        title: data.title,
        showConfirmButton: false,
        timer: 1500
        })
    }
</script>

{{--  <script>
    // function performStore() {
    //         let formData = new FormData();
    //         formData.append('_method', 'PUT');
    //         formData.append('title', document.getElementById('title').value);
    //         if (document.getElementById('image').files.length > 0) {
    //             formData.append('image', document.getElementById('image').files[0]);
    //         }
    //         formData.append('content', tinymce.get('details').getContent());


    //         axios.post('{{route('news.update', $new)}}', formData)

    //             .then(function(response) {
    //                 // handle success
    //                 console.log(response);
    //                 Toast.fire({
    //                     icon: "success",
    //                     title: response.data.message,
    //                 });
    //                 // document.getElementById('news_edit').reset()
    //             })
    //             .catch(function(error) {
    //                 // handle error
    //                 console.log(error);
    //                 Toast.fire({
    //                     icon: "error",
    //                     title: error.response.data.message,
    //                 });
    //             })

    //     }
</script>  --}}
@endsection