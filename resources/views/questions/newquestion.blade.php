<style>
    /* Center the loader */
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 }
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
        from{ bottom:-100px; opacity:0 }
        to{ bottom:0; opacity:1 }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>


<div class="modal fade" id="newmodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newmodallabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Nueva Pregunta</h4>
            </div>
            <div class="modal-body">
                <div  id="loader"></div>
                {{--<form id="form-add-question" class="form-horizontal" role="form" method="POST">--}}
                    {!! Form::open(array('url' => 'storequestions', 'method' => 'post','class'=>'form-horizontal','id'=>'form-add-question')) !!}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('idbook') ? ' has-error' : '' }}">
                        <label for="book" class="col-md-4 control-label">Seleccione Libro Canonico</label>

                        <div class="col-md-8">
                            {{--<input id="book" type="text" class="form-control" name="book" value="{{ old('book') }}">--}}
                            {!!  Form::select('idbook', $combos['books'],null,['onchange' => 'seleccionacanonico()' ,'id'=>'idbook', 'placeholder'=>'Selecciona','class'=>'form-control','value'=>old('idbook')]) !!}
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
                            <input id="question" type="text" placeholder="Escriba la pregunta" class="form-control" name="question" value="{{ old('question') }}">
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
                            <input id="answer" type="text" placeholder="Escriba la Respuesta completa" class="form-control" name="answer" value="{{ old('answer') }}">
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
                        {!!  Form::select('libro', [],null,[ 'onchange' => 'seleccionalibro()','id'=>'libro', 'placeholder'=>'Selecciona','class'=>'form-control','value'=>old('libro')]) !!}
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
                        <input id="versiculos" type="text" placeholder="nemero de versiculos 1  o  1-3" class="form-control" name="versiculos" value="{{ old('versiculos') }}">
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
                        <input id="option1" type="text" placeholder="Escriba opcion de respuesta" class="form-control" name="option1" value="{{ old('option1') }}">
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
                        <input id="option2" type="text" placeholder="Escriba opcion de respuesta" class="form-control" name="option2" value="{{ old('option2') }}">
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
                        <input id="option3" type="text" placeholder="Escriba opcion de respuesta" class="form-control" name="option3" value="{{ old('option3') }}">
                        {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                        @if ($errors->has('option3'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('option3') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                </form>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                <a href="#" id="guardarpregunta" type="button" class="btn btn-primary">Guardar</a>
            </div>
        </div>
    </div>
</div>