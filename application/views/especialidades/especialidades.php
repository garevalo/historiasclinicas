<script type="text/javascript">
    
    $(document).ready( function () {
	
         $('#tabla_especialidad').dataTable({
             "aaSorting": [[ 0, "desc" ]] 
         } );
        
         $( "#form_especialidad" ).submit(function( event ) {
             var formdata=$("#form_especialidad").serialize();
             var dir=$(this).prop("action");
               $.post(dir,formdata,function(data){
                   var datos=jQuery.parseJSON(data); 
                   
                   $("#error_especialidad").text( datos.error ).show().fadeOut( 5000 );
                   $("#contenido_especialidad").html(datos.tabla);
                  
               });
                event.preventDefault();
          });
          
          $(".edit_especialidad").click(function(){

               var ide=$(this).parents("tr").find("input[name='id_campo_especialidad']").val(); 
               $(this).parents("tr").find(".row_especialidad").html(
                   $(this).parents("tr").find(".campo_especialidad").prop("type","text")
               );
               $(this).parents("tr").find("input[name='campo_especialidad']").focus();

               $(this).parents("tr").find(".campo_especialidad").focusout(function(){
                   var campo =$(this).val();
                   
                   $.post("<?= site_url("especialidad/cespecialidad/editar_especialidad");?>",{id:ide,especialidad:campo},function(data){
                        $("#bench").html(data);                      
                   }); 
                   
                   $(this).prop("type","hidden");
                   $(this).parents("tr").find(".row_especialidad").append(campo);
                   
               });
             
          });
          
          $(".delete_especialidad").click(function(){
              
              if(confirm("¿Esta seguro de eliminar este registro?"))
              {
                  var id_esp=$(this).parents("tr").find("input[name='id_campo_especialidad']").val(); 
                  $.post("<?= site_url("especialidad/cespecialidad/eliminar_especialidad");?>",{id:id_esp},function(data){
                        
                        $("#bench").html(data);                      
                   });
                   $(this).parents("tr").fadeOut(500);
              }

          });
    } );

</script>
<div id="contenido_especialidad">
<?php 
    $form=array("name"=>"form","id"=>"form_especialidad");
    echo form_open("especialidad/cespecialidad/registrar_especialidad",$form);?>    
<div class="row form-group">
    <label class="col-md-2" for="especialidad">Especialidad</label>
    <div class="col-md-2">
        <input type="text" class="form-control input-sm"  name="especialidad" id="especialidad" placeholder="Especialidad" required="">
        <input type="hidden" name="id_especialidad" id="id_especialidad"/>
    </div>
    <div class="col-md-1">
        <input type="submit" value="Guardar" class="btn btn-success btn-xs">
    </div>
    <div class="col-md-2 label label-warning" id="error_especialidad"></div>
</div>
<?php echo form_close();?>
<hr>
<div id="caja_grillas" class="">

        <table class="table table-striped table-condensed table-bordered table-hover" id="tabla_especialidad">
            <thead class="alert-success">
                    <th class="text-center" >N°</th>
                    <th class="text-center" >Departamento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
            </thead>
            <tbody id="grid_especialidad">
                <?php 

                    foreach ($especialidades as $value) {
    

                 ?>
                <tr class="text-center">
                    <td><?= $value->idtipopersonal;?>
                        <input type="hidden" name="id_campo_especialidad" class="id_campo_especialidad" value="<?= $value->idtipopersonal;?>">
                    </td>
                    <td class="row_especialidad"><?= $value->nombre_personal;?>
                        <input type="hidden" name="campo_depa" class="input-sm campo_especialidad" value="<?= $value->nombre_personal;?>">
                    </td>
                    <td><span class="glyphicon glyphicon-edit edit_especialidad" data-especialidad="<?= $value->idtipopersonal;?>"></span></td>
                    <td><span class="glyphicon glyphicon-trash delete_especialidad" onclick=""></span></td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>

</div>   

<div id="bench"></div>
</div>