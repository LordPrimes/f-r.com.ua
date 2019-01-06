@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<div class="row">
<div class="d-flex col-lg-12">
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
          <a  href="{{ route($pagesname, ['sort' => 'price_asc']) }}">от дорогих</a>
          <a  href="{{ route($pagesname, ['sort' => 'price_desc']) }}">от дешевых</a>
  @isset($product)
          <a  href="{{ route($pagesname, ['sort' => 'A_Z']) }}">от (А-Я)</a>
          <a  href="{{ route($pagesname, ['sort' => 'Z_A']) }}">от (Я-А)</a>
  @endisset 
      </nav>
@isset($product)
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
  <a href="{{$item->seo_title}}" class="grey-text">
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
</div>
@endisset 
@isset($action)
<div class="event-blog event-action  col-lg-10">
@foreach ($action as $item)   
  <div class="event-prod col-lg-4">
    <div class="card card-cascade narrower card-ecommerce">
        <div class="view view-cascade overlay">
          <img src="/storage/app/public/{{$item->actions->images}}" class="card-img-top" alt="{{$item->actions->alt_images}}" title="{{$item->actions->title_images}}">
          <a>
          <div class="mask rgba-white-slight"></div>
          </a>
        </div> 
<div class="event-mini-body card-body card-body-cascade text-center">
  <a href="{{$item->actions->seo_title}}" class="grey-text">
  <h5>{{$item->actions->name}}</h5>
  </a>
  <p class="d-flex align-items-center card-text">{{$item->actions->mini_description}}</p>
    <div class="action-event-price card-footer px-1">
      <span class="font-weight-bold">
        <strong ><p>Старая цена:</p>{{$item->actions->price }}</strong>
        <strong class="text-danger"><p>Новая цена:</p>{{$item->new_price }}</strong>
      </span>
      <span>
        <form action="{{route('cart.addcart')}}" method="POST"> 
          {{ csrf_field() }}
        <input type="hidden" name='id' value="{{$item->actions->id }}">
        <input type="hidden" name='name' value="{{$item->actions->name }}">
        <input type="hidden" name='price' value="{{$item->actions->price }}">
        <input type="hidden" name='qty' value="{{$item->actions->qty}}">
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
<div class="paginate d-flex justify-content-center">
  @isset($action)
      {{ $action->links() }}
  @endisset 
  @isset($product)
      {{ $product->links() }}
  @endisset
</div>
</div>     
</div>
</div>     
@endsection