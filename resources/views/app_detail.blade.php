@extends('layouts.app')

@section('content')

<div class="jumbotron">
	<div class="text-center">
    @if (session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
    @endif
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
  <input type="hidden" name="application_id" id="app_id" value="{{ $app->id }}">
    @if($user_role == 'Cliente')
      <br>
      <div class="text-center">
        @if($purchase == false && $saved_app == false)
            <button id='myajax'>Agregar al Carrito</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type = "text/javascript">
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $('#myajax').click(function(){
            $.ajax({
               url:'api',
               data:{'app_id':{{ $app->id }}},
               type:'post',
               success:  function (response) {
                  location.reload();
               },
            });
             });
       </script>


@endsection