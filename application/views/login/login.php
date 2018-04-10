<?php 
$this->load->view('layout/header');
$this->load->helper('form');
?>

<div class="container" >
    <div class="row well-lg">
        
    </div>
    <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-primary" id="">
                    <div class="panel-heading">
                        <span class="icon-lock"></span>  Acceder al Sistema
                    </div>
                    <div class="panel-body">
                        
                        
                        <?php 
						$atribform=array('class'=>'form-horizontal','role'=>'form');
						echo form_open('login/clogin/login',$atribform);
						?>
                       <!-- <form class="form-horizontal" role="form">-->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">
                                Usuario</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="usuario" placeholder="usuario" required autofocus="autofocus" name="usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">
                                Contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="contraseña" required name="contrasena">
                            </div>
                        </div>
                      
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Aceptar</button>
                                     <button type="reset" class="btn btn-danger btn-sm">
                                    Cancelar</button>
                            </div>
                        </div>
                       <!-- </form>-->
                       <?php echo form_close();?>
                    </div>
                    <div class="panel-footer">
                        
                        <?php 
                            if(isset($error) and !empty($error)){
                                echo "<center><div class='label label-danger'>".$error."</div></center>";
                            }else
                                echo "Iniciar Sesión";
                            ?>
                        
                    </div>
                </div>
            </div>
    </div>

</div>

<?php $this->load->view('layout/footer');?>