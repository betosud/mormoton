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

                    <div class="form-group{{ $errors->has('book') ? ' has-error' : '' }}">
                        <label for="book" class="col-md-4 control-label">Seleccione libro</label>

                        <div class="col-md-8">
                            {{--<input id="book" type="text" class="form-control" name="book" value="{{ old('book') }}">--}}
                            {!!  Form::select('idbook', $combos['books'],null,['id'=>'idbook', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('idbook')]) !!}
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
                            <input id="question" type="text" class="form-control" name="question" value="{{ old('question') }}">
{{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('question'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                        <label for="answer" class="col-md-4 control-label">Escriba la Respuesta</label>

                        <div class="col-md-8">
                            <input id="answer" type="text" class="form-control" name="answer" value="{{ old('answer') }}">
                            {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('answer'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
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