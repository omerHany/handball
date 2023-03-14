{{-- عرض اللاعبين --}}

@extends('parant')
@section('title',' عرض الادارين')

@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">عرض الادارين</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>صورة</th>
                            <th>اسم اللاعب</th>
                            <th>رقم الهوية</th>
                            <th>رقم الجوال</th>
                            <th>الوظيفة</th>
                            <th>الاعدادات</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($manegars as $manegar)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{ Storage::url($manegar->image) }}" alt="Product-image" width="60"
                                    style="border-radius: 10px;">
                            </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{$manegar->name}}</strong>
                            </td>
                            <td>{{$manegar->id_number}}</td>
                            <td>{{$manegar->phone_number}}</td>
                            <td>{{$manegar->job}}</td>

                            <td>
                                <div class="demo-inline-spacing">
                                    <a href="{{route('manegars.edit',$manegar->id)}}"
                                        class="btn rounded-pill btn-icon btn-outline-primary">
                                        <span class="tf-icons bx bx-edit"></span>
                                    </a>
                                    <a href="#" onclick="confirmDistroy('{{$manegar->id}}',this)"
                                        class="btn rounded-pill btn-icon btn-outline-secondary">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ Responsive Table -->
<!-- / Content -->



@endsection

@section('script')

<script>
    function confirmDistroy(id, reference){
        Swal.fire({
        title: 'هل تريد حذف الاداري؟',
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
     axios.delete('/admin/manegars/'+id)
        .then(function (response) {
            // handle success
            console.log(response);
            showMessage(response.data); 
            reference.closest('tr').remove();
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

@endsection