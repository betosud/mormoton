@extends('layouts.app')

@section('content')

<div class="container">



        <div class="panel panel-primary">
            <div class="panel-heading">Preguntas Mormoton</div>
                <div class="panel-body">
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newmodal">Agregar Pregunta</button>
                    </div>
                    <div class="questions">

                    </div>
                </div>
    </div>
</div>


    @include('questions.newquestion')






@if ($errors->has('book') || $errors->has('question') || $errors->has('respuesta'))
    
        <script>

            $('#newmodal').modal({
                show: 'true'
            });
        </script>

@endif
@endsection



@section('scripts')
{{--<script>--}}
    {{--$(document).ready(function() {--}}
        {{--$("#guardarpregunta").click(function () {--}}
            {{--var form=$('#form-add-question')--}}
            {{--var url=form.attr('action');--}}
            {{--var data=form.serialize();--}}

            {{--$.ajax({--}}
                {{--url:url,--}}
{{--//                headers:{'X-CSRF-TOKEN':token},--}}
                {{--type:'POST',--}}
{{--//                datatype:'json',--}}
                {{--data:data,--}}
                {{--success:function(salida){--}}


{{--//                    toastr.success('El correo Fue enviado',{timeOut: 1500});--}}
{{--//                    $('#loading').modal('hide');--}}
{{--//                    $('#enviar').modal('hide');--}}
                {{--},--}}
                {{--error:function(msj){--}}
{{--//                    $('#loading').modal('hide')--}}
{{--//                     toastr.warning('Error al enviar el mensaje compruebe su conexion',{timeOut: 4000});--}}
                    {{--var result =msj.responseJSON;--}}
                    {{--$.each(result, function(i, item) {--}}
                        {{--Materialize.toast(item,3000,'rounded');--}}
                    {{--});--}}


                {{--}--}}
            {{--});--}}
        {{--})--}}
    {{--});--}}
{{--</script>--}}

@endsection