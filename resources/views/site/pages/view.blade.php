@extends('site.layouts.index')

@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<article class="container">
<section class="d-flex flex-row view-main"> 
    <div class="view-main-images ">
        <div class="mdb-lightbox-ui"></div>
        <figure class="view overlay mdb-lightbox no-margin ">
            <a href="/storage/app/public/{{$viewprod->images}}" data-size="1600x1067"> 
            <img src="/storage/app/public/{{$viewprod->images}}" class="img-fluid">
        </a> 
        </figure>
    </div> 
<div class="view-main-info">
    <h1 class="view-main-title ">{{ $viewprod->title }}</h1>
    <div class="d-flex flex-row justify-content-between">
        <div class="view-main-mini-info-brand">
            Модель: {{ $viewprod->brand }}
        </div>
        @if($viewprod->incash == 1)
            <div class="view-main-cash">
                Наличие:Есть в наличие
            </div>
        @else 
            <div class="view-main-cash"> 
                Наличие:Нету в наличие
            </div>  
        @endif   
            <div class="view-main-mini-info-attr">
                Производитель: {{ $viewprod->manufacturer }}
            </div>
    </div>
        <div class="d-flex flex-row justify-content-between align-items-center  view-main-backet">  
            @isset($viewprod->productactionOne->new_price )  
                <div class='view-main-backet-old-price'>
                    {{ $viewprod->price }} Грн.
                </div>
            @endisset 
            @empty($viewprod->productactionOne->new_price)
                <div class='view-main-backet-price'>
                    {{ $viewprod->price }}  Грн.
                </div>
            @endempty
            @isset($viewprod->productactionOne->new_price )  
                <div class='view-main-backet-new-price'>  
                    {{ $viewprod->productactionOne->new_price }} Грн.
                </div>
                @endisset 
            <div class="view-main-backet-all-count" > 
                <button class="view-main-backet-numbers-count count-down"   >-</button>
            <input  class="view-main-backet-numbers" value="{{$viewprod->qty}}"  type="text"  disabled  > 
                <button class="view-main-backet-numbers-count count-up">+</button>
            </div> 
                <form action="{{route('cart.addcart')}}" method="POST"> 
                {{ csrf_field() }}
                <input type="hidden" name='id' value="{{$viewprod->id }}">
                <input type="hidden" name='name' value="{{$viewprod->name }}">
                <input type="hidden" name='price' value="{{$viewprod->price }}">
                <input class="updatenewqty" type="hidden"  value="{{$viewprod->qty}}" name="qty">
                <button class="view-main-submit btn  btn-rounded btn-light-green" type="submit" >
                    Купить
                </button>
                 </form>
        </div>
    <div class="d-flex view-main-delivery">
        <p>По Киеву доставка под парадное</p>
        <p>По Киеву самовывоз с нашего склада</p>
        <p>По Украине доставка курьерской службой</p>
    </div>
</div>
</section>
<div class="d-flex view-main-description-info">
    {!! $viewprod->description !!}
</div>
    @if ($viewprod->productrecommendOne == null)
        <h2 class="font-weight-bold my-5">
            Рекоммендуемые товары:
        </h2> 
    @endif
 
      
@if($viewprod->productrecommendOne == null)
    

<div class="blog-view-main-recommend  d-flex flex-row  text-center my-5 animated fadeIn">
    @foreach($recommend as $item)
        <div class="blog-popular col-xl-4 ">
            <figure  class="view overlay rounded z-depth-2 mb-4">
            <img  src="/storage/app/public/{{$item->recommends->images}}" 
                                title="{{$item->recommends->title_images}}" 
                                alt="{{$item->recommends->alt_images}}"  >
            </figure >
            <h4 class="font-weight-bold mb-3">
                <strong>
                    {{ $item->recommends->name }}
                </strong>
            </h4>     
            <p class="text-justify dark-grey-text blog-popular-text ">
                {{str_limit($item->recommends->mini_description, 300)}}
            </p>
            <a  href="{{url($item->recommends->seo_title)}}" class="btn btn-light-green btn-rounded btn-md">
                Подробние
            </a>
        </div>
    
    @endforeach
    </div>   
    @endif 
<div class="container view-main-comments">
    <div class="login-page">
        <div class="form">
            <form method="POST"  class="login-form">
                {{ csrf_field() }}
                <label>Ваше имя:</label>
                <input class="form-control z-depth-1" type="text" name="login" />
                <label>Достоинства:</label>
                <input class="form-control z-depth-1" type="text" name="reach" />
                <label>Недостатки:</label>
                <input class="form-control z-depth-1" type="text" name="limitations" />
                <label>Ваше сообщение:</label>
                <textarea class="blog-view-main-input form-control z-depth-1 " type="text" name="comment"></textarea>
                <input class="id" name="prod_id" type="hidden" value="{{$viewprod->id}}"  >
                <input class="comments-submit btn btn-light-green" type="submit" value="Оставить отзыв">
        @if ($errors->any())
            <div class="errors-form text-left alert red accent-4 font-weight-bold">
            <ul>
        @foreach ($errors->all() as $error)
                <li>
                {{ $error }}
                </li>
        @endforeach
                </ul>
            </div>
            <div class="errors text-left alert red accent-4 font-weight-bold">
              <ul>
        @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
        @endforeach
            </ul>
            </div>
        @endif 
        @if(session()->has('goods'))
            <div class="sussec d-flex justify-content-center alert light-green example hoverable">
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
                    <h4 class="modal-title w-100" id="myModalLabel">
                        Отзывы:
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class=" modal-body">
                        <div class="comments ">
                @foreach ($comments as $item)   
                    <div class="comments-view  card d-flex align-items-start ">
                        <p class="font-weight-bold">Имя:</p> {{ $item->name }}
                        <p class=" font-weight-bold">Недостатки:</p>{{ $item->bad_comments }} 
                        <p class="font-weight-bold">Достоинства:</p> {{ $item->good_comments }}
                        <p class="grey-text">Сообщение:</p> {{ $item->description }}
                    </div>
                @endforeach
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">
                            Закрыть
                        </button>
                     </div>
            </div>
        </div>
    </div>
</article>
@endsection