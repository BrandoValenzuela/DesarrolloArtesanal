<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Capacitacion">Capacitaciones</a></li>
    <li class="active">Capacitación</li>
  </ol>
</div>
<div class="container">
  <h1 class="text-center">Nuevo registro de capacitación</h1>
  <form id="frm-capacitacion" action="?c=Capacitacion&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id"/>
    <fieldset>
      <legend>Datos de la capacitación</legend>
      <div class="col-md-6">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Nombre de la capacitación:</label>
          <input type="text" id="nombre-capacitacion" name="nombre-capacitacion" class="form-control" placeholder="Ingrese el nombre." data-validacion-tipo="requerido" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Dirección del evento:</label>
          <input type="text" id="direccion-capacitacion" name="direccion-capacitacion" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
        </div>     
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Localidad:</label>
          <input type="text" id="localidad-capacitacion" name="localidad-capacitacion" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
        </div>
      </div>
      <div class="col-md-3">   
        <div class="form-group">
          <span class="obligatorio">* </span><label>Municipio:</label>
          <input type="text" id="municipio-capacitacion" name="municipio-capacitacion" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Rama artesanal:</label>
          <select id="rama-artesanal-capacitacion" name="rama-artesanal-capacitacion" class="form-control">
          <?php foreach ($ramas as $opcion): ?>
            <option value="<?php echo $opcion->idRamaArtesanal ?>"><?php echo $opcion->nombre; ?></option>
          <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col-md-3">   
        <div class="form-group">
          <label>Describa:</label>
          <input type="text" disabled="disabled" id="tema-capacitacion" name="tema-capacitacion" class="form-control" placeholder="Ingrese la entidad." data-validacion-tipo="" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Fecha de inicio:</label>
          <input type="text" readonly id="fecha-inicio-capacitacion" name="fecha-inicio-capacitacion" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="requerido" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Fecha de fin:</label>
          <input type="text" readonly id="fecha-fin-capacitacion" name="fecha-fin-capacitacion" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="requerido" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Monto invertido:</label>
          <input type="text" id="inversion-capacitacion" name="inversion-capacitacion" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Material utilizado:</label>
          <textarea id="material-capacitacion" name="material-capacitacion" class="form-control" cols="30" rows="2"></textarea>
        </div>     
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Observaciones:</label>
          <textarea id="observacion-capacitacion" name="observacion-capacitacion" class="form-control" cols="30" rows="2"></textarea>
        </div>     
      </div>
    </fieldset>
    <div class="text-right">
      <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
    </div>
  </form>
</div>