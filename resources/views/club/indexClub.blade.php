{{-- عرض اللاعبين --}}

@extends('parant')
@section('title',' عرض الاندية')

@section('content')


<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">عرض الاندية</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>اسم النادي</th>
                            <th>البريد الالكتروني</th>
                            <th>الاعدادات</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($clubs as $key => $club)
                        @if ($key > 0)
                        <tr>

                            <td>{{$loop->iteration - 1}}</td>
                            <td>{{$club->name}}</td>
                                <td>{{$club->email}}</td>

                            <td>
                                <div class="demo-inline-spacing">
                                    <a href="{{route('clubs.show',$club->id)}}"
                                        class="btn rounded-pill btn-icon btn-outline-primary">
                                        <span  class="bx bxs-right-arrow-circle"></span>
                                    </a>  
                                    <a href="{{route('clubs.edit',$club->id)}}"
                                        class="btn rounded-pill btn-icon btn-outline-primary">
                                        <span class="tf-icons bx bx-edit"></span>
                                    </a>
                                    <a href="#" onclick="confirmDistroy('{{$club->id}}',this)"
                                        class="btn rounded-pill btn-icon btn-outline-secondary">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endif
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
        title: 'هل تريد حذف النادي؟',
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
     axios.delete('/admin/clubs/'+id)
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