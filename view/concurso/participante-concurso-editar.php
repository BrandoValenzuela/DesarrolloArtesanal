<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li><a href="?c=Principal&a=IndexConcursosExposiciones">Concursos y exposiciones</a></li>
        <?php if ($_SESSION['metodo-busqueda'] == 'BuscarPorPeriodo' || $_SESSION['metodo-busqueda'] == 'BuscarPorConcepto'): ?>
          <li><a href="?c=Concurso&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de concursos</a></li>
        <?php endif ?>
        <li><a href="?c=Concurso&a=BuscarPorId">Concurso</a></li>
        <li class="active">Participante</li>
    </ol>
</div>
<div class="container">
  <div class="row">
    <h1 class="text-center">Nuevo registro de participante</h1>
    <h3 class="text-center"><?php echo $nombre_concurso; ?></h3>
  </div>
  <br>
  <div class="row">
      <form id="frm-artesano-concurso" action="?c=Participanteconcurso&a=Guardar" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id-concurso" value="<?php echo $id_concurso; ?>" />
          <fieldset>
              <legend>Artesano participante:</legend>
              <div class="col-md-4">
                <div class="form-group">
                    <span class="obligatorio">* </span><label>CURP del artesano:</label>
                    <input type="text" id="curp-artesano-concurso" name="curp-artesano-concurso" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                </div>
              </div>
          </fieldset>
          <hr>
          <fieldset>                  
            <div class="col-md-4">
                <div class="form-group">
                  <span class="obligatorio">* </span><label>Posicion obtenida en concurso:</label>
                  <select name="lugar-concurso" id="lugar-concurso" class="form-control" data-validacion-tipo="requerido">
                    <option value="1">Participante</option>
                    <option value="2">Galardon</option>
                    <option value="3">Mención honorífica</option>
                    <option value="4">3er. lugar</option>
                    <option value="5">2do. Lugar</option>
                    <option value="6">1er. Lugar</option>
                  </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Premio ($):</label>
                  <input type="text" id="monto-premio-concurso" name="monto-premio-concurso" disabled="disabled" class="form-control" placeholder="Ejemplo: 1000" data-validacion-tipo="numero" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Pieza participante:</label>
                  <input type="text" id="pieza-participate" name="pieza-participate" class="form-control" placeholder="Nombre de la pieza" data-validacion-tipo="requerido" />
                </div>
            </div>
          </fieldset>
          <div class="text-right">
              <button id="btn-submit-frm-artesano-concurso" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
          </div>
      </form>
  </div>
</div>