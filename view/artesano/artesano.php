<?php $i=1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
      <?php if ($_SESSION['busqueda'] == 'ArtesanoPorApellido' || $_SESSION['busqueda'] == 'ArtesanoPorRama' || $_SESSION['busqueda'] == 'ArtesanoPorProducto' || $_SESSION['busqueda'] == 'ArtesanoPorCorredor'): ?>
        <li><a href="?c=Artesano&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de artesanos</a></li>          
      <?php endif ?>
      <li class="active">Hoja de datos</li>
    </ol>
</div>
<div class="container">
    <h1 class="page-header text-center">Folio <?php echo $artesano->folio; ?></h1>
    <fieldset>
        <legend>Información del artesano</legend>
        <div class="col-md-12 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Domicilio del artesano</caption>
                <thead>
                    <tr>
                        <th class="col-md-4 text-center">Domicilio</th>
                        <th class="col-md-3 text-center">Localidad</th>
                        <th class="col-md-3 text-center">Municipio</th>
                        <th class="col-md-2 text-center">Grupo étnico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><?php echo $artesano->domicilio; ?></td>
                        <td class="text-center"><?php echo $artesano->localidad == '' ? 'NA' : $artesano->localidad; ?></td>
                        <td class="text-center"><?php echo $artesano->municipio; ?></td>
                        <td class="text-center"><?php echo $artesano->grupoEtnico == '' ? 'NA' : $artesano->grupoEtnico; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Información personal</caption>
                <tbody>
                    <tr>
                        <td class="col-md-6 bold">CURP:</td>
                        <td class="col-md-6"><?php echo $artesano->curp; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Nombre(s):</td>
                        <td><?php echo $artesano->nombre; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Apellido Paterno:</td>
                        <td><?php echo $artesano->aPaterno; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Apellido Materno:</td>
                        <td><?php echo $artesano->aMaterno; ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-6 bold">Sexo:</td>
                        <td class="col-md-6 respuesta"><?php echo $artesano->sexo == '1' ? 'Femenino' : 'Masculino'; ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-6 bold">Edad:</td>
                        <td class="col-md-6"><?php echo $artesano->edad; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Datos de Contacto / Redes sociales</caption>
                <tbody>
                    <tr>
                        <td class="bold">Teléfono fijo:</td>
                        <td><?php echo $artesano->telefonoFijo == '' ? 'NA' : $artesano->telefonoFijo; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Teléfono móvil:</td>
                        <td><?php echo $artesano->telefonoCel == '' ? 'NA' : $artesano->telefonoCel; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Correo:</td>
                        <td><?php echo $artesano->email == '' ? 'NA' : $artesano->email; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Facebook:</td>
                        <td><span class="glyphicon glyphicon-facebook"></span><?php echo $artesano->facebook == '' ? 'NA' : $artesano->facebook; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Twitter:</td>
                        <td><?php echo $artesano->twitter == '' ? 'NA' : $artesano->twitter; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Instagram:</td>
                        <td><?php echo $artesano->instagram == '' ? 'NA' : $artesano->instagram; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
    <fieldset>
        <legend>Información de la actividad artesanal</legend>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td class="col-md-6 bold" >Corredor artesanal:</td>
                        <td class="col-md-6 respuesta"><?php echo $corredor->nombre; ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-6 bold" >Rama artesanal:</td>
                        <td class="col-md-6 respuesta"><?php echo $ram_art->nombre; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Tipo de actividad:</td>
                        <td><?php echo $act = $artesano->tipoActividad == '1' ? 'PRIMARIA' : 'SECUNDARIA'; ?></td>
                    </tr>

                    <?php if ($artesano->tipoActividad == '2'): ?>
                        <tr>
                            <td class="bold">Actividad Primaria:</td>
                            <td><?php echo $artesano->actividadPrincipal; ?></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td class="bold">Año en que inició en el oficio:</td>
                        <td><?php echo $artesano->anioInicioOficio; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Perioricidad:</td>
                        <td><?php echo $act = $artesano->perioricidad == '1' ? 'TEMPORAL' : 'PERMANENTE'; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Aprendizaje del oficio:</td>
                        <td>
                            <?php 
                            if($artesano->aprendizajeOficio == '1'){
                                echo 'AUTODIDACTA';
                            }elseif ($artesano->aprendizajeOficio == '2') {
                                echo 'CURSOS';
                            }elseif ($artesano->aprendizajeOficio == '3') {
                                echo 'TALLERES';
                            }else{
                                echo 'HERENCIA FAMILIAR'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Fidelidad hacia la rama artesanal:</td>
                        <td>
                            <?php 
                            if($artesano->fidelidadRamaArtesanal == '1'){
                                echo 'MUY BAJA';
                            }elseif ($artesano->fidelidadRamaArtesanal == '2') {
                                echo 'BAJA';
                            }elseif ($artesano->fidelidadRamaArtesanal == '3') {
                                echo 'NORMAL';
                            }elseif ($artesano->fidelidadRamaArtesanal == '4') {
                                echo 'ALTA';
                            }else{
                                echo 'MUY ALTA'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Satisfacción con la rama artesanal:</td>
                        <td>
                            <?php 
                            if($artesano->satisfaccion == '1'){
                                echo 'MUY BAJA';
                            }elseif ($artesano->satisfaccion == '2') {
                                echo 'BAJA';
                            }elseif ($artesano->satisfaccion == '3') {
                                echo 'NORMAL';
                            }elseif ($artesano->satisfaccion == '4') {
                                echo 'ALTA';
                            }else{
                                echo 'MUY ALTA'; 
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td class="bold">Ingreso mensual:</td>
                        <td><?php echo '$ '.number_format($artesano->ingresoMensual,2); ?>    </td>
                    </tr>
                    <tr>
                        <td class="bold">Gasto mensual:</td>
                        <td><?php echo '$ '.number_format($artesano->gastoMensual,2); ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Trabaja en taller:</td>
                        <td><?php echo $act = $artesano->perteneceTaller == '1' ? 'NO' : 'SI'; ?></td>
                    </tr>
                    <?php if ($artesano->perteneceTaller == '1'): ?>
                        <tr>
                        <td class="bold">Trabaja en su domicilio:</td>
                        <td><?php echo $lugar = $artesano->trabajoDomicilio == '1' ? 'NO' : 'SI'; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">El lugar donde trabaja es:</td>
                        <td>
                            <?php 
                            if($artesano->propiedadLugarTrabajo == '1'){
                                echo 'PROPIO';
                            }elseif ($artesano->propiedadLugarTrabajo == '2') {
                                echo 'PRESTADO';
                            }else{
                                echo 'RENTADO'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Tipo de venta:</td>
                        <td>
                            <?php 
                            if($artesano->tipoVenta == '1'){
                                echo 'CONSUMIDOR FINAL';
                            }elseif ($artesano->tipoVenta == '2') {
                                echo 'COMERCIALIZADORES';
                            }elseif ($artesano->tipoVenta == '3') {
                                echo 'CASA DE ARTESANÍAS';
                            }else{
                                echo 'PAISANOS (USA)'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endif ?>
                    <tr>
                        <td class="bold">Necesidades:</td>
                        <td class="respuesta"><?php echo $artesano->necesidadesPrioritarias; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
    <fieldset>
        <legend>Información sobre afiliación y asociaciones</legend>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Afiliaciones</caption>
                <tbody>
                    <tr>
                        <td class="col-md-6 bold">Año de registro en la subsecretaría:</td>
                        <td class="col-md-6 text-center"><?php echo $artesano->anioInicioSDA; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">CUIS (SEDESOL):</td>
                        <td class="text-center"><?php echo $cuis = $artesano->quiz == '' ? 'NA' : $artesano->quiz; ?></td>
                    </tr>                           
                    <tr>
                        <td class="bold">RFC:</td>
                        <td class="text-center"><?php echo $rfc = $artesano->rfc == '' ? 'NA' : $artesano->fechaAltaRFC; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Fecha de la alta del RFC:</td>
                        <td class="text-center"><?php echo $fecha = $artesano->fechaAltaRFC == '0000-00-00' ? 'NA' : $artesano->fechaAltaRFC; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Asociaciones</caption>
                <tbody>
                    <tr>
                        <td class="bold col-md-6">Partcicipación en el pasaso en asociasiones:</td>
                        <td class="col-md-6 text-center"><?php echo $part = $artesano->participacionAsocPasada == '1' ? 'NO' : 'SI'; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Participación actual en asociación:</td>
                        <td class="text-center"><?php echo $part = $artesano->participacionAsocActual == '1' ? 'NO' : 'SI'; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Nombre de la asociación donde milita actualmente:</td>
                        <td class="text-center respuesta"><?php echo $nomb = $artesano->nombreAsocActual == '' ? '' : $artesano->nombreAsocActual; ?></td>
                    </tr>                               
                </tbody>
            </table>
        </div>
        <form action="?c=Artesano&a=Crud" method="post" enctype="multipart/form-data">      
            <input type="hidden" name="registrar-actualizar" value="1" />
            <input type="hidden" name="curp-artesano-actualizar" value="<?php echo $artesano->curp;?>" />
            <div class="text-right">   
                <button id="btn-submit" class="btn btn-primary">Actualizar datos generales</button>
            </div>
        </form>
    </fieldset>
    <fieldset>
        <legend>Productos</legend>
            <div class="col-md-10 col-md-offset-1">
             <?php if (!empty($productos)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4">Tipo de productos</th>
                        <th class="col-md-8">Productos confeccionados</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($productos as $producto): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td class="respuesta"><?php echo $producto->nombre; ?></td>
                        <td class="respuesta"><?php echo $producto->detalleProducto; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <h4 class="text-center">Aún no se ha agregado información sobre los productos que manufactura el artesano.</h4>
            <br>
            <?php endif ?>
        </div>
        <form action="?c=Productoartesano&a=Crud" method="post" enctype="multipart/form-data">
            <input type="hidden" name="curp-artesano" value="<?php echo $artesano->curp; ?>" />
            <div class="text-right">
                <button id="btn-submit-agregar-producto" class="btn btn-primary">Agregar producto</button>
            </div>
        </form>
    </fieldset>
    <fieldset>
        <legend>Talleres donde labora</legend>
        <div class="col-md-12 table-responsive">
            <h4 class="text-center bold">Talleres propios</h4>
            <?php if (!empty($datos_taller)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">Nombre del taller</th>
                        <th class="col-md-3">Domicilio</th>
                        <th class="col-md-2">Localidad</th>
                        <th class="col-md-2">Municipio</th>
                        <th class="col-md-2"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($datos_taller as $dato_taller): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td><?php echo $dato_taller->nombre; ?></td>
                        <td><?php echo $dato_taller->domicilio; ?></td>
                        <td><?php echo $dato_taller->localidad; ?></td>
                        <td><?php echo $dato_taller->municipio; ?></td>
                        <td>
                            <form action="?c=Taller&a=Buscar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-id-taller" value="<?php echo $dato_taller->idTaller; ?>" />
                                <input type="hidden" name="buscar-nombre-taller" value="<?php echo $dato_taller->nombre; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <h4 class="text-center">Este artesano no es dueño de ninguno de los talleres registrados.</h4>
            <br>
            <?php endif ?>
        </div>
        <div class="col-md-12 table-responsive">
            <h4 class="text-center bold">Talleres donde colabora</h4>
            <?php if (!empty($datos_colaborador)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">Nombre del taller</th>
                        <th class="col-md-3">Domicilio</th>
                        <th class="col-md-2">Localidad</th>
                        <th class="col-md-2">Municipio</th>
                        <th class="col-md-2"></th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($datos_colaborador as $dato_colaborador): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td><?php echo $dato_colaborador->nombre; ?></td>
                        <td><?php echo $dato_colaborador->domicilio; ?></td>
                        <td><?php echo $dato_colaborador->localidad; ?></td>
                        <td><?php echo $dato_colaborador->municipio; ?></td>
                        <td>
                            <form action="?c=Taller&a=Buscar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-id-taller" value="<?php echo $dato_colaborador->idTaller; ?>" />
                                <input type="hidden" name="buscar-nombre-taller" value="<?php echo $dato_colaborador->nombre; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <h4 class="text-center">Este artesano no es colaborador de ninguno de los talleres registrados.</h4>
            <br>
            <?php endif ?>
        </div>
        <div class="col-md-12 table-responsive">
            <h4 class="text-center bold">Talleres donde trabaja</h4>
            <?php if (!empty($datos_empleado)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">Nombre del taller</th>
                        <th class="col-md-3">Domicilio</th>
                        <th class="col-md-2">Localidad</th>
                        <th class="col-md-2">Municipio</th>
                        <th class="col-md-2"></th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($datos_empleado as $dato_empleado): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td><?php echo $dato_empleado->nombre; ?></td>
                        <td><?php echo $dato_empleado->domicilio; ?></td>
                        <td><?php echo $dato_empleado->localidad; ?></td>
                        <td><?php echo $dato_empleado->municipio; ?></td>
                        <td>
                            <form action="?c=Taller&a=Buscar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-id-taller" value="<?php echo $dato_empleado->idTaller; ?>" />
                                <input type="hidden" name="buscar-nombre-taller" value="<?php echo $dato_empleado->nombre; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <h4 class="text-center">Este artesano no es colaborador de ninguno de los talleres registrados.</h4>
            <br>
            <?php endif ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Participación en concursos</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($participaciones_concurso)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4">Nombre del concurso</th>
                        <th class="col-md-2 text-center">Lugar</th>
                        <th class="col-md-2 text-center">Premio</th>
                        <th class="col-md-2 text-center">Pieza participante</th>
                        <th class="col-md-2 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($participaciones_concurso as $participacion_concurso): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td><?php echo $participacion_concurso->nombre; ?></td>
                            <td class="text-center">
                                <?php
                                    if ($participacion_concurso->posicion == '1') {
                                        echo 'PARTICIPANTE';
                                    }elseif ($participacion_concurso->posicion == '2') {
                                        echo 'GALARDON';
                                    }elseif ($participacion_concurso->posicion == '3') {
                                        echo 'MENCIÓN HONORÍFICA';
                                    }elseif ($participacion_concurso->posicion == '4') {
                                        echo '3er';
                                    }elseif ($participacion_concurso->posicion == '5') {
                                        echo '2do';
                                    }else{
                                        echo '1er';
                                    }
                                ?>    
                            </td>
                            <td class="text-center"><?php echo '$ '.number_format($participacion_concurso->montoGanado,2); ?></td>
                            <td class="text-center"><?php echo $participacion_concurso->piezaParticipante; ?></td>
                            <td>
                                <form action="?c=Concurso&a=BuscarPorId" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-id-concurso" value="<?php echo $participacion_concurso->idConcurso; ?>" />
                                    <input type="hidden" name="buscar-nombre-concurso" value="<?php echo $participacion_concurso->nombre; ?>" />
                                    <div class="text-right">
                                        <button id="btn-submit" class="btn btn-success">Ver concurso</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No ha participado en concursos.</h4>
                <br>
            <?php endif ?>
        </div>
    </fieldset>
        <fieldset>
        <legend>Participación en exposiciones</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($participaciones_expo)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4 ">Nombre de la exposición</th>
                        <th class="col-md-2 text-center">Apoyo al artesano:</th>
                        <th class="col-md-2 text-center">Ingresos del artesano</th>
                        <th class="col-md-4 text-center"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($participaciones_expo as $participacion_expo): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td><?php echo $participacion_expo->nombre; ?></td>
                            <td class="text-center"><?php echo '$ '.number_format($participacion_expo->montoAsignado,2); ?></td>
                            <td class="text-center"><?php echo '$ '.number_format($participacion_expo->ingresoObtenido,2); ?></td>
                            <td>
                                <form action="?c=Exposicion&a=BuscarPorId" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-id-expo" value="<?php echo $participacion_expo->idExposicion; ?>" />
                                    <input type="hidden" name="buscar-nombre-expo" value="<?php echo $participacion_expo->nombre; ?>" />
                                    <div class="text-right">
                                        <button id="btn-submit" class="btn btn-success">Ver exposición</button>
                                    </div>
                                </form> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No ha participado en exposiciones.</h4>
                <br>
            <?php endif ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Participación en capacitaciones</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($participaciones_capacitacion)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4">Nombre de la capacitación</th>
                        <th class="col-md-2 text-center">Fecha de inicio</th>
                        <th class="col-md-2 text-center">Fecha de fin</th>
                        <th class="col-md-4 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($participaciones_capacitacion as $participacion_capacitacion): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td><?php echo $participacion_capacitacion->nombre; ?></td>
                            <td class="text-center"><?php echo $participacion_capacitacion->fechaInicio; ?></td>
                            <td class="text-center"><?php echo $participacion_capacitacion->fechaFin; ?></td>
                            <td>
                                <form action="?c=Capacitacion&a=BuscarPorId" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-id-capacitacion" value="<?php echo $participacion_capacitacion->idCapacitacion; ?>" />
                                    <input type="hidden" name="buscar-nombre-capacitacion" value="<?php echo $participacion_capacitacion->nombre; ?>" />
                                    <div class="text-right">
                                        <button id="btn-submit" class="btn btn-success">Ver capacitación</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No ha participado en capacitaciones.</h4>
                <br>
            <?php endif ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Capacitaciones impartidas</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($capacitaciones_impartidas)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4 ">Nombre de la capacitacion</th>
                        <th class="col-md-2 text-center">Fecha de inicio:</th>
                        <th class="col-md-2 text-center">Fecha de fin:</th>
                        <th class="col-md-1 text-center">Pago</th>
                        <th class="col-md-2 text-center">Forma de pago:</th>
                        <th class="col-md-1 text-center"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($capacitaciones_impartidas as $capacitacion_impartida): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td><?php echo $capacitacion_impartida->nombre; ?></td>
                            <td class="text-center"><?php echo $capacitacion_impartida->fechaInicio; ?></td>
                            <td class="text-center"><?php echo $capacitacion_impartida->fechaFin; ?></td>
                            <td class="text-center"><?php echo '$ '.number_format($capacitacion_impartida->pagoTallerista,2); ?></td>
                            <td class="text-center"><?php echo $forma = $capacitacion_impartida->formaPago == '1' ? 'Apoyo' : 'Factura'; ?></td>
                            <td>
                                <form action="?c=Capacitacion&a=BuscarPorId" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-id-capacitacion" value="<?php echo $capacitacion_impartida->idCapacitacion; ?>" />
                                    <input type="hidden" name="buscar-nombre-capacitacion" value="<?php echo $capacitacion_impartida->nombre; ?>" />
                                    <div class="text-right">
                                        <button id="btn-submit" class="btn btn-success">Ver capacitacion</button>
                                    </div>
                                </form> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No ha impartido ninguna capacitación.</h4>
                <br>
            <?php endif ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Apoyos recibidos</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($apoyos)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4">Nombre del apoyo</th>
                        <th class="col-md-2 text-center">Monto otorgado</th>
                        <th class="col-md-2 text-center">Fecha de otorgamiento</th>
                        <th class="col-md-4 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($apoyos as $apoyo): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td><?php echo $apoyo->nombre; ?></td>
                            <td class="text-center"><?php echo '$ '.number_format($apoyo->monto,2); ?></td>
                            <td class="text-center"><?php echo $apoyo->fechaOtorgamiento; ?></td>
                            <td>
                                <form action="?c=Apoyo&a=BuscarPorId" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-id-apoyo" value="<?php echo $apoyo->idApoyo; ?>" />
                                    <input type="hidden" name="buscar-nombre-apoyo" value="<?php echo $apoyo->nombre; ?>" />
                                    <div class="text-right">
                                        <button id="btn-submit" class="btn btn-success">Ver apoyo</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No ha recibido apoyos.</h4>
                <br>
            <?php endif ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Compras</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($compras)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3 text-center">Monto de la compra</th>
                        <th class="col-md-3 text-center">Alcance</th>
                        <th class="col-md-3 text-center">Tipo de pago</th>
                        <th class="col-md-3 text-center">Fecha de compra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($compras as $compra): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td class="text-center"><?php echo '$ '.number_format($compra->monto,2); ?></td>
                            <td class="text-center"><?php echo $alcance = $compra->alcance == 1 ? 'ESTATAL' : 'FEDERAL'; ?></td>
                            <td class="text-center"><?php echo $pago = $compra->tipoPago == 1 ? 'FACTURA' : 'APOYO'; ?></td>
                            <td class="text-center"><?php echo $compra->fechaCompra; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No se le han realizado compras a este artesano.</h4>
                <br>
            <?php endif ?>
        </div>
    </fieldset>
        <fieldset>
        <legend>Comodatos</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($comodatos)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3 text-center">Folio</th>
                        <th class="col-md-3 text-center">Fecha de otorgamiento</th>
                        <th class="col-md-6 text-center">Bienes comodatados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($comodatos as $comodato): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td class="text-center"><?php echo $comodato->folio; ?></td>
                            <td class="text-center"><?php echo $comodato->fechaInicio; ?></td>
                            <td class="text-center respuesta"><?php echo $comodato->bienesComodatados; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No se le han otorgado comodatos a este artesano.</h4>
                <br>
            <?php endif ?>
        </div>
    </fieldset>
</div>
