<div class="container-fluid">
   <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Concursos y exposiciones</li>
    </ol>
   <div class="col-md-2">
      <h3 class="text-center">Registrar</h3>
      <div class="list-group">
         <a href="?c=Concurso&a=Crud" class="list-group-item">Concurso</a>
         <a href="?c=Exposicion&a=Crud" class="list-group-item">Exposición</a>
      </div>
   </div>
   <div class="col-md-10">
      <h3 class="text-center">Opciones de búsqueda</h3>
      <div class="panel-group" id="accordion">        
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-concurso"><h4>Buscar concurso</h4></a>
               </h4>
            </div>
            <div id="collapse-concurso" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-concurso-concepto" action="?c=Concurso&a=BuscarPorConcepto" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Por concepto:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ejemplo: artesanias; concurso nacional" id="buscar-concurso-concepto" name="buscar-concurso-concepto" data-validacion-tipo="requerido">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                     <form id="frm-busqueda-concurso-periodo" action="?c=Concurso&a=BuscarPorPeriodo" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label >Por periodo:</label>
                           <div class="input-group">
                              <span class="input-group-addon"> De </span>
                              <input type="text" readonly id="fecha-inicio-periodo-concurso" name="fecha-inicio-periodo-concurso" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                              <span class="input-group-addon"> a </span>
                              <input type="text" readonly id="fecha-fin-periodo-concurso" name="fecha-fin-periodo-concurso" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
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
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-exposicion"><h4>Buscar exposición</h4></a>
               </h4>
            </div>
            <div id="collapse-exposicion" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-expo-mun" action="?c=Exposicion&a=BuscarPorMunicipioEntidad" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Por municipio o entidad:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ejemplo: Zacatecas" id="buscar-expo-munent" name="buscar-expo-munent" data-validacion-tipo="requerido">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                     <form id="frm-busqueda-expo-periodo" action="?c=Exposicion&a=BuscarPorPeriodo" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label >Por periodo:</label>
                           <div class="input-group">
                              <span class="input-group-addon"> De </span>
                              <input type="text" readonly id="fecha-inicio-periodo-expo" name="fecha-inicio-periodo-expo" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                              <span class="input-group-addon"> a </span>
                              <input type="text" readonly id="fecha-fin-periodo-expo" name="fecha-fin-periodo-expo" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
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
      </div>
   </div>
</div>