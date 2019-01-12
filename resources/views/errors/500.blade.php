<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('site.includes.head')  
    <title>500-(Internal Server Error, внутренняя ошибка сервера) </title>
</head>
<body>
<nav class='col-12 col-xl-12 col-lg-12 d-flex align-items-center headers-nav'>
    <li><a href="{{route('catalog')}}">Каталог</a></li>
    <li><a href="{{route('about')}}">О нас</a></li>
    <li><a href="{{route('payment')}}">Оплата и доставка</a></li>
    <li><a href="{{route('exchange')}}">Обмен и возрат</a></li>
    <li><a href="{{route('contact')}}">Контактная информация</a></li>     
</nav>
<header class="col-12 col-md-12 col-lg-12 d-flex flex-row justify-content-center  headers">
<div class="col-3 col-xl-3 col-md-4 col-lg-4 d-flex flex-column text-center headers-logo"><a href="{{route('main')}}"><img src="{{asset('img/logo.png')}}" /></a>
    <a href="{{route('contact')}}"class="headers-logo-phone">Адрес и телефон
        <p>Режим работы: 9:00 — 18:00</p>
    </a>
</div>    
<div class="col-3 col-xl-4 col-md-3 col-lg-2 d-flex  align-items-center"  id='headers-search'>
    <div class='headers-search-input'>
        <form action="{{route ('search')}}" method="GET">
            <input name='query' autocomplete="off"    class="search-input"  placeholder="Поиск товара" required > 
            <div class="seach-autocomplete"></div>
        </form>   
    </div>    
</div>
<div class="col-3 col-xl-2 col-md-3 col-lg-3 d-flex flex-column align-self-center align-items-center headers-phone">
    <span>+3 <i>(095)</i> 096-85-11</span>
    <span>+3 <i>(095)</i> 096-85-11</span>
</div>     
      
<div class="col-3 col-xl-2 col-md-1 col-lg-2 d-flex justify-content-center align-items-center headers-login-sign"  data-toggle="cart-basket" title="в корзине 
    @if(Cart::content()->count()  == 1)
    {{ Cart::content()->count() }} товар 
     @elseif (Cart::content()->count()  <= 4  )
     {{ Cart::content()->count() }} товара
     @elseif (Cart::content()->count() >=5  )
     {{ Cart::content()->count() }} товаров
    @endif ">
   
    
    <a class="d-flex align-items-center" href="{{ route('cart.show') }}"><i class="fa fa-shopping-cart  fa-3x" aria-hidden="true"></i>
    @if (Cart::instance('default')->count() > 0)
        <span class="text-center light-green">{{ Cart::content()->count() }}</span>
    @else 
        <span class="text-center light-green">0</span>
    @endif
    </a>
</div>
</header>
<div  class="scrolingtop btn btn-rounded btn-light-green  " >
    <i class="fa fa-arrow-up fa-2x" ></i>
</div>
<main > 
  <div class="erros-404"  style="background-image: url('{{ asset("img/404.jpg") }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-white-light d-flex justify-content-center align-items-center">
   
      <div class="container">
 
        <div class="row">
     
          <div class="col-md-12 white-text text-center">
            <h1 class="display-3 mb-0 pt-md-5 pt-5 white-text font-weight-bold wow fadeInDown" >500
              <a class="light-green-text font-weight-bold">Внутренняя ошибка сервера </a>
            </h1>
            <div class="wow fadeInDown" >
            <a href="{{route('main')}}" class="btn btn-light-green btn-lg">Главная</a>
          <div class="row">
       
            <div class="col-md-12 white-text text-center">
              <h1 class="display-3 mb-0 pt-md-5 pt-5 white-text font-weight-bold wow fadeInDown" >500
                <a class="light-green-text font-weight-bold">Внутренняя ошибка сервера </a>
              </h1>
              <div class="wow fadeInDown" >
              <a href="{{route('main')}}" class="btn btn-light-green btn-lg">Главная</a>
              </div>
            </div>
        
          </div>
    
        </div>
   
      </div>
  
    </div>
  </main>
@include('site.includes.footer') 
@include('site.includes.script') 
</body>
</html>
