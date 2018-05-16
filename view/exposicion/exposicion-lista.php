<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li><a href="?c=Principal&a=IndexConcursosExposiciones">Concursos y exposiciones</a></li>
        <li class="active">Lista de exposiciones</li>
    </ol>
</div>
<div class="container">
    <?php if (isset($municipio)): ?>
        <h1 class="page-header text-center">Exposiciones en: <?php echo $municipio;?></h1>
    <?php else: ?>
        <h1 class="page-header text-center">Exposiciones en el periodo: <?php echo $fecha_inicio.' a '.$fecha_fin;?></h1>
    <?php endif ?>
    <div class="table-responsive">
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-5">Nombre</th>
                    <th class="col-md-2 text-center">Municpio</th>
                    <th class="col-md-2 text-center">Entidad</th>
                    <th class="col-md-2 text-center">Fecha de inicio</th>
                    <th class="col-md-1"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($exposiciones as $exposicion): ?>
                <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $exposicion->nombre; ?></td>
                    <td class="text-center"><?php echo $exposicion->municipio; ?></td>
                    <td class="text-center"><?php echo $exposicion->entidad; ?></td>
                    <td class="text-center"><?php echo $exposicion->fechaInicio; ?></td>
                    <td>
                        <form action="?c=Exposicion&a=BuscarPorId" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="buscar-nombre-expo" value="<?php echo $exposicion->nombre; ?>" />
                            <input type="hidden" name="buscar-id-expo" value="<?php echo $exposicion->idExposicion; ?>" />
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