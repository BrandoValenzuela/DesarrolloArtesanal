// -------------------- Funciones inicio sesion -.-------------------------//
$(document).ready(function(){
   $("#login-form").submit(function(){
      return $(this).validate();
   });
});

$("#login-submit").click(function(){
  if ($("#usuario").val() != '' && $("#contraseña").val() != '') {
    var datos = {
      usuario: $("#usuario").val(), 
      contraseña: sha256($("#contraseña").val())
    };
    $.post("?c=Sesion&a=IniciarSesion",datos,function(data, status){
      if (data == "acceso_concedido") {
        location.href = "?c=Principal";             
      }else{ 
        alert("Usuario o contraseña equivocados. Vuelve a intentar.");
      }
    });
  }
});

//-------------------------------------------------------------------------//
// -------------------- Funciones "Form" Artesano -------------------------//
$(document).ready(function(){
   $("#btn-submit-frm-artesano").click(function(){
      $("#frm-artesano").submit(function(){
         return $(this).validate();
      });        
   })
});

$(document).ready(function(){
    $("#curp-artesano").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});

$(document).ready(function(){
   $("#btn-submit-frm-artesano").click(function(){
      $("#nombre-asoc-actual").prop("disabled",false);
   });
});

$(document).ready(function(){
   $("#btn-submit-frm-artesano").click(function(){
      $("#actividad-primaria").prop("disabled",false);
   });
});

$(document).ready(function(){
   $("#btn-submit-frm-artesano").click(function(){
      $("#curp-artesano").prop("disabled",false);
   });
});

$(function() {
   formato = "yy-mm-dd";
   $("#fecha-registro-rfc").datepicker({
      changeMonth: true,
      changeYear: true
   });
   $("#fecha-registro-rfc").datepicker( "option", "dateFormat", formato );
});

$(document).ready(function(){
  $("#tipo-actividad").click(function(){
    if($("#tipo-actividad option:selected").val() == 2) {
      $("#actividad-primaria").prop("disabled", false);
      $("#actividad-primaria").val('');
    }else{
      $("#actividad-primaria").prop("disabled", true);
    }
  })
})

$(document).ready(function(){
  $("#asociacion-actual").click(function(){
    if($("#asociacion-actual option:selected").val() == 2) {
      $("#nombre-asoc-actual").prop("disabled", false);
    }else{
      $("#nombre-asoc-actual").prop("disabled", true);
      $("#nombre-asoc-actual").val('');
    }  
  })
});

$(document).ready(function(){
   $("#pertenencia-taller").click(function(){
      if($("#pertenencia-taller option:selected").val() == 2) {
         $("#no-pertenece-taller").addClass("oculto");
         $("#si-pertenece-taller").removeClass("oculto");
         $("#lugar-trabajo").val('0');
         $("#prop-lugar-trabajo").val('0');
         $("#tipo-venta").val('0');
      }else{
         $("#no-pertenece-taller").removeClass("oculto");
         $("#si-pertenece-taller").addClass("oculto");
      }
   })
});

$(document).ready(function(){
   if($("#pertenencia-taller option:selected").val() == 2) {
      $("#no-pertenece-taller").addClass("oculto");
      $("#si-pertenece-taller").removeClass("oculto");
      $("#lugar-trabajo").val('0');
      $("#prop-lugar-trabajo").val('0');
      $("#tipo-venta").val('0');
   }else{
      $("#no-pertenece-taller").removeClass("oculto");
      $("#si-pertenece-taller").addClass("oculto");
   }
});

//-------------------------------------------------------------------------//
// -------------------- Funciones "Form" Taller ---------------------------//
$(document).ready(function(){
   $("#frm-taller-artesano").submit(function(){
      return $(this).validate();
   });
});

$(document).ready(function(){
   $("#curp-artesano-taller").blur(function(){
      text = $(this).val();
      $(this).val(text.toUpperCase());
   });
});

