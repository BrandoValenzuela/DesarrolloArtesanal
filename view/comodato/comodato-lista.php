<?php $i = 1;?>
<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
    <li class="active">Lista de comodatos</li>
  </ol>
</div>
<div class="container">
    <h1 class="page-header text-center">Comodatos: <?php echo $fecha_inicio.' a '.$fecha_fin;?></h1>
    <fieldset>
        <legend>Comodatos de artesanos</legend>
        <div class="col-md-12">
            <?php if (!empty($comodatos_artesano)): ?>                        
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">Poseedor</th>
                        <th class="col-md-2 text-center">Folio del comodato</th>
                        <th class="col-md-2 text-center">Fecha de otorgamiento</th>
                        <th class="col-md-4">Bienes comodatados</th>
                        <th class="col-md-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comodatos_artesano as $comodato_artesano): ?>
                    <tr>
                        <td class="bold"><?php echo $i; $i++; ?></td>
                        <td><?php echo $comodato_artesano->curp; ?></td>
                        <td class="text-center"><?php echo $comodato_artesano->folio; ?></td>
                        <td class="text-center"><?php echo $comodato_artesano->fechaInicio; ?></td>
                        <td class=""><?php echo $comodato_artesano->bienesComodatados; ?></td>
                        <td>
                            <form action="?c=Artesano&a=BuscarPorCURP&#Concursos" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-artesano-curp" value="<?php echo $comodato_artesano->curp; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver artesano</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <br>
            <?php else: ?>
                <h4 class="text-center">No se otrorgaron comodatos en este periodo.</h4>
                <br>
            <?php endif ?>
        </div>       
    </fieldset>
        <fieldset>
        <legend>Comodatos externos</legend>
        <div class="col-md-12">
        <?php if (!empty($comodatos_externos)): ?>            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-3">Poseedor</th>
                        <th class="col-md-2 text-center">Folio del comodato</th>
                        <th class="col-md-2 text-center">Fecha de otorgamiento</th>
                        <th class="col-md-5"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comodatos_externos as $comodato_externo): ?>
                    <tr>
                        <td class="bold text-center"><?php echo $i = 1; $i++; ?></td>
                        <td><?php echo $comodato_externo->nombrePoseedorComodato; ?></td>
                        <td class="text-center"><?php echo $comodato_externo->folio; ?></td>
                        <td class="text-center"><?php echo $comodato_externo->fechaInicio; ?></td>
                        <td>
                            <form action="?c=Comodato&a=BuscarPorId" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="buscar-id-comodato" value="<?php echo $comodato_externo->idComodatoExterno; ?>" />
                                <div class="text-right">
                                    <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h4 class="text-center">No se otrorgaron comodatos en este periodo.</h4>
            <?php endif ?>
        </div>
    </fieldset>
</div>