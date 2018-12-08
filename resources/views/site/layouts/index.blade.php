<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
          @include('site.includes.head')  
    </head>
    <body>
 <section class='headers-nav'>
            <li><a href="">Каталог</a></li>
            <li><a href="">О нас</a></li>
            <li><a href="">Оплата и доставка</a></li>
            <li><a href="">Обмен и возрат</a></li>
            <li><a href="">Контактная информация</a></li>     
</section>
  <header class="headers">
            <div class="headers-logo"><img src="https://family-room.com.ua/image/data/logo/logo.png"   />
                <a href="" class="headers-logo-phone">Адрес и телефон</a>
                <p>Режим работы: 9:00 — 18:00</p>
            </div>
                <div  id='headers-search'>
                <div class='headers-search-input'>
                <form action="{{route ('search')}}" method="GET">
                     <input name='query'    class="search-input"  placeholder="Поиск товара" required > </form>
                 
                 
            </div>    
              </div>
             <div class="headers-phone">+3 <i>(095)</i> 096-85-11  
                </div>
                <div class="headers-login-sign">
                    <a href="" class="login">Вход</a>
                    <a href="" class="sign">Регистрация</a>
                </div>
        </header>
         <nav class="navbar-main">
  <ul class="navbar-main-link">
    <li class="navbar-main-link-list"><a href="#">Home</a></li>
    <li class="navbar-main-link-list"><a href="#">About</a>
      <ul class="navbar-main-link-sub-list">
        <li><a href="">Our team</a></li>
        <li><a href="">Histor1111111111111111111y</a></li>
      </ul>
    </li>
    <li class="navbar-main-link-list"><a href="#">Clients</a></li>
    <li class="navbar-main-link-list"><a href="#">Contact Us</a></li>
  </ul>
</nav>   
 

 
  



    
    @yield('content')
        <footer class="footer">     
    <div class="footer-info">
      <div><img src='/img/cartgreen.png' /><span>Доставка по всей Украине</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Поддержка 7 дней в неделю</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Оптала наличными при получении</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Гарантия качества</span> </div>
</div>

    <div class="footer--style">
    <div class="footer-link ">
    <div> <a href="" >Ламинат1</a> </div>
    <div> <a href="" >Ламинат2</a> </div>
    <div> <a href="" >Ламинат3</a> </div>
    <div> <a href="" >Ламинат4</a> </div>
    <div> <a href="" >Ламинат5</a> </div>
    <div> <a href="" >Ламинат6</a> </div>
      </div>
        <strong class=" footer-f-r">f-r.com.ua</strong>
      
      
    </div>
  
 
         @include('site.includes.footer') 
          </footer>
    </body>
</html>
