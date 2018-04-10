
<?php 
    $atributos=array('class'=>'form-horizontal','role'=>'form','id'=>'frm-historia');
    echo form_open('personas/cpersonal_medico/actualizar_personal',$atributos);
 ?>
<fieldset>
    <legend class="">Datos Personales</legend>
<div class="row form-group">
    
    <div class="col-md-2">
        <input type="text" class="form-control input-sm"  name="dni" id="dni" placeholder="DNI" value="<?= $personal->dni;?>"> 
    </div>
</div>

<div class="row form-group">
    <div class="col-md-2">
        <input type="text" class="form-control input-sm" placeholder="Nombres" id="nombre" name="nombre" value="<?= $personal->nombres;?>">
    </div> 
    <div class="col-md-2">
        <input type="text" class="form-control input-sm" placeholder="Apellido Paterno" id="apellido_paterno" name="apellido_paterno" value="<?= $personal->apepaterno;?>">
    </div> 
    <div class="col-md-2">
        <input type="text" class="form-control input-sm" placeholder="Apellido Materno" id="apellido_materno" name="apellido_materno" value="<?= $personal->apematerno;?>">
    </div> 
   
</div>
<div class="row form-group">
    <div class="col-md-2 ">
        <input type="text" class="form-control input-sm date" placeholder="Fecha Nacimiento" id="fecha_nacimiento" name="fecha_nacimiento" required="" value="<?= $fecha_nacimiento;?>">
        
    </div>
    <div class="col-md-2">
        <select id="sexo" name="sexo" class="form-control input-sm">
            <option value="">Sexo</option>
            <?php 
            
            foreach ($sexo as $rowsexo) {
                if($personal->idsexo==$rowsexo->idsexo){ $selected='selected=""';}else {$selected='';}
            ?>
            
            <option value="<?= $rowsexo->idsexo;?>" <?= $selected;?> > <?= $rowsexo->nombre_sexo;?></option>
            <?php
            }
            ?>
        </select>
        
    </div>
    <div class="col-md-2 ">
        <input type="text" class="form-control input-sm" placeholder="teléfono" id="telefono" name="telefono" value="<?= $personal->telefono;?>">
        
    </div>    
    
</div>

<div class="row form-group">
    
    <div class="col-md-4">
        <input type="text" class="input-sm form-control" id="direccion" name="direccion" placeholder="Dirección" value="<?= $personal->domicilio;?>" required="">
    </div>
</div>
</fieldset>

<fieldset>
    <legend class="">Datos del Profesional</legend>
    
    <div class="row form-group">
        <div class="col-md-2">
            <?php  if($this->session->userdata('tipo_usuario')!=1 ){$habilitar="readonly=''";}else{$habilitar="";} ?>
            <select name="tipo_personal" name="tipo_personal" class="input-sm form-control" <?= $habilitar;?> >
                <option value="">Tipo de Personal</option>
                <?php 
                            foreach ($tipo_personal as $rowtipo_personal) {
                                if($personal->idtipopersonal==$rowtipo_personal->idtipopersonal){ $selected1='selected=""';}else {$selected1='';}
                ?>
                <option value="<?= $rowtipo_personal->idtipopersonal;?>" <?= $selected1;?> ><?= $rowtipo_personal->nombre_personal;?></option>
                <?php
                            }
                ?>
            </select>
            
        </div>        
        <div class="col-md-2">
            
            <input type="text" name="num_colegiatura" id="num_colegiatura" placeholder="numero colegiatura" class="input-sm form-control" value="<?= $personal->codigomedico;?>">
            
        </div>
    </div>
</fieldset>

<fieldset>
    <legend class="">Usuario</legend>
    
    <div class="row form-group">
        <div class="col-md-2">
            <input type="text" name="usuario" id="usuario" placeholder="Usurio" class="input-sm form-control" value="<?= $personal->usuario;?>">
        </div>
        <div class="col-md-2">
            <input type="password" name="contrasena" id="contrasena" placeholder="contraseña" class="input-sm form-control" value="<?= $personal->contrasena;?>">
        </div>
        <?php  if($this->session->userdata('tipo_usuario')==1 ){ ?>
        <div class="col-md-2">
            <select id="tipo_usuario" name="tipo_usurio" class="input-sm form-control">
                <option value="">Tipo de Usuario</option>
                <?php 
                            foreach ($tipo_usuario as $rowtipo_usuario) {
                            if($personal->idtipousuario==$rowtipo_usuario->idtipousuario){ $selected3='selected=""';}else {$selected3='';}
                ?>
                <option value="<?= $rowtipo_usuario->idtipousuario;?>" <?= $selected3;?> ><?= $rowtipo_usuario->tipousuario;?></option>
                <?php
                            }
                ?>
            </select>
        </div>
        
        <div class="col-md-2">
            <select name="estado_usuario" name="estado_usuario" class="input-sm form-control">
                <option value="">Estado de Usuario</option>
                <?php 
                            foreach ($estado as $rowtipo_estado) {
                            if($personal->idestadousuario==$rowtipo_estado->idestadousuario){ $selected4='selected=""';}else {$selected4='';}
                ?>
                <option value="<?= $rowtipo_estado->idestadousuario;?>" <?= $selected4;?> ><?= $rowtipo_estado->estado;?></option>
                <?php
                            }
                ?>
            </select>
        </div> 
        <?php }?>
    </div>
</fieldset>

<br>
<br>
<div class="row form-group">
    
    <div class="col-md-2">
        <input type="hidden" name="idpersonal" name="idpersonal"  value="<?= $this->uri->segment(4);?>">
        <input type="hidden" id="id_tipo_usuario" name="id_tipo_usuario"  value="<?= $this->session->userdata('tipo_usuario');?>">
        <input type="submit" value="Guardar" class="btn btn-success btn-block btn-sm">
    </div>
    <div class="col-md-2">
        <input type="button" value="Cancelar" class="btn btn-danger btn-block btn-sm">
    </div>    
    
    
</div>


<?php echo form_close(); 