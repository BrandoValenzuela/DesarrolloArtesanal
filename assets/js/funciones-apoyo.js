function habilitarCampoAsociacion(){
  if ($("#asociacion-actual option:selected").val() == 2) {
    $("#nombre-asoc-actual").prop("disabled", false);
  }else{
    $("#nombre-asoc-actual").prop("disabled", true);
    $("#nombre-asoc-actual").val('');

  }
}

function habilitarCampoPremio(){
  if ($("#lugar-concurso option:selected").val() == 1) {
    $("#monto-premio-concurso").prop("disabled", true);
    $("#monto-premio-concurso").val('');
  }else{
    $("#monto-premio-concurso").prop("disabled", false);
  }
}

function habilitarCampoActividadPrimaria(){
  if ($("#tipo-actividad option:selected").val() == 2) {
    $("#actividad-primaria").prop("disabled", false);
    $("#actividad-primaria").val('');
  }else{
    $("#actividad-primaria").prop("disabled", true);
  }
}

function muestraFormularioTaller(){
  if($("#pertenencia-taller option:selected").val() == 2) {
    $("#no-pertenece-taller").addClass("oculto");
    $("#si-pertenece-taller").removeClass("oculto");
    $("#lugar-trabajo").val('0');
    $("#prop-taller").val('0');
    $("#tipo-venta").val('0');
  }else{
    $("#no-pertenece-taller").removeClass("oculto");
    $("#si-pertenece-taller").addClass("oculto");
  }
}

function muestrarCamposTaller(){
  if ($("#participacion-taller option:selected").val() == 2) {
    $("#dueño-taller").addClass("oculto");
    $("#sueldo-mensual").addClass("oculto");
    $("#taller-donde-labora").removeClass("oculto");
  }else if ($("#participacion-taller option:selected").val() == 3){
    $("#taller-donde-labora").addClass("oculto");
    $("#sueldo-mensual").addClass("oculto");
    $("#dueño-taller").removeClass("oculto");
  }else{
    $("#dueño-taller").addClass("oculto");
    $("#sueldo-mensual").removeClass("oculto");
    $("#taller-donde-labora").removeClass("oculto");
  }
  $("#curp-artesano").val($("#curp").val());
}

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-registro-rfc").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-registro-rfc").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-inicio-expo").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-inicio-expo").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-fin-expo").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-fin-expo").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-concurso").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-concurso").datepicker( "option", "dateFormat", formato );
})

$(document).ready(function(){
    $("#buscar-artesano").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});

$(document).ready(function(){
    $("#curp").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});

$(document).ready(function(){
    $("#curp-artesano-expo").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});

$(document).ready(function(){
    $("#curp-artesano-concurso").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});
