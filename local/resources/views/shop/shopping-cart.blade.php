@extends('layouts.login')
@section('content')
    <link href="/css/shop-cart.css" rel="stylesheet">
    @if(Session::has('cart'))
        @foreach($products as $product)
        <div class="container blocproduckt">
            <div class="closed">
                <a href="{{route('delete',['id'=>$product['item']->id])}}">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="image">
                        <img src="/local/resources/image/shop/mobile/{{$product['item']['Image_url']}}" alt="..." class="img-responsive">
                    </div>
        </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                        <h3><strong>{{$product['item']['name']}}</strong></h3>
            </div>
            <div class="col-lg-2  col-sm-2 col-md-2 col-xs-6">
                <h5>Цена за единицу товара </h5>
                <h1 class="laben  laben-danger">{{$product['item']['price']}} грн</h1>
                <h5>Всего</h5>
                <h1 class="laben  laben-danger">{{$product['sum']}} грн</h1>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="quantity">
                    <p>Количество</p>
                    <div>
                    <a href="{{route ('cart.getQuantityDelet',['id'=>$product['item']->id])}}">
                        <i class="fa fa-chevron-circle-left"></i>
                    </a>
                    </div>
                    <b>  {{$product['qty']}}</b>
                    <div>
                    <a href="{{route ('cart.getQuantityAdd',['id'=>$product['item']->id])}}">
                        <i class="fa fa-arrow-circle-right "></i>
                    </a>
                    </div>
                </div>
        </div>
        </div>
        </div>
        @endforeach
        <div class="container">
        <div class="row">
            <div class="totalPrice">
                <p >Всего:{{$totalPrice}} грн</p>
            </div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="half-cont">
                    <a href="{{route('deleteAll')}}" type="button" class="btn btn-danger ">  Очистить корзину</a>
                    <a href="{{route('checkout')}}" type="button" class="btn btn-success ">
                        Оформить покупку</a>
                </div>
            </div>
        </div>
        @else
        <div class="container cart-empty">
            <div class="row">
              <h2 style="text-align:  center;">Корзина пустая</h2>
            </div>
        </div>
        </div>
        @endif
  @endsection


