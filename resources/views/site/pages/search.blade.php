@extends('site.layouts.index')
@section('pageTitle')
«ФемилиРум» ☛Твой склад стройматериалов Поиск по запросу {{ $search }}
@endsection
@section('content')
<article class="container">
@if ($product !== null)
<h2 class=" h1-responsive font-weight-bold text-center my-5">По вашему запросу:</h2>
<p class="grey-text text-center w-responsive mx-auto mb-5"><mark> {{ $search }}</mark> найдено {{ $product->count() }} товара</p>
   <section class="d-flex flex-row justify-content-center  text-center my-5">   
        @forelse ($product as $item)
        <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
            <div class="card collection-card z-depth-1-half">
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
  @else
  <h2 class="h1-responsive font-weight-bold text-center my-5">Поисковое поле пустое</h2>
  @endif
      </section class='d-flex justify-content-center'>
    <section>
        <h2 class="d-flex justify-content-start h1-responsive  text-center my-5 font-weight-bold"> Рекоммендуемый товар:</h2>
      <div class="owl-carousel">
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
             <a class="btn  btn-rounded btn-light-green" href="">Купить</a>
          </div>
        </div>
      </div>
    </div>
         @endforeach   

          </div>
        </section>
        <section>
            <h2 class="d-flex justify-content-start h1-responsive  text-center my-5 font-weight-bold"> Популярный товар:</h2>
          <div class="owl-carousel">
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
            </section>
           
      @if ($new->count() >= 4)
      <h2 class="h1-responsive font-weight-bold  my-5">Новинки недели:</h2>
      <section class="d-flex flex-row justify-content-center">
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
     </section>
     @endif
</article>
@endsection
