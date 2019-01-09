@extends('voyager::master')

@section('page_title', __('voyager::generic.view'))

@section('page_header')
<div class="container">
    <div class="row">
    <h1>Параметры атрибута:{{$filter->name}} </h1>
    </div>
</div>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="form-subcategory">
            <h2 class="text-center">Создать атрибут</h2>
    <form class="text-center" action="{{url('admin/filter/'.$filter->id.'/creatatribut')}}" method="POST">
        {{ csrf_field() }}
        <label>Название:</label>
        <input name="name" class="form-control z-depth-1" autocomplete="off" type="text" >
        <label>SEO URL:</label>
        <input name="slug" class="form-control z-depth-1" autocomplete="off" type="text" >
        <input type="hidden" name="id" value="{{$filter->id}}">
        <button class="btn  btn-rounded btn-success" type="submit" >Создать</button>
       
        @if(session()->has('goods'))
<div class="alert-success">
    {{ session()->get('goods')}}
</div>
@endif
    </form>
        </div>
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

@stop
