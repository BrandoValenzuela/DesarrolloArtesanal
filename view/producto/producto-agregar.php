<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="?c=Principal">Página principal</a></li>
      <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
      <?php if ($_SESSION['busqueda'] == 'ArtesanoPorApellido'): ?>
        <li><a href="?c=Artesano&a=<?php echo $_SESSION['metodo-busqueda']; ?>">Lista de artesanos</a></li>          
      <?php endif ?>
      <li><a href="?c=Artesano&a=BuscarPorCURP">Artesano</a></li>
      <li class="active">Productos artesanales</li>
    </ol>    
</div>

<div class="container">
    <h1 class="text-center">Artesanias producidas</h1>
    <br>
    <form id="frm-productos-artesano" class="form-horizontal" action="?c=Productoartesano&a=Guardar" method="post" enctype="multipart/form-data">
        <input type="hidden" name="curp-artesano" value="<?php echo $curp_artesano; ?>" />
        <fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="obligatorio">* </span>CURP del artesano: </label>
                <div class="col-md-3">
                    <input type="text" id="curp-artesano" name="curp-artesano" value="<?php echo $curp_artesano; ?>" class="form-control" placeholder="Ingrese la CURP." disabled />
                </div>
            </div>
        </fieldset>
        <fieldset id="productos-artesanales">
            <div class="form-group">
                <label class="col-md-2 control-label">Producto:</label>
                <div class="col-md-3">
                    <select name="producto-artesano[]" class="form-control">
                      <?php foreach ($productos as $opcion): ?>
                        <option value="<?php echo $opcion->idProducto ?>"><?php echo $opcion->nombre; ?></option>
                      <?php endforeach ?>
                    </select>
                </div>
                <label class="col-md-1 control-label">Detalle:</label>
                <div class="col-md-5">
                    <input type="text" name="descripcion-producto-artesano[]" value="" class="form-control" placeholder="Describa los productos que el artesano confecciona."  data-validacion-tipo="requerido" />
                </div>
            </div>
        </fieldset><br>        
        <div class="text-right">
            <input type="button" name="" id="agregar-producto" class="btn btn-primary" value="Agregar producto">
            <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
        </div>
    </form>
</div>












<script>
    $(document).ready(function(){
        $("#frm-productos-artesano").submit(function(){
            return $(this).validate();
        });
    })

    $(function(){
        $("#agregar-producto").click(function(){
            var renglon = '<div class="form-group"><label class="col-md-2 control-label">Producto:</label><div class="col-md-3"><select name="producto-artesano[]" class="form-control"><?php foreach ($productos as $opcion): ?><option value="<?php echo $opcion->idProducto ?>"><?php echo $opcion->nombre; ?></option><?php endforeach ?></select></div><label class="col-md-1 control-label">Detalle:</label><div class="col-md-5"><input type="text" name="descripcion-producto-artesano[]" value="" class="form-control" placeholder="Describa los productos que el artesano confecciona."  data-validacion-tipo="requerido" /></div><div class="col-md-1" id="btn-quitar-prducto"><input type="button" class="btn btn-primary quitar-producto" value="Quitar"></div></div>'
            $("#productos-artesanales").append(renglon);
        })

        $(document).on("click",".quitar-producto",function(){
            var parent = $(this).parents().get(1);
            $(parent).remove();
        });
    })
</script>
