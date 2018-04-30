<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?> Nuevo registro</li>
    </ol>
    <h1 class="text-center"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?>Nuevo registro de apoyo</h1>
  </div>
  <div class="row">
    <form id="frm-apoyo" action="?c=Apoyo&a=Guardar" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php #echo $artesano->id; ?>" />
      <fieldset>
        <legend>Datos del apoyo</legend>
        <div class="col-md-6">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Nombre del apoyo:</label>
            <input type="text" id="nombre-apoyo" name="nombre-apoyo" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre." data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Descripción del apoyo:</label>
            <textarea id="descripcion-apoyo" name="descripcion-apoyo" class="form-control" cols="30" rows="5"></textarea>
          </div>     
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Fecha de otorgamiento:</label>
            <input type="text" readonly id="fecha-otorgamiento-apoyo" name="fecha-otorgamiento-apoyo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Monto :</label>
            <input type="text" id="monto-apoyo" name="monto-apoyo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
          </div>
        </div>
      </fieldset>
      <div class="text-right">
        <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
      </div>
    </form>
  </div>
</div>