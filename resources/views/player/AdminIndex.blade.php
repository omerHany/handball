{{-- عرض اللاعبين --}}

@extends('parant')
@section('title',' عرض اللاعبين')

@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">عرض الاعبين</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>صورة</th>
                            <th>اسم اللاعب</th>
                            <th>رقم الهوية</th>
                            <th>رقم الجوال</th>
                            <th>اسم النادي</th>
                            <th>الاعدادات</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($players as $player)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{ Storage::url($player->image) }}" alt="Product-image" width="60"
                                    style="border-radius: 10px;">
                            </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$player->name}}</strong>
                            </td>
                            <td>{{$player->id_number}}</td>
                            <td>{{$player->phone_number}}</td>
                            <td>{{auth()->user()->name}}</td>
                            <td>
                                <div class="demo-inline-spacing">
                                    <a href="{{route('players.edit',$player->id)}}" class="btn rounded-pill btn-icon btn-outline-primary">
                                      <span class="tf-icons bx bx-edit"></span>
                                    </a>
                                    <a href="#" onclick="confirmDistroy('{{$player->id}}',this)"  class="btn rounded-pill btn-icon btn-outline-secondary">
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
    function performDelete(id,reference){
     axios.delete('/admin/players/'+id)
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