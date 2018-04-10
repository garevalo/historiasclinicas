<?php 

 foreach ($departamento as $rowdepartamento)
    {

 ?>
<tr class="text-center">
    <td><?= $rowdepartamento->iddepartamento;?></td>
    <td><?= $rowdepartamento->departamento;?></td>
    <td><span class="glyphicon glyphicon-edit"></span></td>
    <td><span class="glyphicon glyphicon-trash"></span></td>
</tr>

<?php
    }
?>