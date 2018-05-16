<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li><a href="?c=Principal&a=indexCapacitaciones">Capacitaciones</a></li>
        <li class="active">Lista de capacitaciones</li>
    </ol>
</div>
<div class="container">
    <!-- <?php #if (isset($municipio)): ?> -->
        <!-- <h1 class="page-header text-center">capacitaciones en: <?php #echo $municipio;?></h1> -->
    <!-- <?php #else: ?> -->
        <h1 class="page-header text-center">Capacitaciones en el periodo: <?php echo $fecha_inicio.' a '.$fecha_fin;?></h1>
    <!-- <?php #endif ?> -->
    <div class="table-responsive">
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-4">Nombre</th>
                    <th class="col-md-2 text-center">Entidad</th>
                    <th class="col-md-2 text-center">Municpio</th>
                    <th class="col-md-2 text-center">Fecha de inicio</th>
                    <th class="col-md-2"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($capacitaciones as $capacitacion): ?>
                <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $capacitacion->nombre; ?></td>
                    <td class="text-center"><?php echo $capacitacion->localidad; ?></td>
                    <td class="text-center"><?php echo $capacitacion->municipio; ?></td>
                    <td class="text-center"><?php echo $capacitacion->fechaInicio; ?></td>
                    <td>
                        <form action="?c=Capacitacion&a=BuscarPorId" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="buscar-nombre-capacitacion" value="<?php echo $capacitacion->nombre; ?>" />
                            <input type="hidden" name="buscar-id-capacitacion" value="<?php echo $capacitacion->idCapacitacion; ?>" />
                            <div class="text-right">
                                <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table> 
    </div>
</div>