$(document).ready(function(){
   $("#participacion-artesano").click(function(){
      if ($("#participacion-artesano option:selected").val() == 3) {
         $("#form-datos-empleado-colaborador").addClass("oculto");
         $("#form-datos-taller").removeClass("oculto");
      }else if ($("#participacion-artesano option:selected").val() == 2) {
         $("#form-datos-empleado-colaborador").removeClass("oculto");
         $("#form-datos-taller").addClass("oculto");
         $("#sueldo").addClass("oculto");
      }else{
         $("#form-datos-empleado-colaborador").removeClass("oculto");
         $("#form-datos-taller").addClass("oculto");
         $("#sueldo").removeClass("oculto");
      }    
   })
});

//Muestra y oculta el formulario del taller segun se seleccione la participacion del artesano.
$(document).ready(function(){
   if ($("#participacion-artesano option:selected").val() == 3) {
      $("#form-datos-empleado-colaborador").addClass("oculto");
      $("#form-datos-taller").removeClass("oculto");
   }else if ($("#participacion-artesano option:selected").val() == 2) {
      $("#form-datos-empleado-colaborador").removeClass("oculto");
      $("#form-datos-taller").addClass("oculto");
      $("#sueldo").addClass("oculto");
   }else{
      $("#form-datos-empleado-colaborador").removeClass("oculto");
      $("#form-datos-taller").addClass("oculto");
      $("#sueldo").removeClass("oculto");
   }
});

// Rellena el formulario del taller con datos arbitarios para poder realizar el submit.
$(document).ready(function(){
   $("#btn-submit-frm-taller").click(function(){
      if ($("#participacion-artesano option:selected").val() != 3) {
         $("#rama-artesanal-taller").val('0');
         $("#nombre-taller").val('none');
         $("#direccion-taller").val('none');
         $("#localidad-taller").val('none');
         $("#municipio-taller").val('none');
         $("#ingreso-mensual-taller").val('0');
         $("#gasto-mensual-taller").val('0');
         $("#empleos-tc").val('0');
         $("#empleos-hr").val('0');
         $("#empleos-imss").val('0');
         $("#empleos-totales").val('0');
      }
   });
});

$(document).ready(function(){
   $("#participacion-artesano").change(function(){
      $("#taller-de-empleado").val('0');
      $("#sueldo-mensual").val('');
      $("#rama-artesanal-taller").val('0');
      $("#nombre-taller").val('');
      $("#direccion-taller").val('');
      $("#localidad-taller").val('');
      $("#municipio-taller").val('');
      $("#ingreso-mensual-taller").val('');
      $("#gasto-mensual-taller").val('');
      $("#empleos-tc").val('');
      $("#empleos-hr").val('');
      $("#empleos-imss").val('');
      $("#empleos-totales").val('');
   })
})
//-------------------------------------------------------------------------//
//-------------------- Funciones pagina principal -------------------------//
$(document).ready(function(){
  $("#frm-busqueda-artesano-curp").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
  $("#frm-busqueda-artesano-ap").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
  $("#frm-busqueda-taller-municipio").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
  $("#frm-busqueda-expo-mun").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
  $("#frm-busqueda-concurso-concepto").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
  $("#frm-busqueda-apoyo-fecha").submit(function(){
    return $(this).validate();
  });
});
//-------------------------------------------------------------------------//
//----------------------- Funciones Form apoyo ----------------------------//
$(function() {
  formato = "yy-mm-dd";
  $("#fecha-otorgamiento-apoyo").datepicker({
    changeMonth: true,
    changeYear: true
  });
  $("#fecha-otorgamiento-apoyo").datepicker( "option", "dateFormat", formato );
})

$(document).ready(function(){
  $("#frm-apoyo").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
  $("#frm-artesano-apoyo").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
    $("#curp-artesano-apoyo").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});
//-------------------------------------------------------------------------//
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

//-------------------- Concurso -------------------------

$(document).ready(function(){
  $("#lugar-concurso").change(function(){
    if ($("#lugar-concurso option:selected").val() == 1) {
      $("#monto-premio-concurso").prop("disabled", true);
      $("#monto-premio-concurso").val('');
    }else{
      $("#monto-premio-concurso").prop("disabled", false);
    }  
  })
});

