@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<div class="d-flex justify-content-center flex-row">
  <div class="d-flex flex-row">
     <div class="main-category text-center">
        <div class="main-category-link">
          <a class="btn btn-rounded btn-light-green" href="{{route('catalog')}}">Каталог</a>
        </div>
          <div class=" main-category-list text-center">
            @foreach ($categor as $item)
            @if($item->subcategory->count() > 0)
          <a href="{{route('shop.category',$item->slug)}}">{{$item->name}}</a>
            @endif
            @endforeach
          </div>
      </div>
    </div>
@if ($Slider !== null)
<div class="carousel-main" >
 @foreach ($Slider as $item)
<div class="carousel-main-img card card-image mb-3" style="background-image: url('/storage/app/public/{{$item->images}}');">
  <section class="text-white text-center  d-flex align-items-center flex-column justify-content-center img-gradient-overlay py-5 px-4">
            <h3 class="card-title pt-2"><strong>{{ $item->title }}</strong></h3>
            <p>{{$item->text }}</p>
            <a href="{{$item->link}}" class="btn btn-light-green waves-effect waves-light">Подробние</a> 
  </section>
</div>
 @endforeach
</div>
 @endif
</div>
@if ($categor !== null)
<div class="d-flex flex-row align-items-center main-category-img">
    @foreach ($categorybar as $item)
    @if($item->subcategory->count() > 0)
<a href="{{route('shop.category',$item->slug)}}"   class="main-category-img-link text-center ">
  <div class="col-md-3 view overlay zoom">
    <img class="img-fluid" src="/storage/app/public/{{$item->img}}" > 
  <a href="{{route('shop.category',$item->slug)}}" ><div class="mask rgba-white-slight"></div></a>
  </div>
</a>
@endif
@endforeach
@endif
</div>
@isset ($youviewed)
<h2 class="font-weight-bold my-5">Вы смотрели:</h2> 
<div class="d-flex justify-content-center animated fadeIn">
@foreach ($youviewed as $item)
<div class="blog-popular col-xl-4">
<div class="card align-items-center">
    <div class="view overlay">
      <img src="/storage/app/public/{{$item->images}}" class="img-fluid"
      alt="{{$item->alt_images}}" title="{{$item->title_images}}">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
    <section class="blog-popular-body card-body text-center">
      <a href="{{url($item->seo_title)}}" class="grey-text">
      <h5>{{ $item->name }}</h5>
      </a>
      <h4 class="font-weight-bold blue-text">
      <a class="btn btn-rounded btn-light-green" href="{{$item->seo_title}}">Подробние</a>
      </h4>
    </section>
  </div>
</div>
@endforeach
</div> 
@endisset
<h2 class="h1-responsive font-weight-bold text-center my-5">ЛИДЕРЫ ПРОДАЖ</h2>
@if ($action !== null)
<div class="col-md-12 blog-action-main">
   <div class="d-flex  flex-row">
    @foreach ($action as $item)
          <div class="col-6 col-md-3 col-xl-3 action-blog card align-items-center">
            <div class="view overlay">
              <img src="/storage/app/public/{{$item->actions->images}}" class="img-fluid"
              alt="{{$item->actions->alt_images}}" title="{{$item->actions->title_images}}">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <section class="action-body card-body text-center">
              <a href="{{url($item->actions->seo_title)}}" class="grey-text">
              <h5>{{ $item->actions->name }}</h5>
              </a>
              <h4 class="font-weight-bold blue-text">
              <strong ><p>Старая цена:</p>{{$item->actions->price }}</strong>
              <strong class="text-danger"><p>Новая цена:</p>{{$item->new_price }}</strong>
              <form action="{{route('cart.addcart')}}" method="POST"> 
                  {{ csrf_field() }}
                <input type="hidden" name='id' value="{{$item->actions->id }}">
                <input type="hidden" name='name' value="{{$item->actions->name }}">
                <input type="hidden" name='price' value="{{$item->actions->price }}">
                <input type="hidden" name='qty' value="{{$item->actions->qty}}">
                   <button class="btn  btn-rounded btn-light-green" type="submit" >Купить</button>
                  </form>
              </h4>
            </section>
          </div>
     @endforeach  
    </div>
<div class="d-flex justify-content-center">
    <a class="btn btn-rounded btn-light-green" href="{{route('leaders')}}" >Посмотреть все приложения</a>
      </div>
    </div> 
@endif
@if ($recommend !== null)
<h2 class="h1-responsive font-weight-bold text-center my-5">Популярные товары:</h2>
<div class="container-recommend">
  <div class="d-flex flex-row carousel-recommend">
  @foreach ($recommend as $item) 
  <div class="col-md-12 recommend-blog-main">
    <div class="card card-cascade wider card-ecommerce">
      <div class="view view-cascade overlay">
        <figure>
        <img src="/storage/app/public/{{$item->images}}" class="img-fluid" alt="{{$item->alt_images}}" title="{{$item->title_images}}"> 
        <a><div class="mask rgba-white-slight"></div></a>
        </figure>
      </div>
          <section class="recommend-body card-body card-body-cascade text-center">
            <a href="{{$item->seo_title}}" class="text-muted"><h5>{{$item->name}}</h5></a>
            <p class="card-text">{{ str_limit($item->mini_description,  50)}}</p>
          <div class="d-flex justify-content-between align-items-center ">
            <strong>{{ $item->price }} ГРН </strong> 
            <form action="{{route('cart.addcart')}}" method="POST"> 
            {{ csrf_field() }}
            <input type="hidden" name='id' value="{{$item->id }}">
            <input type="hidden" name='name' value="{{$item->name }}">
            <input type="hidden" name='price' value="{{$item->price }}">
            <input type="hidden" name='qty' value="{{$item->qty}}">  
            <button class="btn  btn-rounded btn-light-green" type="submit" >Купить</button>
            </form>
          </div>
           </section>
            </div>
          </div>
               @endforeach   
        </div>
  <div class="d-flex justify-content-center align-items-center ">
  <a class="btn btn-rounded btn-light-green" href="{{route('popular')}}">Посмотреть все приложения</a>
    </div>
</div>
@endif
      <h2 class="h1-responsive font-weight-bold text-center my-5">НОВОСТИ ИЗ БЛОГА</h2>
       <div class="col-12 blog-main d-flex flex-row">
         <div class="carousel-recommend">
         @foreach ($blog as $item)
      <div class="col-12 blog-popular-main">
          <figure  class="view overlay rounded z-depth-2 mb-4">
              <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
          </figure >
              <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
              <p><time>{{ $item->created_at->format('d/m/Y')}}</time></p>
              <p class=" dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 70) }}</p>
              <a href="{{url('blog/'.$item->seo_url)}}" class="d-flex justify-content-center align-items-center btn btn-light-green btn-rounded btn-md">Подробние</a>
      </div>
  @endforeach
</div>
    </div>
 

  

@endsection