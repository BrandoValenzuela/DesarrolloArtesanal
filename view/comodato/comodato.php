<?php $i = 1; ?>
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
      <li><a href="?c=Comodato&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de comodatos</a></li>
      <li class="active">Comodato</li>
    </ol>
</div>
<div class="container">
    <h1 class="page-header text-center">Comodato</h1>
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td class="col-xs-6 bold text-right">Folio:</td>
                    <td><?php echo $comodato->folio; ?></td>
                </tr>
                <tr>
                    <td class="col-xs-6 bold text-right">Fecha de otorgamiento:</td>
                    <td><?php echo $comodato->fechaInicio; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold" >Datos del poseedor</caption>
                <tbody>
                    <tr>
                        <td class="bold">Nombre:</td>
                        <td><?php echo $comodato->nombrePoseedorComodato; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Domicilio:</td>
                        <td><?php echo $comodato->domicilioPoseedorComodato; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Municipio:</td>
                        <td><?php echo $comodato->municipioPoseedorComodato; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Teléfono:</td>
                        <td><?php echo $comodato->telefonoPoseedorComodato; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-striped table-hover">
                <caption class="text-center bold">Bienes comodatados</caption>
                <tbody>
                    <tr>
                        <td><?php echo $comodato->bienesComodatados; ?></td>
                    </tr>
                </tbody>
        </table>
        </div>
    </div> 
</div>