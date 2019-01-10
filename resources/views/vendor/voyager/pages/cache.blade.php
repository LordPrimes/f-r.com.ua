@extends('voyager::master')

@section('page_title', __('voyager::generic.view'))

@section('page_header')
<div class="container"><h1>Кеширование базы данных</h1></div>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="cache-container">
<form method="POST" action="{{route('cache')}}">
    {{ csrf_field() }}
    <button class="btn  btn-rounded btn-success" type="submit">кешировать базу данных</button>
</form>

<form method="POST" action="{{route('cacheclear')}}">
        {{ csrf_field() }}
        <button class="btn  btn-rounded btn-success" type="submit">Удалить кеш из базы данных</button>
    </form>
    </div>
    @if(session()->has('goods'))
    <div class="alert-cache alert-success">
        {{ session()->get('goods')}}
    </div>
    @endif
</div>
</div>       
@stop
