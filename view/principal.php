<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="active">Página principal</li>
  </ol>
  <div class="col-md-4">
    <img class="img img-responsive" src="assets/images/Logo.png" class="img-rounded" width="460" height="345">
  </div>
    <div class="col-md-8">
      <div class="panel panel-default">
       <div class="panel-heading bold">Descripción</div>
         <div class="panel-body">
          <ul>
            <li>
              Sistema de información para el registro y control de actividades para el fomento económico y difución cultural, así como la información de los artesanos registrados en la Subsecretaría de Desarrollo Artesanal.
            </li>
          </ul>
        </div>
      </div>
    </div>
  <div class="col-md-2"> 
    <div class="panel panel-default">
      <div class="panel-heading bold">Registros actuales</div>
      <div class="panel-body"> 
        <ul>
          <li>Artesanos: <b><?php echo $artesanos->numero; ?></b></li>
          <li>Talleres: <b><?php echo $talleres->numero; ?></b></li>
          <li>Concursos: <b><?php echo $concursos->numero; ?></b></li>
          <li>Exposiciones: <b><?php echo $expos->numero; ?></b></li>
          <li>Capacitaciones: <b><?php echo $capacitaciones->numero; ?></b></li>
          <li>Talleristas: <b><?php echo $talleristas->numero; ?></b></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
       <div class="panel-heading bold">Ramas  y productos artesanales</div>
       <div class="panel-body">
        <div class="col-md-6">
          <h5 class="bold">Ramas</h5>
          <ol>
            <?php foreach ($ramas as $rama): ?>
              <?php if ($rama->nombre != 'Otra'): ?>
                <li><?php echo $rama->nombre; ?></li>
              <?php endif ?>
            <?php endforeach ?>
          </ol>
        </div>
        <div class="col-md-6">
          <h5 class="bold">Productos</h5>
          <ol>
            <?php foreach ($productos as $producto): ?>
              <li><?php echo $producto->nombre; ?></li>
            <?php endforeach ?>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading bold">Incidencias</div>
       <div class="panel-body">
          <div class="nueva-inicidencia">
            <a href="#" data-toggle="collapse" data-target="#frm-nueva-incidencia" >Registrar incidencia</a>
            <form class="collapse" id="frm-nueva-incidencia" name="frm-nueva-incidencia" action="#" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <input type="text" id="nueva-incidencia" name="nueva-incidencia" class="form-control" placeholder="Rama artesanal" data-validacion-tipo="requerido" />
               </div>
               <div class="text-right">
                  <button id="btn-submit-frm-nueva-inicidencia" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
               </div>
            </form>
          </div>
          <div class="buscar-inicidencia">
            <a href="#" data-toggle="collapse" data-target="#frm-buscar-incidencia" >Buscar incidencia</a>
            <form class="collapse" id="frm-buscar-incidencia" name="frm-buscar-incidencia" action="#" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <input type="text" id="buscar-incidencia" name="buscar-incidencia" class="form-control" placeholder="Rama artesanal" data-validacion-tipo="requerido" />
               </div>
               <div class="text-right">
                  <button id="btn-submit-frm-buscar-inicidencia" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
               </div>
            </form>
          </div>
       </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading bold">Ramas y productos artesanales</div>
        <div class="panel-body">
          <div id="nuevo-producto-artesanal">
            <a href="#" data-toggle="collapse" data-target="#frm-nuevo-producto" >Registrar nuevo producto</a>
            <form class="collapse" id="frm-nuevo-producto" name="frm-nuevo-producto" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label></label>
                  <input type="text" id="nuevo-producto" name="nuevo-producto" class="form-control" placeholder="Producto artesanal" data-validacion-tipo="requerido" />
               </div>
               <div class="text-right">
                  <button id="btn-submit-frm-artesano" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
               </div>
            </form>
          </div>
          <div id="nueva-rama-artesanal">
            <a href="#" data-toggle="collapse" data-target="#frm-nueva-rama-artesanal" >Registrar nueva rama artesanal</a>
            <form class="collapse" id="frm-nueva-rama-artesanal" name="frm-nueva-rama-artesanal" action="?c=Ramaartesanal&a=Guardar" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label></label>
                  <input type="text" id="nueva-rama-artesanal" name="nueva-rama-artesanal" class="form-control" placeholder="Rama artesanal" data-validacion-tipo="requerido" />
               </div>
               <div class="text-right">
                  <button id="btn-submit-frm-artesano" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
               </div>
            </form>
          </div>
       </div>
    </div>
  </div>
</div>
