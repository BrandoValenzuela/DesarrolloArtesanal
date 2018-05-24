<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexApoyosCompras">Apoyos y compras</a></li>
      <li class="active">Lista de apoyos</li>
    </ol>
</div>
<div class="container">
    <h1 class="page-header text-center">Búesqueda: <?php echo $mes.' de '.$año;?></h1>
    <div class="col-md-12">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-md-1 text-center">#</th>
                <th class="col-md-6">Nombre del apoyo</th>
                <th class="col-md-3">Fecha de otorgamiento</th>
                <th class="col-md-2"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($apoyos as $apoyo): ?>
            <tr>
                <td class="text-center"><?php echo $i; $i++; ?></td>
                <td><?php echo $apoyo->nombre; ?></td>
                <td><?php echo $apoyo->fechaOtorgamiento; ?></td>
                <td>
                    <form action="?c=Apoyo&a=BuscarPorId" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="buscar-nombre-apoyo" value="<?php echo $apoyo->nombre; ?>" />
                        <input type="hidden" name="buscar-id-apoyo" value="<?php echo $apoyo->idApoyo; ?>" />
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