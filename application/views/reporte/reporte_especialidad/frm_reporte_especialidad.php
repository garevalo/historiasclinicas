<?= form_open("reporte/creporte/generar_reporte_especialidad");?>
<div class="row form-group">
    
    <label class="col-md-2">Seleccione Especialidad</label>
    <div class="col-md-2">
        <select class="input-sm form-control" name="idmedico">
            <option>Seleccione Especialidad</option>
            <?php 
            foreach ($especialidad as  $rowespecialidad) {
            ?>
            <option value="<?= $rowespecialidad->idtipopersonal;?>"><?= $rowespecialidad->nombre_personal;?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="col-md-2">
        <input type="text" name="desde" id="desde" class="date input-sm form-control" placeholder="Desde">
    </div>
    <div class="col-md-2">
        <input type="text" name="hasta" id="hasta" class="date input-sm form-control" placeholder="Hasta">
    </div>
  
    <div class="col-md-2">
        <?php 
//        $atributos=array("title"=>"Generar Reporte","class"=>"btn btn-sm btn-success btn-block","target"=>"_blank");
//        echo anchor("","Generar Reporte",$atributos);?>
        <button type="submit" class="btn btn-sm btn-success btn-block">Generar Reporte</button>
    </div>
    
</div>
<?php echo form_close();