<?php $i=1;?>
<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Capacitacion&a=Index">Capacitaciones</a></li>
    <li class="active">Tallerista</li>
  </ol>
</div>
<div class="container">
    <h1 class="page-header text-center">Información de tallerista</h1>
    <fieldset>
        <div class="col-md-12 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Domicilio del tallerista</caption>
                <thead>
                    <tr>
                        <th class="col-md-4 text-center">Domicilio</th>
                        <th class="col-md-4 text-center">Localidad</th>
                        <th class="col-md-4 text-center">Municipio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><?php echo $tallerista->domicilio; ?></td>
                        <td class="text-center"><?php echo $tallerista->localidad == '' ? '---' : $tallerista->localidad; ?></td>
                        <td class="text-center"><?php echo $tallerista->municipio; ?></td>
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
                        <td class="col-md-6"><?php echo $tallerista->curp; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Nombre(s):</td>
                        <td><?php echo $tallerista->nombre; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Apellido Paterno:</td>
                        <td><?php echo $tallerista->aPaterno; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Apellido Materno:</td>
                        <td><?php echo $tallerista->aMaterno; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Datos de Contacto</caption>
                <tbody>
                    <tr>
                        <td class="bold">Especialidad:</td>
                        <td><?php echo $tallerista->especialidad == '' ? '---' : $tallerista->especialidad; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Teléfono:</td>
                        <td><?php echo $tallerista->telefono == '' ? '---' : $tallerista->telefono; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Correo:</td>
                        <td><?php echo $tallerista->email == '' ? '---' : $tallerista->email; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
    <fieldset>
        <legend>Capacitaciones impartidas</legend>
        <div class="col-md-12 table-responsive">
            <?php if (!empty($capacitaciones)): ?>
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
                    <?php $i=1; foreach($capacitaciones as $capacitacion): ?>
                        <tr>
                            <td class="text-center bold"><?php echo $i; $i++; ?></td>
                            <td><?php echo $capacitacion->nombre; ?></td>
                            <td class="text-center"><?php echo $capacitacion->fechaInicio; ?></td>
                            <td class="text-center"><?php echo $capacitacion->fechaFin; ?></td>
                            <td class="text-center"><?php echo '$ '.number_format($capacitacion->pagoTallerista,2); ?></td>
                            <td class="text-center"><?php echo $forma = $capacitacion->formaPago == '1' ? 'Apoyo' : 'Factura'; ?></td>
                            <td>
                                <form action="?c=Capacitacion&a=BuscarPorId" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="buscar-id-capacitacion" value="<?php echo $capacitacion->idCapacitacion; ?>" />
                                    <input type="hidden" name="buscar-nombre-capacitacion" value="<?php echo $capacitacion->nombre; ?>" />
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
</div>