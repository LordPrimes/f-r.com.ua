@extends('site.layouts.index')
@section('pageSeo')
  
@endsection
@section('pageTitle')
@endsection
@section('content')

  
    <article class="container">
      <section class="d-flex justify-content-center flex-row">
        <div class="d-flex flex-row">
          <div class="main-category">
            <div class="main-category-link">
          <a class="btn btn-rounded btn-light-green" href="{{route('category')}}">Категории:</a>
            </div>
          <div class=" main-category-list text-center">
            @foreach ($categor as $item)
            <a href="">{{$item->name}}</a>
            @endforeach
          </div>
          </div>
        </div>
        @if ($Slider !== null)
            
        
  <div class="carousel-main" >
 @foreach ($Slider as $item)

      <div class="carousel-main-img card card-image mb-3" style="background-image: url('/storage/app/public/{{$item->images}}');">
        <div class="text-white text-center d-flex align-items-center img-gradient-overlay py-5 px-4">
            <div>
            <h3 class="card-title pt-2"><strong>{{ $item->title }}</strong></h3>
            <p>{{$item->text }}</p>
            <a href="{{$item->link}}" class="btn btn-light-green waves-effect waves-light">Подробние</a>
            </div>
        </div>
    </div>

 @endforeach
  </div>
 @endif
</section>
@if ($categor !== null)
    

<div class="d-flex flex-row align-items-center main-category-img">
    @foreach ($categor as $item)
<a class="main-category-img-link ">
  <div class="view overlay zoom"><img class="img-fluid" src="/storage/app/public/{{$item->img}}" alt=""> 
    <a>
        <div class="mask rgba-white-slight"></div>
      </a>
  </div>
</a>

   
 
 @endforeach
 @endif
</div>
<h2 class="h1-responsive font-weight-bold text-center my-5">ЛИДЕРЫ ПРОДАЖ</h2>
<section class="d-flex flex-column">
@if ($action !== null)
<div class="blog-action-main">
    <h2 class="h1-responsive font-weight-bold text-center my-5">Акции:</h2>
   <div class="d-flex  flex-row">
    @foreach ($action as $item)
    
          <div class="action-blog card align-items-center">
            <div class="view overlay">
              <img src="/storage/app/public/{{$item->actions->images}}" class="img-fluid"
              alt="{{$item->actions->alt_images}}" title="{{$item->actions->title_images}}">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body text-center">
              <a href="{{url('/search/'.$item->actions->seo_title)}}" class="grey-text">
              <h5>{{ $item->actions->name }}</h5>
              </a>
              <h4 class="font-weight-bold blue-text">
              <strong class=""><p>Старая цена:</p>{{$item->actions->price }}</strong>
              <strong class="text-danger"><p>Новая цена:</p>{{$item->new_price }}</strong>
                <a class="btn btn-rounded btn-light-green" href="">Купить</a>
              </h4>
            </div>
          </div>
      
     @endforeach  
    </div>
    <div class="d-flex justify-content-center">
     <a class="btn btn-rounded btn-light-green" href="">Посмотреть все приложения</a>
      </div>
    </div> 
      @endif
     
      <div class="container-recommend">
          <h2 class="h1-responsive font-weight-bold text-center my-5">Популярные товары:</h2>
        <div class="d-flex flex-row carousel-recommend">
          @foreach ($recommend as $item) 
          <div class="recommend-blog-main">
            <div class="card card-cascade wider card-ecommerce">
              <div class="view view-cascade overlay">
                <figure>
                  <img src="/storage/app/public/{{$item->images}}" class="img-fluid"
                    alt="{{$item->alt_images}}" title="{{$item->title_images}}"> 
                    <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
                  </figure>
               
              </div>
              <div class="card-body card-body-cascade text-center">
                <a href="{{url('/search/'.$item->seo_title)}}" class="text-muted">
                <h5>{{$item->name}}</h5>
                </a>
              <p class="card-text">{{ str_limit($item->mini_description,  50)}}</p>
                <div class="d-flex justify-content-between align-items-center ">
                  <strong>{{ $item->price }} ГРН </strong> 
                <form action="{{route('cart.addcart')}}" method="POST"> 
                  {{ csrf_field() }}
                <input type="hidden" name='id' value="{{$item->id }}">
                <input type="hidden" name='name' value="{{$item->name }}">
                <input type="hidden" name='price' value="{{$item->price }}">
             
                     
                   <button class="btn  btn-rounded btn-light-green" type="submit" >Купить</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
               @endforeach   
        </div>
      </div>
      <h2 class="h1-responsive font-weight-bold text-center my-5">НОВОСТИ ИЗ БЛОГА</h2>
       <div class="blog-main d-flex flex-row">
         <div class="carousel-recommend">
         @foreach ($blog as $item)
     
      <div class="blog-popular-main">
          <figure  class="view overlay rounded z-depth-2 mb-4">
              <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
          </figure >
              <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
              <p><time>{{ $item->created_at}}</time></p>
              <p class=" dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 70) }}</p>
              <a href="{{url('blog/'.$item->seo_url)}}" class="d-flex justify-content-center align-items-center btn btn-light-green btn-rounded btn-md">Подробние</a>
      </div>
    
  @endforeach
</div>
    </div>
    </section>
  </article>
  

@endsection