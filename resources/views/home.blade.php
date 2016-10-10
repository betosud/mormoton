@extends('layouts.app')





@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Mi panel</div>

                <div class="panel-body">
                        <div class="row">
                            @if($maxgame)

                            {{--<div class="col-sm-6 col-md-6">--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<div class="caption">--}}
                                        {{--<h3 class="text-center">Mejor Juego</h3>--}}
                                        {{--<h4>Calificacion: <strong>{!! $maxgame->calificacion !!}</strong></h4>--}}
                                        {{--<h4>Puntuacion: <strong>{!! $maxgame->score !!}</strong></h4>--}}
                                        {{--<h4>Dificultad: <strong>{!! $maxgame->niveldsc !!}</strong></h4>--}}
                                        {{--<p>--}}
                                            {{--<a href="#" class="btn btn-success btn-lg" role="button">Ver Todas</a>--}}
                                            {{--<a href="#" class="btn btn-default" role="button">Button</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-sm-10 col-md-10">
                                <div class="row">
                                    <div class="col-lg-offset-4 col-sm-8 col-md-8">
                                        <div class="thumbnail">
                                            <img src="{!! asset('imagenes/'.$maxgame->medalla) !!}" width="90" height="120" alt="...">
                                            <div class="caption">
                                                <h3 class="text-center">Mi mejor Juego</h3>
                                                <h4>Medalla de : <strong>{!! $maxgame->medalladsc !!}</strong></h4>
                                                <h4>Calificacion: <strong>{!! $maxgame->calificacion !!}</strong></h4>
                                                <h4>Aciertos: <strong>{!! $maxgame->score !!}</strong> de <strong>{!! $maxgame->preguntas !!}</strong></h4>
                                                <h4>Dificultad: <strong>{!! $maxgame->niveldsc !!}</strong></h4>
                                                <p class="center-block">
                                                    <a href="{!! route('games') !!}" class="center-block btn btn-primary btn-lg " role="button">Ver Todas</a>
                                                    </p>
                                                <p>
                                                    <a href="{!! route('newgame') !!}" class="center-block btn btn-success btn-lg" role="button">Jugar de nuevo</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @else
                                <div class="col-sm-12 col-md-12">
                                    <a href="{!! route('newgame') !!}" class=" col-lg-12 col-md-12 center-block btn btn-success btn-lg" role="button">Nuevo Juego</a>
                                </div>
                            @endif


                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('layouts.instruccion')
@endsection
