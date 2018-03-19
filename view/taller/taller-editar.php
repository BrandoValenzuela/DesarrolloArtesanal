<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?> Nuevo registro</li>
    </ol>
    <h1 class="text-center"><?php #echo $artesano->id != null ? $artesano->Nombre : 'Nuevo Registro'; ?>Nuevo registro</h1>
  </div>
    <div class="row">
        <!-- <form id="frm-artesano" action="#" method="post" enctype="multipart/form-data"> -->
        <form id="frm-taller-artesano" action="?c=Taller&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php #echo $artesano->id; ?>" />
            <fieldset>
              <legend>Artesano</legend>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>CURP del artesano:</label>
                      <input type="text" id="curp-artesano" name="curp-artesano" value="<?php #echo $artesano->CURP; ?>" class="form-control" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Participación en el taller:</label>
                      <select name="participacion-artesano" class="form-control">
                      <option <?php #echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Dueño del taller</option>
                      <option <?php #echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Colaborador</option>
                      </select>
                    </div>
                  </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>Datos del taller</legend>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Rama artesanal:</label>
                      <select name="ramaartesanal" class="form-control">
                        <?php 
                          foreach ($ramas as $opcion) {
                            echo "<option value='".$opcion->idRamaArtesanal."'>";
                            echo $opcion->nombre."</option>\n";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                        <label>Nombre del taller:</label>
                        <input type="text" name="nombre" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre." data-validacion-tipo="requerido" />
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <label>Direccion:</label>
                        <input type="text" name="direccion" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
                    </div>     
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Localidad:</label>
                        <input type="text" name="localidad" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
                    </div>
                </div>
                <div class="col-md-3">   
                    <div class="form-group">
                        <label>Municipio:</label>
                        <input type="text" name="municipio" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido|nombre" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Empleos de tiempo completo: </label>
                        <input type="text" id="empleos-tc" name="empleos-tc" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2 (Obligatorio)" data-validacion-tipo="requerido|numero" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Empleos por horas:</label>
                      <input type="text" id="empleos-hr" name="empleos-hr" value="<?php #echo $alm->FechaNacimiento; ?>" class="form-control" placeholder="Ejemplo: 2 (Obligatorio)" data-validacion-tipo="requerido|numero" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Empleos registrados en el IMSS:</label>
                        <input type="text" name="empleos-imss" value="<?php #echo $alm->Correo; ?>" class="form-control" placeholder="Ejemplo: 2 (Obligatorio)" data-validacion-tipo="requerido|numero" />
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
        $("#frm-taller-artesano").submit(function(){
            return $(this).validate();
        });
    });

    $(document).ready(function(){
      $("#curp-artesano").blur(function(){
        text = $(this).val();
        $(this).val(text.toUpperCase());
    });
});
</script>