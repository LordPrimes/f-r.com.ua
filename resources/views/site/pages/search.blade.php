@extends('site.layouts.index')
@section('pageTitle')
«ФемилиРум» ☛Твой склад стройматериалов Поиск по запросу {{ $search }}
@endsection
@section('content')
<article class="container">
  <div class="d-flex flex-row">
      <a href="{{ route('search', ['query'=> request()->$search ,  'sort' => 'price_asc']) }}">от дорогих</a> 
      <a href="{{ route('search',  ['sort' => 'proce_desc']) }}">от дешевых</a>
      <a href="{{ route('search',  ['sort' => 'A_Z']) }}">от (А-Я)</a>
      <a href="{{ route('search',  ['sort' => 'Z_A']) }}">от (Я-А)</a>
</div>
@if ($product !== null) 
<h2 class=" h1-responsive font-weight-bold text-center my-5">По вашему запросу:</h2>
<p class="grey-text text-center w-responsive mx-auto mb-5"><mark> {{ $search }}</mark> найдено {{ $product->count() }} товара</p>

 
        @forelse ($product as $item) 
        
        <div class="blog-prod col-lg-4">
            <div class=" card collection-card z-depth-1-half">
              <div class="view zoom">
                  <figure>
                <img src="/storage/app/public/{{$item->images}}" class="img-fluid"
                  alt="{{$item->alt_images}}" title="{{$item->title_images}}">
                </figure>
                <div class="stripe dark">
                <a href="{{url('/search/'.$item->seo_title)}}">
                    <p>
                        {{ $item->name }}
                      <i class="fa fa-angle-right"></i>
                    </p>
                  </a>
                </div>
              </div>
            </div>
        </div>  
      
      @empty
    <h2 class="h1-responsive  text-center my-5">По вашему запросу <mark>{{ $search }} </mark> . Ничего не найдено! </h2>
  @endforelse
  
 

  @endif
 @if ($search == null)
      <h2 class="h1-responsive font-weight-bold text-center my-5">Поисковое поле пустое.</h2>
  @endif
     
      @if ($recommend !== null)
          
   
    <div  class="reccommend-container">
        <h2 class="d-flex justify-content-start h1-responsive  text-center my-5 font-weight-bold"> Рекоммендуемый товар:</h2>
      <div class="carousel">
         @foreach ($recommend as $item) 
    <div class="recommend-blog">
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
        @endif
        
  @if ($action !== null)
      
  
 
 
  <div class="blog-action ">
      <h2 class="h1-responsive font-weight-bold text-center my-5">Акции:</h2>
     <div class="d-flex  flex-row">
      @foreach ($action as $item)
      
            <div class="action-blog card align-items-center col-lg-3">
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
  </div>
      @endif
        
          @if ($popular !== null)
              
          
            <h2 class="d-flex justify-content-start h1-responsive  text-center my-5 font-weight-bold"> Популярный товар:</h2>
          <div class="carousel">
             @foreach ($popular as $item) 
        <div class="recommend-blog">
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
                 <a class="btn  btn-rounded btn-light-green" href="">Купить</a>
              </div>
            </div>
          </div>
        </div>
             @endforeach   
    
              </div>
          
            @endif
      @if ($new->count() >= 4)
      <h2 class="h1-responsive font-weight-bold  my-5">Новинки недели:</h2>
      <div class="d-flex flex-row justify-content-center">
        @foreach ($new as $item)       
    <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
            <div class="card card-cascade narrower card-ecommerce">
              <div class="view view-cascade overlay">
                <img src="/storage/app/public/{{$item->images}}"  class="card-img-top"
              alt="{{$item->title_images}}" title="{{$item->alt_images}}">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <div class="card-body card-body-cascade">
                <h4 class="card-title">
                  <a class="font-weight-bold" href="{{url('/search/'.$item->seo_title)}}">{{ $item->name }}</a>
                </h4>
                <p class="text-justify card-text">{{ str_limit($item->mini_description,  50)}}
                </p>
                  <div class="d-flex justify-content-end">
                <strong class="price d-flex align-items-center">Цена:{{ $item->price }} ГРН</strong>
                <a class="btn btn-sm btn-rounded btn-light-green" href="">Купить</a>
            </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
     @endif
</article>
@endsection
