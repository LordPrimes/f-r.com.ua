@extends('site.layouts.index')
@section ('blogall')
<div>
    <li>
    <img src="{{ asset ('../img/cars.png') }}" />
    <span>Доставка по Украине</span>
    </li>
    <li>
    <img src="{{ asset ('../img/phone.png') }}" />
    <span> Поддержка 7 дней в неделю</span>

    </li>
    <li>
    <img src="{{ asset ('../img/Warranty-Icon.png') }}" />
    <span> Гарантия качества</span>

    </li>
    
</div>  
<i class="main-benefits-recommended">РЕКОМЕНДУЕМЫЕ ТОВАРЫ</i>
<div class="main-benefits-recommended-info">
    
        <a href="">
            <img src="{{ asset('../img/111.jpg')}}" />
            <li>11111 </li>
            <li>22222 </li>
            <p>Ламинат Tarkett Woodstock  </p>
        </a>
     <a href="">
            <img src="{{ asset('../img/111.jpg')}}" />
            <li>11111 </li>
            <li>22222 </li>
            <p>Ламинат Tarkett Woodstock 2 </p>
        </a>
     <a href="">
            <img src="{{ asset('../img/111.jpg')}}" />
            <li>11111 </li>
            <li>22222 </li>
            <p>Ламинат Tarkett Woodstock 3 </p>
        </a>
     <a href="">
            <img src="{{ asset('../img/111.jpg')}}" />
            <li>11111 </li>
            <li>22222 </li>
            <p>Ламинат Tarkett Woodstock 4 </p>
        </a>
     <a href="">
            <img src="{{ asset('../img/111.jpg')}}" />
            <li>11111 </li>
            <li>22222 </li>
            <p>Ламинат Tarkett Woodstock 5 </p>
        </a>
    </div>
@endsection