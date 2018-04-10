<script type="text/javascript">

   
    function guardar_provincia(){
        
        
    }
    
    function guardar_distrito(){
        
        
    }

</script>

<div class="tabbable">
    <ul class="nav nav-tabs" id="myTab">
            <li class="active">
                    <a data-toggle="tab" href="#tab-departamento">
                            <i class="green glyphicon glyphicon-cog "></i>
                            Departamento 
                    </a>
            </li>

            <li>
                    <a data-toggle="tab" href="#tab-provincia">
                            <i class="green  glyphicon glyphicon-cog "></i>
                            Provincia
                    </a>
            </li>
            <li>
                    <a data-toggle="tab" href="#tab-distrito">
                            <i class="green glyphicon glyphicon-cog"></i>
                            Distrito
                    </a>
            </li>

    </ul>

    <div class="tab-content">
            <div id="tab-departamento" class="tab-pane in active">
                
                <?php $this->load->view("ciudades/departamento.php"); ?>
            </div>

            <div id="tab-provincia" class="tab-pane">

                <?php $this->load->view("ciudades/provincia.php"); ?>
            </div>
            
            <div id="tab-distrito" class="tab-pane">

                <?php $this->load->view("ciudades/distrito.php"); ?>
            </div>

    </div>
</div>
<div id="bench"></div>






