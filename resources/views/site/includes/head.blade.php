<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
<title>{{ $item->Title }}</title>

 @endforeach
<link rel="stylesheet" href="{{ mix('css/styleCore.css') }}">
<link href="{{asset('img/ico-f-r.png')}}" rel="icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
