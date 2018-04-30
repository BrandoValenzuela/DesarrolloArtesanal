<?php $i = 1;?>
<div class="container">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Exposición</li>
    </ol>
    <h3 class="page-header text-center"><?php echo $expo->nombre;?></h3>
    <div class="col-md-12">
        <div class="col-xs-12">
            <div class="col-xs-6 text-right">
                <label>Fecha de inicio:</label>
            </div>
            <div class="col-xs-6 text-left">
                <label><?php echo $expo->fechaInicio; ?></label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6 text-right">
                <label>Fecha de finalización:</label>
            </div>
            <div class="col-xs-6 text-left">
                <label><?php echo $expo->fechaFin; ?></label>
            </div>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita" >Ubicación</caption>
                <tbody>
                    <tr>
                        <td class="negrita">Domicilio del evento</td>
                        <td><?php echo $expo->domicilio; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Municipio</td>
                        <td><?php echo $expo->municipio; ?></td>
                    </tr>
                    <tr>
                        <td class="negrita">Entidad</td>
                        <td><?php echo $expo->entidad; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita">Apoyo</caption>
            <tbody>
                <tr>
                    <td class="negrita">Tipo de apoyo</td>
                    <td>
                        <?php echo $expo->tipoApoyo;?>    
                    </td>
                </tr>
                <tr>
                    <td class="negrita">Ingreso total</td>
                    <td><?php echo '$ '.number_format($expo->ingresoTotal,2);?></td>
                </tr>
                <tr>
                    <td class="negrita">Monto invertido</td>
                    <td><?php echo '$ '.number_format($expo->montoInvertido,2); ?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
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
                <h4 class="text-center">No hay participantes registrados en esta exposición.</h4>
            <?php endif ?>                
        </fieldset>
    </div>
    <form action="?c=Participanteexpo&a=Crud" method="post" enctype="multipart/form-data">      
        <input type="hidden" name="nombre-exposicion" value="<?php echo $expo->nombre; ?>" />
        <input type="hidden" name="id-exposicion" value="<?php echo $expo->idExposicion; ?>" />
        <div class="text-right">   
            <button id="btn-submit" class="btn btn-primary">Registrar participante</button>
        </div>
    </form>
</div>