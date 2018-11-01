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
                <input   v-model="value" class="search-input"  placeholder="Поиск товара" required >  
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
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a>
      <ul>
        <li><a href="">Our team</a></li>
        <li><a href="">Histor1111111111111111111y</a></li>
      </ul>
    </li>
    <li><a href="#">Clients</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>
</nav>  
 

 
  



    
    @yield('content')
        <footer class="footers"> @include('site.includes.footer')  </footer>
    </body>
</html>
