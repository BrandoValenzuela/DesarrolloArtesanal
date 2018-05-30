<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
    <li class="active">Taller</li>
  </ol>
</div>
<div class="container">
  <h1 class="text-center"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?>Nuevo registro de taller</h1>
  <form id="frm-taller-artesano" action="?c=Taller&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" id="" name="" value="<?php #echo $artesano->id; ?>" />
    <fieldset>
      <legend>Artesano</legend>
        <div class="col-md-4">
          <div class="form-group">
              <span class="obligatorio">* </span><label>CURP del artesano:</label>
              <input type="text" id="curp-artesano-taller" name="curp-artesano-taller" value="<?php echo $curp_dueño = $curp != '' ? $curp : '';?>"  class="form-control" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp"  />
          </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
              <span class="obligatorio">* </span><label>Participación en el taller:</label>
              <select id="participacion-artesano" name="participacion-artesano" class="form-control">
              <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Empleado</option>
              <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Colaborador</option>
              <option <?php #echo $alm->Sexo == 3 ? 'selected' : ''; ?> value="3">Dueño del taller</option>
            </select>
          </div>
      </div>
    </fieldset><br>
    <fieldset id="form-datos-empleado-colaborador">
      <legend>Datos de empleado/colaborador</legend>
      <div class="col-md-4">
        <div class="form-group">
          <label>Taller donde labora:</label>
          <select id="taller-de-empleado" name="taller-de-empleado" class="form-control">
            <option value="0" selected="0"></option>
            <?php foreach ($talleres as $opcion): ?>
              <option value="<?php echo $opcion->idTaller; ?>"><?php echo $opcion->nombre; ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col-md-3" id="sueldo">
        <div class="form-group">
          <label>Sueldo mensual</label>
          <input type="text" id="sueldo-mensual" name="sueldo-mensual" class="form-control" placeholder="Ejemplo: 2000"  data-validacion-tipo ="requerido|numero">
        </div>
      </div>
    </fieldset>
    <fieldset class="oculto" id="form-datos-taller">
      <legend>Datos del taller</legend>
        <div class="col-md-4">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Rama artesanal:</label>
            <select id="rama-artesanal-taller" name="rama-artesanal-taller" class="form-control">
              <option value="0"></option>
              <?php foreach ($ramas as $opcion): ?>
                <option <?php #echo $artesano->idRamaArtesanal == $opcion->idRamaArtesanal ? 'selected' : ''; ?> value="<?php echo $opcion->idRamaArtesanal ?>"><?php echo $opcion->nombre; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
              <span class="obligatorio">* </span><label>Nombre del taller:</label>
              <input type="text" id="nombre-taller" name="nombre-taller" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre." data-validacion-tipo="requerido" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                  <span class="obligatorio">* </span><label>Direccion:</label>
                  <input type="text" id="direccion-taller" name="direccion-taller" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
              </div>     
          </div>
          <div class="col-md-3">
            <div class="form-group">
                  <label>Localidad:</label>
                  <input type="text" id="localidad-taller" name="localidad-taller" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
              </div>
          </div>
          <div class="col-md-3">   
              <div class="form-group">
                  <span class="obligatorio">* </span><label>Municipio:</label>
                  <input type="text" id="municipio-taller" name="municipio-taller" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                  <span class="obligatorio">* </span><label>Ingreso mensual:</label>
                  <input type="text" id="ingreso-mensual-taller" name="ingreso-mensual-taller" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero" />
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                  <span class="obligatorio">* </span><label>Gasto mensual:</label>
                  <input type="text" id="gasto-mensual-taller" name="gasto-mensual-taller" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero" />
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <h4>Empleos</h4><hr>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                  <span class="obligatorio">* </span><label>Tiempo completo: </label>
                  <input type="text" id="empleos-tc" name="empleos-tc" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2" data-validacion-tipo="requerido" />
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <span class="obligatorio">* </span><label>Por horas:</label>
                <input type="text" id="empleos-hr" name="empleos-hr" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2" data-validacion-tipo="requerido|numero" />
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                  <span class="obligatorio">* </span><label>Registrados IMSS:</label>
                  <input type="text" id="empleos-imss" name="empleos-imss" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ejemplo: 2" data-validacion-tipo="requerido|numero" />
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                  <span class="obligatorio">* </span><label>Total empleos:</label>
                  <input type="text" id="empleos-totales" name="empleos-totales" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ejemplo: 2" data-validacion-tipo="requerido|numero" />
              </div>
          </div>
      </fieldset>
      <div class="text-right">
          <button id="btn-submit-frm-taller" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
      </div>
  </form>
</div>