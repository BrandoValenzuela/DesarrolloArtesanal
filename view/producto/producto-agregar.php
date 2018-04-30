<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="?c=Principal">Página principal</a></li>
            <li class="active">Producción de artesano</li>
        </ol>
        <h1 class="text-center">Artesanias producidas</h1>
    </div><br>
    <div class="row">
        <form id="frm-productos-artesano" class="form-horizontal" action="?c=Productoartesano&a=Guardar" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label class="col-md-2 control-label"><span class="obligatorio">* </span>CURP del artesano:</label>
                    <div class="col-md-4">
                        <input type="text" id="curp-artesano" name="curp-artesano" value="<?php #echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese la CURP." data-validacion-tipo="requerido|curp" />
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="oculto" id="fila-fija">
                    <div class="form-group" id="productos">
                        <label class="col-md-2 control-label">Producto:</label>
                        <div class="col-md-4">
                            <select class="form-control" name="productos[]">
                                <option value="Español">Español</option>
                                <option value="Matemáticas">Matemáticas</option>
                                <option value="Ciencias naturales">Ciencias naturales</option>
                                <option value="Geografía">Geografía</option>
                            </select>
                        </div>
                        <div class="col-md-6" id="btn-quitar-prducto">
                            <input type="button" class="btn btn-primary quitar-producto" value="Quitar">
                        </div>              
                    </div>
                </div>
                <div id="clonacion">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Producto:</label>
                        <div class="col-md-4">
                            <select class="form-control" name="productos[]">
                                <option value="Español">Español</option>
                                <option value="Matemáticas">Matemáticas</option>
                                <option value="Ciencias naturales">Ciencias naturales</option>
                                <option value="Geografía">Geografía</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="button"  class="btn btn-primary quitar-producto" value="Quitar">
                        </div>                    
                    </div>
                </div>
            </fieldset><br>
            <div class="text-right">
                <input type="button" name="" id="agregar-producto" class="btn btn-primary" value="Agregar materias"></input>
                <button id="btn-submit" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#frm-productos-artesano").submit(function(){
            return $(this).validate();
        });
    })

    $(function(){
        $("#agregar-producto").click(function(){
            $("#fila-fija").clone().removeClass("oculto").appendTo("#clonacion");
        })
        $(document).on("click",".quitar-producto",function(){
            var parent = $(this).parents().get(1);
            $(parent).remove();
        });
    })
</script>
