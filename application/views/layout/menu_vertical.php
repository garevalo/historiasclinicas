
            <div class="accordion-style1 panel-group " id="accordion">
                <div class="panel panel-default" >
                    <div class="panel-heading" >
                        <h4 class="panel-title" >
                            <a id="cabecera_acordion" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-open" data-icon-show="glyphicon glyphicon-folder-close" data-icon-hide="glyphicon glyphicon-folder-open">
                            </span>Historia Clínica</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="menuv">
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <?php if($this->session->userdata('tipo_usuario')==1 or $this->session->userdata('tipo_usuario')==3){ ?>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-file"></span>
                                             <?php echo anchor('paciente/cpaciente/nuevo_paciente', 'Registrar Nuevo Paciente');?> 
                                            
                                        </td>
                                    </tr>
                                        <?php }
                                        if($this->session->userdata('tipo_usuario')==1 or $this->session->userdata('tipo_usuario')==3){
                                        ?>
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-search"></span>
                                            <?php echo anchor('paciente/cpaciente/buscar_paciente', 'Buscar Paciente');?> 
                                        </td>
                                    </tr>
                                     <?php }
                                     if($this->session->userdata('tipo_usuario')==1 or $this->session->userdata('tipo_usuario')==4){
                                     ?>
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-file"></span>
                                            <?php echo anchor('historias/ctriaje', 'Triaje');?> 
                                        </td>
                                    </tr> 
                                    <?php } 
                                    if($this->session->userdata('tipo_usuario')==1 or $this->session->userdata('tipo_usuario')==2){
                                    ?>
                                    <tr>
                                        <td>
                                            <span class="glyphicon  glyphicon-list-alt"></span>
                                            <?php echo anchor('historias/cconsulta', 'Consulta');?> 
                                        </td>
                                    </tr>
                                     <?php } ?>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php 
                if($this->session->userdata('tipo_usuario')==1 ){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a id="cabecera_acordion" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-time">
                            </span>Horarios</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="menuv">
                            
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-pencil text-success"></span>
                                            <?php 
                                            
                                            echo anchor(site_url("horario/chorario/horario"), 'Asignar Turnos', '');
                                            ?>
                                        </td>
                                    </tr>
                                    
                                    
                                </table>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a id="cabecera_acordion" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>Mantenimiento</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="menuv">
                            
                            <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        
                                        <span class="glyphicon glyphicon-user"></span><?php 
                                        $atributos=array("title"=>"Registro de Personal","data-toggle"=>"tooltip","data-placement"=>"left");
                                        echo anchor('personas/cpersonal_medico/registro_personal','Registro de Personal',$atributos);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user"></span>
                                         <?= anchor("ciudades/cciudades","Ciudades","");?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user"></span>
                                        <?= anchor("enfermedad/cenfermedad","Enfermedades","");?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user"></span>
                                        <?php echo anchor('especialidad/cespecialidad', 'Especialidades');?> 
                                    </td>
                                </tr>
                               
                            </table>
                        </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a id="cabecera_acordion" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#reportes"><span class="glyphicon glyphicon-file">
                            </span>Reportes</a>
                        </h4>
                    </div>
                    <div id="reportes" class="panel-collapse collapse">
                        <div class="menuv">
                            
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-pencil text-success"></span>
                                            <?php 
                                            
                                            echo anchor("reporte/creporte/form_citas_registradas", 'Citas Registradas', '');
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-file text-success"></span>
                                            <?php 
                                            
                                            echo anchor("reporte/creporte/form_pacientes_registrados", 'Pacientes Registrados', '');
                                            ?>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                <?php }?>
            </div>
