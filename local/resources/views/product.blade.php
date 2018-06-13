
@extends('layouts.insert')
@section('content')
    <link href="/css/product.css" rel="stylesheet">
<div class="container product">
<div class="sulka">

     <a href="/"> <i class="fa fa-home" style="font-size: 130%"></i></a>
    <i class="fa fa-long-arrow-right" aria-hidden="true" style="font-size: 130%"></i>
    @foreach($parent_id as $parent)
        <a href="#" style="color: black;  text-decoration: none; cursor:default"> {{$parent->name}}</a>
        <i class="fa fa-long-arrow-right" style="font-size: 130%"></i>
    @endforeach
            @foreach($category_id as $category)
                <a href="/categories/{{$category->latin_url}}" >{{$category->name}}</a>
            @endforeach
</div>
    @foreach($goo as $good)
        <div class="name">
        <h1 > {{$good->name}}</h1>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6 ">
<div class="image_block">
    <img src="/local/resources/image/shop/mobile/{{$good->Image_url}}" alt="..." class="img-responsive">
</div>
            </div>

                <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6 ">
                <div class="price">
                    Цена {{$good->price}} грн
                </div>
                        <div class="btnkorzina">
                    <a  href="{{route ('goods.addToCartOpen',['id'=>$good->id])}} " class="btn btn-success btn-lg center-block" role="button">Купить</a>
                        </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12 ">
                <div class="description">
                    <h1>Описание</h1>
                    <p>  {{$good->description}}</p>
                </div>
        </div>
        </div>
        <div class="carusel_container">
            <div class="row">
                <div class="large-12 columns ">
                    <div class="owl-carousel owl-theme">
                @foreach($recomdation as $rec)
                    @foreach($rec as $value)
                                <div>
                <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12 ">
                <div  class="col-sm-3  col-md-3 col-xs-12 module_item">
                    <div class="thumbnail">
                        <div class="image">
                            <a href="/goods/{{$good->latin_url}}">
                                <img src="/local/resources/image/shop/mobile/{{$good->Image_url}}" alt="..." class="img-responsive">
                            </a>
                        </div>
                    </div>
                           <div class="priceB"><a href="/public/goods/{{$good->latin_url}}">{{$good->name}}</a></div>
                        <div class="nameB"><h3>Цена : {{$good->price}}грн</h3></div>
                </div>
                <div  class="col-sm-1 col-md-1 col-sm-3  col-xs-12 module_item">
                    <h1 class="plus"><i class="fa fa-plus"></i></h1>
                </div>

                <div  class="col-sm-3 col-md-3 col-xs-12 module_item">
                    <div class="thumbnail">
                        <div class="image">
                            <a href="/goods/{{$value->latin_url}}">
                                <img src="/local/resources/image/shop/mobile/{{$value->Image_url}}" alt="..." class="img-responsive">
                            </a>
                        </div>
                    </div>
                        <div class="priceB"><a href="/public/goods/{{$value->latin_url}}">{{$value->name}}</a></div>
                        <div class=" nameB"><h3>Цена : {{$value->price}} грн</h3></div>
                    </div>

                    <div  class="col-sm-1 col-md-1 col-xs-12 module_item">
                        <h1 class="ravno"></h1>
                    </div>
                    <div  class="col-sm-4 col-md-4  col-xs-12 module_item">

                        <h1 style="font-size: 200% ;text-align: center; margin-top: 100px;"; > {{$value->price+$good->price}} грн</h1>
                        <div class="btnkorzina">

                            <a  href="{{route ('goods.addToCartOpenTo',['id'=>$good->id,'id2'=>$value->id])}} " class="btn btn-success btn-lg center-block" role="button">Купить</a>
                        </div>

                    </div>
                </div>
                        </div>
                                    @endforeach
                                    @endforeach
                                    @endforeach

                    </div>
            </div>
        </div>
        </div>
</div>
@endsection

