<script type="text/javascript">
    
    $(document).ready( function () {
	
         $('#tabla_provincia').dataTable({
             "aaSorting": [[ 0, "desc" ]] 
         } );
        
        $("#form_provincia").submit(function(event){
            var distrito_data=$(this).serialize();
            $.post("<?=  site_url("ciudades/cciudades/guardar_provincia");?>",distrito_data,function(data,status){
                var datos=jQuery.parseJSON(data); 
                $("#error_provincia").text( datos.error ).show().fadeOut( 5000 );
                $("#tab-provincia").html(datos.tabla);

            });
            event.preventDefault();
        });
      
      $(".edit_prov").click(function(){

               var id_prov=$(this).parents("tr").find("input[name='id_campo_prov']").val(); 
               $(this).parents("tr").find(".row_prov").html(
                   $(this).parents("tr").find(".campo_prov").prop("type","text")
               );
               $(this).parents("tr").find("input[name='campo_prov']").focus();

               $(this).parents("tr").find(".campo_prov").focusout(function(){
                   var campo =$(this).val();
                   
                   $.post("<?= site_url("ciudades/cciudades/editar_provincia");?>",{idprov:id_prov,prov:campo},function(data){
                        $("#bench").html(data);                    
                   }); 

                   
                   $(this).prop("type","hidden");
                   $(this).parents("tr").find(".row_prov").append(campo);
                   
               });
             
          });
          
          $(".delete-prov").click(function(){
              
              if(confirm("¿Esta seguro de eliminar este registro?"))
              {
                  var id_prov=$(this).parents("tr").find("input[name='id_campo_prov']").val(); 
                  $.post("<?= site_url("ciudades/cciudades/eliminar_provincia");?>",{id:id_prov},function(data){
                        
                        $("#bench").html(data);                      
                   });
                   $(this).parents("tr").fadeOut(500);
              }

          });
      
      
      
    } );
</script>
<?php
    $form_provincia=array("id"=>"form_provincia","name"=>"form_provincia");
    echo form_open("ciudades/cciudades/",$form_provincia);
?>
<div class="row form-group">
    <label class="col-md-2" for="departamento">Departamento</label>
    <div class="col-md-2">
        <select class="form-control input-sm"  name="departamento" id="departamento" placeholder="Departamento" required="">
            <option>Departamento</option>
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
    <label class="col-md-2" for="provincia">Provinvia</label>
    <div class="col-md-2">
        <input type="text" class="form-control input-sm"  name="provincia" id="provincia" placeholder="Provincia" required=""> 
        <input type="hidden" name="id_provincia" id="id_provincia"/>
    </div>
    <div class="col-md-2">
        <input type="submit" value="Guardar" class="btn btn-success btn-xs">
    </div>
    <label class="col-md-2 label label-warning" id="error_provincia"></label>
    
</div>
<?= form_close();?>
<hr>
<div id="caja_grillas" class="">

        <table class="table table-striped table-condensed table-bordered table-hover" id="tabla_provincia">
            <thead class="alert-success">
                    <th class="text-center" >Num.</th>
                    <th class="text-center" >Provincia</th>
                    <th class="text-center" >Departamento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
            </thead>
            <tbody id="grid_pacientes">
                <?php 

                 foreach ($provincia as $rowprovincia)
                    {

                 ?>
                <tr class="text-center">
                    <td>
                     <?= $rowprovincia->idprovincia; ?>
                     <input type="hidden" name="id_campo_prov" class="id_campo_prov" value="<?= $rowprovincia->idprovincia;?>">   
                    </td>
                    <td class="row_prov">
                        <?= $rowprovincia->provincia;?>
                        <input type="hidden" name="campo_prov" class="input-sm campo_prov" value="<?= $rowprovincia->provincia;?>">
                    </td>
                    <td><?= $rowprovincia->departamento;?></td>
                    <td><span class="glyphicon glyphicon-edit edit_prov" data-prov="<?= $rowprovincia->idprovincia;?>"></span></td>
                    <td><span class="glyphicon glyphicon-trash delete-prov"></span></td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>

</div>
