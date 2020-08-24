@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
	<h3 style="text-align: center;">Nueva Aplicacion</h3>
	<br>

  @if (session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
    @endif
<div class="container">	
<form action="{{ route('createApp') }}" enctype="multipart/form-data" method="POST">
  @csrf
	 @error('name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            El campo nombre es obligatorio
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @enderror
<div class="text-center">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Ingrese el nombre de la aplicacion</label> </br>
      <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" required> 
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
    <label for="myfile">Seleccione la imagen de la aplicacion</label> </br>
      <input type="file" class="form-control" id="image" name="image"  value="{{ old('image') }}" required> 
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
   <label for="myfile">Indique el precio de la aplicacion</label> </br>
      <input type="number" class="form-control" id="price" name="price"  value="{{ old('price') }}" required> 
  </div>
</div>
</br>
 @error('category_id')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Por favor seleccione una categoria antes de continuar
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @enderror
<div class="form-group">
  <label for="exampleFormControlSelect1">Seleccione la categoria</label>
   <select class="form-control" id="category_id" name="category_id" required>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
   </select>
</div>
  <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}">
  <button class="btn btn-primary btn-block" type="submit">Registrar</button> 
  
</form>
</div>
</div>

@endsection