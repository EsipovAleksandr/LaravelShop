@extends('Admin.mainAdmin')
@section('content')

    <div class="container">
    <h1 style=text-align:center;margin:7%>Пользователи</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Дата регестрации</th>
                <th>Действие</th>
                <th>Админ</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at->format('F d:h:Y') }}</td>
                    <td>
                        <input type="button" value="Удалить" class="btn btn-danger"  onclick="deleteUser({{$item->id}})" >
                    </td>
                    <td>
                        <input type="checkbox"  name="my-checkbox" id="itemadm_{{$item->id}}"   data-on="success"  @if($item->role=='admin')checked @endif/>
                        <button type="button" style=" width: 100px" class="btn btn-primary  btn-lg" value="Редактировать"  onclick="updateUser({{$item->id}})"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
    <script>
        $('.table tbody tr').each(function(i) {
            var number = i + 1;
            $(this).find('td:first').text(number);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("[name='my-checkbox']").bootstrapSwitch();
        function  deleteUser(Id) {
        $.confirm({
            title: 'Админ!',
            content: 'Удалить Пользователя?',
            typeAnimated: true,
            type: 'red',
            buttons: {
                tryAgain: {
                    text: 'Да',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            async: false,
                            url: "{{route('adminUserDelete')}}",
                            data: {Id: Id},
                        });
                        location.reload();
                    }
                },
                Нет: function () {
                }
            }
        });
        }


        function  updateUser(itemId) {
            var adm=$('#itemadm_'+itemId).is(':checked')?'admin':'user' ;
            var postData ={itemId:itemId,adm:adm};
            $.ajax({
                type:'POST',
                async:false,
                url:"{{route('adminUpdateUser')}}",
                data: postData ,
                success:function () {
                    $.alert({
                        title: 'Админ!',
                        content: 'Пользователи  обновлены!',

                    });
                }
            });
        }


    </script>
@stop