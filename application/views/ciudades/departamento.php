<script type="text/javascript">
    
    $(document).ready( function () {
	
         $('#tabla_departamento').dataTable({
             "aaSorting": [[ 0, "desc" ]] 
         } );
        
         $( "#form_depa" ).submit(function( event ) {
             var formdata=$("#form_depa").serialize();
             var dir=$(this).prop("action");
               $.post(dir,formdata,function(data){
                   var datos=jQuery.parseJSON(data); 
                   
                   $("#error_departamento").text( datos.error ).show().fadeOut( 5000 );
                   $("#tab-departamento").html(datos.tabla);
               });
                event.preventDefault();
          });
          
          $(".edit_depa").click(function(){

               var id_depa=$(this).parents("tr").find("input[name='id_campo_depa']").val(); 
               $(this).parents("tr").find(".row_depa").html(
                   $(this).parents("tr").find(".campo_depa").prop("type","text")
               );
               $(this).parents("tr").find("input[name='campo_depa']").focus();

               $(this).parents("tr").find(".campo_depa").focusout(function(){
                   var campo =$(this).val();
                   
                   $.post("<?= site_url("ciudades/cciudades/editar_departamento");?>",{iddepa:id_depa,depa:campo},function(data){
                        $("#bench").html(data);                      
                   }); 
                   
                   $(this).prop("type","hidden");
                   $(this).parents("tr").find(".row_depa").append(campo);
                   
               });
             
          });
          
          $(".delete-depa").click(function(){
              
              if(confirm("¿Esta seguro de eliminar este registro?"))
              {
                  var id_depa=$(this).parents("tr").find("input[name='id_campo_depa']").val(); 
                  $.post("<?= site_url("ciudades/cciudades/eliminar_departamento");?>",{id:id_depa},function(data){
                        
                        $("#bench").html(data);                      
                   });
                   $(this).parents("tr").fadeOut(500);
              }
//              bootbox.confirm("Are you sure?", function(result) {
//                bootbox.alert("Confirm result: "+result);
//              }); 
          });
    } );

</script>

<?php 
    $form_depa=array("name"=>"form_depa","id"=>"form_depa");
    echo form_open("ciudades/cciudades/guardar_departamento",$form_depa);?>    
<div class="row form-group">
    <label class="col-md-2" for="departamento">Departamento</label>
    <div class="col-md-2">
        <input type="text" class="form-control input-sm"  name="departamento" id="departamento" placeholder="Departamento" required="">
        <input type="hidden" name="id_departamento" id="id_departamento"/>
    </div>
    <div class="col-md-1">
        <input type="submit" value="Guardar" class="btn btn-success btn-xs">
    </div>
    <div class="col-md-2 label label-warning" id="error_departamento"></div>
</div>
<?php echo form_close();?>
<hr>
<div id="caja_grillas" class="">

        <table class="table table-striped table-condensed table-bordered table-hover" id="tabla_departamento">
            <thead class="alert-success">
                    <th class="text-center" >N°</th>
                    <th class="text-center" >Departamento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
            </thead>
            <tbody id="grid_depa">
                <?php 

                 foreach ($departamento as $rowdepartamento)
                    {

                 ?>
                <tr class="text-center">
                    <td><?= $rowdepartamento->iddepartamento;?>
                        <input type="hidden" name="id_campo_depa" class="id_campo_depa" value="<?= $rowdepartamento->iddepartamento;?>">
                    </td>
                    <td class="row_depa"><?= $rowdepartamento->departamento;?>
                        <input type="hidden" name="campo_depa" class="input-sm campo_depa" value="<?= $rowdepartamento->departamento;?>">
                    </td>
                    <td><span class="glyphicon glyphicon-edit edit_depa" data-depa="<?= $rowdepartamento->iddepartamento;?>"></span></td>
                    <td><span class="glyphicon glyphicon-trash delete-depa" onclick=""></span></td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>

</div>   

