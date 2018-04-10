<script type="text/javascript">
    
    $(document).ready( function () {
	var table = $('#example').DataTable();
        
        
//        $(".delete").click(function(){
//        
//           bootbox.confirm("Are you sure?", function(result) {
//            Example.show("Confirm result: "+result);
//          }); 
//        });
       
    });
 
    
    
    
</script>
<div>
    
    <?php
    $atributos=array("title"=>"Nuevo Personal", "class"=>"btn btn-success btn-sm");
    echo anchor("enfermedad/cenfermedad/form_nueva_enfermedad","Nueva Enfermedad",$atributos);?>
</div>

<hr>
<div id="caja_grillas" class="">

        <table class="table table-striped table-condensed table-bordered table-hover" id="example">
            <thead class="alert-success">
                    <th class="text-center" ></th>
                    <th class="text-center" >Enfermedad</th>
                    <th class="text-center" >CIE10</th>
                    <th class="text-center" >Editar</th>
                    <th class="text-center" >Eliminar</th>
                                        
            </thead>
            <tbody id="">
                <?php 
                  $i=0;   
                  foreach ($enfermedades as $rowenfermedad)
                    {
                     $i++;
                 ?>
                <tr class="text-center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rowenfermedad->nombre_enfermedad;?></td>
                    <td><?php echo $rowenfermedad->cie10;?></td>
                    <td><?= anchor("enfermedad/cenfermedad/form_editar_enfermedad/".$rowenfermedad->idcie,"<span class='glyphicon glyphicon-edit'></span>","");?></td>
                    <?php $delete=array("id"=>"eliminar","onclick"=>"return confirm('¿Está seguro de eliminar este registro?')");?>
                    <td><?= anchor("enfermedad/cenfermedad/eliminar_cie/".$rowenfermedad->idcie,"<span class='glyphicon glyphicon-trash'></span>",$delete);?> </td>
<!--                    <td><button type="button" class="delete" id="">Eliminar</button></td>               -->
                </tr>

                <?php
                   
                    }
                ?>

            </tbody>
        </table>

</div>
