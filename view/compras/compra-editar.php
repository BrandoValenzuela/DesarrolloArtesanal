<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexApoyosCompras">Apoyos y compras</a></li>
    <li class="active">Compras</li>
  </ol>
</div>
<div class="container">
  <h1 class="text-center">Nuevo registro de compra</h1>
  <div class="row">
    <form id="frm-apoyo" action="?c=Compra&a=Guardar" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Datos de la compra</legend>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>CURP:</label>
            <input type="text" id="curp-vendedor" name="curp-vendedor" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
          </div>
        </div>
        </fieldset>
        <fieldset><br>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Alcance:</label>
            <select id="alcance-venta" name="alcance-venta" class="form-control">
              <option value="1">Estatal</option>
              <option value="2">Federal</option>
            </select>
          </div>     
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Monto:</label>
            <input type="text" id="monto-compra" name="monto-compra" class="form-control" placeholder="Ejemplo: 10000" data-validacion-tipo="requerido|numero" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Tipo de pago:</label>
            <select id="tipo-pago" name="tipo-pago" class="form-control">
              <option value="1">Factura</option>
              <option value="2">Apoyo</option>
            </select>
          </div>
        </div>
      </fieldset>
      <div class="text-right">
        <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
      </div>
    </form>
  </div>
</div>