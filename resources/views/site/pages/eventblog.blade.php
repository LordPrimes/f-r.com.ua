@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
@if($article !== null)
<div class="row">      
  <div class="event-blog">
    @foreach ($article as $item) 
        <div class="blog-event col-lg-12">  
          <div class="d-flex flex-row  card card-cascade narrower card-ecommerce">
            <div class="view view-cascade overlay">
              <img src="/storage/app/public/{{$item->image}}" class="card-img-top"alt="{{$item->imageAlt}}" title="{{$item->imageTitle}}">
              <a>
              <div class="mask rgba-white-slight"></div>
              </a>
            </div>
                <section class="d-flex flex-column align-items-center col-lg-9 card-body card-body-cascade">
                  <a href="{{$item->seo_url}}" class="grey-text">
                    <h5>{{$item->name}}</h5>
                  <p><time>{{$item->created_at->format('d/m/Y')}}</time></p>
                  </a>
                <p class="text-justify">{{$item->mini_body}}</p>
                <a href="{{$item->seo_url}}" class="btn  btn-rounded btn-light-green">подробние</a>  
                </section>
                </div>
              </div>
 @endforeach
@else
<h2 class="font-weight-bold my-5">Статьи отсуствывають</h2>
@endif
</div>
</div>

@endsection