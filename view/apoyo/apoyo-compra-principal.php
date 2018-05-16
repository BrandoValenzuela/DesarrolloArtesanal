<div class="container-fluid">
   <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Apoyos y compras</li>
    </ol>
   <div class="col-md-2">
      <h3 class="text-center">Registrar</h3>
      <div class="list-group">
         <a href="?c=Apoyo&a=Crud" class="list-group-item">Apoyo</a>
         <a href="?c=Compra&a=Crud" class="list-group-item">Compra</a>
      </div>
   </div>
   <div class="col-md-10">
      <h3 class="text-center">Opciones de búsqueda</h3>
      <div class="panel-group" id="accordion">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-apoyo"><h4>Buscar apoyo</h4></a>
               </h4>
            </div>
            <div id="collapse-apoyo" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-apoyo-fecha" action="?c=Apoyo&a=BuscarPorFecha" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label >Por fecha:</label>
                           <div class="input-group">
                              <select class="form-control" id="mes-apoyo" name="mes-apoyo">
                                 <option value="01">Enero</option>
                                 <option value="02">Febrero</option>
                                 <option value="03">Marzo</option>
                                 <option value="04">Abril</option>
                                 <option value="05">Mayo</option>
                                 <option value="06">Junio</option>
                                 <option value="07">Julio</option>
                                 <option value="08">Agosto</option>
                                 <option value="09">Septiembre</option>
                                 <option value="10">Octubre</option>
                                 <option value="11">Noviembre</option>
                                 <option value="12">Diciembre</option>
                              </select>
                              <span class="input-group-addon">/</span>
                              <input type="text" class="form-control" placeholder="Año" id="año-apoyo" name="año-apoyo" data-validacion-tipo="requerido">
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
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-compra"><h4>Buscar compra</h4></a>
               </h4>
            </div>
            <div id="collapse-compra" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-compra-fecha" action="?c=Compra&a=BuscarPorMesAño" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label >Por fecha:</label>
                           <div class="input-group">
                              <select class="form-control" id="mes-compra" name="mes-compra">
                                 <option value="01">Enero</option>
                                 <option value="02">Febrero</option>
                                 <option value="03">Marzo</option>
                                 <option value="04">Abril</option>
                                 <option value="05">Mayo</option>
                                 <option value="06">Junio</option>
                                 <option value="07">Julio</option>
                                 <option value="08">Agosto</option>
                                 <option value="09">Septiembre</option>
                                 <option value="10">Octubre</option>
                                 <option value="11">Noviembre</option>
                                 <option value="12">Diciembre</option>
                              </select>
                              <span class="input-group-addon">/</span>
                              <input type="text" class="form-control" placeholder="Año" id="año-compra" name="año-compra" data-validacion-tipo="requerido">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                     <form id="frm-busqueda-compra-periodo" action="?c=Compra&a=BuscarPorPeriodo" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label >Por periodo:</label>
                           <div class="input-group">
                              <span class="input-group-addon"> De </span>
                              <input type="text" readonly id="fecha-inicio-periodo-compra" name="fecha-inicio-periodo-compra" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                              <span class="input-group-addon"> a </span>
                              <input type="text" readonly id="fecha-fin-periodo-compra" name="fecha-fin-periodo-compra" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
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