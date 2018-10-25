<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
          @include('site.includes.head')  
    </head>
    <body>
        <section class='headers-nav'>
            <li><a href="">что-то</a></li>
            <li><a href="">что-то</a></li>
            <li><a href="">что-то</a></li>
            <li><a href="">что-то</a></li>
            <li><a href="">что-то</a></li>
            <li><a href="">что-то</a></li>
            <li><a href="">что-то</a></li>
            
            
        </section>
        <header class="headers">
            
            <div class="headers-logo">ТУТ ЛОГ
                <a href="" class="headers-logo-phone">Адрес и телефон</a>
                <p>Режим работы: 9:00 — 18:00</p>
            </div>
            <form action="{{ route('search')}}" method="get" id='headers-search'>
               
                <div class='headers-search-input'>
                    <input name="find" type="text" autocomplete="off"    class="search-input"  placeholder="Поиск товара">
                    
                </div>
                <div class='headers-submit'>
                    <input type="submit" value="Найти" class="submit-input">  
                    
                </div>
               
            </form>
             <div class="headers-viber-telegram">
                 <p class="viber"><i> что-то  </i> </p>
                   
                </div>
             <div class="headers-phone">+3 <i>(095)</i> 096-85-11 
                 <a href="" class="headers-card">
                     <p>12</p>
                     <i class="headers-cardsinfo">корзина</i>
                 </a>
                 
                </div>
                <div class="headers-login-sign">
                    <a href="" class="login">Вход</a>
                    <a href="" class="sign">Регистрация</a>
                 
                </div>
               
       
        </header>
         <nav class="nav-menu">
         
             
        </nav>
        <div class="main">
            @yield('main')
           
        </div>
        <div class="main-benefits">
            @yield ('blogall')
        </div>
        <div id='app'> </div>
        <footer class="footers"> @include('site.includes.footer')  </footer>
    </body>
</html>