$(document).ready(function(){
  $("#frm-concurso").submit(function(){
    return $(this).validate();
  });
});
//-------------------------------------------------------
//-------------------- Compra -------------------------
$(document).ready(function(){
    $("#curp-vendedor").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});

$(document).ready(function(){
  $("#frm-busqueda-compra-fecha").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
  $("#frm-busqueda-compra-periodo").submit(function(){
    return $(this).validate();
  });
});

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-inicio-periodo-compra").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-inicio-periodo-compra").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-fin-periodo-compra").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-fin-periodo-compra").datepicker( "option", "dateFormat", formato );
})


$(document).ready(function(){
  $("#frm-busqueda-expo-periodo").submit(function(){
    return $(this).validate();
  });
});

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-inicio-periodo-expo").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-inicio-periodo-expo").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-fin-periodo-expo").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-fin-periodo-expo").datepicker( "option", "dateFormat", formato );
})


$(document).ready(function(){
  $("#frm-busqueda-concurso-periodo").submit(function(){
    return $(this).validate();
  });
});

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-inicio-periodo-concurso").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-inicio-periodo-concurso").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-fin-periodo-concurso").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-fin-periodo-concurso").datepicker( "option", "dateFormat", formato );
})

$(document).ready(function(){
   $('#mensaje').modal();
});

$(document).ready(function(){
  $("#frm-tallerista").submit(function(){
    return $(this).validate();
  });
});

$(document).ready(function(){
    $("#curp-tallerista").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});

$(document).ready(function(){
   $("#frm-busqueda-tallerista-curp").submit(function(){
      return $(this).validate();
   });
});

$(document).ready(function(){
   $("#buscar-tallerista-curp").blur(function(){
      text = $(this).val();
      $(this).val(text.toUpperCase());
   });
});

$(document).ready(function(){
  $("#frm-capacitacion").submit(function(){
    return $(this).validate();
  });
});

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-inicio-capacitacion").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-inicio-capacitacion").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-fin-capacitacion").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-fin-capacitacion").datepicker( "option", "dateFormat", formato );
})

$(document).ready(function(){
  $("#rama-artesanal-capacitacion").click(function(){
    if($("#rama-artesanal-capacitacion option:selected").val() == 14) {
      $("#tema-capacitacion").prop("disabled", false);
      $("#tema-capacitacion").val('');
    }else{
      $("#tema-capacitacion").prop("disabled", true);
    }
  })
})

$(document).ready(function(){
  $("#frm-capacitacion").submit(function(){
    $("#tema-capacitacion").prop("disabled", false);
  });
});

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-inicio-periodo-capacitacion").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-inicio-periodo-capacitacion").datepicker( "option", "dateFormat", formato );
})

$(function() {
    formato = "yy-mm-dd";
    $("#fecha-fin-periodo-capacitacion").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#fecha-fin-periodo-capacitacion").datepicker( "option", "dateFormat", formato );
})

$(document).ready(function(){
  $("#frm-busqueda-capacitacion-periodo").submit(function(){
    return $(this).validate();
  });
});


$(document).ready(function(){
    $("#frm-participantes-capacitacion-artesano").submit(function(){
        return $(this).validate();
    });
});

$(function(){
  $("#agregar-participante").click(function(){
    var renglon = '<div class="form-group"><label class="col-xs-4 control-label"><span class="obligatorio">* </span>CURP del artesano:</label><div class="col-xs-4"><input type="text" name="curp-artesano-capacitacion[]" class="form-control clon" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp" /></div><div class="col-xs-4" id="btn-quitar-prducto"><input type="button" class="btn btn-primary quitar-participante" value="Quitar"></div></div>'
    $("#participantes").append(renglon);
  })

  $(document).on("click",".quitar-participante",function(){
    var parent = $(this).parents().get(1);
    $(parent).remove();
  });
});

$(document).ready(function(){
   $(".lista").blur(function(){
      text = $(this).val();
      $(this).val(text.toUpperCase());
   });
});

$(document).ready(function(){
  $("#frm-tallerista-capacitacion").submit(function(){
    return $(this).validate();
  });
});