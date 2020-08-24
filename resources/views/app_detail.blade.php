@extends('layouts.app')

@section('content')

<div class="jumbotron">
	<div class="text-center">
   	<div class="form-group">
    <label for="exampleFormControlSelect1">Nombre de la Aplicacion</label> </br>
      <h4>{{ $app->name }}</h4> 
  </div>
  </div>
  <br>
  <div class="text-center">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Imagen/Logo</label> </br>
      <img src="{{asset("css/$app->image")}}" width="100" height="80" /> 
  </div>
  </div>
  </br>
  <div class="text-center">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Precio</label> </br>
      <h4>{{ $app->price }}</h4> 
  </div>
  </div>
  <br>
  <div class="text-center">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Categoria</label> </br>
      <h4>{{ $app->category->name }}</h4> 
  </div>
  </div>
</div>


@endsection