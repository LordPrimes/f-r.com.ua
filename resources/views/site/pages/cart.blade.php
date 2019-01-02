@extends('site.layouts.index')
@section('pageTitle')
Оформление заказа - Интернет магазин f-r.com.ua
@endsection
@section('content')
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
                  <input class="form-control z-depth-1" type="tel"  name="phone" />
                  <label>Email:</label>
                  <input class="form-control z-depth-1" type="text" name="email" />
                  <label>Город:</label>
                  <input class="form-control z-depth-1" type="text" name="сity" />
                  <label>Адресс:</label>
                  <textarea class="form-control z-depth-1" type="text" name="adres" ></textarea>

                <div class="text-center">
                  <input class=" btn btn-light-green" type="submit" value="Оформить заказ">
    </div>
    @if ($errors->any())
    <div class="errors-form text-left alert red accent-4 font-weight-bold">
    <ul>
@foreach ($errors->all() as $error)
        <li>
        {{ $error }}
        </li>
@endforeach
        </ul>
    </div>
    <div class="errors text-left alert red accent-4 font-weight-bold">
      <ul>
@foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
@endforeach
    </ul>
    </div>
@endif 
                </form>
 
</div>
@endif
<div class="order-cart d-flex flex-column col-lg-8 ">
@if (Cart::count() > 0 )
<h2 class="h1-responsive  my-5">Количество товаров в корзине:{{Cart::count()}}</h2>
@else 
<h2 class="h1-responsive   my-5">Корзина пуста</h2>
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
    
        <a href="{{url($item->model->seo_title)}}" class="cart-link grey-text">
        <h5>{{ $item->model->name }}</h5>
      </a>
     

        
        <h4 class="font-weight-bold blue-text">
        <strong class="cart-price price-new">Цена:{{$item->price }}</strong>
        </h4>
        <div class="d-flex align-items-center">
            <input class="form-control z-depth-1 updateqty"  value="{{$item->qty}}" name="quantity">
<form action="{{ route('cart.update', $item->rowId) }}" method="POST">
          {{ csrf_field() }}
        
          
          <button type="submit" class="update btn btn-sm btn-rounded btn-light-green">сохранить изменения</button>
          <input class="updatenewqty" type="hidden"  value="{{$item->qty}}" name="quantity">
      </form> 
    
      <form action="{{route('cart.destroy',  $item->rowId)}}" method="POST">
{{ csrf_field() }}
{{ method_field('DELETE')}}
<button class="btn btn-sm btn-rounded btn-light-green" type="submit">Удалить</button>
</form> 
    </div>
  </div>

@endforeach
<h1>{{Cart::subtotal()}}</h1>


</div>
</div>
</div>

@endsection