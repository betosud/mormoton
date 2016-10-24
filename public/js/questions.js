/**
 * Created by enrique on 03/09/16.
 */
function newmodal() {
    $('#question').val('');
    $('#answer').val('');
    $('#idbook').val(null);
    $('#capitulo').val(null);
    $('#libro').val(null);
    $('#versiculos').val('');
    $('#option1').val('');
    $('#option2').val('');
    $('#option3').val('');
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
            $('#capitulo').val(null);
            $('#libro').val(null);
            $('#versiculos').val('');
            $('#option1').val('');
            $('#option2').val('');
            $('#option3').val('');

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

function seleccionalibro() {
    var libro=$('#libro').val();
    var url='combos/capitulos/'+libro;
    // console.log('status '+valor);
    $.get(url,function(result){
        $('#capitulo').empty();
        $('#capitulo').append('<option value="">Selecciona</option>');

        for (i = 1; i <= result; i++) {
            $('#capitulo').append('<option value='+i+'>'+i+'</option>');
        }
    });
    console.log(url);
}
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

function mostrar() {
    document.getElementById("loader").style.display = "block";

}
function ocultar() {
    document.getElementById("loader").style.display = "none";

}

$(document).on('click','.pagination li a',function(e){
    e.preventDefault();



    var page=$(this).attr('href');

    var route=page.split('?')[0];
    var pageid=page.split('=')[1];
    var clase='.'+route;
    $.ajax({
        type:'get',
        url:page,
        success: function (data) {
            $('#questions').empty().html(data);

        }
    });
});