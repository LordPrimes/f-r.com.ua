@extends('site.layouts.index')

@section('content')
<div class="row">
    @isset($search)
        
   
  <div class="d-flex justify-content-center flex-column col-lg-12">
    <h2 class=" h1-responsive font-weight-bold text-center my-5">По вашему запросу:{{ $search }}</h2>
    <p class="grey-text text-center w-responsive mx-auto mb-5"><mark> {{ $search }}</mark> найдено {{ $product->count() }} товара</p>
  </div>
  @endisset
  <div class="d-flex col-lg-12">
      @isset($product)

    <div class="d-flex flex-row align-self-start justify-content-start filter col-lg-2 ">
          <form class="filter-form-control">
              <div class="filter-container">
              <a>Цвет:</a>
                <label class="d-flex align-items-center"> <input type="checkbox">Красный</label>
                  <label class="d-flex align-items-center"><input type="checkbox">черный</label>
                  <label class="d-flex align-items-center"><input type="checkbox">белый</label>
                  <label class="d-flex align-items-center"><input type="checkbox">что-то</label>
                </div>
                <div class="filter-container">
                  <a>Цвет:</a>
                <label class="d-flex align-items-center"> <input type="checkbox">Красный</label>
                  <label class="d-flex align-items-center"><input type="checkbox">черный</label>
                  <label class="d-flex align-items-center"><input type="checkbox">белый</label>
                  <label class="d-flex align-items-center"><input type="checkbox">что-то</label>
                </div>
            </form> 
</div>


    

<div class="event-blog col-lg-10">
 
    <nav class="sort-search d-flex flex-row justify-content-around navbar navbar-expand-lg navbar-dark mdb-color light-green mt-3 mb-5   ">
        <span>Сортировка:</span>
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'price_asc']) }}">от дорогих</a> 
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'price_desc']) }}">от дешевых</a>
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'A_Z']) }}">от (А-Я)</a>
        <a href="{{ route('search', ['query'=> $search , 'sort' => 'Z_A']) }}">от (Я-А)</a> 
      </nav>


    

<div class="event-blog event-action  col-lg-10">
  
@foreach ($product as $item)  
  <div class="event-prod col-lg-4">
    <div class="card card-cascade narrower card-ecommerce">
        <div class="view view-cascade overlay">
          <img src="/storage/app/public/{{$item->images}}" class="card-img-top" alt="{{$item->alt_images}}" title="{{$item->title_images}}">
          <a>
          <div class="mask rgba-white-slight"></div>
          </a>
        </div> 
<div class="event-mini-body card-body card-body-cascade text-center">
  <a href="{{$item->seo_title}}" class="grey-text">
  <h5>{{$item->name}}</h5>
  </a>
  <p class="d-flex align-items-center card-text">{{$item->mini_description}}</p>
    <div class="action-event-price card-footer px-1">
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
        @endisset

</div>     
</div>



   
        
  
      
    
   
  
  
 




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
          <a href="{{$item->seo_title}}" class="text-muted">
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
                <a href="{{$item->actions->seo_title}}" class="grey-text">
                <h5>{{ $item->actions->name }}</h5>
                </a>
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
              <a href="{{$item->seo_title}}" class="text-muted">
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
                  <a class="font-weight-bold" href="{{$item->seo_title}}">{{ $item->name }}</a>
                </h4>
                <p class="text-justify card-text">{{ str_limit($item->mini_description,  50)}}
                </p>
                  <div class="d-flex justify-content-end">
                <strong class="price d-flex align-items-center">Цена:{{ $item->price }} ГРН</strong>
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
          </div>
          @endforeach
        </div>
     @endif
</div>
@endsection
