<?php $i = 1;?>
<div class="container">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Hoja de datos</li>
    </ol>
    <h1 class="page-header text-center">Talleres de <?php echo $rama->nombre;?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="col-md-3">Nombre</th>
                <th class="col-md-3">Direccion</th>
                <th class="col-md-2">Localidad</th>
                <th class="col-md-2">Municipio</th>
                <th class="col-md-1"></th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($talleres as $taller): ?>
            <tr>
                <td class="text-center"><?php echo $i; $i++; ?></td>
                <td><?php echo $taller->nombre; ?></td>
                <td><?php echo $taller->domicilio; ?></td>
                <td><?php echo $taller->localidad; ?></td>
                <td><?php echo $taller->municipio; ?></td>
                <td>
                    <form action="?c=Taller&a=Buscar" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="buscar-id-taller" value="<?php echo $taller->idTaller; ?>" />
                        <input type="hidden" name="buscar-nombre-taller" value="<?php echo $taller->nombre; ?>" />
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
