@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Bienvenido</div>



                <div class="panel-body">



                    @if(Session::has('message'))
                        <div class="jumbotron">
                            <h3 class="text-center">Te enviamos un correo para establecer tu contraseña</h3>

                        </div>
                        @else
                        <div class="jumbotron">
                            <h1 class="text-center">Bienvenido a Mormoton</h1>
                            <h3 class="text-center lead">
                                Mormoton, pone a prueba tus conocimientos que has adquirido a los largo de tu vida, de una forma divertida y entretenida
                            </h3>
                            <H2 class="text-center">¡Demuestra Cuanto Sabes de las Escrituras!</H2>
                            <img src="{!! asset('imagenes/bienvenida.png') !!}" WIDTH=300 HEIGHT=300 class="img-rounded center-block">
                            @if(Auth::guest())
                            <p><a class="btn btn-primary btn-lg center-block" href="{{ url('/register') }}" role="button">Registrate</a></p>
                                @endif
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
