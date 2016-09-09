
@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Tiempo Restante {!! $game->endtime !!}</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => 'savegame', 'method' => 'post','class'=>'form-horizontal','id'=>'form-add-question')) !!}

                        <input id="id" type="text" class="form-control hide" name="id" value="{!! $game->id !!}">
                        <ul class="nav nav-pills" role="tablist">
                            @foreach($questions as $question)
                                @if($totalquestions==0)
                                <li role="presentation" class="active"><a href="#pregunta{!! $totalquestions !!}" aria-controls="pregunta{!! $totalquestions !!}" role="tab" data-toggle="tab">Pregunta {!! $totalquestions+1 !!}</a></li>
                                @else
                                    <li role="presentation"><a href="#pregunta{!! $totalquestions !!}" aria-controls="pregunta{!! $totalquestions !!}" role="tab" data-toggle="tab">Pregunta {!! $totalquestions+1 !!}</a></li>
                                @endif
                                <?php $totalquestions++?>
                            @endforeach
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php $totalquestions=0?>
                            @foreach($questions as $question)

                                @if($totalquestions==0)
                                    <div role="tabpanel" class="tab-pane active" id="pregunta{!! $totalquestions !!}">
                                        <div class="container">
                                            <br>
                                            <p>
                                            <h4>{!! $question->question !!} </h4>

                                            </p>
                                            <hr class="separator">
                                            <?php $answertotal=0?>
                                                @foreach($answergame[$totalquestions] as $opcion)
                                                    <div class="radio">
                                                        <label><input type="radio" name="{!! $question->id !!}" value="{!! $opcion->id !!}">{!! $opcion->answer !!}</label>
                                                    </div>
                                                <?php $answertotal++?>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                        <div role="tabpanel" class="tab-pane" id="pregunta{!! $totalquestions !!}">
                                            <div class="container">
                                                <br>
                                                <p>
                                                <h4>{!! $question->question !!} </h4>
                                                </p>
                                                <hr class="separator">
                                                <?php $answertotal=0?>
                                                @foreach($answergame[$totalquestions] as $opcion)
                                                    <div class="radio">
                                                        <label><input type="radio" name="{!! $question->id !!}" value="{!! $opcion->id !!}">{!! $opcion->answer !!}</label>
                                                    </div>
                                                    <?php $answertotal++?>
                                                @endforeach
                                            </div>
                                        </div>
                                @endif
                                    <?php $totalquestions++?>
                            @endforeach
                            {{--<div role="tabpanel" class="tab-pane" id="profile">...</div>--}}
                            {{--<div role="tabpanel" class="tab-pane" id="messages">...</div>--}}
                            {{--<div role="tabpanel" class="tab-pane" id="settings">...</div>--}}
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Terminar</button>
                        </div>

{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection