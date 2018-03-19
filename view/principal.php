<div class="container-fluid">
   <div class="col-md-2 hidden-xs hidden-sm">
      <h3 class="text-center">Registrar</h3>
      <div class="list-group">
         <a href="?c=Artesano&a=Crud" class="list-group-item">Artesano</a>
         <!-- <a href="?c=Taller&a=Crud" class="list-group-item">Taller de artesano</a>
         <a href="?c=Exposicion&a=Crud" class="list-group-item">Exposición</a>
         <a href="?c=concurso&a=Crud" class="list-group-item">Concurso</a> -->
         <!-- <a href="#" class="list-group-item">Comodato</a> -->
         <!-- <a href="#" class="list-group-item">Capacitación</a> -->
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
                     <form id="frm-busqueda-artesano-curp" action="?c=Artesano&a=Buscar" method="post" enctype="multipart/   form-data">
                        <div class="form-group">
                           <label>Por CURP:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ingresa la CURP" id="buscar-artesano" name="buscar-artesano-curp" data-validacion-tipo="requerido|curp">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- <div class="col-md-6">
                     <form id="frm-busqueda-artesano-ap" action="?c=Artesano&a=BuscarPorApellido" method="post" enctype="multipart/   form-data">
                        <div class="form-group">
                           <label>Por apellido paterno:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ingresa el apellido paterno" id="buscar-artesano" name="buscar-artesano-ap" data-validacion-tipo="requerido">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div> -->
               </div>
            </div>
         </div>
<!--          <div class="panel panel-default">
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
                                    // }
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
                     <form id="frm-busqueda-expo-mun" action="?c=Exposicion&a=BuscarPorMunEnt" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Por municipio o entidad:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ejemplo: Zacatecas" id="buscar-expo-mun-ent" name="buscar-expo-munent" data-validacion-tipo="requerido">
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
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-concurso"><h4>Buscar concurso</h4></a>
               </h4>
            </div>
            <div id="collapse-concurso" class="panel-collapse collapse">
               <div class="panel-body">
                  <div class="col-md-6">
                     <form id="frm-busqueda-concurso-nument" action="?c=concurso&a=BuscarPorMunEnt" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Por municipio o entidad:</label>
                           <div class="input-group">
                              <input type="text" class="form-control " placeholder="Ejemplo: Zacatecas" id="buscar-concurso-mun-ent" name="buscar-concurso-munent" data-validacion-tipo="requerido">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>  -->
      </div>
   </div>
</div>
<script>
    $(document).ready(function(){
      $("#frm-busqueda-artesano-curp").submit(function(){
        return $(this).validate();
      });
   });

   //  $(document).ready(function(){
   //      $("#frm-busqueda-artesano-ap").submit(function(){
   //          return $(this).validate();
   //      });
   //  });

   // $(document).ready(function(){
   //      $("#frm-busqueda-taller-municipio").submit(function(){
   //          return $(this).validate();
   //      });
   //  });

   // $(document).ready(function(){
   //      $("#frm-busqueda-expo-mun").submit(function(){
   //          return $(this).validate();
   //      });
   //  });

   // $(document).ready(function(){
   //      $("#frm-busqueda-concurso-nument").submit(function(){
   //          return $(this).validate();
   //      });
   //  });
</script>