@extends('site.layouts.index')
@section('content')
<article class="container">
    <div class="d-flex flex-column align-items-center blog-category">
        <span class="blog-category-title">Категории:</span>
        @foreach ($category as $categor)
    <div ><a href="{{url('blog/category/'.$categor->name)}}">{{ $categor->name }}</a></div>
    @endforeach
</div>
@foreach ( $blog as $blogs)
<div class="blog-main d-flex">
<figure class="d-flex flex-column justify-content-center">
<img class="blog-main-images" src="/storage/app/public/{{$blogs->image}}" />
<p class="blog-main-date">{{ $blogs->created_at}}</p>
</figure>
<div class="blog-main-info">
<a class="d-flex justify-content-center blog-main-link" href="{{url('blog/'.$blogs->seo_url)}}">{{ $blogs->name }}</a>
<p>{{str_limit( $blogs->mini_body,300 )}}</p>
<a class="float-right btn btn-light-green btn-rounded btn-md"  href="{{url('blog/'.$blogs->seo_url)}}">Подробние</a>
</div>
</div>
@endforeach
<div class="d-flex justify-content-center">
{{ $blog->links() }}
</div>
<h1>
    @foreach ($lastarticle as $item)
        {{ $item->name }}
    @endforeach
    </h1> 
    <h2 class="font-weight-bold my-5">Популярные статьи:</h2> 
<section class="  d-flex flex-row  text-center my-5 animated fadeIn">
        @foreach ($popularblog as $item)
        <div class="blog-popular ">
                <figure  class="view overlay rounded z-depth-2 mb-4">
                  <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
                </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p>{{ $item->created_at}}</p>
            
            <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 300) }}</p>
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
            </div>
        @endforeach
     </section>  
    <h2 class="font-weight-bold my-5">Рекоммендуемые статьи:</h2> 
    <section class="  d-flex flex-row  text-center my-5 animated fadeIn">
        @foreach ($recommendblog as $item)
            <div class="blog-popular ">
                    <figure  class="view overlay rounded z-depth-2 mb-4">
                      <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
                    </figure >
                    <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                    <p>{{ $item->created_at}}</p>
                <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 300) }}</p>
                    <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
                </div>
            @endforeach
         </section> 
            @if ($youviewed !== null)
            <h2 class="font-weight-bold my-5">Вы смотрели:</h2> 
            <section class="d-flex flex-row  text-center my-5 animated fadeIn col-xl-3">
                    @foreach ($youviewed as $item)
                    <div class="blog-popular ">
                            <figure  class="view overlay rounded z-depth-2 mb-4">
                              <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
                            </figure >
                            <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                            <p>{{ $item->created_at}}</p>
                        <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 300) }}</p>
                            <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
                        </div>
                    @endforeach
                 </section> 
            @endif
            <div  class="scrolingtop btn btn-rounded btn-light-green  " >
                <i class="fa fa-arrow-up fa-2x" ></i>
        </div>
        </article>
        
             
@endsection