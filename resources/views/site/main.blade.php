@extends('site.layouts.index')
@section ('main')
<div class="catalog" >
    <span>Категории</span>
       <a href=""><li> что-то 11</li></a>
       <a href=""><li> что-то 2</li></a>
       <a href=""><li> что-то 3</li></a>
       <a href=""><li> что-то 4</li></a>
       <a href=""><li> что-то 5</li></a>
       <a href=""><li> что-то 6</li></a>
       <a href=""><li> что-то 7</li></a>
       <a href=""><li> что-то 8</li></a>
       <a href=""><li> что-то 9</li></a>
       <a href=""><li> что-то 1</li></a>
                               
     
       
                                                                        
</div>

<div class="slider-slick">
    <img src="{{ asset ('../img/1.jpg') }}">
    <img src="{{ asset ('../img/2.jpg') }}">
    <img src="{{ asset ('../img/3.jpeg') }}">
      
  </div>

<div class="info-blog">
 <span>Акции</span>
 <div>
     
   <a href=""><img  src="{{ asset('../img/111.jpg')}}" />Ламинат 1</a>
   <p class="info-blog-price-old">Цена:12000грн </p>
   <p class="info-blog-price-new">Цена cо скидкой:10000грн </p>
 </div>
  <div>
     
   <a href=""><img  src="{{ asset('../img/111.jpg')}}" />Ламинат 1</a>
   <p class="info-blog-price-old">Цена:12000грн </p>
   <p class="info-blog-price-new">Цена cо скидкой:10000грн </p>
 </div>
</div>


@endsection