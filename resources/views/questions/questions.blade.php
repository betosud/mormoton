@extends('layouts.app')

@section('content')

<div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Preguntas Mormoton</div>
                <div class="panel-body">
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-primary" onclick="newmodal()">Agregar Pregunta</button>
                    </div>
                    <div id="questions" class="questions">

                    </div>
                </div>
    </div>
</div>


    @include('questions.newquestion')
@endsection



@section('scripts')
    {!! Html::script('js/questions.js') !!}

@endsection