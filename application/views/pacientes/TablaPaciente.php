<?php 
                
             foreach ($paciente as $rowpaciente)
                {
                   
             ?>
            <tr class="text-center">
                <td><?= anchor('',$rowpaciente->numero_historia,''); ?></td>
                <td><?= $rowpaciente->nombres.' '.$rowpaciente->apepaterno.' '.$rowpaciente->apematerno;?></td>
                <td><?= $rowpaciente->dni;?></td>
                
                <td><?= $rowpaciente->domicilio;?></td>
                <td><span class="glyphicon glyphicon-edit"></span></td>
                <td><span class="glyphicon glyphicon-list-alt"></span></td>
                <td><span class="glyphicon glyphicon-folder-open"></span></td>
                <td><span class="glyphicon glyphicon-trash"></span></td>
            </tr>
            
            <?php
                }
            ?>