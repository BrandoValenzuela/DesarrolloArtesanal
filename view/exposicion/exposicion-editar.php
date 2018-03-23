<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?> Nuevo registro</li>
    </ol>
    <h1 class="text-center"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?>Nuevo registro de exposición</h1>
  </div>
    <div class="row">
        <form id="frm-exposicion" action="?c=Exposicion&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php #echo $artesano->id; ?>" />
            <fieldset>
                <legend>Datos de la exposición</legend>
                <div class="col-md-6">
                  <div class="form-group">
                      <span class="obligatorio">* </span><label>Nombre de la exposición:</label>
                      <input type="text" name="nombre-expo" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre." data-validacion-tipo="requerido" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <span class="obligatorio">* </span><label>Dirección del evento:</label>
                        <input type="text" name="direccion-expo" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
                    </div>     
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Localidad:</label>
                        <input type="text" name="localidad-expo" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
                    </div>
                </div>
                <div class="col-md-3">   
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Municipio:</label>
                        <input type="text" name="municipio-expo" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
                    </div>
                </div>
                <div class="col-md-3">   
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Entidad:</label>
                        <input type="text" name="entidad-expo" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese la entidad." data-validacion-tipo="requerido" />
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="obligatorio">* </span><label>Fecha de inicio:</label>
                    <input type="text" readonly id="fecha-inicio-expo" name="fecha-inicio-expo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="requerido" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="obligatorio">* </span><label>Fecha de finalización:</label>
                    <input type="text" readonly id="fecha-fin-expo" name="fecha-fin-expo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="requerido" />
                  </div>
                </div>
                </fieldset>
                <hr>
                <fieldset>
                  <div class="col-md-3">
                    <div class="form-group">
                      <span class="obligatorio">* </span><label>Tipo de apoyo:</label>
                      <select name="tipo-apoyo-expo" class="form-control">
                      <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Piso</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Alimentos</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="3">Hospedaje</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="4">Transporte</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <span class="obligatorio">* </span><label>Ingreso total de la exposición:</label>
                        <input type="text" id="ingreso-expo" name="ingreso-expo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <span class="obligatorio">* </span><label>Monto invertido en la exposición:</label>
                        <input type="text" id="inversion-expo" name="inversion-expo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
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
        $("#frm-exposicion").submit(function(){
            return $(this).validate();
        });
    });
</script>