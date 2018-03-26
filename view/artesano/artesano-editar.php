<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active"><?php echo $artesano->curp != null ? $artesano->curp : 'Nuevo Registro'; ?></li>
    </ol>
    <h1 class="text-center"><?php echo $artesano->curp != null ? $artesano->nombre.' '.$artesano->aPaterno.' '.$artesano->aMaterno : 'Nuevo Registro de artesano'; ?></h1>
  </div>
    <div class="row">
        <form id="frm-artesano" action="?c=Artesano&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="operacion" value="<?php echo $operacion; ?>" />
            <fieldset>
                <legend>Datos personales</legend>
                  <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>CURP:</label>
                        <input type="text" <?php echo $operacion == 1 ? 'disabled' : '';?> id="curp" name="curp" value="<?php echo $artesano->curp; ?>" class="form-control" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Nombre(s):</label>
                        <input type="text" name="nombre" value="<?php echo $artesano->nombre; ?>" class="form-control" placeholder="Ingrese nombre(s)" data-validacion-tipo="requerido" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Apellido paterno</label>
                        <input type="text" name="aPaterno" value="<?php echo $artesano->aPaterno; ?>" class="form-control" placeholder="Ingrese el apellido paterno" data-validacion-tipo="requerido" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label>Apellido Materno:</label>
                        <input type="text" name="aMaterno" value="<?php echo $artesano->aMaterno; ?>" class="form-control" placeholder="Ingrese el apellido materno" data-validacion-tipo="" />
                    </div>
                  </div>

                <div class="col-md-6">
                  <div class="form-group">
                        <span class="obligatorio">* </span><label>Direccion:</label>
                        <input type="text" name="direccion" value="<?php echo $artesano->domicilio; ?>" class="form-control" placeholder="Ingrese calle, número y colonia" data-validacion-tipo="requerido" />
                    </div>     
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Localidad:</label>
                        <input type="text" name="localidad" value="<?php echo $artesano->localidad; ?>" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Municipio:</label>
                        <input type="text" name="municipio" value="<?php echo $artesano->municipio; ?>" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Datos sobre el oficio</legend>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Rama artesanal:</label>
                    <select name="ramaartesanal" class="form-control">
                      <?php foreach ($ramas as $opcion): ?>
                        <option <?php echo $artesano->idRamaArtesanal == $opcion->idRamaArtesanal ? 'selected' : ''; ?> value="<?php echo $opcion->idRamaArtesanal ?>"><?php echo $opcion->nombre; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Año de inicio en el oficio: </label>
                        <input type="text" id="inicio-oficio" name="inicio-oficio" value="<?php echo $artesano->anioInicioOficio; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero|min:4:max:4" />
                    </div>
                    <div class="form-group">
                      <span class="obligatorio">* </span><label>Año de registro en la Subsecretaria:</label>
                      <input type="text" id="fecha-registro-da" name="fecha-registro-da" value="<?php echo $artesano->anioInicioSDA; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero|min:4:max:4" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Gasto mensual:</label>
                        <input type="text" name="gasto-mensual" value="<?php echo $artesano->gastoMensual; ?>" class="form-control" placeholder="Ingrese el monto." data-validacion-tipo="requerido|numero" />
                    </div>
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Ingreso mensual:</label>
                        <input type="text" name="ingreso-mensual" value="<?php echo $artesano->ingresoMensual; ?>" class="form-control" placeholder="Ingrese el monto" data-validacion-tipo="requerido|numero" />
                    </div>
                    <div class="form-group">
                      <label>Tipo de venta:</label>
                      <select name="tipo-venta" class="form-control">
                      <option <?php echo $artesano->tipoVenta == 1 ? 'selected' : ''; ?> value="1">Consumidor final</option>
                      <option <?php echo $artesano->tipoVenta == 2 ? 'selected' : ''; ?> value="2">Comercializadores</option>
                      <option <?php echo $artesano->tipoVenta == 3 ? 'selected' : ''; ?> value="3">Casa de artesanías</option>
                      <option <?php echo $artesano->tipoVenta == 4 ? 'selected' : ''; ?> value="4">Paisanos (USA)</option>
                      </select>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label>¿Trabaja en su domicilio?</label>
                    <select name="lugar-trabajo" class="form-control">
                      <option <?php echo $artesano->trabajoDomicilio == 1 ? 'selected' : ''; ?> value="1">No</option>
                      <option <?php echo $artesano->trabajoDomicilio == 2 ? 'selected' : ''; ?> value="2">Si</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>El taller donde trabaja es:</label>
                    <select name="prop-taller" class="form-control">
                      <option <?php echo $artesano->propiedadTaller == 1 ? 'selected' : ''; ?> value="1">Propio</option>
                      <option <?php echo $artesano->propiedadTaller == 2 ? 'selected' : ''; ?> value="2">Prestado</option>
                      <option <?php echo $artesano->propiedadTaller == 3 ? 'selected' : ''; ?> value="3">Rentado</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tipo de actividad:</label>
                    <select name="tipo-actividad" class="form-control">
                      <option <?php echo $artesano->tipoActividad == 1 ? 'selected' : ''; ?> value="1">Prioritaria</option>
                      <option <?php echo $artesano->tipoActividad == 2 ? 'selected' : ''; ?> value="2">Secundaria</option>
                    </select>
                  </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Datos adicionales</legend>
                <div class="col-md-6">
                  <div class="form-group">
                        <label>¿Cuenta con RFC?</label>
                        <input type="text" name="cadena-rfc" value="<?php echo $artesano->rfc; ?>" class="form-control" placeholder="Ingrese el RFC" data-validacion-tipo="" />
                    </div>
                    <div class="form-group">
                      <label>Fecha de obtención del RFC:</label>
                      <input type="text" readonly id="fecha-registro-rfc" name="fecha-registro-rfc" value="<?php echo $artesano->fechaAltaRFC; ?>" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="" />
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <label>¿Cuenta con QUIS?</label>
                        <input type="text" name="cadena-cuis" value="<?php echo $artesano->quiz; ?>" class="form-control" placeholder="Ingrese el QUIS" data-validacion-tipo="" />
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Entrevista</legend>
                <div class="col-md-4">
                  <div class="form-group">
                  <label>¿Ha participado en una asociación en el pasado?</label>
                  <select name="asociacion-pasada" class="form-control">
                    <option <?php echo $artesano->participacionAsocPasada == 1 ? 'selected' : ''; ?> value="1">No</option>
                    <option <?php echo $artesano->participacionAsocPasada == 2 ? 'selected' : ''; ?> value="2">Si</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label>¿Actualmente pertenece a una asociación?</label>
                  <select id="asociacion-actual" name="asociacion-actual" class="form-control" onclick="habilitarCampoAsociacion()">
                    <option <?php echo $artesano->participacionAsocActual == 1 ? 'selected' : ''; ?> value="1">No</option>
                    <option <?php echo $artesano->participacionAsocActual == 2 ? 'selected' : ''; ?> value="2">Si</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label>¿Cual asociación?:</label>
                  <input type="text" id="nombre-asoc-actual" name="nombre-asoc-actual" value="<?php echo $artesano->nombreAsocActual; ?>" disabled="disabled" class="form-control" placeholder="Nombre de la asociación (Opcional)" data-validacion-tipo="" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Fidelidad a la rama artesanal:</label>
                  <select name="fidelidad" class="form-control">
                    <option <?php echo $artesano->fidelidadRamaArtesanal == 1 ? 'selected' : ''; ?> value="1">Muy baja</option>
                    <option <?php echo $artesano->fidelidadRamaArtesanal == 2 ? 'selected' : ''; ?> value="2">Baja</option>
                    <option <?php echo $artesano->fidelidadRamaArtesanal == 3 ? 'selected' : ''; ?> value="3">Normal</option>
                    <option <?php echo $artesano->fidelidadRamaArtesanal == 4 ? 'selected' : ''; ?> value="4">Alta</option>
                    <option <?php echo $artesano->fidelidadRamaArtesanal == 5 ? 'selected' : ''; ?> value="5">Muy alta</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <span class="obligatorio">* </span><label>Satisfaccion con ser artesano:</label>
                  <select name="satisfaccion" class="form-control">
                    <option <?php echo $artesano->satisfaccion == 1 ? 'selected' : ''; ?> value="1">Muy baja</option>
                    <option <?php echo $artesano->satisfaccion == 2 ? 'selected' : ''; ?> value="2">Baja</option>
                    <option <?php echo $artesano->satisfaccion == 3 ? 'selected' : ''; ?> value="3">Normal</option>
                    <option <?php echo $artesano->satisfaccion == 4 ? 'selected' : ''; ?> value="4">Alta</option>
                    <option <?php echo $artesano->satisfaccion == 5 ? 'selected' : ''; ?> value="5">Muy alta</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <span class="obligatorio">* </span><label>¿Cuáles son sus necesidades prioritarias?(Describa):</label>
                  <textarea name="necesidades" id="necesidades" cols="30" rows="2" data-validacion-tipo="requerido"  
                  placeholder="Ingrese una descripción" class="form-control">
                  <?php 
                    $texto = trim($artesano->necesidadesPrioritarias);
                    echo $texto;
                  ?>
                  </textarea>
                </div>
                </div> 
            </fieldset>
            <div class="text-right">
                <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#frm-artesano").submit(function(){
            return $(this).validate();
        });
    });
    $(document).ready(function(){
        $("#btn-submit").click(function(){
            $("#nombre-asoc-actual").prop("disabled",false);
        });
    });
    $(document).ready(function(){
        $("#btn-submit").click(function(){
            $("#curp").prop("disabled",false);
        });
    });
</script>