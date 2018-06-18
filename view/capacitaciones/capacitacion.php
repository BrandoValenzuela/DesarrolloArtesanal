<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexCapacitaciones">Capacitaciones</a></li>
      <?php if ($_SESSION['busqueda'] == 'CapacitacionPorPeriodo'): ?>
        <li><a href="?c=Capacitacion&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de capacitaciones</a></li>            
      <?php endif ?>
      <li class="active">Capacitación</li>
    </ol>
</div>
<div class="container">
    <h3 class="page-header text-center"><?php echo $capacitacion->nombre;?></h3>
    <div class="col-md-12">
        <div class="col-xs-12">
            <div class="col-xs-6 text-right">
                <label>Fecha de inicio:</label>
            </div>
            <div class="col-xs-6 text-left">
                <label><?php echo $capacitacion->fechaInicio; ?></label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6 text-right">
                <label>Fecha de finalización:</label>
            </div>
            <div class="col-xs-6 text-left">
                <label><?php echo $capacitacion->fechaFin; ?></label>
            </div>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold" >Ubicación</caption>
                <tbody>
                    <tr>
                        <td class="col-md-4 bold">Domicilio del evento</td>
                        <td><?php echo $capacitacion->domicilio; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Entidad</td>
                        <td><?php echo $capacitacion->localidad; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Municipio</td>
                        <td><?php echo $capacitacion->municipio; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Detalles de capacitación</caption>
                <tbody>
                    <tr>
                        <td class="col-md-4 bold">Rama artesanal</td>
                        <td class="respuesta">
                            <?php echo $tema = $rama->nombre == 'Otra' ? $capacitacion->otraArea : $rama->nombre;?>    
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Monto asignado</td>
                        <td><?php echo '$ '.number_format($capacitacion->montoMaterial,2);?></td>
                    </tr>
                    <tr>
                        <td class="bold">Materiales</td>
                        <td><?php echo $capacitacion->material; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td class="col-md-2 bold">Observaciones:</td>
                        <td class="respuesta">
                            <?php echo $tema = $capacitacion->observaciones == '' ? 'NA' : $capacitacion->observaciones;?>    
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 table-responsive">
        <fieldset>
            <legend>Tallerista(s)</legend>
            <?php if (!empty($talleristasA)||!empty($talleristasT)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">CURP</th>
                        <th class="col-md-2">Apellido paterno</th>
                        <th class="col-md-2">Apeliido materno</th>
                        <th class="col-md-3">Nombre(s)</th>
                        <th class="col-md-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($talleristasA as $tallerista): ?>
                        <tr>
                            <td class="text-center"><?php echo $i; $i++; ?></td>
                            <td><?php echo $tallerista->curp; ?></td>
                            <td><?php echo $tallerista->aPaterno; ?></td>
                            <td><?php echo $tallerista->aMaterno; ?></td>
                            <td><?php echo $tallerista->nombre; ?></td>
                            <td>
                                <form action="?c=Artesano&a=BuscarPorCurp" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-artesano-curp" value="<?php echo $tallerista->curp; ?>" />
                                    <div class="text-right">
                                        <button id="btn-submit" class="btn btn-success">Ver información</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>  
                    <?php foreach($talleristasT as $tallerista): ?>
                        <tr>
                            <td class="text-center"><?php echo $i; $i++; ?></td>
                            <td><?php echo $tallerista->curp; ?></td>
                            <td><?php echo $tallerista->aPaterno; ?></td>
                            <td><?php echo $tallerista->aMaterno; ?></td>
                            <td><?php echo $tallerista->nombre; ?></td>
                            <td>
                                <form action="?c=Tallerista&a=BuscarPorCurp" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-tallerista-curp" value="<?php echo $tallerista->curp; ?>" />
                                    <div class="text-right">
                                        <button id="btn-submit" class="btn btn-success">Ver información</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>  
                </tbody>
            </table>
            <?php else: ?>
                <h4 class="text-center">No hay talleristas registrados en esta capacitación.</h4>
            <?php endif ?>                
        </fieldset><br>
    </div>
    <form action="?c=Talleristacapacitacion&a=Crud" method="post" enctype="multipart/form-data">      
        <input type="hidden" name="nombre-capacitacion" value="<?php echo $capacitacion->nombre; ?>" />
        <input type="hidden" name="id-capacitacion" value="<?php echo $capacitacion->idCapacitacion; ?>" />
        <div class="text-right">   
            <button id="btn-submit" class="btn btn-primary">Registrar Tallerista</button>
        </div>
    </form>
    <div class="col-md-12 table-responsive">
        <br>
        <fieldset>
            <legend>Participantes</legend>
            <?php if (!empty($participantes)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">CURP</th>
                        <th class="col-md-2">Apellido paterno</th>
                        <th class="col-md-2">Apeliido materno</th>
                        <th class="col-md-3">Nombre(s)</th>
                        <th class="col-md-3"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($participantes as $participante): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td><?php echo $participante->curp; ?></td>
                        <td><?php echo $participante->aPaterno; ?></td>
                        <td><?php echo $participante->aMaterno; ?></td>
                        <td><?php echo $participante->nombre; ?></td>
                        <td>
                            <form action="?c=Artesano&a=BuscarPorCurp" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php echo $participante->curp; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver información</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h4 class="text-center">No hay participantes registrados en esta capacitación.</h4>
            <?php endif ?>                
        </fieldset><br>
    </div>
    <form action="?c=Participantecapacitacion&a=Crud" method="post" enctype="multipart/form-data">      
        <input type="hidden" name="nombre-capacitacion" value="<?php echo $capacitacion->nombre; ?>" />
        <input type="hidden" name="id-capacitacion" value="<?php echo $capacitacion->idCapacitacion; ?>" />
        <div class="text-right">   
            <button id="btn-submit" class="btn btn-primary">Registrar participante(s)</button>
        </div>
    </form>
</div>
