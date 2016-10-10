@extends('layouts.app')




@section('content')

    <div class="container">
        <div class="row">



            <div class="">
                <div class="panel panel-primary">
                    <div class="panel-heading">Mis Juegos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Libro</th>
                                    <th>Nivel</th>
                                    <th>Calificacion</th>
                                    <th>Aciertos</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <th>
                                        {!! $game->fechagame !!}
                                    </th>
                                    <th>
                                        {!! $game->bookname !!}
                                    </th>
                                    <th>
                                        {!! $game->niveldsc !!}
                                    </th>
                                    <th>
                                        {!! $game->calificacion !!}
                                    </th>
                                    <th>
                                        {!! $game->score !!}
                                    </th>
                                    <th>
                                        <a class="center-block btn btn-info btn-sm" target="_blank" href="{!! route('score',[$game->id,$game->token]) !!}" role="button">Compartir</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            </div>


                        <div class="pagination">

                            {!! $games->render() !!}

                        </div>
                    </div>
            </div>
        </div>
    </div>


@endsection