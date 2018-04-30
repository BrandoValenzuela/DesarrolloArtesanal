<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?> Nuevo registro</li>
    </ol>
    <h1 class="text-center"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?>Nuevo registro de participante</h1>
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
                    <input type="text" id="curp-artesano-concurso" name="curp-artesano-concurso" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                </div>
              </div>
          </fieldset>
          <hr>
          <fieldset>                  
            <div class="col-md-4">
                <div class="form-group">
                  <span class="obligatorio">* </span><label>Posicion obtenida en concurso:</label>
                  <select name="lugar-concurso" id="lugar-concurso" class="form-control" data-validacion-tipo="requerido" onclick="habilitarCampoPremio()">
                    <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Participante</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Mención honorífica</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="3">3er. lugar</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="4">2do. Lugar</option>
                    <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="5">1er. Lugar</option>
                  </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Premio ($):</label>
                  <input type="text" id="monto-premio-concurso" name="monto-premio-concurso" value="<?php #echo $alm->FechaNacimiento; ?>" disabled="disabled" class="form-control" placeholder="Ejemplo: 1000" data-validacion-tipo="numero" />
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
        $("#frm-artesano-concurso").submit(function(){
            return $(this).validate();
        });
    });
    $(document).ready(function(){
        $("#btn-submit").click(function(){
            $("#monto-premio-concurso").prop("disabled",false);
        });
    });
</script>