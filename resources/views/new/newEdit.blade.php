@extends('parant')
@section('title', 'تعديل الخبر')


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
                        <h5 class="mb-0">اضافة خبر</h5>
                    </div>
                    <div class="card-body">
                        <form onsubmit="event.preventDefault();performStore();" id="form">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">عنوان
                                    الخبر</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" value="{{ $news->title }}" id="title" placeholder="الاسم"
                                            aria-label="الاسم" aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="formFileMultiple" class="col-sm-2 form-label"> صورة الخبر </label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="file" id="image" name="img[]" multiple="">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <textarea placeholder="اضف الخبر"id="details">{{ $news->content }}></textarea>
                            <br>



                            <div class="row ">
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
                    toastr.success(response.data.message);
                    console.log(response);
                    document.getElementById('form').reset();
                })
                .catch(function(error) {
                    toastr.error(error.response.data.message);
                    console.log(error);
                });

        }
    </script>

@endsection