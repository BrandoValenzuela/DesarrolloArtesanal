<?php $i = 1;?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li><a href="?c=Principal&a=IndexConcursosExposiciones">Concursos y exposiciones</a></li>
        <?php if ($_SESSION['metodo-busqueda'] == 'BuscarPorPeriodo' || $_SESSION['metodo-busqueda'] == 'BuscarPorConcepto'): ?>
            <li><a href="?c=Concurso&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de concursos</a></li>
        <?php endif ?>
        <li class="active">Concurso</li>
    </ol>
</div>
<div class="container">
    <h3 class="page-header text-center"><?php echo $concurso->nombre;?></h3>
    <div class="col-md-12">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-xs-6 text-right">
                <label>Fecha de realización:</label>
            </div>
            <div class="col-xs-6 text-left">
                <label><?php echo $concurso->fecha; ?></label>
            </div>
            <hr>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
            <caption class="text-center bold" >Ubicación</caption>
            <tbody>
                <tr>
                    <td class="bold">Domicilio del evento</td>
                    <td><?php echo $concurso->domicilio; ?></td>
                </tr>
                <tr>
                    <td class="bold">Municipio</td>
                    <td><?php echo $concurso->municipio; ?></td>
                </tr>
                <tr>
                    <td class="bold">Entidad</td>
                    <td><?php echo $concurso->entidad; ?></td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Apoyo</caption>
                <tbody>
                    <tr>
                        <td class="bold">Alcance</td>
                        <td>
                            <?php echo $alcance = $concurso->alcance == '1'? 'Estatal' : 'Federal';?>    
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Monto total estatal</td>
                        <td><?php echo '$ '.number_format($concurso->montoTotalEstatal,2);?></td>
                    </tr>
                    <tr>
                        <td class="bold">Monto invertido</td>
                        <td><?php echo '$ '.number_format($concurso->montoTotalFederal,2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
    <div class="col-md-12 table-responsive">
        <br>
        <fieldset>
            <legend>Participantes</legend>
            <?php if (!empty($participantes)): ?>
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
                <?php foreach($participantes as $participante): ?>
                    <tr>
                        <td class="text-center"><?php echo $i; $i++; ?></td>
                        <td><?php echo $participante->curp; ?></td>
                        <td><?php echo $participante->aPaterno; ?></td>
                        <td><?php echo $participante->aMaterno; ?></td>
                        <td><?php echo $participante->nombre; ?></td>
                        <td>
                            <form action="?c=Artesano&a=BuscarPorCURP" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php echo $participante->curp; ?>" />
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
                <h4 class="text-center">No hay participantes registrados en este concurso.</h4>
            <?php endif ?>
        </fieldset>
    </div>  
    <form action="?c=Participanteconcurso&a=Crud" method="post" enctype="multipart/form-data">      
        <input type="hidden" name="nombre-concurso" value="<?php echo $concurso->nombre; ?>" />
        <input type="hidden" name="id-concurso" value="<?php echo $concurso->idConcurso; ?>" />
        <div class="text-right">   
            <button id="btn-submit" class="btn btn-primary">Registrar participante</button>
        </div>
    </form>
</div>