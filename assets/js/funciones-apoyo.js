// -------------------- Funciones inicio sesion -.-------------------------//
$(document).ready(function(){
   $("#login-form").submit(function(){
      return $(this).validate();
   });
});
$("#login-submit").click(function(){
   if ($("#usuario").val()!= '' && $("#contraseña").val() != ''){
     var datos = {
        usuario: $("#usuario").val(), 
        contraseña: sha256($("#contraseña").val())
     };
     $.post("?c=Sesion&a=IniciarSesion",datos,function(data, status){
        if (data == "acceso_concedido") {
           location.href = "?c=Principal";             
        }else{
           if (datos.usuario != '' && datos.contraseña != '') {
              if (data == 'accesso_denegado' ) {
                 alert("El usuario o contraseña están equivocados. Vuelve a intentar");
              }else{
                 location.href = "?c=Sesion&a=ErrorConexion";                  
              }
           }
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

function habilitarCampoPremio(){
  if ($("#lugar-concurso option:selected").val() == 1) {
    $("#monto-premio-concurso").prop("disabled", true);
    $("#monto-premio-concurso").val('');
  }else{
    $("#monto-premio-concurso").prop("disabled", false);
  }
}

$(document).ready(function(){
  $("#frm-concurso").submit(function(){
    return $(this).validate();
  });
});
//-------------------------------------------------------