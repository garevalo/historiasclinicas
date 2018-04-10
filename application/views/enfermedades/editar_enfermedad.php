
<?php $atributos=array('class'=>'form-horizontal','role'=>'form','id'=>'frm-enfermedad');
    echo form_open('enfermedad/cenfermedad/editar_cie',$atributos);?>


    <div class=" row form-group">
        
        <label class="col-md-2">Nombre de Enfermedad</label>
        <div class="col-md-3">
            <input type="text" name="nombre_enfermedad" id="nombre_enfermedad" class="input-sm form-control" placeholder="Nombre Enfermedad" required="" value="<?= $enfermedad->nombre_enfermedad;?>">
        </div>
        
    </div>


    <div class="row form-group">
        
        <label class="col-md-2">CIE10</label>
        <div class="col-md-2">
            <input type="text" name="cie10" id="cie10" class="input-sm form-control" placeholder="CIE10" required="" value="<?= $enfermedad->cie10;?>">
            <input type="hidden" name="idcie" id="idcie" value="<?= $enfermedad->idcie;?>" >
        </div>
        
    </div>

<hr>
<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-success btn-sm btn-block">Guardar</button>
    </div>
    
    
</div>

<?= form_close();