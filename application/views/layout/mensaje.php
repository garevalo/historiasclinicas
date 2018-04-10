


<?php 
if( isset($mensaje_ok) and !empty($mensaje_ok)){
?>
 <script type="text/javascript">
   alert('<?= $mensaje_ok ;?>');
</script>

<?php

$dir='/paciente/cpaciente/nuevo_paciente';
/*    if(isset($dir)){
    
        redirect($dir, 'refresh');
    }
*/
redirect($dir, 'refresh');
}

?>