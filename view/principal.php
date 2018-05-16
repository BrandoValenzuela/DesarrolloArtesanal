<div class="container-fluid">
   <ol class="breadcrumb">
      <!-- <li><a href="?c=Principal">Página principal</a></li> -->
      <li class="active">Página principal</li>
    </ol>
    <div >
      <img class="img img-responsive" src="assets/images/Logo.png" class="img-rounded" width="460" height="345">
    </div>
<!--    <div class="col-md-2 hidden-xs hidden-sm">
      <h3 class="text-center">Registrar</h3>
      <div class="list-group">
         <a href="?c=Artesano&a=Crud" class="list-group-item">Artesano</a>
         <a href="?c=Taller&a=Crud" class="list-group-item">Taller de artesano</a>
         <a href="?c=Exposicion&a=Crud" class="list-group-item">Exposición</a>
         <a href="?c=Concurso&a=Crud" class="list-group-item">Concurso</a>
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
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-artesano"><h4>Buscar artesano</h4></a>
               </h4>
            </div>
            <div id="collapse-artesano" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-artesano-curp" action="?c=Artesano&a=BuscarPorCURP" method="post" enctype="multipart/   form-data">
                        <div class="form-group">
                           <label>Por CURP:</label>
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Ingresa la CURP" id="buscar-artesano" name="buscar-artesano-curp" data-validacion-tipo="requerido|curp">
                              <div class="input-group-btn">
                                 <button id="btn-submit-busqueda-curp" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                     <form id="frm-busqueda-artesano-ap" action="?c=Artesano&a=BuscarPorApellido" method="post" enctype="multipart/   form-data">
                        <div class="form-group">
                           <label>Por apellido:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ingresa el apellido paterno" id="buscar-artesano" name="buscar-artesano-ap" data-validacion-tipo="requerido">
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
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-taller"><h4>Buscar talleres</h4></a>
               </h4>
            </div>
            <div id="collapse-taller" class="panel-collapse collapse">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-taller-municipio" action="?c=Taller&a=BuscarTallerPorMunicipio" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Por municipio:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ejemplo: Zacatecas" id="buscar-taller-mun" name="buscar-taller-mun" data-validacion-tipo="requerido">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                     <form id="frm-busqueda-taller-rama" action="?c=Taller&a=BuscarTallerPorRamaArtesanal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Por rama artesanal:</label>
                           <div class="input-group">
                              <select name="ramaartesanal" class="form-control">
                                 <?php
                                    #foreach ($ramas as $opcion) {
                                       #echo "<option value='".$opcion->idRamaArtesanal."'>";
                                       #echo $opcion->nombre."</option>\n";
                                    #}
                                 ?>
                              </select>
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
         <div class="panel panel-default">
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
         </div>
         <div class="panel panel-default">
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
   </div> -->
</div>