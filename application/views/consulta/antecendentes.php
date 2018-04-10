
<?php echo form_open("historias/cantecedentes/guardar_antecedente"); 
    $ca =  count($antecedentes);
?>
<div class="form-group">
    <div class=" row">
        <input type="hidden" name="numero_historia" id="numero_historia" value="<?= $cita->numero_historia;?>">
       <label class="col-lg-2">Antecedentes Familiares:</label>
       <div class="col-lg-5">
           <textarea name="antecedentes_familiares" id="antecedentes_familiares" cols="20" rows="2" class="form-control"><?php if($ca>0) {echo $antecedentes->ant_familiares;}else{echo "";}?></textarea>
       </div>
   
    </div>
</div>

<div class="form-group">    
    <div class=" row">
       <label class="col-lg-2">Antecedentes Epidemiológicos:</label>
       <div class="col-lg-5">
           <textarea name="antecedentes_epidemiologicos" id="antecedentes_epidemiologicos" cols="20" rows="2" class="form-control"><?php if($ca>0) {echo $antecedentes->ant_epidemiologicos;}else{echo "";}?></textarea>
       </div>
   
    </div>
    
</div>
<div class="form-group">
    <div class=" row">
       <label class="col-lg-2">Antecedentes Ocupacionales:</label>
       <div class="col-lg-5">
           <textarea name="antecedentes_ocupacionales" id="antecedentes_ocupacionales" cols="20" rows="2" class="form-control"><?php if($ca>0) {echo $antecedentes->ant_ocupacionales;}else{echo "";}?></textarea>
       </div>
   
    </div>
</div>

<div class="form-group">
    <div class=" row">
       <label class="col-lg-2">Antecedentes Personales:</label>
       <div class="col-lg-5">
           <textarea name="antecedentes_personales" id="antecedentes_personales" cols="20" rows="2" class="form-control"><?php if($ca>0) {echo $antecedentes->ant_personales;}else{echo "";}?></textarea>
       </div>
   
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
    </div>  
<input type="hidden" name="idcita" value="<?= $this->uri->segment(4);?>" >    
</div>

<?php echo form_close();