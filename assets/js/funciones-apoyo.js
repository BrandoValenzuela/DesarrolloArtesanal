function habilitarCampoAsociacion(){
  if ($("#asociacion-actual option:selected").val() == 2) {
    $("#nombre-asoc-actual").prop("disabled", false);
  }else{
    $("#nombre-asoc-actual").prop("disabled", true);
    $("#nombre-asoc-actual").val('');

  }
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


// pevb930116hzsrlr07