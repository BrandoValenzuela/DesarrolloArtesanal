<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexApoyosCompras">Apoyos y compras</a></li>
      <?php if ($_SESSION['metodo-busqueda'] == 'BuscarPorPeriodo'): ?>
        <li><a href="?c=Apoyo&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de talleres</a></li>
      <?php endif ?>
      <li><a href="?c=Apoyo&a=BuscarPorId">Apoyo</a></li>
      <li class="active">Beneficiario</li>
    </ol>
</div>
<div class="container">
  <div class="row">
    <h1 class="text-center">Nuevo registro de beneficiario</h1>
    <h3 class="text-center"><?php echo $nombre_apoyo; ?></h3>
  </div>
  <br>
  <div class="row">
      <form id="frm-artesano-apoyo" action="?c=Beneficiario&a=Guardar" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id-apoyo" name="id-apoyo" value="<?php echo $id_apoyo; ?>" />
          <fieldset>
              <legend>Artesano beneficiario:</legend>
              <div class="col-md-4">
                <div class="form-group">
                    <span class="obligatorio">* </span><label>CURP del artesano:</label>
                    <input type="text" id="curp-artesano-apoyo" name="curp-artesano-apoyo" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                </div>
              </div>
          </fieldset>
          <hr>
          <fieldset>                  
            <div class="col-md-4">
                <div class="form-group">
                  <span class="obligatorio">* </span><label>Monto otorgado:</label>
                  <input type="text" id="monto-apoyo-otorgado" name="monto-apoyo-otorgado" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                </div>
            </div>
          </fieldset>
          <div class="text-right">
              <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
          </div>
      </form>
  </div>
</div>