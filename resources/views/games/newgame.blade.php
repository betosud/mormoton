@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Nueva Partida</div>

                    <div class="panel-body">

                        {!! Form::open(array('url' => 'gamemormoton', 'method' => 'post','class'=>'form-horizontal','id'=>'form-add-question')) !!}
                        {{--{{ csrf_field() }}--}}

                        <div class="form-group{{ $errors->has('idbook') ? ' has-error' : '' }}">
                            <label for="book" class="col-md-4 control-label">Seleccione Libro Canonico</label>

                            <div class="col-md-8">
                                {{--<input id="book" type="text" class="form-control" name="book" value="{{ old('book') }}">--}}
                                {!!  Form::select('idbook', $combos['books'],null,['id'=>'idbook', 'placeholder'=>'Selecciona','class'=>'form-control','value'=>old('idbook')]) !!}
                                @if ($errors->has('idbook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idbook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('typelevel') ? ' has-error' : '' }}">
                            <label for="typelevel" class="col-md-4 control-label">Seleccione Nivel</label>

                            <div class="col-md-8">
                                {{--<input id="book" type="text" class="form-control" name="book" value="{{ old('book') }}">--}}
                                {!!  Form::select('typelevel', $combos['level'],null,['id'=>'typelevel', 'placeholder'=>'Selecciona','class'=>'form-control','value'=>old('typelevel')]) !!}
                                @if ($errors->has('typelevel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('typelevel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Iniciar Partida</button>

                            <a href="{!! url('home') !!}" type="button" class="btn btn-danger btn-lg">Cancelar</a>
                                </div>
                        </div>

                        {!! Form::close() !!}
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="button" data-toggle="modal" data-target="#instrucciones" class="btn btn-success btn-lg">Instrucciones</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layouts.instruccion')

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('#instrucciones').modal('show')
        });
    </script>
@endsection