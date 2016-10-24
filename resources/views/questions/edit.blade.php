@extends('layouts.app')

@section('content')

<div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Editar Pregunta</div>
                <div class="panel-body">

                    {!! Form::model($question,['route' => ['actualizaquestion',$question->id], 'method' => 'PUT','class'=>'form-horizontal']) !!}


                    <div class="form-group{{ $errors->has('idbook') ? ' has-error' : '' }}">
                        <label for="book" class="col-md-4 control-label">Seleccione Libro Canonico</label>

                        <div class="col-md-8">
                            {{--<input id="book" type="text" class="form-control" name="book" value="{{ old('book') }}">--}}
                            {!!  Form::select('idbook', $combos['books'],$answers[0]->canonico,['onchange' => 'seleccionacanonico()' ,'id'=>'idbook', 'placeholder'=>'Selecciona','class'=>'form-control','value'=>old('idbook')]) !!}
                            @if ($errors->has('idbook'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('idbook') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                        <label for="question" class="col-md-4 control-label">Escriba la Pregunta</label>

                        <div class="col-md-8">
                            <input id="question" type="text" placeholder="Escriba la pregunta" class="form-control" name="question" value="{!! $question->question !!}">
                            {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('question'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                        <label for="answer" class="col-md-4 control-label">Respuesta Correcta</label>

                        <div class="col-md-8">
                            <input id="answer" type="text" placeholder="Escriba la Respuesta completa" class="form-control" name="answer" value="{!! $answers[0]->answer !!}">
                            {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('answer'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div><h4 class="text-center">Referencia</h4> </div>
                    <div class="form-group{{ $errors->has('libro') ? ' has-error' : '' }}">
                        <label for="libro" class="col-md-4 control-label">Libro</label>

                        <div class="col-md-8">
                            {{--<input id="libro" type="text" class="form-control" name="libro" value="{{ old('libro') }}">--}}
                            {!!  Form::select('libro', $combos['libros'],($answers[0]->libro),[ 'onchange' => 'seleccionalibro()','id'=>'libro', 'placeholder'=>'Selecciona','class'=>'form-control','value'=>old('libro')]) !!}
                            @if ($errors->has('libro'))
                                <span class="help-block">
                                <strong>{{ $errors->first('libro') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('capitulo') ? ' has-error' : '' }}">
                        <label for="capitulo" class="col-md-4 control-label">Capitulo</label>

                        <div class="col-md-8">
                            {{--<input id="libro" type="text" class="form-control" name="libro" value="{{ old('libro') }}">--}}
                            {!!  Form::select('capitulo', [],null,['id'=>'capitulo', 'placeholder'=>'Selecciona','class'=>'form-control','value'=>old('capitulo')]) !!}
                            @if ($errors->has('capitulo'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('capitulo') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('versiculos') ? ' has-error' : '' }}">
                        <label for="versiculos" class="col-md-4 control-label">Versiculo (s)</label>

                        <div class="col-md-8">
                            <input id="versiculos" type="text" placeholder="nemero de versiculos 1  o  1-3" class="form-control" name="versiculos" value="{!! $answers[0]->versiculos !!}">
                            {{--                        {!!  Form::select('versiculo', [],null,['id'=>'versiculo', 'placeholder'=>'Versiculos','class'=>'form-control','value'=>old('versiculo')]) !!}--}}
                            @if ($errors->has('versiculos'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('versiculos') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div><h4 class="text-center">Opciones</h4> </div>
                    {{--opcion 1--}}
                    <div class="form-group{{ $errors->has('option1') ? ' has-error' : '' }}">
                        <label for="option1" class="col-md-4 control-label">Opcion 1</label>

                        <div class="col-md-8">
                            <input id="option1" type="text" placeholder="Escriba opcion de respuesta" class="form-control" name="option1" value="{!! $answers[1]->answer !!}">
                            {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('option1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('option1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--opcion 2--}}
                    <div class="form-group{{ $errors->has('option2') ? ' has-error' : '' }}">
                        <label for="option2" class="col-md-4 control-label">Opcion 2</label>

                        <div class="col-md-8">
                            <input id="option2" type="text" placeholder="Escriba opcion de respuesta" class="form-control" name="option2" value="{!! $answers[2]->answer !!}">
                            {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('option2'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('option2') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--opcion 3--}}
                    <div class="form-group{{ $errors->has('option3') ? ' has-error' : '' }}">
                        <label for="option3" class="col-md-4 control-label">Opcion 3</label>

                        <div class="col-md-8">
                            <input id="option3" type="text" placeholder="Escriba opcion de respuesta" class="form-control" name="option3" value="{!! $answers[3]->answer !!}">
                            {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('option3'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('option3') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>




                    <div class="col-md-8 bottom-right">
                        <a href="{!! route('questions') !!}" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                        <button  type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>





                </div>  {{--final de panel body--}}
    </div>
</div>


    @include('questions.newquestion')
@endsection



@section('scripts')
    <script>

        $(document).ready(function() {
            seleccionacanonico();
            seleccionalibro();

        });
        function seleccionacanonico() {
            var canonico=$('#idbook').val();
            var url='../combos/libros/'+canonico;
            $.get(url,function(result){
                $('#libro').empty();
                $('#libro').append('<option value="">Selecciona</option>');
                $('#capitulo').empty();
                $('#capitulo').append('<option value="">Selecciona</option>');
                $.each(result, function(i, item) {
                    $('#libro').append('<option value='+i+'>'+item+'</option>')
                });
            });
        }

        function seleccionalibro() {
            var libro=$('#libro').val();
            var url='../combos/capitulos/'+libro;
            // console.log('status '+valor);
            $.get(url,function(result){
                $('#capitulo').empty();
                $('#capitulo').append('<option value="">Selecciona</option>');

                for (i = 1; i <= result; i++) {
                    $('#capitulo').append('<option value='+i+'>'+i+'</option>');
                }
            });

        }
    </script>

@endsection