<script type="text/javascript">

 $(function(){
//        $("#dni").keyup(function( event ){
//
//            
//            $.post("<?php site_url("");?>",{"idpersona":$("#dni").val()},function(data){
//                
//            });
//        }); 
        $("input").dblclick(function(){
            
            $(this).prop("readonly","");
        });
        $("#dni").live("click",function(){
            $( "#dni" ).autocomplete({
               source: "<?= site_url("personas/cpersonas/get_personas_no_paciente"); ?>",
               select: function( event, ui ){

                 $("#ape_paterno").val(ui.item.apepaterno);
                 $("#ape_materno").val(ui.item.apematerno);
                 $("#nombre").val(ui.item.nombres);
                 $("#sexo").val(ui.item.idsexo);
                 $("#domicilio").val(ui.item.domicilio);
                 $("#fecha_nacimiento").val(ui.item.fecnacimiento);
                 $("#telefono").val(ui.item.telefono);
                 $("#accion").val("2")
                 $("#ape_paterno,#ape_materno,#nombre,#sexo,#domicilio,#fecha_nacimiento,#telefono").prop("readonly","readonly");
                 //$("#sexo").prop("disabled","disabled");


               } 
          });
        });
        
         $("#dni").keydown(function(e){
            
            if(e.which===9){
                
                var dni=$("#dni").val();
                $.post("<?php echo site_url("personas/cpersonas/get_persona_paciente");?>",{idpersona:dni},function(data){
                    $("#dni_existe").html(data);
                });
            }
         
         });
       
      
     
     
 });
        


</script>

<?php  $this->load->helper('form'); 
	   $this->load->helper('date');
	  
	    $timestamp = time();
            $timezone = 'UM5';
            //$daylight_saving = FALSE;
            $now=gmt_to_local($timestamp, $timezone);
            $datestring = "%H:%i:%s";
            $hora= mdate($datestring, $now);

$atributos=array('class'=>'form-horizontal','role'=>'form','id'=>'frm-historia');
 echo form_open('paciente/cpaciente/editar_paciente',$atributos);
?>    
<div class="form-group">
    <?php  echo validation_errors(); ?>
    <label  class="col-md-2" for="numero_historia"><strong>N&uacute;mero de Historia</strong>
    </label>
    <div class="col-md-2">
        <input type="text" name="num_historia"  class="form-control" id="numero_historia" required="" readonly="" value="<?= $paciente->numero_historia;?>"/>
    </div>
    
      
</div>
<div class="row form-group">
    <div class="col-md-2">
        <input type="text"  id="dni" name="dni" class="form-control input-sm" placeholder="dni" required="required" maxlength="8" pattern="[0-9]+" title="Ingrese solo Números" value="<?= $paciente->dni;?>"/>
        <input type="hidden" name="accion" id="accion" value="1" />
    </div>
    <label class="col-md-2 label label-warning" id="dni_existe"></label>
</div>

<div class="row form-group">
  <div class="col-md-2">
      <input type="hidden" value="<?= site_url("paciente/cpaciente/cargar_provincia");?>" id="direccion" name="direccion">
    <input type="text" class="form-control input-sm" name="ape_paterno"  id="ape_paterno" placeholder="apellido paterno" required="required" value="<?= $paciente->apepaterno;?>">
  </div>
  <div class="col-md-2">
    <input type="text" class="form-control input-sm" name="ape_materno"  id="ape_materno" placeholder="apellido materno" required="required" value="<?= $paciente->apematerno;?>">
  </div>
  <div class="col-md-3">
    <input type="text" class="form-control input-sm" name="nombre"  id="nombre" placeholder="Nombres" required="required" value="<?= $paciente->nombres;?>">
  </div>
</div>

