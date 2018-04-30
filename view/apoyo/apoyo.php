<?php $i = 1;?>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li class="active">Apoyo</li>
    </ol>
    <h3 class="page-header text-center"><?php echo $apoyo->nombre;?></h3>
    <div class="col-md-12">
        <div class="col-xs-12">
            <div class="col-xs-6 text-right">
                <label>Otorgamiento:</label>
            </div>
            <div class="col-xs-6 text-left">
                <label><?php echo $apoyo->fechaOtorgamiento; ?></label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6 text-right">
                <label>Monto monetario:</label>
            </div>
            <div class="col-xs-6 text-left">
                <label><?php echo '$ '.number_format($apoyo->monto,2); ?></label>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr><th class="text-center">Descripción</th></tr>
            </thead>
            <tbody>
                <tr><td><?php echo $apoyo->descripcion; ?></td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 table-responsive">
        <br>
        <fieldset>
            <legend>Beneficiarios</legend>
            <?php if (!empty($beneficiarios)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">CURP</th>
                        <th class="col-md-2">Apellido paterno</th>
                        <th class="col-md-2">Apeliido materno</th>
                        <th class="col-md-3">Nombre(s)</th>
                        <th class="col-md-3"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($beneficiarios as $beneficiario): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td><?php echo $beneficiario->curp; ?></td>
                        <td><?php echo $beneficiario->aPaterno; ?></td>
                        <td><?php echo $beneficiario->aMaterno; ?></td>
                        <td><?php echo $beneficiario->nombre; ?></td>
                        <td>
                            <form action="?c=Artesano&a=BuscarPorCURP" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php echo $beneficiario->curp; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver información</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h4 class="text-center">No se han registrado beneficiarios de este apoyo.</h4>
            <?php endif ?>
        </fieldset>
    </div>  
    <form action="?c=Beneficiario&a=Crud" method="post" enctype="multipart/form-data">      
        <input type="hidden" name="nombre-apoyo" value="<?php echo $apoyo->nombre; ?>" />
        <input type="hidden" name="id-apoyo" value="<?php echo $apoyo->idApoyo; ?>" />
        <div class="text-right">   
            <button id="btn-submit" class="btn btn-primary">Registrar beneficiario</button>
        </div>
    </form>
</div>