@extends('layouts.app')

@section('content')

<div class="jumbotron">
  @if (session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
    @endif
@if($count == 0)
  <h1>No haz comprado ninguna aplicacion</h1>
@else    
<h1 class="text-center">Mis Aplicaciones Compradas</h1>
<br>
<br>  
<table class="table" border="2">
  <thead>
    <tr>
      <th scope="col">Nombre de la Aplicacion</th>
      <th scope="col">Imagen/Logo</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($apps as $app)
    <tr>
      <th scope="row">{{$app->name}}</th>
      <td><img src="{{asset("css/$app->image")}}" width="60" height="40" /></td>
      <td>
        <button id='myajax' class="btn btn-primary">Cancelar Compra</button>
    </tr>
  @endforeach  
  </tbody>
</table>
@endif
</div>

@endsection