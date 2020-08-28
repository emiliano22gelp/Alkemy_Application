@extends('layouts.app')

@section('content')
 @if (session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
    @endif
<br>
@if($count == 0)
  <h1>No tienes creada ninguna aplicacion</h1>
@else
<h1>Mis Applicaciones</h1>
<br>
<br>
<table class="table" border="2">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
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
        <a href="{{ route('application_detail', $app->id) }}" class="btn btn-primary btn-sm">Ver Detalle</a>
        <a href="{{ route('editApplication', $app->id) }}" class="btn btn-warning btn-sm">Editar</a>

          <form action="{{ route('delete_application', $app->id) }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
        </form>

      </td>
    </tr>
  @endforeach  
  </tbody>
</table>
@endif

@endsection