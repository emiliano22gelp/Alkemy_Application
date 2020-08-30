@extends('layouts.app')

@section('content')

<div class="jumbotron">
<h1>Todas las Categorias</h1>
<br>
<br>
<table class="table" border="2">
  <thead>
    <tr>
      <th scope="col">Nombre de la Categoria</th>
      <th scope="col">Cantidad de Aplicaciones</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
    <tr>
      <th scope="row">{{ $category->name }}</th>
      <th scope="row">{{ $category->umount }}</th>
      <td>
      @auth
        <a href="{{ route('apps', $category->id) }}" class="btn btn-primary btn-sm">Ver Aplicaciones</a>
      @endauth
      @guest
        <a href="{{ route('visitApps', $category->id) }}" class="btn btn-primary btn-sm">Ver Aplicaciones</a>
      @endguest
      </td>
    </tr>
  @endforeach  
  </tbody>
</table>
</div>

@endsection