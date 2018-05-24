<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="active">Página de administración</li>
  </ol>
  <div class="col-md-4">
    <img class="img img-responsive" src="assets/images/Logo.png" class="img-rounded" width="460" height="345">
  </div>
    <div class="col-md-8">
      <div class="panel panel-default">
       <div class="panel-heading bold">Panel de administración</div>
         <div class="panel-body">
          Desde esta lugar puede realizar las siguientes acciones: Ver quien tiene acceso al sistema, dar de alta a un nuevo usuario para que tenga acceso al sistema, dar de baja a un usuario con acceso y ver las incidencias de los artesanos registrados en el sistema.  
        </div>
      </div>
    </div>
  <div class="col-md-4"> 
    <div class="panel panel-default">
      <div class="panel-heading bold">Usuarios con acceso al sistema</div>
      <div class="panel-body"> 
        <?php if (!empty($secretarios)): ?>
          <table class="table table-striped table-hover tabler-responsive">
            <thead>
              <tr>
                <th class="col-md-7">Nombre</td>
                <th class="col-md-4">ID de usuario</td>
                <th class="col-md-1"></td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($secretarios as $secretario): ?>
                <?php if ($secretario->permisos == '0'): ?>
                  <tr>
                    <td class="col-md-7"><?php echo $secretario->nombre; ?></td>
                    <td class="col-md-4"><?php echo $secretario->apodo; ?></td>
                    <td class="col-md-1 text-right" >
                     <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Secretario&a=Eliminar&id-secretario=<?php echo $secretario->idUsuario; ?>">Eliminar</a>
                    </td>
                  </tr>
                <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>Actualmente no hay secretarios registrados.</p>
        <?php endif ?>
      </div>
    </div>
  </div>
    <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading bold">Incidencias</div>
       <div class="panel-body">
        <div class="col-md-12">
           <form id="frm-busqueda-incidencia-curp" action="?c=Incidencia&a=BuscarPorCURP" method="post" enctype="multipart/   form-data">
              <div class="form-group">
                 <label>Buscar por CURP:</label>
                 <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ingresa la CURP" id="buscar-incidencia-curp" name="buscar-incidencia-curp" data-validacion-tipo="requerido|curp">
                    <div class="input-group-btn">
                       <button id="btn-submit-busqueda-incidencia-curp" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                 </div>
              </div>
           </form>
        </div>
        <div class="col-md-12">
          <form id="frm-busqueda-incidencia-periodo" action="?c=Incidencia&a=BuscarPorPeriodo" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label >Por periodo:</label>
               <div class="input-group">
                  <span class="input-group-addon"> De </span>
                  <input type="text" readonly id="fecha-inicio-periodo-incidencias" name="fecha-inicio-periodo-incidencias" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                  <span class="input-group-addon"> a </span>
                  <input type="text" readonly id="fecha-fin-periodo-incidencias" name="fecha-fin-periodo-incidencias" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                  <div class="input-group-btn">
                     <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
               </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading bold">Registrar nuevo usuario</div>
      <div class="panel-body">
        <form id="frm-nuevo-secretario" name="frm-nuevo-secretario" action="?c=Secretario&a=Guardar" method="post" enctype="multipart/form-data">
          <input type="hidden" name="contraseña-secretario" id="contraseña-secretario" data-validacion-tipo="requerido"/>
          <div class="form-group">
            <span class="obligatorio">* </span><label>Nombre del secretario:</label>
            <input type="text" id="nombre-secretario-sistema" name="nombre-secretario-sistema" class="form-control" placeholder="Ejemplo: Luis Días" data-validacion-tipo="requerido" />
          </div>
          <div class="form-group">
            <span class="obligatorio">* </span><label>ID de secretario:</label>
            <input type="text" id="ID-secretario" name="ID-secretario" class="form-control" placeholder="Ejemplo: LuisDiaz" data-validacion-tipo="requerido" />
          </div>
          <div class="form-group">
            <span class="obligatorio">* </span><label>Contraseña</label>
            <input type="password" id="contraseña-intermedia" name="contraseña-intermedia" class="form-control" placeholder="Contraseña" data-validacion-tipo="requerido|min:8" />
          </div>
          <div class="form-group">
            <span class="obligatorio">* </span><label>Confirmar contraseña </label><span class="oculto obligatorio small" id="coincidencia"> Las contraseñas no coinciden.</span>
            <input type="password" id="confirmacion-contraseña-intermedia" name="confirmacion-contraseña-intermedia" class="form-control" placeholder="Contraseña" data-validacion-tipo="requerido|min:8" />
          </div>
          <div class="text-right">
            <button id="btn-submit-frm-nuevo-usuario" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
