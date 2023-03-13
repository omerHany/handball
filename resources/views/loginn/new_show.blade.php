@extends('parant')


@section('titel', 'الاخبار')


@section('content')

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4 col-sm-12 col-xl-8">
        <div class="row vh-100 bg-secondary rounded justify-content-center mx-0">
            <div class="col-md- text-center">
                <br>
                <div class="container-fluid pt-3 px-3 col-sm-12 col-xl-12">
                    <div class="bg-dark rounded d-flex justify-content-between p-3">
                        
                            <div>
                                {{-- <img src="{{Storage::url($news->image)}}" class="align-items-center" width="300" height="200"> --}}
                                <h3>{!!$news->content!!}</h3>
                            </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Blank End -->

@endsection



@section('script')
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('content', document.getElementById('details').value);
            axios.post('/الاخبار',
                    formData
                )

                .then(function(response) {
                    // handle success
                    console.log(response);
                    Toast.fire({
                        icon: "success",
                        title: response.data.message,
                    });
                    document.getElementById('form')
                })
                .catch(function(error) {
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
