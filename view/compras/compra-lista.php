<?php $i = 1;?>
<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexApoyosCompras">Apoyos y compras</a></li>
    <li class="active">Compras</li>
  </ol>
</div>
<div class="container">
    <?php if (isset($mes) and isset($año)): ?>
    <h1 class="page-header text-center">Compras: <?php echo $mes.' de '.$año;?></h1>
    <?php else: ?>
    <h1 class="page-header text-center">Compras: <?php echo $fecha_inicio.' a '.$fecha_fin;?></h1>
    <?php endif ?>
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-2 text-center">Artesano</th>
                    <th class="col-md-2 text-center">Alcance de compra</th>
                    <th class="col-md-2 text-center">Monto de la compra</th>
                    <th class="col-md-2 text-center">Forma de pago</th>
                    <th class="col-md-2 text-center">Fecha de la compra</th>
                    <th class="col-md-2"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($compras as $compra): ?>
                <tr>
                    <td class="bold text-center"><?php echo $i; $i++; ?></td>
                    <td class="text-center"><?php echo $compra->curp; ?></td>
                    <td class="text-center"><?php echo $alcance = $compra->alcance == 1 ? 'Estatal' : 'Federal'; ?></td>
                    <td class="text-center"><?php echo '$ '.number_format($compra->monto,2); ?></td>
                    <td class="text-center"><?php echo $alcance = $compra->tipoPago == 1 ? 'Factura' : 'Apoyo'; ?></td>
                    <td class="text-center"><?php echo $compra->fechaCompra; ?></td>
                    <td>
                        <form action="?c=Artesano&a=BuscarPorCURP" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="buscar-artesano-curp" value="<?php echo $compra->curp; ?>" />
                            <div class="text-right">
                                <button id="btn-submit" class="btn btn-success">Ver artesano</button>
                            </di>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table> 
    </div>   
</div>