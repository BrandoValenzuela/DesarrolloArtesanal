<div class="container-fluid">
   <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Artesanos</li>
    </ol>
   <div class="col-md-2">
      <h3 class="text-center">Registrar</h3>
      <div class="list-group">
         <a href="?c=Artesano&a=Crud" class="list-group-item">Artesano</a>
         <a href="?c=Taller&a=Crud" class="list-group-item">Taller de artesano</a>
         <a href="?c=Comodato&a=Crud" class="list-group-item">Comodato</a>
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
            <div id="collapse-taller" class="panel-collapse collapse in">
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
                                    foreach ($ramas as $opcion) {
                                       echo "<option value='".$opcion->idRamaArtesanal."'>";
                                       echo $opcion->nombre."</option>\n";
                                    }
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
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-comodato"><h4>Buscar comodato</h4></a>
               </h4>
            </div>
            <div id="collapse-comodato" class="panel-collapse collapse in">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-comodato-periodo" action="?c=Comodato&a=BuscarPorPeriodo" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label >Por periodo:</label>
                           <div class="input-group">
                              <span class="input-group-addon"> De </span>
                              <input type="text" readonly id="fecha-inicio-periodo-comodato" name="fecha-inicio-periodo-comodato" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
                              <span class="input-group-addon"> a </span>
                              <input type="text" readonly id="fecha-fin-periodo-comodato" name="fecha-fin-periodo-comodato" class="form-control" placeholder="Selecciona la fecha" data-validacion-tipo="requerido" />
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