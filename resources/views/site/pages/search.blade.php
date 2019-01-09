@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<div class="row">
@if($product !== null)

      @isset($search)
  <div class="d-flex justify-content-center flex-column col-lg-12">
    <h2 class=" h1-responsive font-weight-bold text-center my-5">По вашему запросу:{{ $search }}</h2>
    <p class="grey-text text-center w-responsive mx-auto mb-5"><mark> {{ $search }}</mark> найдено {{ $product->count() }} товара</p>
  </div>
      @endisset
    <div class="d-flex col-lg-12">
      <div class="d-flex flex-row align-self-start justify-content-center filter col-lg-2 ">
        <form class="filter-form-control">
          <div class="filter-container">
            
           @foreach ($filter as $item)
               
          
          <label class="d-flex align-items-center"><input name='{{$item->slug}}' value="{{$item->slug}}" type="checkbox">{{$item->name}}</label>
            
              @endforeach
              <div class="d-flex align-items-center"><button type="submit" name="check" value="check">редактировать</button></div>
              
            </div>
         
          </form> 
        </div>
<div class="search-blog col-lg-10">
  @if ($search !== null)
    <nav class="sort-search d-flex flex-row justify-content-around navbar navbar-expand-lg navbar-dark mdb-color light-green mt-3 mb-5   ">
        <span>Сортировка:</span>
        
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'price_asc']) }}">от дорогих</a> 
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'price_desc']) }}">от дешевых</a>
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'A_Z']) }}">от (А-Я)</a>
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'Z_A']) }}">от (Я-А)</a>    
         
      </nav>
      @endif 
  <div class="search-blog event-action  col-lg-10">
  
@foreach ($product as $item)  
  <div class="search-prod col-lg-4">
    <div class="card card-cascade narrower card-ecommerce">
        <div class="view view-cascade overlay">
          <img src="/storage/app/public/{{$item->images}}" class="card-img-top" alt="{{$item->alt_images}}" title="{{$item->title_images}}">
          <a>
          <div class="mask rgba-white-slight"></div>
          </a>
        </div> 
<div class="search-mini-body card-body card-body-cascade text-center">
  <a href="{{$item->seo_title}}" class="grey-text"><h5>{{$item->name}}</h5></a>
  <p class="d-flex align-items-center card-text">{{$item->mini_description}}</p>
    <div class="search-event-price card-footer px-1">
      <span class="font-weight-bold">
        <strong ><p>цена:</p>{{$item->price }}</strong>
      </span>
      <span>
        <form action="{{route('cart.addcart')}}" method="POST"> 
          {{ csrf_field() }}
        <input type="hidden" name='id' value="{{$item->id }}">
        <input type="hidden" name='name' value="{{$item->name }}">
        <input type="hidden" name='price' value="{{$item->price }}">
        <input type="hidden" name='qty' value="{{$item->qty}}">
        <button class="btn  btn-rounded btn-light-green" type="submit" >Купить</button>
        </form>
      </span>
    </div>
</div>
    </div>      
  </div>
@endforeach
  </div>
@else
<div class="d-flex col-lg-12">
    <div class="d-flex flex-row align-self-start justify-content-start filter col-lg-2 ">
      <form class="filter-form-control">
        <div class="filter-container">
          
         @foreach ($filter as $item)
             
        
        <label class="d-flex align-items-center"><input name='{{$item->slug}}' value="{{$item->slug}}" type="checkbox">{{$item->name}}</label>
          
            @endforeach
            <button type="submit" class="btn btn-rounded btn-light-green" name="check" value="check">редактировать</button>
          </div>
       
        </form> 
      </div>
<div class="search-blog col-lg-10">
@if ($search !== null)
  <nav class="sort-search d-flex flex-row justify-content-around navbar navbar-expand-lg navbar-dark mdb-color light-green mt-3 mb-5   ">
      <span>Сортировка:</span>
      
      <a href="{{ route('search', ['query'=> $search , 'sort' => 'price_asc']) }}">от дорогих</a> 
      <a href="{{ route('search', ['query'=> $search , 'sort' => 'price_desc']) }}">от дешевых</a>
      <a href="{{ route('search', ['query'=> $search , 'sort' => 'A_Z']) }}">от (А-Я)</a>
      <a href="{{ route('search', ['query'=> $search , 'sort' => 'Z_A']) }}">от (Я-А)</a>    
       
    </nav>
    @endif 
<div class="search-blog event-action  col-lg-10">

