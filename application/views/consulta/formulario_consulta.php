
<div class="container-fluid">
   
    <h3 class="alert alert-info"> Paciente :  <?php echo $cita->nombre_paciente;?></h3>
</div>
<div class="tabbable">
    <ul class="nav nav-tabs" id="myTab">
            <li class="active">
                    <a data-toggle="tab" href="#consulta">
                            <i class="green icon-home bigger-110 "></i>
                            Consulta 
                    </a>
            </li>

            <li>
                    <a data-toggle="tab" href="#antecedentes">
                            <i class="green icon-home bigger-110"></i>
                            Antecedentes
                    </a>
            </li>


    </ul>

    <div class="tab-content">
            <div id="consulta" class="tab-pane in active">
                
                <?php $this->load->view("consulta/consulta.php"); ?>
            </div>

            <div id="antecedentes" class="tab-pane">

                <?php $this->load->view("consulta/antecendentes.php"); ?>
            </div>


    </div>
</div>
