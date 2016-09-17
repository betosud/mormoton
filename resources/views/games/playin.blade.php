
@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div  class="panel-heading">Mormoton</div>
                    <div class="panel-body">

                        <div >
<h3 id="timer" name="timer">Texto</h3>
                        </div>
                        {!! Form::open(array('url' => 'savegame', 'method' => 'post','name'=>'finishgame','class'=>'form-horizontal','id'=>'form-add-question')) !!}

                        <input id="id" type="text" class="form-control hide" name="id" value="{!! $game->id !!}">


                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php $totalquestions=0?>
                            @foreach($questions as $question)

                                @if($totalquestions==0)
                                    <div role="tabpanel" class="tab-pane active" id="pregunta{!! $totalquestions !!}">
                                        <div class="container">
                                            <br>
                                            <p>
                                            <h3>Pregunta {!! $totalquestions+1 !!}</h3>
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
                                            <br>
                                            <div class="col-md-12 text-center">
                                                {{--<button type="button" class="btn btn-primary btn-lg" href="#pregunta{!! $totalquestions-1 !!}" aria-controls="pregunta{!! $totalquestions-1 !!}" role="tab" data-toggle="tab">Anterior</button>--}}
                                                <button type="button" class="btn btn-primary btn-lg" href="#pregunta{!! $totalquestions+1 !!}" aria-controls="pregunta{!! $totalquestions-1 !!}" role="tab" data-toggle="tab">Siguiente</button>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                        <div role="tabpanel" class="tab-pane" id="pregunta{!! $totalquestions !!}">
                                            <div class="container">
                                                <br>
                                                <p>
                                                <h3>Pregunta {!! $totalquestions+1 !!}</h3>
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

                                                <div class="center-block text-center">
                                                    <button type="button" class=" btn btn-primary btn-lg" href="#pregunta{!! $totalquestions-1 !!}" aria-controls="pregunta{!! $totalquestions-1 !!}" role="tab" data-toggle="tab">Anterior</button>
                                                    @if($totalquestions+1 < count($questions))
                                                    <button type="button" class=" btn btn-primary btn-lg" href="#pregunta{!! $totalquestions+1 !!}" aria-controls="pregunta{!! $totalquestions-1 !!}" role="tab" data-toggle="tab">Siguiente</button>
                                                    @endif
                                                </div>

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
                        <br>
                            <button type="submit" class="btn btn-danger btn-lg">Terminar</button>
                        </div>

{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection



@section('scripts')

    <script>


        function incTimer() {
            var currentMinutes = Math.floor(totalSecs / 60);
            var currentSeconds = totalSecs % 60;
            if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
            if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
            totalSecs++;
            $("#timer").text(currentMinutes + ":" + currentSeconds);
            setTimeout('incTimer()', 100);
        }

            function timer() {

                var horainicio=new Date();
                var horafinal =<?php echo json_encode($game->endtime) ?>;
                horafinal=new Date(horafinal.date);


                var time = ((horafinal - horainicio)/1000);

                var minutes = Math.floor( time / 60 );
                var seconds = time % 60;

                $("#timer").text("Tiempo Restante "+ minutes + ":" + seconds.toFixed());
                if(minutes>0 || seconds>0){
//                    console.log(minutes+":"+seconds.toFixed());
                }
                else {
//                    console.log("sin tiempo")
                    finishgame.submit();
                }

                setTimeout('timer()', 1000);
            }

        $(document).ready(function() {
            setTimeout('timer()', 1000);



        });


    </script>
    @endsection
