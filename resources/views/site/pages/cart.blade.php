@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<div class="container">
  <div class="row">
@if (Cart::count() > 0 )
  <div class="cart-order d-flex flex-column  col-lg-4 ">
    <h2 class="text-center">Информация:</h2>      
  <form method="POST" action="{{route('orders')}}"  >
    {{ csrf_field() }}
    <label>Имя:</label>
    <input class="form-control z-depth-1" type="text" name="name" />
    <label>Телефон:</label>
    <input class="form-control z-depth-1" type="text"  name="phone" />
    <label>Email:</label>
    <input class="form-control z-depth-1" type="text" name="email" />
    <label>Адресс:</label>
    <textarea class="form-control z-depth-1" type="text" name="adres" >
    </textarea>
    <div class="text-center">
      <input class=" btn btn-light-green" type="submit" value="Оформить заказ">
    </div>
@if ($errors->any())
  <div class="errors-form text-left alert red accent-4 font-weight-bold">
  <ul>
@foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
@endforeach
  </ul>
  </div>
<div class="errors text-left alert red accent-4 font-weight-bold">
  <ul>
@foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
@endforeach
  </ul>
</div>
@endif 
@if(session()->has('goods'))
<div class="sussec d-flex alert justify-content-center  light-green example hoverable">
    {{ session()->get('goods')}}
</div>
@endif
  </form>
</div>
@endif
<div class="order-cart d-flex flex-column @if (Cart::count() > 0 ) col-lg-8 @else col-lg-12 @endif ">
@if (Cart::count() > 0 )
<h2 class="h1-responsive my-5">Количество товаров в корзине:{{Cart::content()->count()}}</h2>
@else 
<h2 class="h1-responsive text-center my-5">Корзина пуста</h2>
@endif
@if (session()->has('success_message'))
<div class="d-flex alert alert-success">
  {{ session()->get('success_message') }}
</div>
@endif 
@foreach (Cart::content() as $item)
  <div class="order-cart-body d-flex flex-row card align-items-center">
  <div class="cart-view view overlay">
      <img src="/storage/app/public/{{$item->model->images}}" class="img-fluid"
      alt="{{$item->model->alt_images}}" title="{{$item->model->title_images}}">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
        <a href="{{url($item->model->seo_title)}}" class="cart-link text-left grey-text">
        <h5>{{ $item->model->name }}</h5>
      </a>
        <h4 class="font-weight-bold blue-text">
        <strong class="cart-price">Цена:{{$item->price }}</strong>
        </h4>
<div class="cart-form text-center">
  <input class="form-control z-depth-1 updateqty " data-toggle="cart-input" title="Укажите количество товара"  value="{{$item->qty}}" name="quantity">
  <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
          {{ csrf_field() }}
          <button type="submit" class="update btn btn btn-rounded btn-light-green">сохранить изменения</button>
          <input class="updatenewqty" type="hidden"  value="{{$item->qty}}" name="quantity">
  </form> 
  <form action="{{route('cart.destroy',  $item->rowId)}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE')}}
<button class="btn btn btn-rounded btn-light-green" type="submit">Удалить</button>
</form> 
    </div>
</div>
@endforeach
@if (Cart::count() > 0 )
<h2 class="text-center">Итого:{{Cart::subtotal()}} ГРН</h2>
@endif
</div>
</div>
</div>
@endsection