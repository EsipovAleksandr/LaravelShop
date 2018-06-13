@extends('Admin.mainAdmin')
@section('content')
    <h1 style="text-align: center;margin: 5%">Заказы</h1>
    <div class="container">
    <table class=" table " >
        <thead>
        <tr>
            <th>№</th>
            <th>Номер заказа </th>
            <th class="infoUser">Данные клиента</th>
            <th>Дата</th>
            <th>Количество товаров</th>
            <th>Сумма</th>
            <th colspan="2" >Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($order as $item)
            <tr>
                <td></td>
                <td>{{ $item->id }}</td>
                <td class="infoUser">{{ $item->customer_name }}<br>{{$item->phone}}<br>{{$item->city}}<br>{{$item->email}}</td>
                <td>{{ $item->created_at->format('F d:h:Y') }}</td>
                <td>{{ $item->qty}}<br><br><input type="button" class="btn btn-success " onclick="ShowOrder({{$item->id}})" value="Посмотреть  товары">
                    @if(isset($product))
                @foreach($product as $i)
                    {{$i->name}}
                    @endforeach
                        @endif
                </td>
                <td>{{ $item->sum}}</td>
                <td>
                    <input type="button" value="Удалить" class="btn btn-danger"  onclick="deleteOrder({{$item->id}})" >
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <style type="text/css">
        th ,td{
            text-align: center;
        }
        .infoUser{
            text-align:left;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
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
        function  deleteOrder(Id) {
            $.confirm({
                title: 'Админ!',
                content: 'Удалить Заказ?',
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
                                url: "{{route('adminOrderDelete')}}",
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

        function Fun(data) {
            var str = data.replace(/b/g," , ");
                $.dialog({
                title: 'Товары',
                content:str
            });

        }

        function  ShowOrder(id) {
            $.ajax({
                type: 'POST',
                async: false,
                url: "{{route('adminOrderProduct')}}",
                data: {Id:id},
                success:Fun
            });

        }
    </script>
    @stop