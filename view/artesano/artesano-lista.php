<?php $i = 1;?>
<div class="container">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Lista de artesanos</li>
    </ol>
    <h1 class="page-header text-center">Artesanos con apellido: <?php echo $apellido;?></h1>
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
                <td><?php echo $artesano->aPaterno; ?></td>
                <td><?php echo $artesano->aMaterno; ?></td>
                <td><?php echo $artesano->nombre; ?></td>
                <td><?php echo $artesano->curp; ?></td>
                <td>
                    <form action="?c=Artesano&a=Buscar" method="post" enctype="multipart/form-data">
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