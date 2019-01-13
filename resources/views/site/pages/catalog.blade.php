@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<div class="container">
  <div class="row">
@foreach ($seo as $item)
    <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<h2 class="h1-responsive text-center my-5">Каталог</h2>
        <div class="blog catalog-blog d-flex col-lg-12 ">
          <div class="container-catalog col-lg-12 ">
@foreach($category as $item)
    @if($item->subcategory->count() > 0)
    <div class="float-left container-catalog-body  col-lg-4">
        <div class="card card-cascade wider card-ecommerce">
            <figure class=" container-catalog-img view view-cascade overlay">
                <img src="/storage/app/public/{{$item->img}}"  class="card-img-top">
                <a>
                <div class="mask rgba-white-slight"></div>
                </a>
            </figure>
                <div class="card-body card-body-cascade text-center">
                    <a href="{{route('shop.category',$item->slug)}}" class="text-muted">
                    <h5>{{ $item->name }}</h5>
                    </a>
                    <p class="d-flex flex-column">
                    @foreach($item->subcategory as $submenu)
                    <a href="{{route('shop.category', $submenu->slug)}}">{{ $submenu->name }}</a>
                    @endforeach   
                    </p>  
                    </div>     
            </div>              
    </div>  
@endif
@endforeach

            </div>
        </div>
    </div>
</div>
@endsection