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
         
<!--          <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-exposicion"><h4>Buscar exposición</h4></a>
               </h4>
            </div>
            <div id="collapse-exposicion" class="panel-collapse collapse">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-expo-mun" action="?c=Exposicion&a=BuscarPorMunicipioEntidad" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Por municipio/entidad:</label>
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
         </div>  -->
<!--          <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-concurso"><h4>Buscar concurso</h4></a>
               </h4>
            </div>
            <div id="collapse-concurso" class="panel-collapse collapse">
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
         </div> -->
<!--          <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-apoyo"><h4>Buscar apoyo</h4></a>
               </h4>
            </div>
            <div id="collapse-apoyo" class="panel-collapse collapse">
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
         </div> -->
<!--          <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-compra"><h4>Buscar compra</h4></a>
               </h4>
            </div>
            <div id="collapse-compra" class="panel-collapse collapse">
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
         </div> -->

      </div>
   </div>
</div>