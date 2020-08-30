@extends('layouts.app')

@section('content')
@guest
<div class="jumbotron jumbotron-fluid" style="margin-left: -150px;margin-right: -150px;background-color:#D4AE5E">
  <div class="container">
    <p class="lead"><h3  class="text-center"> <strong>Pagina de Inicio</strong></h3></p>
    <p class="text-center">
      <a class="btn btn-primary btn-lg" href="{{ route('visitCategories') }}" role="button">Explorar</a>
    </p>
  </div>
</div>
<br>
<br>
@endguest
@auth
<div class="jumbotron">
  <h1 class="display-4">Bienvenido a Nuestro Sitio!</h1>
  <hr class="my-4">
  <p>Haga click sobre el boton "Ver Panel" para ver tus operaciones disponibles.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ route('index') }}" role="button">Ver Panel</a>
  </p>
</div>
@endauth
@endsection
