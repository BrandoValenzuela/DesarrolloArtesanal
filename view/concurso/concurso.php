<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li class="active">Concurso</li>
    </ol>
    <h3 class="page-header text-center"><?php echo $concurso->nombre;?></h3>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-6 text-right">
                <label>Fecha de realización:</label>
            </div>
            <div class="col-md-6 text-left">
                <label><?php echo $concurso->fecha; ?></label>
            </div>
            <hr>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
            <caption class="text-center negrita" >Ubicación</caption>
            <tbody>
                <tr>
                    <td class="negrita">Domicilio del evento</td>
                    <td><?php echo $concurso->domicilio; ?></td>
                </tr>
                <tr>
                    <td class="negrita">Municipio</td>
                    <td><?php echo $concurso->municipio; ?></td>
                </tr>
                <tr>
                    <td class="negrita">Entidad</td>
                    <td><?php echo $concurso->entidad; ?></td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <caption class="text-center negrita">Apoyo</caption>
            <tbody>
                <tr>
                    <td class="negrita">Alcance</td>
                    <td>
                        <?php echo $alcance = $concurso->alcance == '1'? 'Estatal' : 'Federal';?>    
                    </td>
                </tr>
                <tr>
                    <td class="negrita">Monto total estatal</td>
                    <td><?php echo '$ '.number_format($concurso->montoTotalEstatal,2);?></td>
                </tr>
                <tr>
                    <td class="negrita">Monto invertido</td>
                    <td><?php echo '$ '.number_format($concurso->montoTotalFederal,2); ?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div> 
    <div class="col-md-10 col-md-offset-1">
        <br>
        <fieldset>
            <legend>Participantes</legend>
            <?php if (false): ?>
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
                <?php #foreach($participantes as $participante): ?>
                    <tr>
                        <td class="text-center"><?php #echo $i; $i++; ?></td>
                        <td><?php #echo $participante->curp; ?></td>
                        <td><?php #echo $participante->aPaterno; ?></td>
                        <td><?php #echo $participante->aMaterno; ?></td>
                        <td><?php #echo $participante->nombre; ?></td>
                        <td>
                            <form action="?c=Artesano&a=Buscar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php #echo $participante->curp; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver información</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php #endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h4 class="text-center">No hay participantes registrados en este concurso.</h4>
            <?php endif ?>
        </fieldset>
        <br>
        <form action="?c=Artesanoconcurso&a=Crud" method="post" enctype="multipart/form-data">      
            <input type="hidden" name="nombre-exposicion" value="<?php #echo $concurso->nombre; ?>" />
            <input type="hidden" name="id-exposicion" value="<?php #echo $concurso->idConcurso; ?>" />
            <div class="text-right">   
                <button id="btn-submit" class="btn btn-primary">Registrar participante</button>
            </div>
        </form>
    </div>  
</div>