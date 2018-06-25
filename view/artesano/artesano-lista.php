<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
      <li class="active">Lista de artesanos</li>
    </ol>  
</div>
<div class="container">
    <?php if (isset($apellido)): ?>
        <h1 class="page-header text-center">Artesanos con apellido: <?php echo $apellido;?></h1>
    <?php else: ?>
        <?php if (isset($nombre_rama)): ?>
            <h1 class="page-header text-center">Artesanos de la rama: <?php echo $nombre_rama;?></h1>
        <?php else: ?>
            <?php if (isset($nombre_corredor)): ?>
            <h1 class="page-header text-center">Artesanos del corredor: <?php echo $nombre_corredor;?></h1>
            <?php else: ?>
            <h1 class="page-header text-center">Artesanos dedicados a: <?php echo $nombre_producto;?></h1>
            <?php endif ?>
        <?php endif ?>


    <?php endif ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-2">Apellido paterno</th>
                    <th class="col-md-2">Apeliido materno</th>
                    <th class="col-md-3">Nombre(s)</th>
                    <th class="col-md-2">CURP</th>
                    <th class="col-md-3"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($artesanos as $artesano): ?>
                <tr>
                    <td class="text-center"><?php echo $i; $i++; ?></td>
                    <td class="respuesta"><?php echo $artesano->aPaterno; ?></td>
                    <td class="respuesta"><?php echo $artesano->aMaterno; ?></td>
                    <td class="respuesta"><?php echo $artesano->nombre; ?></td>
                    <td class="respuesta"><?php echo $artesano->curp; ?></td>
                    <td>
                        <form action="?c=Artesano&a=BuscarPorCurp" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="buscar-artesano-curp" value="<?php echo $artesano->curp; ?>" />
                            <div class="text-right">
                                <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                            </di>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>     
    </div>
</div>