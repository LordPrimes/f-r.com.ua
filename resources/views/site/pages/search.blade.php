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
      </section>
      <h2 class="h1-responsive font-weight-bold  my-5">Рекомендуемый товар:</h2>
      <section class="d-flex flex-row justify-content-center">
        @foreach ($recommend as $item)       
    <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
            <div class="card card-cascade narrower card-ecommerce">
              <div class="view view-cascade overlay">
                <img src="/storage/app/public/{{$item->images}}"  class="card-img-top"
                  alt="sample photo">
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
</article>
@endsection
