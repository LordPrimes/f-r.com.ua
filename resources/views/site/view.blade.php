@extends('site.layouts.index')
@section('content')
<div class="container view-main"> 
    
    <div class="col-3 view-main-images"></div> 
<div class="col-9 view-main-info">
<h1 class="view-main-title ">{{ $viewprod->title }}</h1>

<div class="view-main-mini-info">
   <div class="view-main-mini-info-star"><a href>Отзывы: 1</a></div> 
   <div class="view-main-mini-info-brand">Бренд: {{ $viewprod->brand }} </div>
   <div class="view-main-mini-info-attr">Код: {{ $viewprod->attr }}</div>
</div>
<div class="view-main-backet">
  
<div class='view-main-backet-old-price'>{{ $viewprod->old_price }} Грн. </div>
<div class='view-main-backet-new-price'> {{ $viewprod->price }} Грн.</div>
<div class="view-main-backet-all-count"> 
    <input class="view-main-backet-numbers" type='text'> 
    <input class="view-main-backet-numbers-count" type='button'>
    <span class="view-main-backet-result-numbers" ></span>
    </div> 

</div>
</div>

</div>

@endsection