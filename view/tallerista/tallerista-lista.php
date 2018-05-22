<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexCapacitaciones">Capacitaciones</a></li>
      <li class="active">Lista de talleristas</li>
    </ol>  
</div>
<div class="container">
    <h1 class="page-header text-center">Talleristas con apellido: <?php echo $apellido;?></h1>
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
            <?php foreach($talleristas as $tallerista): ?>
                <tr>
                    <td class="text-center"><?php echo $i; $i++; ?></td>
                    <td><?php echo $tallerista->aPaterno; ?></td>
                    <td><?php echo $tallerista->aMaterno; ?></td>
                    <td><?php echo $tallerista->nombre; ?></td>
                    <td><?php echo $tallerista->curp; ?></td>
                    <td>
                        <form action="?c=Tallerista&a=BuscarPorCURP" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="buscar-tallerista-curp" value="<?php echo $tallerista->curp; ?>" />
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