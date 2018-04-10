
<?php 
    
$atributos=array("name"=>"form_ocupacion" ,"id"=>"form_ocupacion","class"=>"form-horizontal");
echo form_open("",$atributos);
?>

<div class="row form-group col-md-12">
    
    <input type="text" name="ocupacion" id="ocupacion" placeholder="Ocupación" required="" class="form-control">
</div>

<div class="row form-group col-md-12">
    <?php 
        $dir=  site_url("ocupacion/cocupacion/guardar_ocupacion");
        $dir2=  site_url("ocupacion/cocupacion/cargar_ocupacion");
    ?>
    <input type="submit" value="Guardar Ocupación" class="btn btn-primary btn-sm btn-block" onclick="registro_ajax('<?= $dir; ?>','form_ocupacion','<?= $dir2; ?>')">
</div>
<?php 
echo form_close();
