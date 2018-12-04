@extends('site.layouts.index')
@section('content')
<article>
<div class="container">
<div class="view-main"> 
    <div class="col-3 view-main-images">
        </div> 
    <div class="col-9 view-main-info">
        <h1 class="view-main-title ">{{ $viewprod->title }}</h1>
    <div class="view-main-mini-info">
        <div class="view-main-mini-info-star">
            <a href>Отзывы:</a>
        </div> 
    <div class="view-main-mini-info-brand">Бренд: {{ $viewprod->brand }}   
        </div>
    <div class="view-main-mini-info-attr">Код: {{ $viewprod->attr }}
        </div>
    </div>
        <div class="view-main-backet">  
            <div class='view-main-backet-old-price'>{{ $viewprod->old_price }} Грн.
                </div>
            <div class='view-main-backet-new-price'> {{ $viewprod->new_price }} Грн.
                </div>
            <div class="view-main-backet-all-count" id='app'> 
                <button class="view-main-backet-numbers-count"   v-on:click="counterdown()">-</button>
                <input  class="view-main-backet-numbers"  type="text" v-bind:value="counter" disabled  > 
                <button class="view-main-backet-numbers-count"   v-on:click="counterup()">+</button>
            </div> 
        <a href="" class="view-main-backet-card">Купить </a>
        </div>
        <div class="view-main-delivery">
            <p>По Киеву доставка под парадное</p>
            <p>По Киеву самовывоз с нашего склада</p>
            <p>По Украине доставка курьерской службой</p>
        </div>
    </div>
 
</div>
<div class="view-main-description-info">
    {!! $viewprod->description !!}
        </div>
 <div class="view-main-comments">
 <div class="login-page">
  <div class="form">

    <form method="POST"  class="login-form">
    {{ csrf_field() }}
      <label>Ваше имя:</label>
      <input type="text" name="login" />
      <label>Достоинства:</label>
      <input type="text" name="reach"/>
      <label>Недостатки:</label>
      <input type="text" name="limitations"/>
      <label>Комментарий:</label>
      <input type="text" name="comment"/>
      <input name="id" type="hidden" value="{{$viewprod->id}}" >
      <input type="submit" value="Оставить отзыв">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      @if(session()->has('goods'))
{{ session()->get('goods')}}
  @endif
    </form>
  </div>
</div>
</div>

</div>
</article>
@endsection