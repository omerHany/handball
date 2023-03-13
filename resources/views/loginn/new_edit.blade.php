@extends('parant')
@section('titel', 'اضافة خبر')


@section('content')
    &nbsp;&nbsp;&nbsp;

    <br>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-10">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4"> عنوان الخبر</h6>
                    <form onsubmit="event.preventDefault();performStore()" id="news_edit">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">عنوان الخبر</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="title"
                                    value="{{ $news->title }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">الصورة الخبر</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="img[]" id="image"
                                    value="{{ $news->image }}">
                            </div>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary"> &nbsp; حفظ &nbsp;</button> --}}
                        <br>
                        <br>
                        <br>

                        <textarea placeholder="اضف الخبر" id="details">{{ $news->content }}</textarea>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-outline-primary">
                            <h4 style="color: rgb(165, 12, 12)">&nbsp; &nbsp;&nbsp; حفظ &nbsp;&nbsp; &nbsp;</h4>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- <button type="submit" class="btn btn-outline-primary"><h4 style="color: rgb(165, 12, 12)">&nbsp; &nbsp;&nbsp; حفظ &nbsp;&nbsp; &nbsp;</h4></button> --}}

    <br>



    <br>

    <br>
    <br>
    <br>
@endsection


@section('script')


    <script src="https://cdn.tiny.cloud/1/1uha1qjj2lcnpqb9t09i8cja0oexu6fx4wt90z89ii55l9rn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>






    <script>
        tinymce.init({
            selector: '#details',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            }, {
                value: 'Email',
                title: 'Email'
            }, ],
        });
    </script>



    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('title', document.getElementById('title').value);
            if (document.getElementById('image').files.length > 0) {
                formData.append('image', document.getElementById('image').files[0]);
            }
            formData.append('content', tinymce.get('details').getContent());


            axios.post('{{ route('news.update', $news) }}', formData)

                .then(function(response) {
                    // handle success
                    console.log(response);
                    Toast.fire({
                        icon: "success",
                        title: response.data.message,
                    });
                    // document.getElementById('news_edit').reset()
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
