<script type="text/javascript" src="<?= base_url("js/consulta/consulta.js");?>"></script>
<script type="text/javascript" >


    $(function() {

        $(".cie").live("click",function(){
            $( ".cie" ).autocomplete({
               source: "<?= site_url("cie10/ccie10/get_cie_nombre"); ?>",
               select: function( event, ui ){

                 $(this).parents(".form-group").find("input[name*='enfermedad']").val(ui.item.nombre_enfermedad);

               }
           });
        });
    
  });

</script>

<?php 

    $timestamp = time();
    $timezone = 'UM5';
    //$daylight_saving = FALSE;
    $now=gmt_to_local($timestamp, $timezone);
    $datestring = "%d/%m/%Y - %h:%i:%s ";
    $fecha_hora= mdate($datestring, $now);
    
    $opciones       =   array("Normal","Aumentada","Disminuida");
    $est_conciencia =   array("Estado de Conciencia","Lucido Orientado Tiempo Espacio","No Lucido Orientado Tiempo Espacio","No hay Lucides o Ido","Activo");
    $est_general    =   array("Estado General","Mal Estado General","Regular Estado General","Buen Estado General");
    $tiempo_desc=   array("Hora(s)","Día(s)","Mes(es)","Año(s)");
    $atributos=array('class'=>'form-horizontal','role'=>'form','id'=>'frm-historia');
    echo form_open('historias/cconsulta/guardar_consulta',$atributos);
?>

