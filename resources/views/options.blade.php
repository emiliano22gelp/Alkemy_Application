@extends('layouts.app')

@section('content')
<h1>¡¡Usted se ha logueado como "{{$user_role}}"!!</h1>
<br>
<br>
@if ($user_role == 'Desarrollador')
<div class="text-center">
<div class="card text-center mb-3" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title">Nueva Aplicacion</h5>
    <p class="card-text">Crea una nueva aplicacion y cargela en el sistema.</p>
    <a href="{{ route('newApplication') }}" class="btn btn-primary">Acceder</a>
  </div>
</div>
<br>
<br>
<div class="card text-center mb-3" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title">Mis aplicaciones</h5>
    <p class="card-text">Vea todas sus aplicaciones creadas, editelas o eliminelas.</p>
    <a href="{{ route('myApps') }}" class="btn btn-primary">Acceder</a>
  </div>
</div>
</div>
@else
<div class="text-center">
<div class="card text-center mb-3" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title">Todas las Categorias y Applicaciones</h5>
    <p class="card-text">Vea todas las categorias del sistema junto a sus aplicaciones.</p>
    <a href="{{ route('allCategories') }}" class="btn btn-primary">Acceder</a>
  </div>
</div>
<br>
<br>
<div class="card text-center mb-3" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title">Mis aplicaciones</h5>
    <p class="card-text">Vea todas sus aplicaciones compradas.</p>
    <a href="{{ route('myApps') }}" class="btn btn-primary">Acceder</a>
  </div>
</div>
</div>
<br>
<br>
<div class="card text-center mb-3" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title">Ver mi Carrito</h5>
    <p class="card-text">Vea las aplicaciones que ha guardado en su carrito; comprelas o borrelas del mismo.</p>
    <a href="{{ route('myShoppingCart') }}" class="btn btn-primary">Acceder</a>
  </div>
</div>
</div>
@endif

@endsection