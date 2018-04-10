<!--<div class="col-md-12">-->
    
    <?php 
        $atributos=array('class'=>'form-horizontal ','role'=>'form','id'=>'formpariente');
        echo form_open('historias/ctriaje/guardar_triaje',$atributos);
        $cd = count($datos);
        
        
     ?>
    <div class="col-md-5">
       <div class="form-group">
            <label class="col-md-5">Número de Historia</label>
            <label class="col-md-5 label label-info" ><?= $cita->numero_historia;?></label>
            <input type="hidden" name="idcita" id="idcita" value="<?= $cita->idcitas;?>" >
        </div>
        <div class="form-group">
            <label class="col-md-5">Paciente</label>
            <label class="col-md-5 label label-info"><?= strtoupper($cita->nombre_paciente) ;?></label>
        </div>
        
        <div class="form-group">
            <label class="col-md-5">Edad</label>
            <input type="text" readonly="" name="edad" id="edad" value="<?= $edad_paciente;?>" placeholder="edad" class="input-sm"> 
        </div>
        
         <div class="form-group">
            <label class="col-md-5">Peso</label>
            <input type="text" name="peso" id="peso" value="<?php if($cd>0){ echo $datos->peso;}else { echo "";}?>" placeholder="peso" class="input-sm" required=""> 
         </div>

         <div class="form-group">
            <label class="col-md-5">Talla</label>
            <input type="text" name="talla" id="talla" value="<?php if($cd>0){ echo $datos->talla;}else { echo "";}?>" placeholder="talla" class="input-sm" required=""> 
         </div>  

         <div class="form-group">
            <label class="col-md-5">Presión Arterial</label>
            <input type="text" name="PA" id="PA" value="<?php if($cd>0){ echo $datos->presion_arterial;}else { echo "";}?>" placeholder="Presión Arterial" class="input-sm" required=""> 
         </div> 

         <div class="form-group">
            <label class="col-md-5">Temperatura</label>
            <input type="text" name="temperatura" id="temperatura" value="<?php if($cd>0){ echo $datos->temperatura;}else { echo "";}?>" placeholder="Temperatura" class="input-sm" required=""> 
         </div>
<!--        <hr>
         <div class="form-group">
             <div class="col-md-6">
                 <input type="submit" value="Guardar" class="btn btn-success btn-sm btn-block" >
             </div>
            
         </div>-->
        
    </div>
    
    <div class="col-md-2">
       <?php 
       if(isset($datos->peso)){
           $enable=' disabled=""';
       }
       else{
           $enable='';
       }
       ?>
         <div class="form-group">
             <button type="submit" class="btn btn-success btn-sm btn-block"<?= $enable;?>> <span class="glyphicon glyphicon-floppy-disk"></span> Guardar </button>
        
         </div>
        
    </div>
    
     <?= form_close(); ?>
<!--</div>-->