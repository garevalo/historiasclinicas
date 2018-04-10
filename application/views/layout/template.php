        <?php
       if(!$this->session->userdata('usuario')) redirect ('login/clogin');
       ?>

<div class="main-container" id="main-container">
	<div class="navbar-container" id="navbar-container" >
		
            <?php $this->load->view("layout/menu_horizontal");?>
            
	</div>
	<div class="clearfix" id="contenidocentro">
		<div class="sidebar sidebar-fixed" id="sidebar">
			
                    <?php $this->load->view("layout/menu_vertical");?>
		</div>
            
            
		<div class="main-content">
<!--                  <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                                <li>
                                        <i class="icon-home home-icon"></i>
                                        <a href="#">Inicio</a>
                                </li>

                                <li class="active">
                                        <a href="#"><?= $titulopanel?></a>
                                </li>
                                <li class="active">Elements</li>
                        </ul> .breadcrumb 

                        <div class="nav-search" id="nav-search">
                                <form class="form-search">
                                        <span class="input-icon">
                                                <input type="text" placeholder="Buscar ..." class="nav-search-input" id="nav-search-input" autocomplete="on">
                                                <i class="icon-search nav-search-icon"></i>
                                        </span>
                                </form>
                        </div> #nav-search 
		    </div>-->
                    <div class="page-content" id="contenedor_principal">
                        
                        <div id="contenido" class="panel panel-primary">
                          <div class="panel-heading">
                              <h2 class="panel-title"><?= $titulopanel?></h2>
                          </div>
                          <div class="panel-body">
                            <?php $this->load->view($contenido);?>
                              
                          </div>
                    
                        </div> 
                        
                    </div>
       
		</div>
		
	</div>
</div>



<!-- ventana -->
<div id="ventana" class="">
    
    
</div>
