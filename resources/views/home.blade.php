@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Mi panel</div>

                <div class="panel-body">
                    @role('assistant|admin')
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <h3>Nueva Partida</h3>
                                        {{--<p>...</p>--}}
                                        <p>
                                            <a href="{!! route('newgame') !!}" class="btn btn-success btn-lg" role="button">Iniciar</a>
                                            {{--<a href="#" class="btn btn-default" role="button">Button</a>--}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <h3>Puntualion mas alta</h3>
                                        {{--<p>...</p>--}}
                                        <p>
                                            <a href="#" class="btn btn-success btn-lg" role="button">Ver Todas</a>
                                            {{--<a href="#" class="btn btn-default" role="button">Button</a>--}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
