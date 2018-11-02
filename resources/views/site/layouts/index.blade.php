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
         <nav class="row justify-content-around navbar-main">
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
        <footer class="footers">


   
 
  <div> 
     
    <div class="footer-info">
      <div><img src='/img/cartgreen.png' /><span>Доставка по всей Украине</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Поддержка 7 дней в неделю</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Оптала наличными при получении</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Гарантия качества</span> </div>
</div>
</div>
 
 
  
  
    <div class="footer--style">
    <a href="" ></a>
      <v-flex
       
        lighten-2
        py-3
        text-xs-center
        white--text
        xs12
      >
        <strong class="footer-f-r">f-r.com.ua</strong>
      </v-flex>
    </v-layout>

 
         @include('site.includes.footer')  </footer>
    </body>
</html>