<div class="row">
    <div class="col-md-3">
       <div class="form-group">
            <label class="col-md-4" for="fecha_hora">Fecha</label>
            <div class="col-md-7">
               <input type="text" name="fecha_hora" id="fecha_hora" value="<?= $fecha_hora;?>" disabled="" class="input-sm form-control"> 
            </div>


       </div>
       <div class="form-group">
            <label class="col-md-4" for="edad">Edad</label>
            <div class="col-md-4">
                <input type="text" name="edad" id="edad" value="<?= $consulta->edad;?>" class="input-sm form-control" disabled=""> 
            </div>


       </div>   
       <div class="form-group">
            <label class="col-md-4" for="peso">Peso</label>
            <div class="col-md-4">
               <input type="text" name="peso" id="peso" value="<?= $consulta->peso;?>" class="input-sm form-control" disabled=""> 
            </div>


       </div>
       <div class="form-group">
            <label class="col-md-4" for="talla">Talla</label>
            <div class="col-md-4">
               <input type="text" name="talla" id="talla" value="<?= $consulta->talla;?>" class="input-sm form-control" disabled=""> 
            </div>
       </div>

       <div class="form-group">
            <label class="col-md-4" for="pa">PA</label>
            <div class="col-md-4">
               <input type="text" name="pa" id="pa" value="<?= $consulta->presion_arterial;?>" class="input-sm form-control" disabled=""> 
            </div>
       </div>        
        <div class="form-group">
            <label class="col-md-4" for="fc">FC</label>
            <div class="col-md-4">
               <input type="text" name="fc" id="fc" value="<?= $consulta->frecuencia_cardiaca;?>" class="input-sm form-control"> 
            </div>
       </div>       
        <div class="form-group">
            <label class="col-md-4" for="pulso">Pulso</label>
            <div class="col-md-4">
               <input type="text" name="pulso" id="pulso" value="<?= $consulta->pulso;?>" class="input-sm form-control"> 
            </div>
       </div>

        <div class="form-group">
            <label class="col-md-4" for="fr">FR</label>
            <div class="col-md-4">
               <input type="text" name="fr" id="fr" value="<?= $consulta->frecuencia_respiratoria;?>" class="input-sm form-control"> 
            </div>
       </div> 

        <div class="form-group">
            <label class="col-md-4" for="temperatura">Temperatura</label>
            <div class="col-md-4">
               <input type="text" name="temperatura" id="temperatura" value="<?= $consulta->temperatura;?>" class="input-sm form-control" disabled=""> 
            </div>
       </div>

        <div class="form-group">
            <label class="col-md-4" for="sed">Sed</label>
            <div class="col-md-6">
                <?php ?>
                
               <select name="sed" id="sed" class="input-sm form-control">
                   <?php 
                   
                  
                   
                   foreach ($opciones as $key => $value) {
                        if($consulta->sed==$key){
                            $selected='selected=""';
                        }
                       else{$selected='';}
                    ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                   }
                   
                   ?>
                  
               </select>
            </div>
       </div>  

        <div class="form-group">
            <label class="col-md-4" for="temperatura">Apetito</label>
            <div class="col-md-6">
               <select name="apetito" id="apetito" class="input-sm  form-control">
                   <?php 
  
                   foreach ($opciones as $key => $value) {
                       if($consulta->apetito==$key){
                            $selected='selected=""';
                        }
                        else{$selected='';}
                    ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                     
                   }
                   
                   ?>
  
               </select>
            </div>
       </div>
        <div class="form-group">
            <label class="col-md-4" for="temperatura">Micción</label>
            <div class="col-md-6">
               <select name="miccion" id="miccion"  class="input-sm  form-control">
                   <?php 
  
                   foreach ($opciones as $key => $value) {
                       if($consulta->miccion==$key){
                            $selected='selected=""';
                        }
                        else{$selected='';}
                       ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                   }
                   
                   ?>
  
               </select>
            </div>
       </div> 
       <div class="form-group">
            <label class="col-md-4" for="temperatura">Deposición</label>
            <div class="col-md-6">
               
               <select name="deposic" id="deposic" class="input-sm  form-control">
                   <?php 
  
                   foreach ($opciones as $key => $value) {
                       if($consulta->deposicion==$key){
                            $selected='selected=""';
                        }
                         else{$selected='';}
                    ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                   }
                   
                   ?>
  
               </select>
            </div>
       </div>         
       <div class="form-group">
            <label class="col-md-4" for="temperatura">Sueño</label>
            <div class="col-md-6">
               
               <select name="sueno" id="sueno" class="input-sm  form-control">
                   <?php 
  
                   foreach ($opciones as $key => $value) {
                       if($consulta->sueno==$key){
                            $selected='selected=""';
                        }
                         else{$selected='';}
                   ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                   }
                   
                   ?>
  
               </select>
            </div>
       </div>  
    </div>

    <div class="col-md-9 linea_izquierda">

        <div class="form-group">
            <div class="col-md-4">
                <input type="text" name="informante" id="informante" value="<?= $consulta->informante;?>" placeholder="informante" class="input-sm form-control">
            </div>
            <div class="col-md-3">
               <select id="estado_general" name="estado_general" class="input-sm form-control">
    
                   <?php 
  
                   foreach ($est_general as $key => $value) {
                       if($consulta->estado_general==$key){
                            $selected='selected=""';
                        }
                         else{$selected='';}
                   ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                   }
                   
                   ?>
  
               </select>
            </div>
            <div class="col-md-3">
                <select id="estado_conciencia" name="estado_conciencia" class="input-sm form-control">

                    <?php 
  
                   foreach ($est_conciencia as $key => $value) {
                       if($consulta->estado_conciencia==$key){
                            $selected='selected=""';
                        }
                         else{$selected='';}
                   ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                   }
                   
                   ?>
                </select>
            </div>  

        </div>

        <div class="form-group">
            <label class="col-md-3">Tiempo de Enfermedad</label> 
            <div class="col-md-1">

                <select id="cantidad" name="tiempo_cantidad" class="input-sm form-control">
                    <?php 
                        
                        for($i=1;$i<=10;$i++){
                         
                        if($consulta->tiempo_cantidad==$i){
                            $selected='selected=""';
                        }
                         else{$selected='';}
                   ?>
                   <option value="<?= $i;?>" <?= $selected;?>> <?= $i;?> </option>
                    <?php
                        }
                    
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <select id="cantidad" name="tiempo_descripcion" class="input-sm form-control">
                    <?php 
  
                   foreach ($tiempo_desc as $key => $value) {
                      
                       if($consulta->tiempo_descripcion==$key){
                            $selected='selected=""';
                        }
                         else{$selected='';}
                   ?>
                   <option value="<?= $key;?>" <?= $selected;?>> <?= $value;?> </option>
                    <?php
                   }
                   
                   ?>
                </select>
            </div>

        </div>

        <div class="form-group">
