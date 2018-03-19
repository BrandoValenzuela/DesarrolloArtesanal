<?php $i = 1;?>
<div class="container">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Hoja de datos</li>
    </ol>
    <h1 class="page-header text-center">Talleres en <?php echo $municipio;?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="col-md-2">Rama artesanal</th>
                <th class="col-md-3">Nombre</th>
                <th class="col-md-3">Direccion</th>
                <th class="col-md-2">Localidad</th>
                <th class="col-md-1"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($talleres as $taller): ?>
            <tr>
                <td class="text-center"><?php echo $i; $i++; ?></td>
                <td>
                    <?php 
                        $rama_artesanal = $Rama->Obtener($taller->idRamaArtesanal);
                        echo $rama_artesanal->nombre;
                    ?>
                </td>
                <td><?php echo $taller->nombre; ?></td>
                <td><?php echo $taller->domicilio; ?></td>
                <td><?php echo $taller->localidad; ?></td>
                <td>
                    <form action="?c=Artesano&a=Buscar" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="buscar-artesano-curp" value="<?php echo $taller->curp; ?>" />
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
