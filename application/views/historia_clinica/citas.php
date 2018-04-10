
<script type="text/javascript">
    
    $(document).ready( function () {
	//var table = $('#tabla').DataTable();
            $('#tabla').dataTable({
             "aaSorting": [[ 0, "desc" ]] 
            } );
    } );
</script>

<?php 

if(isset($alerta)){
            echo "<script type='text/javascript'>
                bootbox.alert('$alerta');
            </script>";
}
//print_r($citas);

$atributos=array('class'=>'form-horizontal','role'=>'form','id'=>'frm-cita');
 echo form_open('historias/ccitas/guardar_cita',$atributos);?> 

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-4"><strong>Número de Historia</strong></label>  
      <div class="col-md-6">
          <input type="text" name="num_historia" id="num_historia" readonly="" value="<?= $numero_historia;?>" class="form-control input-sm">
      </div>
    </div>
    <div class="row form-group">
        <label class="col-md-4"><strong>Especialidad</strong></label>
        <div class="col-md-6">
                                                                                                                           
            <select id="especialidad" name="especialidad" required="" class="input-sm form-control" onchange="cargar_select('<?= site_url("personas/cpersonal_medico/get_medico_especialidad") ;?>',$('#especialidad').val(),'medico','');">
              <option value="">Especialidad</option>
              <?php 
              foreach ($especialidad as $rowespecialidad) {
              ?>
              <option value="<?= $rowespecialidad->idtipopersonal;?>"><?= $rowespecialidad->nombre_personal;?></option>
              
              <?php
    
              }
              ?>
              
          </select>
        </div>
    </div>
<!--    <div class="row form-group">
        <label class="col-md-4"><strong>Médicos</strong></label>  
        <div class="col-md-6" id="colmedico">
          
            <select id="medico" name="medico"  class="input-sm form-control">
              <option value="">Médicos</option>
              <?php 
              foreach ($medicos as $rowmedico) {
              ?>
              <option value="<?= $rowmedico->idpersonal;?>"><?= $rowmedico->nombre;?></option>
              
              <?php
    
              }
              ?>
              
          </select>
      </div>
    </div>-->
</div>
<div class="col-md-6">
    <div class="row">
      <div class="col-md-3">
          <input type="submit" value="Cita" name="cita" id="cita" class="btn btn-success btn-block btn-sm"  >
      </div>
    </div>      
</div>

    
<?php echo form_close(); ?>




<!--   <div class="panel panel-primary widget-box">
      
      <div class="panel-heading">Citas registradas</div>

       

   </div>    -->
<div class="col-md-12"><hr></div>    
<div class="col-xs-12 col-sm-12 widget-container-span ui-sortable">
        <div class="widget-box" style="opacity: 1; z-index: 0;">
                <div class="widget-header header-color-green">
                        <h5 class="bigger lighter">
                                <i class="icon-table"></i>
                                Registro de Citas
                        </h5>

                </div>

                <div class="widget-body">
                        <div class="widget-main no-padding">
<!--                                                 class="table table-striped table-condensed table-bordered table-hover"   -->
                                   <table class="table table-bordered table-condensed table-striped table-hover" id="tabla">
                                        <thead class="thin-border-bottom">
                                           
                                                <td align="center">Numero Cita</td>
                                                <td align="center">Numero Historia</td>
                                                <td align="center">Paciente</td>
                                                <td align="center">Especialidad</td>
<!--                                                <td>Encargado</td>-->
                                                <td align="center">Fecha/Hora Registro</td>
                                                <td align="center">Estado Cita</td>
                                                
                                            
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
                                                <tr class="text-center">
                                                    <td><?= $rowcitas->idcitas; ?></td>
                                                    <td><?= $rowcitas->numero_historia; ?></td>
                                                    <td><?= $rowcitas->nombre_paciente;?></td>
                                                    <td><?= $rowcitas->nombre_personal;?></td>
<!--                                                    <td><?= $rowcitas->nombre_medico;?></td>-->
                                                    <td><?= $rowcitas->inicio;?></td>
                                                    <td><?= $estado_cita;?></td>
                                                </tr>

                                                <?php
                                                    }
                                                ?>
                                        </tbody>

                                    </table>
                        </div>
                </div>
        </div>
</div>
    
