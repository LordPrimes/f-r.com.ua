@extends('site.layouts.index')
@section('content')
@foreach ($seo as $item)
   <div class="d-none d-print-block"> <h1>{{$item->h1}}</h1></div>
@endforeach
<div class="container">
  <div class="row">
        @foreach($category as $item)
        @if($item->subcategory->count() > 0)
            <li class="">
                 <a href="#">главная {{ $item->name }}</a>
                 <ul>
                     @foreach($item->subcategory as $submenu)
                         <li>подкатегория<a href="/{{ $submenu->slug }}">{{ $submenu->name }}</a></li>
                      @endforeach
                 </ul>
           </li>
       
        @endif
    @endforeach
</div>
</div>
@endsection