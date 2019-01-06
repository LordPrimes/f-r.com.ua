@extends('site.layouts.index')

@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach

<dIv class="container">
    <div class="row">
    <div class="d-flex blog">
        {!!$pages->body!!}
   
        <div>
</div>
</div>
@endsection