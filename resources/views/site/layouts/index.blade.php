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
                <input   event-name="results" v-model="value"
                :list="prod"
                :keys="['title']" class="search-input" :defaultAll="false"   :distance="200"  placeholder="Поиск товара" required >  
            </div>    
              </div>
             <div class="headers-phone">+3 <i>(095)</i> 096-85-11 
                 <div class="card">
      <div  class="numbers-cards">
      <span slot="badge" >12</span>
      <v-icon
        large
        color="grey lighten-1"
      >
         shopping_cart
      </v-icon>
    </div>
  </div>  
                </div>
                <div class="headers-login-sign">
                    <a href="" class="login">Вход</a>
                    <a href="" class="sign">Регистрация</a>
                </div>
        </header>
   <div row class="navbar-main"  >
      <div  >
        <div class="ggg"  >
          <div text class="navbar">3</div>
        </div>
        
      </div>
      <div  >
        <div class="ggg"  >
          <div class="navbar" >3</div>
        </div>
      </div>
      <div  >
        <div class="ggg"  >
          <div class="navbar" >3</div>
        </div>
</div>
      <div >
        <v-card class="gggg"  >
          <div class="navbar" >3</div>
        </div>
      </div>  
    </div>


    
    @yield('content')
        <footer class="footers"> @include('site.includes.footer')  </footer>
    </body>
</html>
