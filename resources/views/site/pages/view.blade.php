@extends('site.layouts.index')
@section('content')
<div class="container view-main"> 
    
    <div class="col-3 view-main-images"></div> 
<div class="col-9 view-main-info">
<h1 class="view-main-title ">{{ $viewprod->title }}</h1>

<div class="view-main-mini-info">
   <div class="view-main-mini-info-star"><a href>Отзывы:{{ $viewprod->Comments->id }}</a></div> 
   <div class="view-main-mini-info-brand">Бренд: {{ $viewprod->brand }} </div>
   <div class="view-main-mini-info-attr">Код: {{ $viewprod->attr }}</div>
</div>
<div class="view-main-backet">
  
<div class='view-main-backet-old-price'>{{ $viewprod->old_price }} Грн. </div>
<div class='view-main-backet-new-price'> {{ $viewprod->new_price }} Грн.</div>
<div class="view-main-backet-all-count"> 
    <button class="view-main-backet-numbers-count"   v-on:click="counterdown()">-</button>
    <input min="0" class="view-main-backet-numbers" type="number" v-bind:value="counter"   > 
    <button class="view-main-backet-numbers-count"   v-on:click="counterup()">+</button>
  
    </div> 
    <a href="" class="view-main-backet-card">Купить </a>
</div>
</div>
</div>

@endsection