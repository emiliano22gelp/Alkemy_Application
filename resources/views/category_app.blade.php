@extends('layouts.app')

@section('content')
 @if ($count == 0)
 <div class="jumbotron">
  <div class="text-center">
    <h1>No hay ninguna aplicacion en la categoria {{ $category_name }}</h1>
  </div>
</div>
  @else
  <div class="jumbotron">
    <h1>Aplicaciones de la Categoria "{{ $category_name }}"</h1>
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
      @auth
        <a href="{{ route('application_detail', $app->id) }}" class="btn btn-primary btn-sm">Ver Detalle</a>
      @endauth
      @guest
        <a href="{{ route('visitDetailApp', $app->id) }}" class="btn btn-primary btn-sm">Ver Detalle</a>
      @endguest
      </td>
    </tr>
  @endforeach  
  </tbody>
</table>
{{$apps->links()}}
</div>
@endif

@endsection