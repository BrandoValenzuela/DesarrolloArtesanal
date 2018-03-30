<?php $i=$j=1;?>
<div class="container">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Hoja de datos</li>
    </ol>
    <h1 class="page-header text-center">Folio <?php echo $art->folio; ?></h1>
    <fieldset>
        <legend>Información del artesano</legend>
        <div class="col-md-12 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita">Domicilio del artesano</caption>
                <thead>
                    <tr>
                        <th class="col-md-4">Domicilio</th>
                        <th class="col-md-3">Localidad</th>
                        <th class="col-md-3">Municipio</th>
                        <th class="col-md-2">Grupo étnico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $art->domicilio; ?></td>
                        <td><?php echo $art->localidad == '' ? '---' : $art->localidad; ?></td>
                        <td><?php echo $art->municipio; ?></td>
                        <td><?php echo $art->grupoEtnico == '' ? '---' : $art->grupoEtnico; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita">Información personal</caption>
                <tbody>
                    <tr>
                        <td class="col-md-6 negrita">CURP:</td>
                        <td class="col-md-6"><?php echo $art->curp; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Nombre(s):</td>
                        <td><?php echo $art->nombre; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Apellido Paterno:</td>
                        <td><?php echo $art->aPaterno; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Apellido Materno:</td>
                        <td><?php echo $art->aMaterno; ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-6 negrita">Sexo:</td>
                        <td class="col-md-6"><?php echo $art->sexo == '1' ? 'Femenino' : 'Masculino'; ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-6 negrita">Edad:</td>
                        <td class="col-md-6"><?php echo $art->edad; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita">Datos de Contacto / Redes sociales</caption>
                <tbody>
                    <tr>
                        <td class="negrita">Teléfono fijo:</td>
                        <td><?php echo $art->telefonoFijo == '' ? '---' : $art->telefonoFijo; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Teléfono móvil:</td>
                        <td><?php echo $art->telefonoCel == '' ? '---' : $art->telefonoCel; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Correo:</td>
                        <td><?php echo $art->email == '' ? '---' : $art->email; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Facebook:</td>
                        <td><span class="glyphicon glyphicon-facebook"></span><?php echo $art->facebook == '' ? '---' : $art->facebook; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Twitter:</td>
                        <td><?php echo $art->twitter == '' ? '---' : $art->twitter; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Instagram:</td>
                        <td><?php echo $art->instagram == '' ? '---' : $art->instagram; ?></td>
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
                        <td class="col-md-6 negrita" >Rama artesanal:</td>
                        <td class="col-md-6"><?php echo $ram_art->nombre; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Tipo de actividad:</td>
                        <td><?php echo $act = $art->tipoActividad == '1' ? 'Primaria' : 'Secundaria'; ?></td>
                    </tr>
                    <?php if ($art->tipoActividad == '2'): ?>
                        <tr>
                            <td class="negrita">Actividad Primaria:</td>
                            <td><?php echo $art->actividadPrincipal; ?></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td class="negrita">Año en que inició en el oficio:</td>
                        <td><?php echo $art->anioInicioOficio; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Perioricidad:</td>
                        <td><?php echo $act = $art->perioricidad == '1' ? 'Temporal' : 'Permanente'; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Aprendizaje del oficio:</td>
                        <td>
                            <?php 
                            if($art->aprendizajeOficio == '1'){
                                echo 'Autodidacta';
                            }elseif ($art->aprendizajeOficio == '2') {
                                echo 'Cursos';
                            }elseif ($art->aprendizajeOficio == '3') {
                                echo 'Talleres';
                            }else{
                                echo 'Herencia familiar'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="negrita">Fidelidad hacia la rama artesanal:</td>
                        <td>
                            <?php 
                            if($art->fidelidadRamaArtesanal == '1'){
                                echo 'Muy baja';
                            }elseif ($art->fidelidadRamaArtesanal == '2') {
                                echo 'Baja';
                            }elseif ($art->fidelidadRamaArtesanal == '3') {
                                echo 'Normal';
                            }elseif ($art->fidelidadRamaArtesanal == '4') {
                                echo 'Alta';
                            }else{
                                echo 'Muy alta'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="negrita">Satisfacción con la rama artesanal:</td>
                        <td>
                            <?php 
                            if($art->satisfaccion == '1'){
                                echo 'Muy baja';
                            }elseif ($art->satisfaccion == '2') {
                                echo 'Baja';
                            }elseif ($art->satisfaccion == '3') {
                                echo 'Normal';
                            }elseif ($art->satisfaccion == '4') {
                                echo 'Alta';
                            }else{
                                echo 'Muy alta'; 
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td class="negrita">Ingreso mensual:</td>
                        <td><?php echo '$ '.number_format($art->ingresoMensual,2); ?>    </td>
                    </tr>
                    <tr>
                        <td class="negrita">Gasto mensual:</td>
                        <td><?php echo '$ '.number_format($art->gastoMensual,2); ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Trabaja en taller:</td>
                        <td><?php echo $act = $art->perteneceTaller == '1' ? 'No' : 'Si'; ?></td>
                    </tr>
                    <?php if ($art->perteneceTaller == '1'): ?>
                        <tr>
                        <td class="negrita">Trabaja en su domicilio:</td>
                        <td><?php echo $lugar = $art->trabajoDomicilio == '1' ? 'No' : 'Si'; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">El lugar donde trabaja es:</td>
                        <td>
                            <?php 
                            if($art->propiedadLugarTrabajo == '1'){
                                echo 'Propio';
                            }elseif ($art->propiedadLugarTrabajo == '2') {
                                echo 'Prestado';
                            }else{
                                echo 'Rentado'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="negrita">Tipo de venta:</td>
                        <td>
                            <?php 
                            if($art->tipoVenta == '1'){
                                echo 'Consumidor final';
                            }elseif ($art->tipoVenta == '2') {
                                echo 'Comercializadores';
                            }elseif ($art->tipoVenta == '3') {
                                echo 'Casa de artesanías';
                            }else{
                                echo 'Paisanos (USA)'; 
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endif ?>
                    <tr>
                        <td class="negrita">Necesidades:</td>
                        <td><?php echo $art->necesidadesPrioritarias; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
    <fieldset>
        <legend>Información sobre afiliación y asociaciones</legend>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita">Afiliaciones</caption>
                <tbody>
                    <tr>
                        <td class="col-md-6 negrita">Año de registro en la subsecretaría:</td>
                        <td class="col-md-6 text-center"><?php echo $art->anioInicioSDA; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">CUIS (SEDESOL):</td>
                        <td class="text-center"><?php echo $cuis = $art->quiz == '' ? '---' : $art->quiz; ?></td>
                    </tr>                           
                    <tr>
                        <td class="negrita">RFC:</td>
                        <td class="text-center"><?php echo $rfc = $art->rfc == '' ? '---' : $art->fechaAltaRFC; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Fecha de la alta del RFC:</td>
                        <td class="text-center"><?php echo $fecha = $art->fechaAltaRFC == '0000-00-00' ? '---' : $art->fechaAltaRFC; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita">Asociaciones</caption>
                <tbody>
                    <tr>
                        <td class="negrita col-md-6">Partcicipación en el pasaso en asociasiones:</td>
                        <td class="col-md-6 text-center"><?php echo $part = $art->participacionAsocPasada == '1' ? 'No' : 'Si'; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Participación actual en asociación:</td>
                        <td class="text-center"><?php echo $part = $art->participacionAsocActual == '1' ? 'No' : 'Si'; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Nombre de la asociación donde milita actualmente:</td>
                        <td class="text-center"><?php echo $nomb = $art->nombreAsocActual == '' ? '---' : $art->nombreAsocActual; ?></td>
                    </tr>                               
                </tbody>
            </table>
        </div>
        <form action="?c=Artesano&a=Crud" method="post" enctype="multipart/form-data">      
            <input type="hidden" name="operacion" value="1" />
            <input type="hidden" name="CURP" value="<?php echo $art->curp;?>" />
            <div class="text-right">   
                <button id="btn-submit" class="btn btn-primary">Actualizar datos generales</button>
            </div>
        </form>
    </fieldset>
    <fieldset>
        <legend>Talleres donde labora</legend>
        <div class="col-md-10 col-md-offset-1">
            <?php if (!empty($tal)): ?>
        <?php foreach ($tal as $ta): ?>
            <div class="col-md-12 text-center">
                <h4>
                    <?php 
                        $rama_artesanal = $Rama->Obtener($ta->idRamaArtesanal);
                        $participacion = $ta->tipoParticipacion == '1' ? 'Dueño del taller' : 'Colaborador' ;
                        echo $ta->nombre.' - '.'Taller de '.$rama_artesanal->nombre.' - ('.$participacion.')'; 
                    ?>
                </h4>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-hover">
                    <caption class="negrita text-center">Ubicación del taller</caption>
                    <tbody>
                        <tr>
                            <td class="negrita col-md-6">Domicilio:</td>
                            <td class="col-md-6"><?php echo $ta->domicilio; ?></td>
                            
                        </tr>
                        <tr>
                            <td class="negrita">Localidad:</td>
                            <td><?php echo $ta->localidad; ?></td>
                        </tr>
                        <tr>
                            <td class="negrita">Municipio</td>
                            <td><?php echo $ta->municipio; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 table-responsive">
                <table class="table table-striped table-hover">
                    <caption class="negrita text-center">Empleos</caption>
                    <tbody>
                        <tr>
                            <td class="col-md-6 negrita">A tiempo completo</td>
                            <td class="col-md-6 text-center"><?php echo $ta->empTiempoCompleto; ?></td>
                            
                        </tr>
                        <tr>
                            <td class="negrita">Por horas</td>
                            <td class="text-center"><?php echo $ta->empPorHora; ?></td>
                        </tr>
                        <tr>
                            <td class="negrita">Afiliados al IMSS</td>
                            <td class="text-center"><?php echo $ta->empIMSS; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
        <?php endforeach ?>
        <?php else: ?>
            <h4 class="text-center">No se ha agregado información sobre el taller donde labora el artesano.</h4>
            <br>
        <?php endif ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Participación en Exposiciones</legend>
        <div class="col-md-10 col-md-offset-1">
            <?php if (!empty($participantes_expo)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4 text-center">Nombre de la exposición</th>
                        <th class="col-md-2 text-center">Municpio</th>
                        <th class="col-md-2 text-center">Entidad</th>
                        <th class="col-md-2 text-center">Apoyo</th>
                        <th class="col-md-2 text-center">Ingresos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($participantes_expo as $participate_expo): ?>
                        <tr>
                            <td class="text-center negrita"><?php echo $i; $i++; ?></td>
                            <td><?php echo $participate_expo->nombre; ?></td>
                            <td class="text-center"><?php echo $participate_expo->municipio; ?></td>
                            <td class="text-center"><?php echo $participate_expo->entidad; ?></td>                
                            <td class="text-center"><?php echo '$ '.number_format($participate_expo->montoAsignado,2); ?></td>
                            <td class="text-center"><?php echo '$ '.number_format($participate_expo->ingresoObtenido,2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <?php else: ?>
                <h4 class="text-center">No ha participado en exposiciones.</h4>
            <?php endif ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Participación en Concursos</legend>
        <div class="col-md-10 col-md-offset-1">
            <?php if (!empty($participantes_concurso)): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-4 text-center">Nombre de la exposición</th>
                        <th class="col-md-2 text-center">Municpio</th>
                        <th class="col-md-2 text-center">Entidad</th>
                        <th class="col-md-2 text-center">Lugar</th>
                        <th class="col-md-2 text-center">Ingresos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($participantes_concurso as $participate_concurso): ?>
                        <tr>
                            <td class="text-center negrita"><?php echo $j; $j++; ?></td>
                            <td><?php echo $participate_concurso->nombre; ?></td>
                            <td class="text-center"><?php echo $participate_concurso->municipio; ?></td>
                            <td class="text-center"><?php echo $participate_concurso->entidad; ?></td>                
                            <td class="text-center">
                                <?php
                                    if ($participate_concurso->posicion == '1') {
                                        echo 'Participante';
                                    }elseif ($participate_concurso->posicion == '2') {
                                        echo 'Mención honorífica';
                                    }elseif ($participate_concurso->posicion == '3') {
                                        echo '3ro';
                                    }elseif ($participate_concurso->posicion == '4') {
                                        echo '2do';
                                    }else{
                                        echo '1ro';
                                    }
                                ?>    
                            </td>
                            <td class="text-center"><?php echo '$ '.number_format($participate_concurso->montoGanado,2); ?></td>
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
</div>