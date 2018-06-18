<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="active">Página principal</li>
  </ol>
  <div class="col-md-4">
    <img class="img img-responsive" src="assets/images/Logo.png" class="img-rounded" width="460" height="345">
  </div>
    <div class="col-md-8">
      <div class="panel panel-default">
       <div class="panel-heading bold">Información</div>
         <div class="panel-body">
          <ul>
            <li>
              Sistema de información para el registro y control de actividades para el fomento económico y difución cultural, así como la información de los artesanos registrados en la Subsecretaría de Desarrollo Artesanal.
            </li>
          </ul>
        </div>
      </div>
    </div>
  <div class="col-md-4">
    <div class="panel panel-default">
       <div class="panel-heading bold">Ramas y productos artesanales</div>
       <div class="panel-body">
        <div class="col-md-6">
          <h5 class="bold">Ramas</h5>
          <ol>
            <?php foreach ($ramas as $rama): ?>
              <?php if ($rama->nombre != 'Otra'): ?>
                <li><a href="?c=Artesano&a=BuscarPorRama&idRamaArtesanal=<?php echo $rama->idRamaArtesanal;?>&nombre-rama=<?php echo $rama->nombre;?>"><?php echo $rama->nombre; ?></a></li>
              <?php endif ?>
            <?php endforeach ?>
          </ol>
        </div>
        <div class="col-md-6">
          <h5 class="bold">Productos</h5>
          <ol>
            <?php foreach ($productos as $producto): ?>
              <li><a href="?c=Artesano&a=BuscarPorProducto&idProducto=<?php echo $producto->idProducto;?>&nombre-producto=<?php echo $producto->nombre;?>"><?php echo $producto->nombre; ?></a></li>
            <?php endforeach ?>
          </ol>
          <h5 class="bold">Corredores</h5>
          <ol>
            <?php foreach ($corredores as $corredor): ?>
              <li><?php echo $corredor->nombre; ?></li>
            <?php endforeach ?>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="panel panel-default">
      <div class="panel-heading bold">Registros actuales</div>
      <div class="panel-body">
        <div class="col-md-6">
          <ul>
            <li>Artesanos: <b><?php echo $artesanos->numero; ?></b></li>
            <li>Talleres: <b><?php echo $talleres->numero; ?></b></li>
            <li>Talleristas: <b><?php echo $talleristas->numero; ?></b></li>
          </ul>  
        </div>
        <div class="col-md-6">
          <ul>
            <li>Concursos: <b><?php echo $concursos->numero; ?></b></li>
            <li>Exposiciones: <b><?php echo $expos->numero; ?></b></li>
            <li>Capacitaciones: <b><?php echo $capacitaciones->numero; ?></b></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading bold">Registros adicionales</div>
        <div class="panel-body">
          <div id="nuevo-corredor">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#frm-nuevo-corredor" >Registrar nuevo corredor artesanal</a>
            <form class="collapse" id="frm-nuevo-corredor" name="frm-nuevo-corredor" action="?c=Corredor&a=Guardar" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label></label>
                  <input type="text" id="nuevo-corredor" name="nuevo-corredor" class="form-control" placeholder="Nombre corredor artesanal" data-validacion-tipo="requerido" />
               </div>
               <div class="text-right">
                  <button id="btn-submit-frm-nuevo-corredor" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
               </div>
            </form>
          </div>
          <div id="nuevo-producto-artesanal">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#frm-nuevo-producto" >Registrar nuevo producto artesanal</a>
            <form class="collapse" id="frm-nuevo-producto" name="frm-nuevo-producto" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label></label>
                  <input type="text" id="nuevo-producto" name="nuevo-producto" class="form-control" placeholder="Producto artesanal" data-validacion-tipo="requerido" />
               </div>
               <div class="text-right">
                  <button id="btn-submit-frm-producto" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
               </div>
            </form>
          </div>
          <div id="nueva-rama-artesanal">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#frm-nueva-rama-artesanal" >Registrar nueva rama artesanal</a>
            <form class="collapse" id="frm-nueva-rama-artesanal" name="frm-nueva-rama-artesanal" action="?c=Ramaartesanal&a=Guardar" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label></label>
                  <input type="text" id="nueva-rama-artesanal" name="nueva-rama-artesanal" class="form-control" placeholder="Rama artesanal" data-validacion-tipo="requerido" />
               </div>
               <div class="text-right">
                  <button id="btn-submit-frm-nueva-rama" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
               </div>
            </form>
          </div>
          
       </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading bold">Incidencias</div>
       <div class="panel-body">
          <div class="nueva-inicidencia">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#frm-nueva-incidencia" >Registrar incidencia</a>
            <form class="collapse" id="frm-nueva-incidencia" name="frm-nueva-incidencia" action="?c=incidencia&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <br>
                <span class="obligatorio">* </span><label>CURP del artesano:</label>
                <input type="text" id="curp-artesano-incidencia" name="curp-artesano-incidencia" class="form-control" placeholder="CURP artesano" data-validacion-tipo="requerido" />
              </div>
              <div class="form-group">
                <span class="obligatorio">* </span><label>Obseración:</label>
                <textarea id="observacion-incidencia" name="observacion-incidencia" rows="2" data-validacion-tipo="requerido" placeholder="Ingrese una descripción" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <span class="obligatorio">* </span><label>Informante</label>
                <input type="text" id="nombre-informante-incidencia" name="nombre-informante-incidencia" class="form-control" placeholder="Nombre completo" data-validacion-tipo="requerido" />
              </div>
              <div class="text-right">
                <button id="btn-submit-frm-nueva-inicidencia" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
              </div>
            </form>
          </div>
       </div>
    </div>
  </div>
</div>
