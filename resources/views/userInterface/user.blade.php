@extends('userInterface.parentuser')
@section('title', 'الاخبار')
@section('userContent')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-56">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-primary text-uppercase">الاتحاد الفلسطيني لكرة اليد</h2>
                <h1 class="mb-0">أخبار كرة اليد </h1>
            </div>
            <div class="row g-5">
                @foreach ($data as $new)
                    <div class="col-lg-4 wow slideInUp" id="div_{{ $new->id }}">
                        <div class="blog-item bg-light rounded overflow-hidden">

                            <div class="blog-img position-relative overflow-hidden">
                                <a href="{{ route('showw', $new->id) }}">
                                    <img src="{{ Storage::url($new->image) }}" alt="news-image" width="100"
                                        height="90" style="border-radius: 10px;">
                                </a>
                                &nbsp;&nbsp;
                                <a href="{{ route('showw', $new->id) }}">{{ $new->title }}</a>
                                <br>
                                <br>
                                @auth
                                    @if (auth()->user()->role == 'admin')
                                        <div class="demo-inline-spacing">
                                            <a href="{{ route('news.edit', $new->id) }}"
                                                class="btn rounded-pill btn-icon btn-outline-primary">
                                                <span class="tf-icons bx bx-edit"></span>
                                            </a>
                                            <a href="#" onclick="confirmDistroy('{{ $new->id }}',this)"
                                                class="btn rounded-pill btn-icon btn-outline-secondary">
                                                <span class="tf-icons bx bx-trash"></span>
                                            </a>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
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
