<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?> Nuevo registro</li>
    </ol>
    <h1 class="text-center"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?>Nuevo registro</h1>
  </div>
    <div class="row">
        <!-- <form id="frm-artesano" action="#" method="post" enctype="multipart/form-data"> -->
        <form id="frm-artesano" action="?c=Artesano&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php #echo $artesano->id; ?>" />
            <fieldset>
                <legend>Datos personales</legend>
                  <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>CURP:</label>
                        <input type="text" id="curp" name="curp" value="<?php #echo $artesano->CURP; ?>" class="form-control" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Nombre(s):</label>
                        <input type="text" name="Nombre" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese nombre(s)" data-validacion-tipo="requerido" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Apellido paterno</label>
                        <input type="text" name="aPaterno" value="<?php #echo $alm->Apellido; ?>" class="form-control" placeholder="Ingrese el apellido paterno" data-validacion-tipo="requerido" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label>Apellido Materno:</label>
                        <input type="text" name="aMaterno" value="<?php #echo $alm->Apellido; ?>" class="form-control" placeholder="Ingrese el apellido materno" data-validacion-tipo="" />
                    </div>
                  </div>

                <div class="col-md-6">
                  <div class="form-group">
                        <span class="obligatorio">* </span><label>Direccion:</label>
                        <input type="text" name="direccion" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese calle, número y colonia" data-validacion-tipo="requerido" />
                    </div>     
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Localidad:</label>
                        <input type="text" name="localidad" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Municipio:</label>
                        <input type="text" name="municipio" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
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
                      <?php 
                        foreach ($ramas as $opcion) {
                          echo "<option value='".$opcion->idRamaArtesanal."'>";
                          echo $opcion->nombre."</option>\n";
                        }
                      ?>
                    </select>
                  </div>
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Año de inicio en el oficio: </label>
                        <input type="text" id="inicio-oficio" name="inicio-oficio" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero|min:4:max:4" />
                    </div>
                    <div class="form-group">
                      <span class="obligatorio">* </span><label>Año de registro en la Subsecretaria:</label>
                      <input type="text" id="fecha-registro-da" name="fecha-registro-da" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero|min:4:max:4" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Gasto mensual:</label>
                        <input type="text" name="gasto-mensual" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el monto." data-validacion-tipo="requerido|numero" />
                    </div>
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Ingreso mensual:</label>
                        <input type="text" name="ingreso-mensual" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el monto" data-validacion-tipo="requerido|numero" />
                    </div>
                    <div class="form-group">
                      <label>Tipo de venta:</label>
                      <select name="tipo-venta" class="form-control">
                      <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Consumidor final</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Comercializadores</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="3">Casa de artesanías</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="4">Paisanos (USA)</option>
                      </select>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label>¿Trabaja en su domicilio?</label>
                    <select name="lugar-trabajo" class="form-control">
                      <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">No</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Si</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>El taller donde trabaja es:</label>
                    <select name="prop-taller" class="form-control">
                      <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Propio</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Prestado</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="3">Rentado</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tipo de actividad:</label>
                    <select name="tipo-actividad" class="form-control">
                      <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Prioritaria</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Secundaria</option>
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
                        <input type="text" name="cadena-rfc" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el RFC" data-validacion-tipo="" />
                    </div>
                    <div class="form-group">
                      <label>Fecha de obtención del RFC:</label>
                      <input type="text" readonly id="fecha-registro-rfc" name="fecha-registro-rfc" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="" />
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <label>¿Cuenta con QUIS?</label>
                        <input type="text" name="cadena-cuis" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el QUIS" data-validacion-tipo="" />
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
                    <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">No</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Si</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label>¿Actualmente pertenece a una asociación?</label>
                  <select id="asociacion-actual" name="asociacion-actual" class="form-control" onclick="habilitarCampoAsociacion()">
                    <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">No</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Si</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label>¿Cual asociación?:</label>
                  <input type="text" id="nombre-asoc-actual" name="nombre-asoc-actual" value="<?php #echo $alm->Correo; ?>" disabled="disabled" class="form-control" placeholder="Nombre de la asociación (Opcional)" data-validacion-tipo="" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Fidelidad a la rama artesanal:</label>
                  <select name="fidelidad" class="form-control">
                    <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Muy baja</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Baja</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="3">Normal</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="4">Alta</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="5">Muy alta</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <span class="obligatorio">* </span><label>Satisfaccion con ser artesano:</label>
                  <select name="satisfaccion" class="form-control">
                    <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Muy baja</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Baja</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="3">Normal</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="4">Alta</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="5">Muy alta</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <span class="obligatorio">* </span><label>¿Cuáles son sus necesidades prioritarias?(Describa):</label>
                  <textarea name="necesidades" id="necesidades" cols="30" rows="2" data-validacion-tipo="requerido" value="<?php #echo $alm->Correo; ?>" placeholder="Ingrese una descripción" class="form-control"></textarea>
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
</script>