<div class="row form-group">

    <div class="col-md-2">
       <select class="form-control input-sm" required id="sexo" name="sexo">
            <option value="">Sexo</option>
            <?php 
             foreach ($sexo as $rowsexo)
                {
                   if($rowsexo->idsexo==$paciente->idsexo){
                       echo $selected="selected=''";
                   }
                   else{
                       echo $selected="";
                   }
             ?>
            <option value="<?= $rowsexo->idsexo;?>" <?= $selected ?>><?= $rowsexo->nombre_sexo;?> </option>
            
            <?php
                }
            ?>
        </select>
    </div>
    
    <div class="col-md-2">
        <select class="form-control input-sm" required id="raza" name="raza">
            <option value="">Raza</option>
             <?php 
             foreach ($raza as $rowraza)
                {
                   if($rowraza->idraza==$paciente->idraza){ echo $selected="selected=''"; } else{ echo $selected="";}
             ?>
            <option value="<?= $rowraza->idraza;?>" <?= $selected ?>><?= $rowraza->nombre_raza;?></option>
            
            <?php
                }
            ?>
        </select>
    </div>
    
    <div class="col-md-2">
        <select class="form-control input-sm" id="grupo_sanguineo"  name="grupo_sanguineo" required>
            <option value="">Grupo Sanguíneo</option>
            <?php 
             foreach ($grupo_sanguineo as $rowgrupo_sanguineo)
                {
                 if($rowgrupo_sanguineo->idgruposang==$paciente->idgruposang){ echo $selected="selected=''"; } else{ echo $selected="";}  
             ?>
            <option value="<?= $rowgrupo_sanguineo->idgruposang;?>" <?= $selected ?>><?= $rowgrupo_sanguineo->nombre_grupo_sanguineo;?></option>
            
            <?php
                }
            ?>
        </select>
    </div>
    
    <div class="col-md-2">
         <select class="form-control input-sm" id="estado_civil"  name="estado_civil" required>
            <option value="">Estado Civil</option>
            <?php 
             foreach ($estado_civil as $rowestado_civil)
                {
                 if($rowestado_civil->idestcivil==$paciente->idestcivil){ echo $selected="selected=''"; } else{ echo $selected="";}    
             ?>
            <option value="<?= $rowestado_civil->idestcivil;?>"  <?= $selected ?>><?= $rowestado_civil->estado_civil;?></option>
            
            <?php
                }
            ?>
        </select>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-4">
        <input type="text"  id="domicilio" name="domicilio" class="form-control input-sm" placeholder="domicilio" required="required" value="<?= $paciente->domicilio?>"/>
    </div>
<!--    <div class="col-md-2">
        <input type="text"  id="dni" name="dni" class="form-control input-sm" placeholder="dni" required="required" maxlength="8"/>
    </div>-->
</div>

<div class="row form-group">
	<div class="col-md-2">
            <input type="text" id="fecha_nacimiento"  name="fecha_nacimiento" class="form-control input-sm date" placeholder="fecha de nacimiento"  required="required" value="<?= $this->metodos->revertir_fecha( $paciente->fecnacimiento)?>"/>
    </div>
    
    <div class="col-md-2">
    	<!--<input type="text" id="lugar_nacimiento"  name="lugar_nacimiento" class="form-control input-sm" placeholder="lugar de nacimiento" required="required"/>-->
        <select class="form-control input-sm" id="departamento" name="departamento" required onchange="cargar_select('<?= site_url("paciente/cpaciente/cargar_provincia");?>',$('#departamento').val(),'provincia','distrito');">
            <option value="">Departamento</option>
            <?php 
            
             foreach ($departamento as $rowdepartamento)
                {
                   if($rowdepartamento->iddepartamento==$paciente->iddepartamento){ echo $selected="selected=''"; } else{ echo $selected="";}   
             ?>
            <option value="<?= $rowdepartamento->iddepartamento;?>" <?= $selected;?>><?= $rowdepartamento->departamento;?></option>
            
            <?php
                }
            ?>
        </select>
    </div>
   

    
    
    <div class="col-md-3">
        <input type="text" id="procedencia"  name="procedencia" class="form-control input-sm" placeholder="procedencia" required="required" value="<?= $paciente->procedencia;?>"/>
    </div>
</div>

