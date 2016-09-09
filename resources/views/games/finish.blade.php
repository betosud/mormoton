@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Felicidades</div>

                    <div class="panel-body">
                        <div class="jumbotron">
                            <div class="container">
                                <h2 class="text-center">Felicidades: <strong>{!! $game->namegamer !!}</strong></h2>

                                <h3 class="text-center">Puntuacion {!! $game->score !!}</h3>
                                {{--<p><img src="{!! asset('imagenes/'.$game->medalla) !!}" alt="..." class="iimg-circle"></p>--}}
<p>
                                <img src="{!! asset('imagenes/'.$game->medalla) !!}" class="img-circle img-responsive center-block" width="200" height="236" alt="Cinque Terre" >
</p>


                                <p><a class="center-block btn btn-primary btn-lg" href="#" role="button">Compartir en Facebook</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection