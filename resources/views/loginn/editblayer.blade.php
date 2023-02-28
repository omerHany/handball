{{-- تسجيل لاعب --}}

@extends('parant')
@section('titel', 'تعديل لاعب')

@section('content')

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-7">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4"> بطاقة اللاعب</h6>
                    <form onsubmit="event.preventDefault();performStore()" id="form_update">
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
                        @if (session()->has('message'))
                            <div style="color: rgb(140, 12, 12)"
                                class="alert @if (session('status')) alert-success @else alert-danger @endif alert-dismissible fade show"
                                role="alert">
                                <i
                                    class="fa-solid  @if (session('status')) circle-check @else  fa-regular fa-circle-xmark @endif">{{ session('message') }}</i>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">اسم اللاعب</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{{ $player->name }}"
                                    id="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="id_number" class="col-sm-2 col-form-label">رقم الهوية</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="id_number" value="{{ $player->id_number }}"
                                    id="id_number" min="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_number" class="col-sm-2 col-form-label">رقم الجوال</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="phone_number"
                                    value="{{ $player->phone_number }}" id="phone_number" min="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image" value="{{ $player->image }}"
                                    id="image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"> &nbsp; حفظ &nbsp;</button>
                    </form>
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
            formData.append('_method', 'PUT');
            formData.append('name', document.getElementById('name').value);
            formData.append('id_number', document.getElementById('id_number').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            if (document.getElementById('image').files.length > 0) {
                formData.append('image', document.getElementById('image').files[0]);
            }
            axios.post('{{route('players.update', $player)}}', formData)
            //     .then(function(response) {
            //         console.log(response);
            //         Toast.success(response.data.message);
            //         document.getElementById('form_update').reset();
            //     })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    Toast.fire({
                        icon: "success",
                        title: response.data.message,
                    });
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
