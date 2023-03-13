@extends('parant')
@section('titel', 'تعديل لاعب')

@section('content')



    <br>
    <br>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded align-items-center h-100 p-4">

                    <form onsubmit="event.preventDefault();performStore()" id="form_create">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- <button type="submit" class="btn btn-primary"> &nbsp; حفظ &nbsp;</button> --}}
                        <br>
                        <br>
                        <br>
                        <h6 class="mb-4"> صفحة الاندية </h6>

                        <textarea placeholder="اضف الخبر" id="details"></textarea>
                        <br>
                        <br>
                        <h6 class="mb-4"> صفحة البطولات </h6>

                        <textarea placeholder="اضف الخبر" id="details"></textarea>
                        <br>
                        <br>
                        <h6 class="mb-4"> صفحة لجان الاتحاد </h6>

                        <textarea placeholder="اضف الخبر" id="details"></textarea>
                        <br>
                        <br>
                        <h6 class="mb-4"> صفحة من نحن </h6>

                        <textarea placeholder="اضف الخبر" id="details"></textarea>
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







@endsection

@section('script')

    <script src="https://cdn.tiny.cloud/1/1uha1qjj2lcnpqb9t09i8cja0oexu6fx4wt90z89ii55l9rn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

@endsection
