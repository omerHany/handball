@extends('userInterface.parentuser')
@section('title', 'الرئيسية')
@section('style')
<style>
.pt-5 {
padding-top: 1rem !important;
}
.px-5 {
padding-right: 1rem !important;
padding-left: 1rem !important;
}
.pb-4 {
padding-bottom: 1rem !important;
}
.py-5 {
padding-top: 1rem !important;}
</style>
@endsection
@section('userContent')

<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-56">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-primary text-uppercase">الاتحاد الفلسطيني لكرة اليد</h2>
            <h1 class="mb-0">أخبار كرة اليد </h1>
        </div>
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
       
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            @foreach ($data->sortByDesc('id')->take(4) as $new)
            <div class="testimonial-item bg-light my-2">
                <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    <img class="img-fluid rounded" src="{{ Storage::url($new->image) }}" style="width: 400px; height: 200px;">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    @foreach ($data->sortByDesc('id') as $new)

                    <div class="col-lg-4 wow slideInUp" id="div_{{ $new->id }} data-wow-delay=" 0.3s">
                        <a href="{{ route('showw', $new->id) }}">
                            <div class="team-item bg-light rounded overflow-hidden">

                                <div class="team-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ Storage::url($new->image) }}" alt=""
                                        style="border-radius: 20px; width: 300px ; height: 400px">
                                </div>
                                <div class="text-center py-4">
                                    <h4 class="text-primary">{{ $new->title }}</h4>
                                </div>
                                @auth
                                @if (auth()->user()->role == 'admin')
                                <div class="demo-inline-spacing">
                                    <a href="{{ route('news.edit', $new->id) }}" class="btn rounded-pill btn-icon btn-outline-primary">
                                        <span class="tf-icons bx bx-edit"></span>
                                    </a>
                                    <a href="#" onclick="confirmDistroy('{{ $new->id }}',this)" class="btn rounded-pill btn-icon btn-outline-secondary">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </a>
                                </div>
                                @endif
                                @endauth
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

@section('scriptuser')
<script>
    function confirmDistroy(id, reference) {
            Swal.fire({
                title: 'هل تريد حذف اللاعب؟',
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

        function performDelete(id, reference) {
            axios.delete('/admin/news/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    showMessage(response.data);
                    document.getElementById('div_' + id).remove();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showMessage(error.response.data);
                })

        }

        function showMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                showConfirmButton: false,
                timer: 1500
            })
        }
</script>
@endsection