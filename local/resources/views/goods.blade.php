@extends('layouts.insert')
@section('content')
    <link href="/css/goods.css" rel="stylesheet">
    <div id="goods">
    @foreach($goo as $good)
                <div  class="col-sm-6 col-md-4 module_item">
                    <div class="thumbnail">
                        <div class="image">
                            <a href="/goods/{{$good->latin_url}}">
                        <img src="/local/resources/image/shop/mobile/{{$good->Image_url}}" alt="..." class="img-responsive">
                            </a>
                        </div>
                        <div class="caption">
                            <a href="/public/goods/{{$good->latin_url}}">{{$good->name}}</a>
                            <p class="description"></p>
                            <div class="clearfix">
                                <div class="pull-left price">Цена {{$good->price}}</div>
                                <a  href="{{route ('goods.addToCart',['id'=>$good->id])}}"  class="btn btn-success pull-right" role="button">добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                </div>

    @endforeach
        </div>
    @endsection
