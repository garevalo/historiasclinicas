
<!--<script type="text/javascript">

    function reporte(frm,dir){
        
        var datos=$("#"+frm).serialize();
        $.post(dir,datos,function(data){
            $("#reporte").html(data);
        });
        
    }
    
</script>-->
<?php
$atributos=array("id"=>"frm");
echo form_open("reporte/creporte/generar_pacientes_registrados",$atributos);?>
<div class="row form-group">
    
    <label class="col-md-2">Seleccione rango para consultar</label>
<!--    <div class="col-md-2">
        <select class="input-sm form-control" name="idmedico">
            <option>Seleccione Médico</option>
            <?php 
            foreach ($medicos as  $rowmedico) {
            ?>
            <option value="<?= $rowmedico->idpersonal;?>"><?= $rowmedico->nombre;?></option>
            <?php
            }
            ?>
        </select>
    </div>-->
    <div class="col-md-2">
        <input type="text" name="desde" id="desde" class="date input-sm form-control" placeholder="Desde">
    </div>
    <div class="col-md-2">
        <input type="text" name="hasta" id="hasta" class="date input-sm form-control" placeholder="Hasta">
    </div>
  
    <div class="col-md-2">
        <?php 
//        $atributos=array("title"=>"Generar Reporte","class"=>"btn btn-sm btn-success btn-block","target"=>"_blank");
//        echo anchor("","Generar Reporte",$atributos);
        $dir=site_url("reporte/creporte/generar_reporte_medico");
        ?>
        <button type="submit" class="btn btn-sm btn-success btn-block">Generar Reporte</button>
<!--        <input type="button" onclick="reporte('frm','<?= $dir;?>');" value="reporte">-->
    </div>
    
</div>
<?php echo form_close();
?>
<!--<div id="reporte"></div>-->
<!--<iframe  width="80%" height="600" id="reporte" ></iframe>-->