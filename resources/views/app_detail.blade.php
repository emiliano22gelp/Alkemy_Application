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
    @if($user_role == 'Cliente')
      <br>
      <div class="text-center">
        @if($purchase == false && $saved_app == false)
          <a href="#" class="btn btn-warning">Agregar a mi Carrito</a>
        @endif
        @if($saved_app == true)
            <h3><strong>Ya agregaste esta aplicacion a tu Carrito</strong></h3>
        @endif
        @if($purchase == true)
            <h3><strong>Ya has comprado esta aplicacion</strong></h3>
        @endif
      </div>
    @endif
</div>


@endsection