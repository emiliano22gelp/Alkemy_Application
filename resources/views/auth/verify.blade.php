@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique su correo electronico</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                        </div>
                    @endif

                    Antes de continuar, consulte su correo electrónico para ver si hay un enlace de verificación.
                    Si no recibió el correo electrónico, <a href="{{ route('verification.resend') }}">haga clic aquí para solicitar otro</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
