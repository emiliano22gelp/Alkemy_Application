@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
	<h3 style="text-align: center;">Editar Aplicacion</h3>
	<br>

  @if (session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
    @endif
<div class="container">	
<form action="{{ route('updateApp', $app->id) }}" enctype="multipart/form-data" method="POST">
  @method('PUT')
  @csrf
<div class="text-center">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Nombre: <strong>{{ $app->name }}</strong></label> </br> 
  </div>
  </div>
</br>
 @error('image')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Por favor seleccione una imagen antes de continuar
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @enderror
<div class="text-center">
   <div class="form-group">
    <label for="myfile">Cambiar la imagen de la aplicacion</label> </br>
      <input type="file" class="form-control" id="image" name="image"> 
  </div>
  </div>
</br>
 @error('price')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            El campo precio es obligatorio
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @enderror
<div class="text-center">
  <div class="form-group">
   <label for="myfile">Cambiar el precio de la aplicacion</label> </br>
      <input type="number" class="form-control" id="price" name="price"  value="{{ $app->price }}" required> 
  </div>
</div>
</br>
<div class="text-center">
<div class="form-group">
  <label for="exampleFormControlSelect1">Categoria: <strong>{{ $app->category->name }}</strong></label>
</div>
</div>
<input type="hidden" name="name" value="{{ $app->name }}">
<input type="hidden" name="category_id" value="{{ $app->category_id }}">
<input type="hidden" name="user_id" value="{{ $app->user_id }}">
<input type="hidden" name="img" value="{{ $app->image }}">
  <button class="btn btn-primary btn-block" type="submit">Actualizar</button> 
  
</form>
</div>
</div>

@endsection