<script type="text/javascript">

  $(function() {
      var comodin=$("#comodin").val();
        $("#dni_pariente").live("click",function(){
            $( "#dni_pariente" ).autocomplete({
               source: "<?= site_url("personas/cpersonas/get_personas"); ?>",
               select: function( event, ui ){

                 $("#"+comodin).val(ui.item.nombre);
                 $("#id_"+comodin).val(ui.item.nombre);
                 $("#"+comodin).prop("readonly","readonly");
                 cerrar_ventana();
               }
           });
        });
    
  });
</script>

<?php  $this->load->helper('form'); 
	
	    
$atributos=array('class'=>'form-horizontal','role'=>'form','id'=>'formpariente');
 echo form_open('personas/cpersonas/registrar_pariente',$atributos);

 ?>    
<div class="row form-group">
    <div class="col-sm-12">
        <input type="text"  id="dni_pariente" name="dni_pariente" class="form-control input-sm" placeholder="dni" required="required" pattern="[0-9]+" maxlength="8" title="Ingresar solo números"/>
    </div>

</div>
<div class="row form-group">
  <div class="col-sm-12">
    <input type="text" class="form-control input-sm" name="ape_paterno_pariente"  id="ape_paterno_pariente" placeholder="apellido paterno" required="required" value="">
  </div>
</div>

<div class="row form-group">
  <div class="col-sm-12">
    <input type="text" class="form-control input-sm" name="ape_materno_pariente"  id="ape_materno_pariente" placeholder="apellido materno" required="required">
  </div>
</div>

<div class="row form-group">
  <div class="col-sm-12">
    <input type="text" class="form-control input-sm" name="nombre_pariente"  id="nombre_pariente" placeholder="Nombres" required="required">
  </div>
</div>

<div class="row form-group">

	<div class="col-sm-12">
        <select class="form-control input-sm" required id="sexo_pariente" name="sexo_pariente">
            <option value="">Sexo</option>
            <?php 
             foreach ($sexo as $rowsexo)
             {
                 if($pariente==$rowsexo->idsexo){
                     $selected="selected=''";
                 }
                 else $selected="";
             ?>
            <option value="<?= $rowsexo->idsexo;?>" <?= $selected; ?> ><?= $rowsexo->nombre_sexo;?></option>
            
            <?php
            }
            ?>
        </select>
    </div>
</div>




<div class="row form-group" >
	<div class="col-sm-12">
            <?php 
                $direccion=site_url("personas/cpersonas/registrar_pariente");
            ?>
            <button type="submit" class="btn btn-primary btn-small" onclick="registrar_ajax('<?= $direccion;?>','formpariente');">Guardar</button>
            
        </div>
    
</div>



<?php echo form_close();?>


 
