<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li><a href="?c=Principal&a=IndexConcursosExposiciones">Concursos y exposiciones</a></li>
        <?php if ($_SESSION['metodo-busqueda'] == 'BuscarPorPeriodo'): ?>
          <li><a href="?c=Capacitacion&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de capacitaciones</a></li>
        <?php endif ?>
        <li><a href="?c=Capacitacion&a=BuscarPorId">Capacitación</a></li>
        <li class="active">Tallerista</li>
    </ol>
</div>
<div class="container">
  <div class="row">
    <h1 class="text-center">Nuevo registro de tallerista</h1>
    <h3 class="text-center"><?php echo $nombre_capacitacion; ?></h3>
  </div>
  <br>
  <div class="row">
      <form id="frm-tallerista-capacitacion" action="?c=Talleristacapacitacion&a=Guardar" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id-capacitacion" value="<?php echo $id_capacitacion; ?>" />
          <fieldset>
              <legend>Tallerista:</legend>
              <div class="col-md-3">
                <div class="form-group">
                  <label>La persona esta registrada como:</label>
                  <select name="registro" id="registro" class="form-control" data-validacion-tipo="requerido">
                    <option value="1">Tallerista</option>
                    <option value="2">Artesano</option>
                  </select>
                </div>
              </div>
          </fieldset>
          <br>
          <fieldset>                  
            <div class="col-md-3">
                <div class="form-group">
                    <span class="obligatorio">* </span><label>CURP del artesano:</label>
                    <input type="text" id="curp-tallerista-capacitacion" name="curp-tallerista-capacitacion" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                </div>
              </div>
            <div class="col-md-3">
                <div class="form-group">
                  <span class="obligatorio">* </span><label>Pago:</label>
                  <input type="text" id="pago-tallerista-capacitacion" name="pago-tallerista-capacitacion" class="form-control" placeholder="Ejemplo: 1000" data-validacion-tipo="numero|requerido" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <label>Forma de pago:</label>
                  <select name="forma-pago-tallerista" id="forma-pago-tallerista" class="form-control" data-validacion-tipo="requerido">
                    <option value="1">Apoyo</option>
                    <option value="2">Factura</option>
                  </select>
                </div>
            </div>
          </fieldset><br>
          <div class="text-right">
              <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
          </div>
      </form>
  </div>
</div>