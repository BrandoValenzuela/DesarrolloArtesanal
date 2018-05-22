<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
    <li class="active">Comodato</li>
  </ol>
</div>
<div class="container">
  <h1 class="text-center">Nuevo registro de comodato</h1>
  <form id="frm-comodato" action="?c=Comodato&a=Guardar" method="post" enctype="multipart/form-data">
    <fieldset>
      <legend>Poseedor del comodato</legend>
        <div class="col-md-3">
          <div class="form-group">
            <label>El poseedor es:</label>
            <select id="poseedor-comodato" name="poseedor-comodato" class="form-control">
            <option value="1">Artesano</option>
            <option value="2">Otro</option>
          </select>
        </div>
      </div>
      <div class="col-md-3" id="bloque-curp-artesano-comodato">
        <div class="form-group">
          <span class="obligatorio">* </span><label>CURP del artesano:</label>
          <input type="text" id="curp-artesano-comodato" name="curp-artesano-comodato" class="form-control" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp"  />
        </div>
      </div>
      <div class="col-md-6 oculto"  id="bloque-nombre-poseedor-comodato">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Nombre del poseedor:</label>
          <input type="text" id="nombre-poseedor-comodato" name="nombre-poseedor-comodato" class="form-control" placeholder="Ingrese el nombre completo."  />
          </div>
        </div>
        <div class="col-md-6 oculto" id="bloque-direccion-poseedor-comodato">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Dirección:</label>
            <input type="text" id="direccion-poseedor-comodato" name="direccion-poseedor-comodato" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
          </div>     
        </div>
        <div class="col-md-3 oculto" id="bloque-municipio-poseedor-comodato">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Municipio:</label>
            <input type="text" id="municipio-poseedor-comodato" name="municipio-poseedor-comodato" class="form-control" placeholder="Ingrese calle, número y colonia." data-validacion-tipo="requerido" />
          </div>     
        </div>
        <div class="col-md-3 oculto" id="bloque-telefono-poseedor-comodato">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Teléfono:</label>  
            <input type="text" id="telefono-poseedor-comodato" name="telefono-poseedor-comodato" class="form-control" placeholder="Teléfono" data-validacion-tipo="requerido|numero" />
          </div>
        </div>
    </fieldset><br>
    <fieldset>
      <legend>Datos del comodato</legend>
      <div class="col-md-3">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Folio:</label>
          <input type="text" id="folio-comodato" name="folio-comodato" class="form-control" placeholder="Folio del comodato." data-validacion-tipo="requerido" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Fecha de inicio:</label>
          <input type="text" readonly id="fecha-inicio-comodato" name="fecha-inicio-comodato" class="form-control" placeholder="Selecciona la fecha de inicio" data-validacion-tipo="requerido" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <span class="obligatorio">* </span><label>Bienes comodatados:</label>
          <textarea id="bienes-comodato" name="bienes-comodato" class="form-control" cols="30" rows="2"></textarea>
        </div>     
      </div>
    </fieldset>
    <div class="text-right">
      <button id="btn-submit-frm-comodato" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
    </div>
  </form>
</div>