@extends('voyager::master')
@section('page_title', __('voyager::generic.view'))
@section('page_header')
<div class="container">
    <h1 class="text-center">Robots</h1>
</div>

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="robots-body">
         <div class="robots-info text-center">
             <h1>Содержимое файла:</h1>
             {{$contents}}</div>

<form action="{{route('robots')}}" method="POST">
        {{ csrf_field() }}
<textarea class="form-control z-depth-1" cols="42" rows="5" type="text" name="edit" >
        
</textarea>
<button type="submit" class="btn  btn-rounded btn-success">Редактировать</button>
@if(session()->has('goods'))
<div class="alert-success">
    {{ session()->get('goods')}}
</div>
@endif
</form>
@if ($errors->any())
<div class="errors-form text-left alert alert-danger  font-weight-bold">
<ul>
@foreach ($errors->all() as $error)
    <li>
    {{ $error }}
    </li>
@endforeach
    </ul>
</div>
<div class="errors text-left alert alert-danger  font-weight-bold">
  <ul>
@foreach ($errors->all() as $error)
    <li>
        {{ $error }}
    </li>
@endforeach
</ul>
</div>
@endif 
</div>
</div>
</div>
@stop