@foreach ($filterproducts as $item)  
<div class="search-prod col-lg-4">
  <div class="card card-cascade narrower card-ecommerce">
      <div class="view view-cascade overlay">
        <img src="/storage/app/public/{{$item->filters->images}}" class="card-img-top" alt="{{$item->filters->alt_images}}" title="{{$item->filters->title_images}}">
        <a>
        <div class="mask rgba-white-slight"></div>
        </a>
      </div> 
<div class="search-mini-body card-body card-body-cascade text-center">
<a href="{{$item->filters->seo_title}}" class="grey-text"><h5>{{$item->filters->name}}</h5></a>
<p class="d-flex align-items-center card-text">{{$item->filters->mini_description}}</p>
  <div class="search-event-price card-footer px-1">
    <span class="font-weight-bold">
      <strong ><p>цена:</p>{{$item->filters->price }}</strong>
    </span>
    <span>
      <form action="{{route('cart.addcart')}}" method="POST"> 
        {{ csrf_field() }}
      <input type="hidden" name='id' value="{{$item->filters->id }}">
      <input type="hidden" name='name' value="{{$item->filters->name }}">
      <input type="hidden" name='price' value="{{$item->filters->price }}">
      <input type="hidden" name='qty' value="{{$item->filters->qty}}">
      <button class="btn  btn-rounded btn-light-green" type="submit" >Купить</button>
      </form>
    </span>
  </div>
</div>
  </div>      
</div>
@endforeach
</div>
  @isset($search)
  <div class="d-flex justify-content-center flex-column col-lg-12">
  <h2 class=" h1-responsive font-weight-bold text-center my-5">По вашему запросу:{{ $search }}</h2>
  <p class="grey-text text-center w-responsive mx-auto mb-5"><mark> {{ $search }}</mark> найдено {{ $product->count() }} товаров</p>
  @endisset
@endif

</div>     
</div>
@if ($recommend !== null)
<div  class="reccommend-container">
  <h2 class="h1-responsive  text-center my-5 font-weight-bold"> Рекоммендуемый товар:</h2>
  <div class="carousel recommend-blog">
@foreach ($recommend as $item) 
      <div class="recommend-main-blog">
        <div class="card card-cascade wider card-ecommerce">
          <div class="view view-cascade overlay">
          <figure><img src="/storage/app/public/{{$item->images}}" class="img-fluid" alt="{{$item->alt_images}}" title="{{$item->title_images}}"> 
          <a><div class="mask rgba-white-slight"></div></a>
          </figure>
          </div>
        <div class="card-body card-body-cascade text-center">
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
        </div>
      </div>
    </div>
@endforeach   
  </div>
</div>
@endif
@if($action !== null)
<div class="blog-action ">
  <h2 class="h1-responsive font-weight-bold text-center my-5">Акции:</h2>
    <div class="d-flex  flex-row">
@foreach ($action as $item)
      <div class="action-blog card align-items-center col-lg-3">
        <div class="view overlay">
          <img src="/storage/app/public/{{$item->actions->images}}" class="img-fluid" alt="{{$item->actions->alt_images}}" title="{{$item->actions->title_images}}">
          <a><div class="mask rgba-white-slight"></div></a>
        </div>
            <div class="card-body text-center">
              <a href="{{$item->actions->seo_title}}" class="grey-text"><h5>{{ $item->actions->name }}</h5></a>
                <h4 class="font-weight-bold blue-text">
                <strong class=""><p>Старая цена:</p>{{$item->actions->price }}</strong>
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
            </div>
        </div>        
@endforeach  
    </div>
</div>
@endif
@if($popular !== null)
<h2 class="d-flex justify-content-start h1-responsive  text-center my-5 font-weight-bold"> Популярный товар:</h2>
  <div class="carousel popular-container">
@foreach ($popular as $item) 
    <div class="popular-blog">
      <div class="popular-blog-body card card-cascade wider card-ecommerce">
        <div class="view view-cascade overlay">
          <figure><img src="/storage/app/public/{{$item->images}}" class="img-fluid" alt="{{$item->alt_images}}" title="{{$item->title_images}}"> 
          <a><div class="mask rgba-white-slight"></div></a>
          </figure>  
        </div>
          <div class="card-body card-body-cascade text-center">
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
      <div class="new-blog">
          <div class="card card-cascade wider card-ecommerce">
            <div class="view view-cascade overlay">
              <figure><img src="/storage/app/public/{{$item->images}}" class="img-fluid" alt="{{$item->alt_images}}" title="{{$item->title_images}}"> 
              <a><div class="mask rgba-white-slight"></div></a>
              </figure>  
            </div>
              <div class=" new-blog-body  card-body card-body-cascade text-center">
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
              </div>
            </div>
        </div>
@endforeach
      </div>
     @endif
</div>
@endsection