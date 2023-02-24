@extends('parant')
@section('titel','اضافة خبر')


@section('content')

<br>
<br>
<br>
<br>
<br><br>


 
<br>
<button type="submit" class="btn btn-outline-primary"><h4 style="color: rgb(165, 12, 12)">&nbsp; &nbsp;&nbsp; حفظ &nbsp;&nbsp; &nbsp;</h4></button>
<br>
<br>
<br>
<br><br><br><br>
<html>

<head>
    <script src="https://cdn.tiny.cloud/1/1uha1qjj2lcnpqb9t09i8cja0oexu6fx4wt90z89ii55l9rn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <textarea placeholder="اضف الخبر">
    
  </textarea>
    <script>
        
        tinymce.init({
            selector: 'textarea',
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

</body>

</html>
<br>
<button type="submit" class="btn btn-outline-primary">
    <h4 style="color: rgb(165, 12, 12)">&nbsp; &nbsp;&nbsp; حفظ &nbsp;&nbsp; &nbsp;</h4>
</button>
<br>
<br>
<br>
@endsection