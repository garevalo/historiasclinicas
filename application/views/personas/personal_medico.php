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
               source: "<?= site_url("personas/cpersonas/get_personas"); ?>",
               select: function( event, ui ){

                 $("#apellido_paterno").val(ui.item.apepaterno);
                 $("#apellido_materno").val(ui.item.apematerno);
                 $("#nombre").val(ui.item.nombres);
                 $("#sexo").val(ui.item.idsexo);
                 $("#direccion").val(ui.item.domicilio);
                 $("#fecha_nacimiento").val(ui.item.fecnacimiento);
                 $("#telefono").val(ui.item.telefono);
                 $("#accion").val("2")
                 $("#apellido_paterno,#apellido_materno,#nombre,#sexo,#direccion,#fecha_nacimiento,#telefono").prop("readonly","readonly");
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
<?php 
    $atributos=array('class'=>'form-horizontal','role'=>'form','id'=>'frm-historia');
    echo form_open('personas/cpersonal_medico/guardar_personal',$atributos);
 ?>
<fieldset>
    <legend class="">Datos Personales</legend>
<div class="row form-group">
    
    <div class="col-md-2">
        <input type="text" class="form-control input-sm"  name="dni" id="dni" placeholder="DNI"> 
    </div>
    <label class="col-md-2 label label-danger" id="dni_existe"></label>
</div>

<div class="row form-group">
    <div class="col-md-2">
        <input type="text" class="form-control input-sm" placeholder="Nombres" id="nombre" name="nombre">
    </div> 
    <div class="col-md-2">
        <input type="text" class="form-control input-sm" placeholder="Apellido Paterno" id="apellido_paterno" name="apellido_paterno">
    </div> 
    <div class="col-md-2">
        <input type="text" class="form-control input-sm" placeholder="Apellido Materno" id="apellido_materno" name="apellido_materno">
    </div> 
   
</div>
<div class="row form-group">
    <div class="col-md-2 ">
        <input type="text" class="form-control input-sm date" placeholder="Fecha Nacimiento" id="fecha_nacimiento" name="fecha_nacimiento" required="">
        
    </div>
    <div class="col-md-2">
        <select id="sexo" name="sexo" class="form-control input-sm">
            <option value="">Sexo</option>
            <?php 
            foreach ($sexo as $rowsexo) {
            ?>
            <option value="<?= $rowsexo->idsexo;?>"><?= $rowsexo->nombre_sexo;?></option>
            <?php
            }
            ?>
        </select>
        
    </div>
    <div class="col-md-2 ">
        <input type="text" class="form-control input-sm" placeholder="teléfono" id="telefono" name="telefono">
        
    </div>    
    
</div>

<div class="row form-group">
    
    <div class="col-md-4">
        <input type="text" class="input-sm form-control" id="direccion" name="direccion" placeholder="Dirección">
    </div>
</div>
</fieldset>

<fieldset>
    <legend class="">Datos del Profesional</legend>
    
    <div class="row form-group">
        <div class="col-md-2">
            
            <select name="tipo_personal" name="tipo_personal" class="input-sm form-control">
                <option value="">Tipo de Personal</option>
                <?php 
                            foreach ($tipo_personal as $rowtipo_personal) {
                ?>
                <option value="<?= $rowtipo_personal->idtipopersonal;?>"><?= $rowtipo_personal->nombre_personal;?></option>
                <?php
                            }
                ?>
            </select>
            
        </div>        
        <div class="col-md-2">
            
            <input type="text" name="num_colegiatura" id="num_colegiatura" placeholder="numero colegiatura" class="input-sm form-control" >
            
        </div>
    </div>
</fieldset>

<fieldset>
    <legend class="">Usuario</legend>
    
    <div class="row form-group">
        <div class="col-md-2">
            <input type="text" name="usuario" id="usuario" placeholder="Usurio" class="input-sm form-control" >
        </div>
        <div class="col-md-2">
            <input type="password" name="contrasena" id="contrasena" placeholder="contraseña" class="input-sm form-control" >
        </div>
        <div class="col-md-2">
            <select name="tipo_usuario" name="tipo_usurio" class="input-sm form-control">
                <option value="">Tipo de Usuario</option>
                <?php 
                            foreach ($tipo_usuario as $rowtipo_usuario) {
                ?>
                <option value="<?= $rowtipo_usuario->idtipousuario;?>"><?= $rowtipo_usuario->tipousuario;?></option>
                <?php
                            }
                ?>
            </select>
        </div>        
    </div>
</fieldset>

<br>
<br>
<div class="row form-group">
    
    <div class="col-md-2">
        <input type="submit" value="Guardar" class="btn btn-success btn-block btn-sm">
    </div>
    <div class="col-md-2">
        <input type="button" value="Cancelar" class="btn btn-danger btn-block btn-sm">
    </div>    
    
    
</div>


<?= form_close(); 