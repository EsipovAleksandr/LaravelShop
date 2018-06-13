@extends('Admin.mainAdmin')
@section('content')
        <form  style="padding:7%" role="form" action="{{route('admin.addCategory')}}" method="post" class="form-horizontal">
            <div class="form-group">
                <label  class="col-md-4 control-label">Новая категория:</label>
                <div class="col-md-6">
                    <input  type="text" class="form-control" required name="CategoryName" />
                </div>
            </div>
            <div class="form-group">
                <label  class="col-md-6 control-label">Подкатегория :</label>
                <div class="col-md-4">
                    <select name="Parent_id" class="form-control">
                        <option value="0">Главная Категория
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8">
                    <input type="submit" class="btn btn-success pull-right btn-lg " value="Добавить " />
                </div>
            </div>
            {{csrf_field()}}
        </form>
    <table class="table" name="CategoriesNum">
        <thead>
        <tr>
            <th>№</th>
            <th>Id</th>
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Действие</th>
        </tr>
        </thead>
        @foreach($getcategory as $item)
        <tbody>
        <tr>
            <td>

            </td>

            <td>{{$item->id}}</td>
            <td>
                <input type="edit" id="itemName_{{$item->id}}" class="form-control" value="{{$item->name}}"/>
            <td>
                <select id="parentid_{{$item->id}}" class="form-control">
                    <option value="0">Главная категория</option>
                    @foreach($category as $mainitem)
                        <option value="{{$mainitem->id}}" @if ($item->parent_id==$mainitem->id)selected @endif>  {{$mainitem->name}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="button" class="btn btn-primary" value="Редактировать"  onclick="updateCat({{$item->id}})">
            </td>
        <td>
            <input type="button" value="Удалить" class="btn btn-danger"  onclick="deleteCat({{$item->id}})" >
        </td>
        </tr>
        </tbody>

        @endforeach
    </table>
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
    function updateCat(itemId) {
        var parentId=$('#parentid_'+itemId).val();
        var newName=$('#itemName_'+itemId).val();
        var postData ={itemId:itemId,parentId:parentId,newName:newName};
        $.ajax({
        type:'POST',
        async:false,
        url:"{{route('adminUpdate')}}",
        data: postData ,
        success:function () {
            $.alert({
                title: 'Админ!',
                content: 'Категория обновлена!',

            });
        }
    });
    }
    function  deleteCat(Id) {
        $.confirm({
            title: 'Админ!',
            content: 'Удалить Категорию?',
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
                            url: "{{route('adminCategoreDelete')}}",
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
    </script>

@stop
