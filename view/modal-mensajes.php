<div id="mensaje" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title"><?php echo $mensaje['titulo']; ?></h4>
      </div>
      <div class="modal-body text-center">
        <p><?php echo $mensaje['cuerpo']; ?></p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo $redireccion;?>"><button type="button" class="btn btn-success" >Aceptar</button></a>
      </div>
    </div>
  </div>
</div>