<?php $i = 1;?>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="?c=Principal">Página principal</a></li>
        <li class="active">Lista de concursos</li>
    </ol>
    <h1 class="page-header text-center">Búsqueda: <?php echo $concepto;?></h1>
    <table class="table table-striped table-hover table-responsive">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="col-md-6">Nombre del concurso</th>
                <th class="col-md-2">Fecha</th>
                <th class="col-md-2">Alcance</th>
                <th class="col-md-2"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($concursos as $concurso): ?>
            <tr>
                <td class="text-center"><?php echo $i; $i++; ?></td>
                <td><?php echo $concurso->nombre; ?></td>
                <td><?php echo $concurso->fecha; ?></td>
                <td><?php echo $alcance = $concurso->municipio == '1' ? 'Estatal' : 'Nacional'; ?></td>
                <td>
                    <form action="?c=Concurso&a=BuscarPorId" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="buscar-nombre-concurso" value="<?php echo $concurso->nombre; ?>" />
                        <input type="hidden" name="buscar-id-concurso" value="<?php echo $concurso->idConcurso; ?>" />
                        <div class="text-right">
                            <button id="btn-submit" class="btn btn-success">Ver detalle</button>
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 
</div>