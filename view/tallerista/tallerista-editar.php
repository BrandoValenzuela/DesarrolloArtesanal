<div class="container-fluid">
  <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Capacitacion">Capacitaciones</a></li>
      <li class="active"><?php echo $tallerista->curp != null ? 'CURP '.$tallerista->curp : 'Tallerista'; ?></li>
    </ol>
</div>
<div class="container">
  <h1 class="text-center"><?php echo $tallerista->curp != null ? $tallerista->nombre.' '.$tallerista->aPaterno.' '.$tallerista->aMaterno : 'Nuevo registro de tallerista'; ?></h1>
  <div class="row">
    <form id="frm-tallerista" name="frm-tallerista" action="?c=Tallerista&a=Guardar" method="post" enctype="multipart/form-data">
      <input type="hidden" id="registrar-actualizar" name="registrar-actualizar" value="<?php echo $registrar_actualizar; ?>" />
      <fieldset>
        <legend>Datos del tallerista</legend>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>CURP:</label>
            <input type="text" <?php echo $registrar_actualizar == 1 ? 'disabled' : '';?> id="curp-tallerista" name="curp-tallerista" value="<?php echo $tallerista->curp; ?>" class="form-control" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Nombre(s):</label>
            <input type="text" id="nombre-tallerista" name="nombre-tallerista" value="<?php echo $tallerista->nombre; ?>" class="form-control" placeholder="Ingrese nombre(s)" data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Apellido paterno</label>
            <input type="text" id="aPaterno-tallerista" name="aPaterno-tallerista" value="<?php echo $tallerista->aPaterno; ?>" class="form-control" placeholder="Ingrese el apellido paterno" data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Apellido Materno:</label>
            <input type="text" id="aMaterno-tallerista" name="aMaterno-tallerista" value="<?php echo $tallerista->aMaterno; ?>" class="form-control" placeholder="Ingrese el apellido materno" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Direccion (Calle, número y colonia):</label>
            <input type="text" id="direccion-tallerista" name="direccion-tallerista" value="<?php echo $tallerista->domicilio; ?>" class="form-control" placeholder="Ingrese calle, número y colonia" data-validacion-tipo="requerido" />
          </div>     
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Localidad:</label>
            <input type="text" id="localidad-tallerista" name="localidad-tallerista" value="<?php echo $tallerista->localidad; ?>" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Municipio:</label>
            <input type="text" id="municipio-tallerista" name="municipio-tallerista" value="<?php echo $tallerista->municipio; ?>" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Teléfono:</label>
            <input type="text" id="telefono-tallerista" name="telefono-tallerista" value="<?php echo $tallerista->telefono; ?>" class="form-control" placeholder="Número telefónico" data-validacion-tipo="numero|requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Correo electrónico:</label>
            <input type="text" id="email-tallerista" name="email-tallerista" value="<?php echo $tallerista->email; ?>" class="form-control" placeholder="Ingrese un correo" data-validacion-tipo="email|requerido" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Especialidad:</label>
            <input type="text" id="especialidad-tallerista" name="especialidad-tallerista" value="<?php echo $tallerista->especialidad; ?>" class="form-control" placeholder="Especialidad" data-validacion-tipo="requerido" />
          </div>
        </div>
      </fieldset><br>
      <div class="text-right">
        <button id="btn-submit-frm-tallerista" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
      </div>
    </form>
  </div>
</div>