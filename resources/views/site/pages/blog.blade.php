@extends('site.layouts.index')
@section('pageSeo')
    @foreach ($seo as $item)
@if ($item->description !==null)
<meta name="description" content="{{$item->description}}" />
@endif
@if ($item->Keywords !==null)
<meta name="keywords" content="{{$item->Keywords}}" />
@endif
@if ($item->itemprop and $item->content !==null)
<meta itemprop="{{$item->itemprop}}" content="{{$item->content}}" />   
@endif
    @endforeach
@endsection
@section('pageTitle')
    @foreach ($seo as $item)
{{ $item->Title }}
    @endforeach
@endsection
@section('content')
<article class="blog container">
    @foreach ($seo as $item)
           <h1 style="display:none">{{$item->h1}}</h1>
    @endforeach
    <nav class="category navbar navbar-expand-lg navbar-dark mdb-color light-green mt-3 mb-5">
        <span class="navbar-brand">Категории:</span>
        <div class="d-flex align-items-center collapse navbar-collapse">
    @foreach ($category as $categor)
    <li class="{{ Request::is('blog/category/'.$categor->slug) ? 'active' : '' }}">
    <a class="active nav-link waves-effect waves-light text-white"  href="{{url('blog/category/'.$categor->slug)  }}" >{{ $categor->name }}</a>    
    </li>
    @endforeach
        </div>
    </nav>
    @foreach ( $blog as $blogs)
<div class=" blog-main d-flex">
    <figure class="d-flex flex-column justify-content-center">
        <img class="blog-main-images" src="/storage/app/public/{{$blogs->image}}" />
            <p class="blog-main-date"><time>{{ $blogs->created_at}}</time></p>
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
@if ($lastarticle->count() > 3)
    <h2 class="font-weight-bold my-5">Новые статьи:</h2> 
<section class="d-flex flex-row justify-content-center  text-center my-5 animated fadeIn">
    @foreach ($lastarticle as $item)
        <div class="blog-popular col-lg-3 ">
            <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
            </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p><time>{{ $item->created_at}}</time></p>
                <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 300) }}</p>
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
        </div>
     @endforeach
</section>
@endif  
    @if ($popularblog !== null)
       <h2 class="font-weight-bold my-5">Популярные статьи:</h2>   
    @endif
<section class="d-flex flex-row justify-content-center  text-center my-5 animated fadeIn">
    @foreach ($popularblog as $item)
        <div class="blog-popular col-lg-3 ">
            <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
            </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p><time>{{ $item->created_at}}</time></p>
                <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 300) }}</p>
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
        </div>
    @endforeach
</section> 
    @if ($recommendblog !== null)
    <h2 class="font-weight-bold my-5">Рекоммендуемые статьи:</h2> 
    @endif
<section class="d-flex flex-row justify-content-center  text-center my-5 animated fadeIn">
    @foreach ($recommendblog as $item)
        <div class="blog-popular col-lg-3">
            <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
            </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p><time>{{ $item->created_at}}</time></p>
                <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 300) }}</p>
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
        </div>
    @endforeach
</section> 
    @if ($youviewed !== null)
    <h2 class="font-weight-bold my-5">Вы смотрели:</h2> 
<section class="d-flex flex-row justify-content-cente text-center my-5 animated fadeIn">
    @foreach ($youviewed as $item)
        <div class="blog-popular col-lg-3 ">
            <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
            </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p><time>{{ $item->created_at}}</time></p>
                <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->mini_body, 300) }}</p>
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
         </div>
    @endforeach
</section> 
    @endif
</article>
@endsection