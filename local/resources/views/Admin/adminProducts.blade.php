@extends('Admin.mainAdmin')
@section('content')
<div  style="padding-top: 5%">
<table  class="table" style="margin:0 ">
    <thead>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>URL</th>
    </tr>
    </thead>
        <tbody>
        <tr>
            <td>
                <input type="edit" id="itemName" class="form-control" />
            </td>
            <td>
                <input type="edit" id="itemPrice" class="form-control" />
            </td>

            <td>
                <select id="category" class="form-control">
                  @foreach($category as $mainitem)
                    <option value="{{$mainitem->id}}" > {{$mainitem->name}}</option>
                @endforeach
                </select>
            </td>
            <td>
                <textarea id="itemDescription" cols="50" rows="1" class="form-control" ></textarea>
            </td>
            <td>
                <input  type="edit" id="itemURL" class="form-control" />
            </td>
        </tr>

        </tbody>
</table>
    <div style="padding-right: 40%;padding-left: 40%" >
        <input type="button"  class="btn btn-success btn-block "  onclick="addProduct()" value="Добавить" />
    </div>
</div>
<h1 style="margin: 5%;text-align: center ">Продукты</h1>
<table class="table table-bordered " id="tablProduct">
    <thead>
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>URL</th>
        <th>Изображение</th>
        <th>Хит</th>
        <th colspan="2" style="text-align: center">Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($product as $item)
    <tr>
        <td>
        </td>

        <td>{{$item->id}}</td>
        <td>
            <input type="edit" id="itemName_{{$item->id}}" value="{{$item->name}}" class="form-control" />
        </td>
        <td>
            <input type="edit" id="itemPrice_{{$item->id}}"  value="{{$item->price}}" class="form-control" />
        </td>
    <td>
        <select id="category_{{$item->id}}" class="form-control">
            @foreach($category as $mainitem)
                <option value="{{$mainitem->id}}"   @if ($item->category_id==$mainitem->id)selected @endif>  {{$mainitem->name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <textarea id="itemDescription_{{$item->id}}"   cols="50" rows="5"  class="form-control" >{{$item->description}}</textarea>
    </td>
    <td>
        <input  type="edit" id="itemURL_{{$item->id}}" value="{{$item->latin_url}}" class="form-control" />
    </td>
    <td>
        @if($item->Image_url)
            <img   src="/local/resources/image/shop/mobile/{{$item->Image_url}}" width="100" id="itemImage" />
        @endif
        <form action="{{route('adminProductUpload')}}" method="post" enctype="multipart/form-data">
            <input type="file"  name="filename"><br>
            <input type="hidden" name="itemId" value="{{$item->id}}">
            <input type="hidden" name="itemName" value="{{$item->name}}">
            <input type="submit" class="btn btn-success " value="Загрузить"><br>
            {{csrf_field()}}
        </form>
    </td>
        <td>
            <input type="checkbox"  name="my-checkbox" id="itemHit_{{$item->id}}"  data-on="success"  @if($item->hit=='1')checked   @endif/>
        </td>
        <td>
            <button type="button" style=" width: 100px" class="btn btn-primary  btn-lg" value="Редактировать"  onclick="updateProduct({{$item->id}})"><i class="fa fa-pencil" aria-hidden="true"></i></button>
        </td>
        <td>
            <button style="  width: 100px" type="button"  class="btn btn-danger btn-lg"  onclick="deleteProduct({{$item->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </td>
    </tr>
        @endforeach
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script>
    $("[name='my-checkbox']").bootstrapSwitch();
    $('#tablProduct tbody tr').each(function(i) {
        var number = i + 1;
        $(this).find('td:first').text(number);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function addProduct() {
        var  name= $('#itemName').val();
        var price = $('#itemPrice').val();
        var category = $('#category').val();
        var Description = $('#itemDescription').val();
        var URL = $('#itemURL').val();
        var postData ={name:name,category:category,Description:Description,URL:URL,price:price};
        $.ajax({
            type:'POST',
            async:false,
            url:"{{route('adminAddProducts')}}",
            data: postData ,
            success:function () {
                $.alert({
                    title: 'Админ!',
                    content: 'Продукт добавлен!',

                });
                $('#itemName').val('');
                $('#itemPrice').val('');
                $('#itemDescription').val('');
                $('#itemURL').val('');
               function func() {
                   location.reload();
               }
                setTimeout(func, 1000);
            },
            error: function(){
                $.alert({
                    title: 'Админ!',
                    content: 'не все поля заполнены !',
                });
            }
        });

    }
    function  updateProduct(itemId) {
        var newName=$('#itemName_'+itemId).val();
        var newPrice=$('#itemPrice_'+itemId).val();
        var newCategory=$('#category_'+itemId).val();
        var newDescription=$('#itemDescription_'+itemId).val();
        var newURL=$('#itemURL_'+itemId).val();
        var hit=$('#itemHit_'+itemId).is(':checked')?1:0 ;
        var postData ={itemId:itemId,Name:newName,Price:newPrice,Category:newCategory,Description:newDescription,URL:newURL,hit:hit};
        $.ajax({
            type:'POST',
            async:false,
            url:"{{route('adminUpdateProduct')}}",
            data: postData ,
            success:function () {
                $.alert({
                    title: 'Админ!',
                    content: 'Продукт  обновлен!',

                });
            }
        });
    }

    function  deleteProduct(Id) {
        $.confirm({
            title: 'Админ!',
            content: 'Удалить Продукт?',
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
                            url: "{{route('adminProductDelete')}}",
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