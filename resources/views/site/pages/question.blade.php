@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
@if ($questeion !== null)
    

<div class="blog">
        <h2 class="h1-responsive   my-5">Часто задаваемые вопросы:</h2>
    @foreach ($questeion as $item)
    <div class="accordion md-accordion accordion-1" id="accordionEx23" role="tablist">
            <div class="card">
              <div class="card-header light-green z-depth-1" role="tab" id="heading{{$item->id}}">
                <h5 class="text-uppercase mb-0 py-1">
                  <a class="white-text font-weight-bold" data-toggle="collapse" href="#collapse{{$item->id}}" aria-expanded="true"
                    aria-controls="collapse{{$item->id}}">
                    {{$item->question}}
                  </a>
                </h5>
              </div>
              <div id="collapse{{$item->id}}" class="collapse " role="tabpanel" aria-labelledby="heading{{$item->id}}" data-parent="#accordionEx23">
                <div class="card-body">
                  <div class="d-flex align-items-center row my-4">
                    <div class="col-md-8">
                    <p class="text-justify">{{$item->answer}}</p>
                    </div>
                    <div class="col-md-4 mt-3 pt-2">
                      <div class="view z-depth-1">
                      <img src="/storage/app/public/{{$item->img}}" alt="{{$item->alt_img}}" title="{{$item->title_img}}" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
          </div>
    @endforeach
</div>
@endif

@endsection