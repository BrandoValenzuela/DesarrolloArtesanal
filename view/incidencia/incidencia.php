<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="?c=Principal&a=IndexAdministracion">Página de administración</a></li>
        <li class="active">Incidencias</li>
    </ol>
</div>
<div class="container">
    <?php if (isset($curp)): ?>
    <h1 class="text-center">Incidencias del artesano</h1>
    <h2 class="text-center"><?php echo $artesano->nombre.' '.$artesano->aPaterno.' '.$artesano->aMaterno; ?></h2>
    <hr>
    <table class="table table-striped table-hover table-responsive">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="col-md-7">Observación</th>
                <th class="col-md-3">Informante</th>
                <th class="col-md-2">Fecha</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($incidencias as $incidencia): ?>
            <tr>
                <td class="text-center"><?php echo $i; $i++; ?></td>
                <td><?php echo $incidencia->observacion; ?></td>
                <td><?php echo $incidencia->informante; ?></td>
                <td><?php echo $incidencia->fechaRegistro; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 
    <?php else: ?>
    <h1 class="text-center">Incidencias en el periodo: <?php echo $fecha_inicio.' a '.$fecha_fin;?></h1>  
    <hr>
    <table class="table table-striped table-hover table-responsive">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="col-md-3">Artesano</th>
                <th class="col-md-5">Observación</th>
                <th class="col-md-3">Informante</th>
                <th class="col-md-1">Fecha</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($incidencias as $incidencia): ?>
            <tr>
                <td class="text-center"><?php echo $i; $i++; ?></td>
                <td><?php echo $incidencia->nombre.' '.$incidencia->aPaterno.' '.$incidencia->aMaterno; ?></td>
                <td><?php echo $incidencia->observacion; ?></td>
                <td><?php echo $incidencia->informante; ?></td>
                <td><?php echo $incidencia->fechaRegistro; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 
    <?php endif ?>
</div>