<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexConcursosExposiciones">Concursos y exposiciones</a></li>
    <li class="active">Concurso</li>
  </ol>
</div>
<div class="container">
    <h1 class="text-center">Nuevo registro de concurso</h1>
    <div class="row">
        <form id="frm-concurso" action="?c=Concurso&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id"/>
            <fieldset>
                <legend>Datos del concurso</legend>
                <div class="col-md-6">
                  <div class="form-group">
                      <span class="obligatorio">* </span><label>Nombre del concurso:</label>
                      <input type="text" name="nombre-concurso" class="form-control" placeholder="Ingrese el nombre." data-validacion-tipo="requerido" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <span class="obligatorio">* </span><label>Dirección del evento:</label>
                        <input type="text" name="direccion-concurso" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
                    </div>     
                </div>
                <div class="col-md-3">   
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Municipio:</label>
                        <input type="text" name="municipio-concurso" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
                    </div> 
                </div>
                <div class="col-md-3">   
                    <div class="form-group">
                        <span class="obligatorio">* </span><label>Entidad:</label>
                        <input type="text" name="entidad-concurso" class="form-control" placeholder="Ingrese la entidad." data-validacion-tipo="requerido" />
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="obligatorio">* </span><label>Fecha del evento:</label>
                    <input type="text" readonly id="fecha-concurso" name="fecha-concurso" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                  </div>
                </div>              
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="obligatorio">* </span><label>Alcance del concurso:</label>
                    <select name="alcance-concurso" class="form-control">
                    <option value="1">Estatal</option>
                    <option value="2">Federal</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <span class="obligatorio">* </span><label>Monto total estatal:</label>
                      <input type="text" id="mte-concurso" name="mte-concurso" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <span class="obligatorio">* </span><label>Monto total federal:</label>
                      <input type="text" id="mtf-concurso" name="mtf-concurso" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
                    </div>
                </div>
            </fieldset>
            <div class="text-right">
                <button id="btn-submit-frm-concurso" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
            </div>
        </form>
    </div>
</div>