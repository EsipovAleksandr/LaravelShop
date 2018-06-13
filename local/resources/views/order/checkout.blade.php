@extends('layouts.login')
@section('content')
<div class="container">

<h2 class="bg-primary" style="text-align:  center;"> Оформление заказа</h2>
    @if (Auth::check())
        <form role="form" action="{{route('checkout')}}" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="name" class="control-label col-sm-2 col-xs-3">Имя</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="name" type="text"  value="{{Auth::user()->name}}" class="form-control" placeholder="Имя"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label col-sm-2 col-xs-3" >Мобильный телефон</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="phone" class="form-control" placeholder="Мобильный телефон"/>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-sm-2 col-xs-3" >E-mail</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="email" type="email" value="{{Auth::user()->email}}" class="form-control" placeholder="E-mail"/>
                </div>
            </div>
            <div class="form-group">
                <label for="City" class="control-label col-sm-2 col-xs-3" >Город</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="City"  class="form-control" placeholder="Город"/>
                </div>
            </div>
            <div class="form-group btn-right">
                <div class="col-sm-offset-2 col-sm-8">
                    <input type="submit" class="btn btn-success  btn-block" value="Отправить " />
                </div>
            </div>
            {{csrf_field()}}
        </form>
        @else
        <h3 class="text-danger">Вы не авторизованы </h3>
        <form role="form" action="{{route('checkout')}}" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="name" class="control-label col-sm-2 col-xs-3">Имя</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="name" type="text"   class="form-control" placeholder="Имя"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label col-sm-2 col-xs-3" >Мобильный телефон</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="phone" class="form-control" placeholder="Мобильный телефон"/>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-sm-2 col-xs-3" >E-mail</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="email" type="email"  class="form-control" placeholder="E-mail"/>
                </div>
            </div>
            <div class="form-group">
                <label for="City" class="control-label col-sm-2 col-xs-3" >Город</label>
                <div class="col-sm-8 col-xs-9">
                    <input name="City"  class="form-control" placeholder="Город"/>
                </div>
            </div>
            <div class="form-group btn-right">
                <div class="col-sm-offset-2 col-sm-8">
                    <input type="submit" class="btn btn-success  btn-block" value="Отправить " />
                </div>
            </div>
            {{csrf_field()}}
        </form>
    @endif
    </div>
@endsection