<!--                            <label class="col-md-3">Descripcion Cronologógica de la Enfermedad</label>-->
            <div class="col-md-10">
                <textarea class="input-sm form-control" cols="50" rows="3" name="desc_cronologica" placeholder="Descripcion Cronologógica de la Enfermedad"><?php echo $consulta->desc_crono_enfermedad; ?>
                </textarea>
            </div>

        </div>

        <div class="form-group">
            <div class="col-md-10">
                <textarea class="input-sm form-control" cols="50" rows="3" name="examen_clinico" placeholder="Exámen Clínico"><?php echo $consulta->examen_clinico; ?></textarea>
            </div>

        </div>

        <div class="form-group clase_diagnostico" data-cod="0">
            <label class="col-md-2">Diagnostico</label>
            <div class="col-md-4">
                <input type="text" name="enfermedad[]" id="enfermedad" value="" placeholder="enfermedad" class="input-sm form-control enfermedad">
            </div>
            <div class="col-md-2">
                <input type="text" name="cie[]" id="cie" value="" placeholder="CIE10" class="input-sm form-control cie">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-yellow btn-xs nuevos_campos"><span class="glyphicon glyphicon-plus " id="agregar"></span> Diagnostico</button>
            </div>
        </div>                        
          <div id="campos_tratamiento" data-cod="0">
            <div class="form-group" data-cod="0">
                <label class="col-md-2">Tratamiento</label>
                <div class="col-md-8">

                    <textarea name="tratamiento[]" id="dosis" placeholder="tratamiento0" class="form-control"></textarea>
                </div>
<!--                <div class="col-md-2">
                    <input type="text" name="via[]" id="via" placeholder="Via" class="input-sm form-control">
                </div>
                <div class="col-md-2">
                    <input type="text" name="frecuencia[]" id="frecuencia" placeholder="Frecuencia" class="input-sm form-control">
                </div>
                <div class="col-md-2">
                    <input type="text" name="duracion[]" id="duracion" placeholder="Duracion" class="input-sm form-control">
                </div>-->
<!--                <div class="col-md-2">
                    <span class="glyphicon glyphicon-plus" id="agregar_tratamiento" ></span>
                </div>                             -->
            </div>

          </div>  
        <div id="div_agregar">

        </div>
        <div class="form-group">
            <div class="col-md-10">
                <textarea class="input-sm form-control" name="medida_higienica" cols="50" rows="3" placeholder="Medida Higiénica Dietetica"><?php echo $consulta->medida_hig_diet; ?></textarea>
            </div>

        </div>
        <div class="form-group">
            <div class="col-md-10">
                <textarea class="input-sm form-control" name="medida_preventiva" cols="50" rows="3" placeholder="Medida Preventiva"><?php echo $consulta->medida_preventiva; ?></textarea>
            </div>

        </div>
        <div class="form-group">
            <div class="col-md-10">
                <textarea class="input-sm form-control" name="apoyo_diagnostico" cols="50" rows="3" placeholder="Apoyo al Diagnóstico"><?php echo $consulta->apoyo_diagnostico; ?></textarea>
            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2">Próxima Cita</label>
            <div class="col-md-2">
                <input type="text" name="proxima_cita" id="proxima_cita" placeholder="Próxima Cita" class="input-sm form-control date" value="<?php echo $consulta->proxima_cita;?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Demanda</label>
            <div class="col-md-1">
                <input type="radio" name="tipo_consulta" id="tipo_consulta" value="1">
            </div>
            <label class="col-md-1">Sis</label>
            <div class="col-md-1">
                <input type="radio" name="tipo_consulta" id="tipo_consulta" value="2">
            </div>
        </div>
    </div>    
 </div>
<div class="container-fluid">
    <div class="form-group">
        <hr>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
        </div>
        <div class="col-md-2">
            <button type="reset" class="btn btn-danger btn-sm btn-block">Cancelar</button>
            
        </div>
        <input type="hidden" name="idcita" value="<?= $this->uri->segment(4);?>" >
    </div>
</div>
<?=  form_close() ;?>