@extends('site.layouts.index')
@section('seo')
<title>{{$blog->title}}</title>
<meta name="description" content="{{$blog->description}}" />
<meta name="keywords" content="{{$blog->keywords}}" />
@endsection
@section('content')
<div class="container blogview-main">
    <div class="d-none d-print-block"> <h1>{{$blog->h1}}</h1></div>
  <nav aria-label="breadcrumb" class="blogview-breadcrumb ">
      <ol class="breadcrumb light-green">
          <li class="breadcrumb-item"><a class="text-primary font-weight-bold" href="{{url('blog')}}">Блог</a></li>
          <li class="breadcrumb-item"><a class="text-primary font-weight-bold" href="{{url('blog/category/'.$blog->blog_category->slug)}}" >{{ $blog->blog_category->name }}</a></li>
          <li class="breadcrumb-item active">{{ $blog->name }}</li>
      </ol>
  </nav>   
<article>
<h1 class="h1-responsive font-weight-bold text-center my-5">{{ $blog->name }}</h1>
<div>
{!! $blog->body !!}

   

  <div class="blog-view-main-recommend  d-flex   text-center my-5 animated fadeIn col-xl-3">
@foreach ($recommend as $item)
        <div class="blog-popular ">
          
            <figure  class="view overlay rounded z-depth-2 mb-4">
            <img  src="/storage/app/public/{{$item->blogrecommends->image}}" title="{{$item->blogrecommends->imageTitle}}" alt="{{$item->blogrecommends->imageAlt}}"  >
            </figure >
            <div>
                <h4 class="font-weight-bold mb-3"><strong> {{ $item->blogrecommends->name }}</strong></h4>
                <p><time></time></p>
          <p class="text-justify dark-grey-text blog-popular-text ">{{str_limit($item->blogrecommends->mini_body, 300)}}</p>
                <a  href="{{url('blog/'.$item->blogrecommends->seo_url)}}" class="btn btn-light-green btn-rounded btn-md">Подробние</a>
          </div>
          </div>
@endforeach
        </div> 
      <div class="d-flex justify-content-center"><a class="btn btn-light-green btn-rounded " href="{{route('blog.recommend')}}"> Рекоммендуемые статьи: </a> </div>
      </div> 
</div>
<div class="container view-main-comments">
  <div class="login-page">
    <div class="form">
      <form method="POST"  class="login-form">
        {{ csrf_field() }}
          <label>Ваше имя:</label>
          <input class="form-control z-depth-1" type="text" name="name" />
          <label>Ваше сообщение:</label>
          <textarea class="blog-view-main-input form-control z-depth-1 " type="text" name="body"></textarea>
          <input class="id" name="article_id" type="hidden" value="{{$blog->id}}"  >
          <input class="comments-submit btn btn-light-green" type="submit" value="Оставить комментарий">
@if ($errors->any())
  <div class="errors-form text-left alert red accent-4 font-weight-bold">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
        </ul>
  </div>
  <div class="errors text-left alert red accent-4 font-weight-bold">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
        </div>
@endif
@if(session()->has('goods'))
<div class="sussec d-flex alert justify-content-center  light-green example hoverable">
  
    {{ session()->get('goods')}}
  </div>
  @endif

        </form>
    </div>
  </div>
</div>
<div class="commend-list btn btn-light-green" data-toggle="modal" data-target="#centralModallg">
  Отзывы
</div>
  <div class="modal fade" id="centralModallg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title w-100" id="myModalLabel">Отзывы: 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="d-flex flex-row modal-body">
                 <div class="comments">
                    @foreach ($comment as $item) 
                      <span class="font-weight-bold text-center my-5">Имя:{{$item->name}}</span> 
                      <p class="grey-text">Сообщение:{{$item->body}}</p> 
                    @endforeach
                  </div>  
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Закрыть</button>
                </div>
              </div>
            </div>
          </div>
</article>
@endsection