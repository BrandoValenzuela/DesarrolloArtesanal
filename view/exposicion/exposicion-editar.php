<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Nuevo registro</li>
    </ol>
    <h1 class="text-center">Nuevo registro de exposición</h1>
  </div>
    <div class="row">
        <form id="frm-exposicion" action="?c=Exposicion&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id"/>
            <fieldset>
                <legend>Datos de la exposición</legend>
                <div class="col-md-6">
                  <div class="form-group">
                      <span class="obligatorio">* </span><label>Nombre de la exposición:</label>
                      <input type="text" name="nombre-expo" class="form-control" placeholder="Ingrese el nombre." data-validacion-tipo="requerido" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <span class="obligatorio">* </span><label>Dirección del evento:</label>
                        <input type="text" name="direccion-expo" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
                    </div>     
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Localidad:</label>
                        <input type="text" name="localidad-expo" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
                    </div>
                </div>
                <div class="col-md-3">   
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Municipio:</label>
                        <input type="text" name="municipio-expo" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
                    </div>
                </div>
                <div class="col-md-3">   
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Entidad:</label>
                        <input type="text" name="entidad-expo" class="form-control" placeholder="Ingrese la entidad." data-validacion-tipo="requerido" />
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="obligatorio">* </span><label>Fecha de inicio:</label>
                    <input type="text" readonly id="fecha-inicio-expo" name="fecha-inicio-expo" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="requerido" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="obligatorio">* </span><label>Fecha de finalización:</label>
                    <input type="text" readonly id="fecha-fin-expo" name="fecha-fin-expo" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="requerido" />
                  </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <span class="obligatorio">* </span><label>Ingreso total:</label>
                        <input type="text" id="ingreso-expo" name="ingreso-expo" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <span class="obligatorio">* </span><label>Monto invertido:</label>
                        <input type="text" id="inversion-expo" name="inversion-expo" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                      </div>
                  </div>
                  <div class="col-md-12">
                    <br>
                    <span class="obligatorio">* </span><label>Tipo de apoyo:</label>
                    <label class="checkbox-inline"><input type="checkbox" name="tipo-apoyo-expo[]" value="Piso">Piso</label>
                    <label class="checkbox-inline"><input type="checkbox" name="tipo-apoyo-expo[]" value="Alimentos">Alimentos</label>
                    <label class="checkbox-inline"><input type="checkbox" name="tipo-apoyo-expo[]" value="Hospedaje">Hospedaje</label>
                    <label class="checkbox-inline"><input type="checkbox" name="tipo-apoyo-expo[]" value="Transporte">Transporte</label>
                  </div>
                </fieldset>
                  <!-- <div class="col-md-3">
                    <div class="form-group">
                      <span class="obligatorio">* </span><label>Tipo de apoyo:</label>
                      <select name="tipo-apoyo-expo" class="form-control">
                      <option value="1">Piso</option>
                      <option value="2">Alimentos</option>
                      <option value="3">Hospedaje</option>
                      <option value="4">Transporte</option>
                      </select>
                    </div>
                  </div> -->
                  <!-- <div class="col-md-6">
                    <span class="obligatorio">* </span><label>Tipo de apoyo:</label>
                    <label class="checkbox-inline"><input type="checkbox" value="">Piso</label>
                    <label class="checkbox-inline"><input type="checkbox" value="">Alimentos</label>
                    <label class="checkbox-inline"><input type="checkbox" value="">Hospedaje</label>
                    <label class="checkbox-inline"><input type="checkbox" value="">Transporte</label>
                  </div> -->
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