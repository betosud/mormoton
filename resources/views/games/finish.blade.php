@extends('layouts.app')


@section('head')

    <meta property="og:url" content="{!! $urlmormoton !!}" />

    <meta property="og:title" content="Juega Mormoton" />

    <meta property="og:description" content="Calificacion: {!! $game->calificacion !!}  Aciertos: {!! $game->score !!} Nivel:{!! $game->niveldsc !!}" />

    <meta property="og:image" content="{!! asset('imagenes/'.$game->medalla) !!}" />

@endsection



@section('content')


    <div class="container">
        <div class="row">



            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Felicidades</div>
                    <div class="panel-body">
                        <div class="container-fluid">
                                <h2 class="text-center">Felicidades: <strong>{!! $game->namegamer !!}</strong></h2>
                                <h4 class="text-center">Calificacion: <strong> {!! $game->calificacion !!}</strong>  Aciertos: <strong>{!! $game->score !!}</strong></h4>
                                <h4 class="text-center">Difucultad: <strong>{!! $game->niveldsc !!}</strong></h4>
                                <h4 class="text-center">Moneda de : <strong>{!! $game->medalladsc !!}</strong></h4>
                                {{--<p><img src="{!! asset('imagenes/'.$game->medalla) !!}" alt="..." class="iimg-circle"></p>--}}
<p>
                                <img src="{!! asset('imagenes/'.$game->medalla) !!}" class="img-circle img-responsive center-block" width="200" height="236" alt="Cinque Terre" >
</p>



                                    {{--<a class="center-block btn btn-primary btn-lg col-md-6" href="{!! url('facebook') !!}" role="button">Compartir en Facebook</a>--}}
                            <div class="social-buttons">
                                {{--<a class="center-block btn btn-primary btn-lg col-md-6" role="button" href="{!! url('facebook') !!}"--}}
                                   {{--target="_blank">Compartir en Facebook--}}

                                {{--</a>--}}
                                <p>

                            @if (Auth::guest())
                                <a class="center-block btn btn-success btn-lg col-md-12" href="{{ url('/register') }}" role="button">Registrate</a>
                                @else
                                <a class="center-block btn btn-primary btn-lg col-md-6" role="button" href="javascript: void(0);"onclick="window.open('http://www.facebook.com/sharer.php?u={!! $urlmormoton !!}','popup', 'toolbar=0, status=0, width=650, height=450');">
                                    Compartir Facebook</a>
                                    <a class="center-block btn btn-success btn-lg col-md-6" href="{!! route('newgame') !!}" role="button">Nueva Partida</a>
                                @endif
                                </p>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>



@endsection