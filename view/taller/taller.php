<?php $i = $j = 1; ?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
      <?php if ($_SESSION['busqueda'] == 'TallerPorMunicipio' || $_SESSION['busqueda'] == 'TallerPorRamaArtesanal'): ?>
        <li><a href="?c=Taller&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de talleres</a></li>
      <?php endif ?>
      <li class="active">Taller</li>
    </ol>
</div>
<div class="container">
    <h3 class="page-header text-center"><?php echo $taller->nombre;?></h3>
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <caption class="text-center bold" >Dueño del taller</caption>
                <tbody>
                    <tr>
                        <td><h4><?php echo $taller->nombreArt.' '.$taller->aPaterno.' '.$taller->aMaterno;?></td></h4>
                        <td class="text-right">
                            <form action="?c=Artesano&a=BuscarPorCURP" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php echo $taller->curp; ?>" />
                                <div class="">
                                    <button id="btn-submit" class="btn btn-success">Ver información</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold" >Ubicación</caption>
                <tbody>
                    <tr>
                        <td class="bold">Domicilio del taller:</td>
                        <td><?php echo $taller->domicilio; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Localidad:</td>
                        <td><?php echo $taller->localidad; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Municipio:</td>
                        <td><?php echo $taller->municipio; ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-striped table-hover">
                <caption class="text-center bold" >Ingresos/Gastos</caption>
                <tbody>
                    <tr>
                        <td class="bold">Ingresos mensuales:</td>
                         <td><?php echo '$ '.number_format($taller->ingresoMensual,2);?></td>
                    </tr>
                    <tr>
                        <td class="bold">Gastos mensuales:</td>
                        <td><?php echo '$ '.number_format($taller->gastoMensual,2);?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Empleos</caption>
                <tbody>
                    <tr>
                        <td class="col-md-6 bold">Tiempo completo:</td>
                        <td class="text-center"><?php echo $taller->empTiempoCompleto; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Por horas:</td>
                        <td class="text-center"><?php echo $taller->empPorHora; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Registados en el IMSS:</td>
                        <td class="text-center"><?php echo $taller->empIMSS; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Total de empleados:</td>
                        <td class="text-center"> <?php echo $taller->empTotales; ?></td>
                    </tr>
                </tbody>
        </table>
        </div>
    </div> 

    <div class="col-md-12 table-responsive">
        <br>
        <fieldset>
            <legend>Colaboradores</legend>
            <?php if (!empty($colaboradores)): ?>
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
                <?php foreach($colaboradores as $colaborador): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td><?php echo $colaborador->curp; ?></td>
                        <td><?php echo $colaborador->aPaterno; ?></td>
                        <td><?php echo $colaborador->aMaterno; ?></td>
                        <td><?php echo $colaborador->nombre; ?></td>
                        <td>
                            <form action="?c=Artesano&a=BuscarPorCURP" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php echo $colaborador->curp; ?>" />
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
                <h4 class="text-center">Este taller no cuenta con colaboradores registrados.</h4>
            <?php endif ?>
        </fieldset>
    </div>  

    <div class="col-md-12 table-responsive">
        <br>
        <fieldset>
            <legend>Empleados</legend>
            <?php if (!empty($empleados)): ?>
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
                <?php foreach($empleados as $empleado): ?>
                    <tr>
                        <td class="text-center"><?php echo $j; $j++; ?></td>
                        <td><?php echo $empleado->curp;?></td>
                        <td><?php echo $empleado->aPaterno;?></td>
                        <td><?php echo $empleado->aMaterno;?></td>
                        <td><?php echo $empleado->nombre;?></td>
                        <td>
                            <form action="?c=Artesano&a=BuscarPorCURP" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php echo $empleado->curp; ?>" />
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
                <h4 class="text-center">Aún no se indica quienes son los empleados de este taller.</h4>
            <?php endif ?>
        </fieldset>
    </div>  
</div>