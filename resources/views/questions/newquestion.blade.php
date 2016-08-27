<div class="modal fade newmodal" id="newmodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newmodallabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Nueva Pregunta</h4>
            </div>
            <div class="modal-body">
                {{--<form id="form-add-question" class="form-horizontal" role="form" method="POST">--}}
                    {!! Form::open(array('url' => 'storequestions', 'method' => 'post','class'=>'form-horizontal','id'=>'form-add-question')) !!}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('book') ? ' has-error' : '' }}">
                        <label for="book" class="col-md-4 control-label">Seleccione libro</label>

                        <div class="col-md-8">
                            {{--<input id="book" type="text" class="form-control" name="book" value="{{ old('book') }}">--}}
                            {!!  Form::select('book', $combos['books'],null,['id'=>'book', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}
                            @if ($errors->has('book'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('book') }}</strong>
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


                    <div class="form-group{{ $errors->has('respuesta') ? ' has-error' : '' }}">
                        <label for="respuesta" class="col-md-4 control-label">Escriba la Respuesta</label>

                        <div class="col-md-8">
                            <input id="respuesta" type="text" class="form-control" name="respuesta" value="{{ old('respuesta') }}">
                            {{--                            {!!  Form::select('question', $combos['question'],null,['id'=>'question', 'placeholder'=>'Selecciona Libro','class'=>'form-control','value'=>old('book')]) !!}--}}
                            @if ($errors->has('respuesta'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('respuesta') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                <button href="#" id="guardarpregunta" type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        </form>
    </div>
</div>