@extends('parant')
@section('titel', 'اضافة خبر')


@section('content')
    &nbsp;&nbsp;&nbsp;

    <br>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0"></h5>
                        </div>
                        <div class="card-body">
                            <form onsubmit="event.preventDefault();performStore();" id="form">
                                <h6 class="mb-4"> صفحة لجان الاتحاد </h6>

                                <textarea placeholder="اضف الخبر" id="details_1">{{$form->firstWhere( 'id', 1 )->content}} </textarea>
                                <br>
                                <br>
                                <h6 class="mb-4"> صفحة الاندية </h6>

                                <textarea placeholder="اضف الخبر" id="details_2">{{$form->firstWhere( 'id', 2 )->content}}</textarea>
                                <br>
                                <br>
                                <h6 class="mb-4"> صفحة البطولات </h6>

                                <textarea placeholder="اضف الخبر" id="details_3">{{$form->firstWhere( 'id', 3 )->content}}</textarea>
                                <br>
                                <br>

                                <div class=" justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <br>
    {{-- <button type="submit" class="btn btn-outline-primary">
    <h4 style="color: rgb(165, 12, 12)">&nbsp; &nbsp;&nbsp; حفظ &nbsp;&nbsp; &nbsp;</h4>
</button> --}}

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
            selector: '#details_1',
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
        tinymce.init({
            selector: '#details_2',
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
        tinymce.init({
            selector: '#details_3',
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
            
            formData.append('content_1', tinymce.get("details_1").getContent());
            formData.append('content_2', tinymce.get("details_2").getContent());
            formData.append('content_3', tinymce.get("details_3").getContent());


            axios.post('{{route('editForms')}}',formData)
                .then(function(response) {
                    toastr.success(response.data.message);
                    console.log(response);
                })
                .catch(function(error) {
                    toastr.error(error.response.data.message);
                    console.log(error);
                });

        }
    </script>

@endsection
