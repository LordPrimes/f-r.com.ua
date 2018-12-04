@extends('site.layouts.index')
@section('pageTitle')
{{ $blog->name }}
@endsection
@section('content')
<div class="container blogview-main">
<article>
<h1 class="h1-responsive font-weight-bold text-center my-5">{{ $blog->name }}</h1>
<section>{!! $blog->body !!}
</section> 
<h2 class="font-weight-bold my-5">Рекоммендуемые статьи:</h2> 
<section class="blog-view-main-recommend d-flex flex-row  text-center my-5 animated fadeIn col-xl-3">
       
    @foreach ($recommend as $item)
        <div class="blog-popular ">
                <figure  class="view overlay rounded z-depth-2 mb-4">
                <img  src="/storage/app/public/{{$item->images}}"  alt="{{$item->alt}}" title="{{$item->title }}">
                </figure >
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->name }}</strong></h4>
                <p>{{ $item->created_at}}</p>
            <p class="text-justify dark-grey-text blog-popular-text ">{{ str_limit($item->description, 300) }}</p>
                <a href="{{url('blog/'.$item->url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
            </div>
        @endforeach
     </section> 
</div>
</article>
@endsection