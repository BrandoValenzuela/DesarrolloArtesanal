<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?> Nuevo registro</li>
    </ol>
    <h1 class="text-center"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?>Nuevo registro</h1>
    <h3 class="text-center"><?php echo $nombre_expo; ?></h3>
    <h3 class="text-center"><?php echo $id_expo; ?></h3>
  </div>
  <br>
  <div class="row">
      <form id="frm-artesano-expo" action="?c=Artesanoexpo&a=Guardar" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id-expo" value="<?php echo $id_expo; ?>" />
          <fieldset>
              <legend>Artesano participante:</legend>
              <div class="col-md-4">
                <div class="form-group">
                    <label>CURP del artesano:</label>
                    <input type="text" id="curp-artesano-expo" name="curp-artesano-expo" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                </div>
              </div>
          </fieldset>
          <hr>
          <fieldset>                  
            <div class="col-md-4">
                <div class="form-group">
                  <label>Monto asigando para exposición:</label>
                  <input type="text" id="inversion-artesano-expo" name="inversion-artesano-expo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 10000 (Obligatorio)" data-validacion-tipo="requerido|numero" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Ingresos obtenidos en la exposición:</label>
                  <input type="text" id="ingreso-artesano-expo" name="ingreso-artesano-expo" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 10000 (Obligatorio)" data-validacion-tipo="requerido|numero" />
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
        $("#frm-artesano-expo").submit(function(){
            return $(this).validate();
        });
    });
</script>