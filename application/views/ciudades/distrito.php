<script type="text/javascript">
    
    $(document).ready( function () {
	        
        $('#tabla_distrito').dataTable({
             "aaSorting": [[ 0, "desc" ]] 
         } );
         
          $( "#form_distrito" ).submit(function( event ) {
             var formdata=$("#form_distrito").serialize();
             var dir=$(this).prop("action");
               $.post(dir,formdata,function(data){
                   var datos=jQuery.parseJSON(data); 
                   
                   $("#error_distrito").text( datos.error ).show().fadeOut( 5000 );
                   $("#tab-distrito").html(datos.tabla);
                   $("#bench").html(datos.det);
               });
                event.preventDefault();
          });
          
          $(".edit_distrito").click(function(){

               var id_dist=$(this).parents("tr").find("input[name='id_campo_distrito']").val(); 
               $(this).parents("tr").find(".row_distrito").html(
                   $(this).parents("tr").find(".campo_distrito").prop("type","text")
               );
               $(this).parents("tr").find("input[name='campo_distrito']").focus();

               $(this).parents("tr").find(".campo_distrito").focusout(function(){
                   var campo =$(this).val();
                   
                   $.post("<?= site_url("ciudades/cciudades/editar_distrito");?>",{iddist:id_dist,dist:campo},function(data){
                        $("#bench").html(data);                      
                   }); 
                   
                   $(this).prop("type","hidden");
                   $(this).parents("tr").find(".row_distrito").append(campo);
                   
               });
             
          });
          
          $(".delete-distrito").click(function(){
              
              if(confirm("¿Esta seguro de eliminar este registro?"))
              {
                  var id_dist=$(this).parents("tr").find("input[name='id_campo_distrito']").val(); 
                  $.post("<?= site_url("ciudades/cciudades/eliminar_distrito");?>",{id:id_dist},function(data){
                        
                        $("#bench").html(data);                      
                   });
                   $(this).parents("tr").fadeOut(500);
              }

          });
        
    } );
</script>

<?php 
    $form_distrito=array("id"=>"form_distrito","name"=>"form_distrito");
   echo form_open("ciudades/cciudades/guardar_distrito",$form_distrito);
?>
<div class="row form-group">
    <label class="col-md-2" for="departamento">Departamento</label>
    <div class="col-md-2">
        <select class="form-control input-sm"  name="departamento_dis" id="departamento_dis" placeholder="Departamento" required=""  onchange="cargar_select('<?= site_url("paciente/cpaciente/cargar_provincia");?>',$('#departamento_dis').val(),'provincia_dis','');" >
            <option value="">Departamento</option>
            <?php 
            foreach ($departamento as $value) {
            ?>
            
            <option value="<?= $value->iddepartamento;?>"><?= $value->departamento;?></option>
            <?php
            }
            ?>
            
        </select>
    </div>

</div>
<div class="row form-group">
    <label class="col-md-2" for="provincia">Provincia</label>
    <div class="col-md-2">
      
        <select class="form-control input-sm"  name="provincia_dis" id="provincia_dis"  required="">
            <option value="">Provincia</option>
            <?php 
            foreach ($provincia as $rowprovincia) {
            ?>
            
            <option value="<?= $rowprovincia->idprovincia;?>" <?php echo set_select('provincia', $rowprovincia->idprovincia); ?> ><?= $rowprovincia->provincia;?></option>
            <?php
            }
            ?>
            
        </select>
    </div>
    
</div>
<div class="row form-group">
    <label class="col-md-2" for="distrito">Distrito</label>
    <div class="col-md-2">
        <input type="text" class="form-control input-sm"  name="distrito" id="distrito" placeholder="Distrito" required="">
        <input type="hidden" name="id_distrito" id="id_distrito"/>
    </div>
    <div class="col-md-2">
        <input type="submit" value="Guardar" class="btn btn-success btn-xs">
        
    </div>
    <label class="col-md-2 label label-warning" id="error_distrito"></label>
</div>
<?= form_close();?>
<hr>
<div id="caja_grillas" class="">

        <table class="table table-striped table-condensed table-bordered table-hover" id="tabla_distrito">
            <thead class="alert-success">
                    <th class="text-center" >Num.</th>
                    <th class="text-center">Distrito</th>
                    <th class="text-center">Provincia</th>
                    <th class="text-center" >Departamento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
            </thead>
            <tbody id="grid_pacientes">
                <?php 

                 foreach ($distrito as $rowdistrito)
                    {

                 ?>
                <tr class="text-center">
                    <td>
                        <?= $rowdistrito->iddistrito; ?>
                        <input type="hidden" name="id_campo_distrito" class="id_campo_distrito" value="<?= $rowdistrito->iddistrito;?>">
                    </td>
                    <td class="row_distrito">
                        <?= $rowdistrito->distrito;?>
                        <input type="hidden" name="campo_distrito" class="input-sm campo_distrito" value="<?= $rowdistrito->distrito;?>">
                    </td>
                    <td><?= $rowdistrito->provincia;?></td>
                    <td><?= $rowdistrito->departamento;?></td>
                    <td><span class="glyphicon glyphicon-edit edit_distrito" data-distrito="<?= $rowdistrito->iddistrito;?>"></span></td>
                    <td><span class="glyphicon glyphicon-trash delete-distrito"></span></td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>

</div>