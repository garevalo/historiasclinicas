<script type="text/javascript">
    
    $(document).ready( function () {
	var table = $('#example').DataTable();
    } );
</script>
<div>
    
    <?php
    $nuevo_personal=array("title"=>"Nuevo Personal", "class"=>"btn btn-success btn-sm");
    echo anchor("personas/cpersonal_medico/registrar_personal","Nuevo Personal",$nuevo_personal);?>
</div>

<hr>
<div id="caja_grillas" class="">

        <table class="table table-striped table-condensed table-bordered table-hover" id="example">
            <thead class="alert-success">
                    <th class="text-center" ></th>
                    <th class="text-center" >Nombres</th>
                    <th class="text-center" >DNI</th>

                    <th class="text-center" >Domicilio</th>
                    <th class="text-center" >Tipo de Usuario</th>
                    <th class="text-center" >Estado</th>
                    <th class="text-center" >Editar</th>
                                        
            </thead>
            <tbody id="grid_pacientes">
                <?php 
                  $i=0;   
                 foreach ($personal as $rowpersonal)
                    {
                     $i++;
                 ?>
                <tr class="text-center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rowpersonal->nombres.' '.$rowpersonal->apepaterno.' '.$rowpersonal->apematerno;?></td>
                    <td><?php echo $rowpersonal->dni;?></td>

                    <td><?php echo $rowpersonal->domicilio;?></td>
                    <td><?php echo $rowpersonal->tipousuario;?></td>
                    <td><?php echo $rowpersonal->estado;?></td>
                    <td><?= anchor("personas/cpersonal_medico/form_editar_personal/$rowpersonal->idpersonal","<span class='glyphicon glyphicon-edit'></span>","");?></td>
                                   
                </tr>

                <?php
                   
                    }
                ?>

            </tbody>
        </table>

</div>
