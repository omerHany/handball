{{-- عرض الاداريين --}}

@extends('parant')
@section('titel',' الاداريين')

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
                        <th scope="col">رقم الهوية</th>
                        <th scope="col">رقم الجوال</th>
                        <th scope="col">الوظيفة</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">تاريخ الانشاء</th>
                        <th scope="col">تاريخ التعديل</th>
                        <th scope="col">الاعدادات</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($manegar as $maneg )    
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$maneg->name}}</td>
                        <td>{{$maneg->id_number}}</td>
                        <td>{{$maneg->phone_number}}</td>
                        <td>{{$maneg->job}}</td>
                        <td>
                            <img src="{{ Storage::url($maneg->image) }}" alt="Product-image" width="60" style="border-radius: 10px;">
                        </td>
                        <td>{{$maneg->created_at}}</td> 
                        <td>{{$maneg->updated_at}}</td>
                        <td>
                            <div class="m-n1">
                                <a href="{{route('manegars.edit',$maneg->id)}}" class="btn btn-sm btn-sm-square btn-outline-primary m-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" onclick="confirmDistroy('{{$maneg->id}}',this)" class="btn btn-sm btn-sm-square btn-outline-primary m-2">
                                    <i class="fa fa-trash"></i>
                                </a> 
                                {{-- <form method="POST" action="{{route('manegars.destroy',$maneg->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-sm-square btn-outline-primary m-2">
                                        <i class="fa fa-trash"></i></button>
                                </form> --}}
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
        title: 'هل تريد حذف الاداري؟',
        text: "!لا يمكن التراجع عن هذه الخطوة",
        icon: 'warning',
        // CancelButtonText: 'الغاء'
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
