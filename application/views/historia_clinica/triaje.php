
<script type="text/javascript">
    
    $(document).ready( function () {
	//var table = $('#tabla').DataTable();
            $('#tabla').dataTable({
             "aaSorting": [[ 0, "desc" ]] 
            } );
    } );
</script>

<div class="col-md-12 widget-container-span ui-sortable">
<!--        <div class="widget-box" style="opacity: 1; z-index: 0;">
                <div class="widget-header header-color-green">
                        <h5 class="bigger lighter">
                                <i class="icon-table"></i>
                                Registro de Citas
                        </h5>

                </div>

                <div class="widget-body">
                        <div class="widget-main no-padding">-->
<!--                                                 class="table table-striped table-condensed table-bordered table-hover"   -->
                                   <table class="table table-bordered table-condensed table-striped table-hover" id="tabla">
                                        <thead class="thin-border-bottom">
                                           
                                                <td>Numero Cita</td>
                                                <td>Numero Historia</td>
                                                <td>Paciente</td>
                                                <td>Especialidad</td>
                                                <td>Encargado</td>
                                                <td>Fecha/Hora Registro</td>
                                                <td>Estado Cita</td>
                                          
                                        </thead>
                                        <tbody>
                                                                                    
                                                <?php 
                                                        
                                                 foreach ($citas as $rowcitas)
                                                    {
                                                     
                                                     if($rowcitas->idestado_cita=="1"){
                                                         $estado_cita= "<span class='label label-lg label-warning arrowed-right'>$rowcitas->estado_cita</span>";
                                                         
                                                     }
                                                     else if($rowcitas->idestado_cita=="2"){
                                                         $estado_cita= "<span class='label label-lg label-info arrowed-right'>$rowcitas->estado_cita</span>";
                                                     }
                                                     else if($rowcitas->idestado_cita=="3"){
                                                         $estado_cita= "<span class='label label-lg label-success arrowed-right'>$rowcitas->estado_cita</span>";
                                                     }
                                                   

                                                 ?>
                                                <tr class="text-center" ondblclick ="">
                                                    <td><?= anchor(site_url("historias/ctriaje/form_triaje/".$rowcitas->idcitas),"<span class='label label-lg label-success'>".$rowcitas->idcitas."</span>",''); ?></td>
                                                    <td><?= $rowcitas->numero_historia; ?></td>
                                                    <td><?= $rowcitas->nombre_paciente;?></td>
                                                    <td><?= $rowcitas->nombre_personal;?></td>
                                                    <td><?= $rowcitas->nombre_medico;?></td>
                                                    <td><?= $rowcitas->inicio;?></td>
                                                    <td><?= $estado_cita;?></td>
                                                </tr>

                                                <?php
                                                    }""
                                                ?>
                                        </tbody>

                                    </table>
<!--                        </div>
                </div>
        </div>-->
</div>