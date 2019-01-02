@extends('site.layouts.index')
@section('pageTitle')
«ФемилиРум» ☛Твой склад стройматериалов 
@endsection
@section('content')
 <div class="erros-404"  style="background-image: url('{{ asset("img/500.jpg") }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-white-light d-flex justify-content-center align-items-center">
   
      <div class="container">
 
        <div class="row">
     
          <div class="col-md-12 white-text text-center">
            <h1 class="display-3 mb-0 pt-md-5 pt-5 white-text font-weight-bold wow fadeInDown" >404
              <a class="light-green-text font-weight-bold">Страница не найдена</a>
            </h1>
            <div class="wow fadeInDown" >
            <a href="{{route('main')}}" class="btn btn-light-green btn-lg">Главная</a>
            </div>
          </div>
      
        </div>
  
      </div>
 
    </div>

  </div>

@endsection
