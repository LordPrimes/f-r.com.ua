<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
          @include('site.includes.head')  
    </head>
    <body>
<nav class='headers-nav'>
<li><a href="{{route('catalog')}}">Каталог</a></li>
<li><a href="{{route('about')}}">О нас</a></li>
<li><a href="{{route('payment')}}">Оплата и доставка</a></li>
<li><a href="{{route('exchange')}}">Обмен и возрат</a></li>
<li><a href="{{route('contact')}}">Контактная информация</a></li>     
 </nav>
  <header class="headers">
  <div class="headers-logo"><a href="{{route('main')}}"><img src="https://family-room.com.ua/image/data/logo/logo.png"   /></a>
                <a href="{{route('contact')}}"class="headers-logo-phone">Адрес и телефон</a>
                <p>Режим работы: 9:00 — 18:00</p>
            </div>
                <div  id='headers-search'>
                <div class='headers-search-input'>
                <form action="{{route ('search')}}" method="GET">
                     <input name='query' autocomplete="off"    class="search-input"  placeholder="Поиск товара" required > 
                <div class="seach-autocomplete">
           
                </div>
                    </form>
                    
                 
            </div>    
              </div>
             <div class="headers-phone">+3 <i>(095)</i> 096-85-11  
                </div>
                <div class="headers-login-sign">
                   <a href="{{ route('cart.show') }}"><i class="fa fa-shopping-cart  fa-3x" aria-hidden="true"></i>
                        @if (Cart::instance('default')->count() > 0)
                       <span class="btn-floating btn-sm light-green">{{ Cart::content()->count() }}</span>
                        @endif
                        </a>
                </div>
                
        </header>











  

 
  



<div  class="scrolingtop btn btn-rounded btn-light-green  " >
    <i class="fa fa-arrow-up fa-2x" ></i>
</div>
<main> @yield('content')</main>

@include('site.includes.footer') 

         @include('site.includes.script') 
          
    
    </body>
</html>
