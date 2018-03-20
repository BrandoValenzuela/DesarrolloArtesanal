<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Lista de exposiciones</li>
    </ol>
    <h1 class="page-header text-center">Exposiciones en: <?php echo $municipio;?></h1>
    <div class="col-md-10 col-md-offset-1">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="col-md-7">Nombre</th>
                <th class="col-md-2">Municpio</th>
                <th class="col-md-2">Entidad</th>
                <th class="col-md-1"></th>
                <!-- <th class="col-md-1"></th> -->
            </tr>
        </thead>
        <tbody>
        <?php foreach($exposiciones as $exposicion): ?>
            <tr>
                <td class="text-center"><?php echo $i; $i++; ?></td>
                <td><?php echo $exposicion->nombre; ?></td>
                <td><?php echo $exposicion->municipio; ?></td>
                <td><?php echo $exposicion->entidad; ?></td>
                <td>
                    <form action="?c=Exposicion&a=Buscar" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="buscar-nombre-expo" value="<?php echo $exposicion->nombre; ?>" />
                        <input type="hidden" name="buscar-id-expo" value="<?php echo $exposicion->idExposicion; ?>" />
                        <div class="text-right">
                            <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                        </di>
                    </form>
                </td>
                <!-- <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="registrar-participante" value="<?php #echo $exposicion->curp; ?>" />
                        <div class="text-right">
                            <button id="btn-submit" class="btn btn-primary">Registrar participante</button>
                        </di>
                    </form>
                </td> -->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 
    </div>   
</div>