<div class="row form-group">
	<div class="col-md-2">
    	<!--<input type="text" id="grado_instruccion" name="grado_instruccion" class="form-control input-sm" placeholder="grado instrucción" required="required"/>-->
        <select class="form-control input-sm" id="grado_instruccion" name="grado_instruccion" required>
            <option value="">Grado Instrucción</option>
            <?php 
             foreach ($grado_instruccion as $rowgrado_instruccion)
                {
                   if($rowgrado_instruccion->idgradoinstruccion==$paciente->idgradoinstruccion){ echo $selected="selected=''"; } else{ echo $selected="";}
             ?>
            <option value="<?= $rowgrado_instruccion->idgradoinstruccion;?>" <?= $selected;?>><?= $rowgrado_instruccion->grado_instruccion;?></option>
            
            <?php
                }
            ?>
        </select>    
    </div>
    
    <div class="col-md-2">
    	<select class="form-control input-sm" id="religion" name="religion" required>
            <option value="">Religión</option>
            <?php 
             foreach ($religion as $rowreligion)
                {
                    if($rowreligion->idreligion==$paciente->idreligion){ echo $selected="selected=''"; } else{ echo $selected="";}
             ?>
            <option value="<?= $rowreligion->idreligion;?>" <?= $selected;?>><?= $rowreligion->religion;?></option>
            
            <?php
                }
            ?>
        </select>
    </div>
    
    <div class="col-md-2">
    	<!--<input type="text" id="ocupacion" name="ocupacion" class="form-control input-sm" placeholder="ocupación" required="required"/>-->
        <select class="form-control input-sm" id="ocupacion" name="ocupacion" required>
            <option value="">Ocupación</option>
            <?php 
             foreach ($ocupacion as $rowocupacion)
                {
                 if($rowocupacion->idocupacion==$paciente->idocupacion){ echo $selected="selected=''"; } else{ echo $selected="";}  
             ?>
            <option value="<?= $rowocupacion->idocupacion;?>" <?= $selected;?>><?= $rowocupacion->ocupacion;?></option>
            
            <?php
                }
            ?>
        </select>
    </div>
    <div class="col-md-1">
          <?php 
            $modal_ocupacion=  site_url("ocupacion/cocupacion/modal_ocupacion");
          ?>
      <a href="javascript:void(0)"  onclick="modal('Registrar Ocupación','<?= $modal_ocupacion;?>');"><span class="glyphicon glyphicon-plus vmodal"></span></a> 
                                
    </div>
</div>

<div class="row form-group">
    <div class="col-md-4">
        <div class="row form-group">
             <div class="col-md-11">
                 <?php 
                    //$vista=$this->load->view('personas/personas','',TRUE);
                 $segmentos = array('personas', 'cpersonas', 'nuevo_pariente');
                 $vista= site_url($segmentos);
                 ?>
                 <input type="hidden" id="id_nom_padre" name="id_nom_padre" value="">
                 <input type="text"  id="nom_padre" name="nom_padre" class="form-control input-sm" placeholder="nombre del padre" value="<?= $paciente->idnpadre;?>"/>
            </div>

            <div class="col-md-1">
               
                <a href="javascript:void(0)"  onclick="ventana_modal('1','<?= $vista;?>','nom_padre');"><span class="glyphicon glyphicon-plus vmodal"></span></a> 
                                
            </div>
            
        </div>
       
    	
    </div>
   
    
    <div class="col-md-4">
        <div class="row form-group" >
             <div class="col-md-11">
                 <input type="hidden" id="id_nom_madre" name="id_nom_madre" value="">
                 <input type="text" id="nom_madre" name="nom_madre" class="form-control input-sm" placeholder="nombre de la madre" value="<?= $paciente->idnmadre;?>"/>
            </div>

            <div class="col-md-1">
                <?php 
                    $titulomodal='Nuevo Registro';
                    $conten_modal='historia_clinica/historia_clinica';
                ?>
                <a href="javascript:void(0)"  onclick="ventana_modal('2','<?= $vista;?>','nom_madre');"><span class="glyphicon glyphicon-plus vmodal" ></span></a>
            </div>
            
        </div>
    	
    </div>
</div>

<div class="row form-group">
	<div class="col-md-4">
            <input type="text" id="notificar" name="notificar" class="form-control input-sm" placeholder="notificar a" required="required" value="<?= $paciente->notificar?>"/>
    </div>
   
    
    <div class="col-md-2">
        <input type="text" id="telefono" name="telefono" class="form-control input-sm" placeholder="teléfono" required="required"  maxlength="9" pattern="[0-9]+" title="Ingrese solo Números" value="<?= $paciente->telefono;?>"/>
    </div>
</div>
<hr />
<div class="row form-group">
    <div class="col-md-2">
            <input type="hidden" id="comodin" name="comodin" value="">
            <input type="submit" class="btn btn-success btn-sm btn-block" name="guardar" id="guardar" value="Guardar"  />
    </div>
    <div class="col-md-2">
            <input type="reset" class="btn btn-danger btn-sm btn-block" name="cancelar" id="cancelar" value="Cancelar"  />
  
    </div>
    
    
</div>


<?php echo form_close(); 


 