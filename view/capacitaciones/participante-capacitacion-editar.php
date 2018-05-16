<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li><a href="?c=Principal&a=IndexCapacitaciones">Capacitaciones</a></li>
        <?php if ($_SESSION['metodo-busqueda'] == 'BuscarPorPeriodo'): ?>
            <li><a href="?c=Capacitacion&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de capacitaciones</a></li>          
        <?php endif ?>
        <li><a href="?c=Capacitacion&a=BuscarPorId">Capacitación</a></li>
        <li class="active">Participantes</li>
    </ol>
</div>
<div class="container">
    <h1 class="text-center">Nuevo registro de participante(s)</h1>
    <h3 class="page-header text-center"><?php echo $nombre_capacitacion; ?></h3>
    <form id="frm-participantes-capacitacion-artesano" class="form-horizontal" action="?c=Participantecapacitacion&a=Guardar" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id-capacitacion" value="<?php echo $id_capacitacion; ?>" />
        <fieldset id="participantes">
            <div class="form-group" >
                <label class="col-md-4 control-label"><span class="obligatorio">* </span>CURP del artesano:</label>
                <div class="col-md-4">
                    <input type="text" name="curp-artesano-capacitacion[]" class="form-control lista" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                </div>
            </div>
        </fieldset><br>
        <div class="text-right">
            <input type="button" id="agregar-participante" class="btn btn-primary" value="Agregar participante"></input>
            <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
        </div>
    </form>
</div>
