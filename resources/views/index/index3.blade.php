{{-- عرض اللاعبين --}}

@extends('parant')
@section('titel',' الاندية')

@section('content')
<br>
<br>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Responsive Table</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">الرقم</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">البريد الالكتروني</th>
                                {{-- <th scope="col">كلمة السر</th> --}}
                                <th scope="col">تاريخ الانشاء</th>
                                <th scope="col">تاريخ التعديل</th>
                                <th scope="col"> الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($club as $clb )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$clb->name}}</td>
                                <td>{{$clb->gmail}}</td>
                                {{-- <td>{{$clb->password}}</td> --}}
                                <td>{{$clb->created_at}}</td>
                                <td>{{$clb->updated_at}}</td>
                                <td>
                                    <div class="m-n1">
                                        <a href="{{route('clubs.edit',$clb->id)}}"
                                            class="btn btn-sm btn-sm-square btn-outline-primary m-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" onclick="confirmDistroy('{{$clb->id}}',this)"
                                            class="btn btn-sm btn-sm-square btn-outline-primary m-2">
                                            <i class="fas fa-trash"></i>
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
</div>

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
     axios.delete('/clubs/'+id)
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