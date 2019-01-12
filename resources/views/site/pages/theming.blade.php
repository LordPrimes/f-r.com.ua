@extends('site.layouts.index')

@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach

<dIv class="container">
    <div class="row">
    <div class="d-flex blog col-12 col-md-12 col-lg-12 col-xl-12 text-justify">
        {!!$pages->body!!}
   
        <div>
</div>
</div>
@endsection