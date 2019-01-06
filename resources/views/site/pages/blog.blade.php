@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach

<nav class="category navbar navbar-expand-lg navbar-dark mdb-color light-green mt-3 mb-5">
    <span class="navbar-brand">Категории:</span>
    <div class="d-flex flex-wrap">
@foreach ($category as $categor)
    <li class="{{ Request::is('blog/category/'.$categor->slug) ? 'active' : '' }}">
    <a class="active nav-link  text-white"  href="{{url('blog/category/'.$categor->slug)  }}" >
    {{ $categor->name }}
    </a>    
    </li>
@endforeach
    </div>
</nav>
@foreach ( $blog as $blogs)
<div class="blog">
<div class="blog-main text-justify d-flex">
    <figure class="d-flex flex-column justify-content-center">
        <img class="blog-main-images" src="/storage/app/public/{{$blogs->image}}" />
            <p class="blog-main-date text-center"><time>{{ $blogs->created_at->format('d/m/Y')}}</time></p>
    </figure>
    <section class="blog-main-info text-center">
    <a class="d-flex justify-content-center blog-main-link text-success font-weight-bold  " href="{{url('blog/'.$blogs->seo_url)}}">{{ $blogs->name }}</a>
        <p class="text-justify">{{str_limit( $blogs->mini_body,300 )}}</p>
    <a class="float-right btn btn-light-green btn-rounded btn-md"  href="{{url('blog/'.$blogs->seo_url)}}">Подробние</a>
    </section>
</div>
@endforeach
<div class="d-flex justify-content-center">
{{ $blog->links() }}
</div>
</div>
@if ($lastarticle->count() > 3)
    <h2 class="font-weight-bold my-5">Новые статьи</h2> 
<div class="d-flex flex-row justify-content-center  text-center my-5 animated fadeIn">
    @foreach ($lastarticle as $item)
        <section class="blog-popular col-lg-3 ">
            <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
            </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p><time>{{ $item->created_at->format('d/m/Y')}}</time></p>
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
        </section>
     @endforeach
</div>
@endif  
    @if ($popularblog !== null)
       <h2 class="font-weight-bold my-5 text-center">Популярные статьи</h2>   
    @endif
<div class="blog  animated fadeIn">
<div class="d-flex flex-row justify-content-center  text-center my-5">
@foreach ($popularblog as $item)
    <section class="blog-popular col-lg-4 ">
        <figure  class="view overlay rounded z-depth-2 mb-4">
            <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
        </figure >
            <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
            <p><time>{{ $item->created_at->format('d/m/Y')}}</time></p>
            <a href="{{url('blog/'.$item->seo_url)}}" class="d-flex justify-content-center align-items-center btn btn-light-green btn-rounded btn-md">Подробние</a>
    </section>
@endforeach
</div>
    <a href="{{route('blog.popular')}}" class="d-flex justify-content-center align-items-center btn btn-light-green btn-rounded btn-md">Посмотреть все статьи</a>
</div> 
@if ($recommendblog !== null)
<h2 class="font-weight-bold my-5 text-center">Рекоммендуемые статьи</h2> 
@endif
<div class="blog   animated fadeIn">
    <div class="d-flex flex-row justify-content-center  text-center my-5">
    @foreach ($recommendblog as $item)
        <div class="blog-popular col-lg-4">
            <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
            </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p><time>{{ $item->created_at->format('d/m/Y')}}</time></p>
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
        </div>
    @endforeach
</div>
<a href="{{route('blog.recommend')}}" class="d-flex justify-content-center align-items-center btn btn-light-green btn-rounded btn-md">Посмотреть все статьи</a>
</div > 
    @if ($youviewed !== null)
    <h2 class="font-weight-bold my-5 text-center">Вы смотрели</h2> 
<section class="blog animated fadeIn">
    <div class="d-flex flex-row justify-content-center text-center my-5">
    @foreach ($youviewed as $item)
        <div class="blog-popular col-lg-4 ">
            <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->image}}"  alt="Sample image">
            </figure >
            <div class="blog-popular-body">
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p><time>{{ $item->created_at->format('d/m/Y')}}</time></p>
              
                <a href="{{url('blog/'.$item->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
            </div>
         </div>
    @endforeach
</div>
</section> 
    @endif

@endsection