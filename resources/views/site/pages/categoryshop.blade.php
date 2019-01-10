@extends('site.layouts.index')
@section('content')
<div class="row">
@foreach ($seo as $item)
    <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<div class="d-flex col-lg-12">
<div class="event-blog col-lg-10">
        <nav class="sort-search d-flex flex-row justify-content-around navbar navbar-expand-lg navbar-dark mdb-color light-green mt-3 mb-5   ">
            <span>Сортировка:</span>
            <a href="{{route('shop.category', ['category'=> request()->Category, 'sort' => 'price_asc'])}}">от дорогих</a>
            <a href="{{route('shop.category', ['category'=> request()->Category, 'sort' => 'price_desc'])}}">от дешевых</a>
            <a href="{{route('shop.category', ['category'=> request()->Category, 'sort' => 'A_Z'])}}">от (А-Я)</a>
            <a href="{{route('shop.category', ['category'=> request()->Category, 'sort' => 'Z_A'])}}">от (Я-А)</a>
          </nav>
    @foreach ($product as $item) 
      <div class="event-prod col-lg-3">
        <div class="card card-cascade narrower card-ecommerce">
          <div class="view view-cascade overlay">
              <img src="/storage/app/public/{{$item->images}}" class="card-img-top" alt="{{$item->alt_images}}" title="{{$item->title_images}}">
              <a>
              <div class="mask rgba-white-slight"></div>
              </a>
          </div>
    <div class="event-mini-body card-body card-body-cascade text-center">
    <a href="{{route('viewproducts', $item->seo_title)}}" class="grey-text">
      <h5>{{$item->name}}</h5>
      </a>
      <p class="card-text">{{$item->mini_description}}</p>
      <div class="d-flex justify-content-center flex-column card-footer px-1">
        <span class="float-left font-weight-bold">
        <strong>{{$item->price}} ГРН</strong>
        </span>
          <span class="float-right">
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
    <div class="d-flex justify-content-center col-lg-12 paginate-search">
            @if ($product !== null)
            {{ $product->links() }}
            @endif
      </div>
    </div>
</div>
</div>

@endsection