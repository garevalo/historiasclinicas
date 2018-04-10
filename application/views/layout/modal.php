<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel"><?= $titulomodal;?></h3>
      </div>
      <div class="modal-body">
        <?php 
        
         $this->load->view($conten_modal);?>
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-default btn-small" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-small">Guardar</button>
     -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 