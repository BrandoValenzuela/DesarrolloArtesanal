<div id="mensaje" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $mensaje['titulo']; ?></h4>
      </div>
      <div class="modal-body text-center">
        <p><?php echo $mensaje['cuerpo']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-success" >Aceptar</button>
      </div>
    </div>

  </div>
</div>
<script>
    $(document).ready(function(){
       $('#mensaje').modal();
    });


</script>