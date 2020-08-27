@extends('layouts.app')

@section('content')

<div class="jumbotron">
  @if (session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
    @endif    
<h1 class="text-center">Mi Carrito</h1>
<br>
<br>
@if($count == 0)
  <h1>No tienes ninguna aplicacion en tu carrito</h1>
@else  
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
        <button id='myajax' class="btn btn-primary">Comprar Aplicacion</button>
        <button id='myajax2' class="btn btn-danger">Quitar de mi Carrito</button>
    </tr>
  @endforeach  
  </tbody>
</table>
@endif
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type = "text/javascript">
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $('#myajax').click(function(){
            $.ajax({
               url:'buy',
               data:{'app_id':{{ $app->id }}},
               type:'post',
               success:  function (response) {
                  location.reload();
               },
            });
             });
       </script>


@endsection