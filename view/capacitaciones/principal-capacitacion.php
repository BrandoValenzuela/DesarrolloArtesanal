<div class="container-fluid">
   <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Capacitaciones</li>
    </ol>
   <div class="col-md-2">
      <h3 class="text-center">Registrar</h3>
      <div class="list-group">
         <a href="?c=Capacitacion&a=Crud" class="list-group-item">Capacitaciones</a>
         <a href="?c=Tallerista&a=Crud" class="list-group-item">Talleristas</a>
      </div>
   </div>
   <div class="col-md-10">
      <h3 class="text-center">Opciones de búsqueda</h3>
      <div class="panel-group" id="accordion">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-capacitacion"><h4>Buscar capacitaciones</h4></a>
               </h4>
            </div>
            <div id="collapse-capacitacion" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-capacitacion-periodo" action="?c=Capacitacion&a=BuscarPorPeriodo" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label >Por periodo:</label>
                           <div class="input-group">
                              <span class="input-group-addon"> De </span>
                              <input type="text" readonly id="fecha-inicio-periodo-capacitacion" name="fecha-inicio-periodo-capacitacion" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                              <span class="input-group-addon"> a </span>
                              <input type="text" readonly id="fecha-fin-periodo-capacitacion" name="fecha-fin-periodo-capacitacion" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                              <div class="input-group-btn">
                                 <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div> 
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-tallerista"><h4>Buscar tallerista</h4></a>
               </h4>
            </div>
            <div id="collapse-tallerista" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-tallerista-curp" action="?c=Tallerista&a=BuscarPorCURP" method="post" enctype="multipart/   form-data">
                        <div class="form-group">
                           <label>Por CURP:</label>
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Ingresa la CURP" id="buscar-tallerista-curp" name="buscar-tallerista-curp" data-validacion-tipo="requerido|curp">
                              <div class="input-group-btn">
                                 <button id="btn-submit-busqueda-curp" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                     <form id="frm-busqueda-tallerista-ap" action="?c=Tallerista&a=BuscarPorApellido" method="post" enctype="multipart/   form-data">
                        <div class="form-group">
                           <label>Por apellido:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ingresa el apellido paterno" id="buscar-tallerista-ap" name="buscar-tallerista-ap" data-validacion-tipo="requerido">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>