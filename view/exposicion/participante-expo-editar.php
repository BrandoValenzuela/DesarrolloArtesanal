<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexConcursosExposiciones">Concursos y exposiciones</a></li>
    <?php if ($_SESSION['metodo-busqueda'] == 'BuscarPorMunicipioEntidad' || $_SESSION['metodo-busqueda'] == 'BuscarPorPeriodo'): ?>
      <li><a href="?c=exposicion&a=<?php echo $_SESSION['metodo-busqueda'];?>">Lista de exposiciones</a></li>
    <?php endif ?>
    <li><a href="?c=Exposicion&a=BuscarPorId">Exposición</a></li>
    <li class="active">Participante</li>
  </ol>
</div>
<div class="container">
  <div class="row">
    <h1 class="text-center">Nuevo registro de participante</h1>
    <h3 class="text-center"><?php echo $nombre_expo; ?></h3>
  </div>
  <br>
  <div class="row">
      <form id="frm-artesano-expo" action="?c=Participanteexpo&a=Guardar" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id-expo" value="<?php echo $id_expo; ?>" />
          <fieldset>
              <legend>Artesano participante:</legend>
              <div class="col-md-4">
                <div class="form-group">
                    <span class="obligatorio">* </span><label>CURP del artesano:</label>
                    <input type="text" id="curp-artesano-expo" name="curp-artesano-expo" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                </div>
              </div>
          </fieldset>
          <hr>
          <fieldset>                  
            <div class="col-md-4">
                <div class="form-group">
                  <span class="obligatorio">* </span><label>Monto asigando para exposición:</label>
                  <input type="text" id="inversion-artesano-expo" name="inversion-artesano-expo" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <span class="obligatorio">* </span><label>Ingresos obtenidos en la exposición:</label>
                  <input type="text" id="ingreso-artesano-expo" name="ingreso-artesano-expo" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                </div>
            </div>
          </fieldset>
          <div class="text-right">
              <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
          </div>
      </form>
  </div>
</div>