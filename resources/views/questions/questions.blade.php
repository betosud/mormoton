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
<script>
    function newmodal() {
        $('#question').val('');
        $('#answer').val('');
        $('#idbook').val(null);
        $('#newmodal').modal('show');
    }
    var listarquestion = function () {

        var url = 'listarquestion';
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('#questions').empty().html(data);
            }
        });
    };

    $("#guardarpregunta").click(function () {
        mostrar();
        var form=$('#form-add-question')
        var url=form.attr('action');
        var data=form.serialize();

        $.ajax({
            url:url,

            type:'POST',

            data:data,
            success:function(salida){
                ocultar();

                toastr.success('La pregunta se Guardo Correctamente',{timeOut: 1500});
                $('#question').val('');
                $('#answer').val('');
                $('#idbook').val(null);
                $('#newmodal').modal('hide');
                listarquestion();


            },
            error:function(msj){
                ocultar();
//                    $('#loading').modal('hide')
//                     toastr.warning('Error al enviar el mensaje compruebe su conexion',{timeOut: 4000});
                var result =msj.responseJSON;
                $.each(result, function(i, item) {
//                        Materialize.toast(item,3000,'rounded');
                    toastr.error(item,{timeOut: 4000});
                });


            }
        });
    })
    $(document).ready(function() {
        listarquestion();
        ocultar();
    });


    function mostrar() {
        document.getElementById("loader").style.display = "block";

    }
    function ocultar() {
        document.getElementById("loader").style.display = "none";

    }

</script>

@endsection