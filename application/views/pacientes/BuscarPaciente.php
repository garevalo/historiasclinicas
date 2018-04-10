
<script type="text/javascript">
    
    $(document).ready( function () {
	
         $('#example').dataTable({
            bAutoWidth: false,
            "order": [[ 0, "desc" ]],
            "processing": true,
            "serverSide": true,
            ajax:{
                url : "<?= site_url('paciente/cpaciente/datapacientes')?>",
                type: "POST",
                dataSrc: 'data'
            },
            columns:[
                {data:"numero_historia"},
                {
                    data:"nombres",
                    render:function(data, type, row){
                        console.log(row);
                        return data+' '+row.apepaterno+' '+row.apematerno;
                    }
                } ,
                {data:"dni"},              
                {data:"domicilio"},
                {
                    data:null,
                    render:function(data, type, row){
                        return '<a href="<?= site_url('historias/chistoria/imprimir_historia') ?>/'+row.numero_historia+'" title="Imprimir Historia" target="_blank"><span class="glyphicon glyphicon-list-alt"></span></a>';
                    }
                },
                {
                    data:null,
                    render:function(data, type, row){
                        return '<a href="<?= site_url('paciente/cpaciente/frm_editar_paciente')?>/'+row.numero_historia+'"><span class="glyphicon glyphicon-edit"></span></a>';
                    }
                } ,
                {
                    data:null,
                    render:function(data, type, row){
                        return '<a href="<?= site_url('historias/ccitas/sacar_cita')?>/'+row.numero_historia+'"><span class="glyphicon glyphicon-folder-open"></span></a>';
                    }
                } 
            ] 
         } );
    } );
</script>

<div id="buscador" class="">   
   <?php 
    echo anchor("reporte/creporte/form_citas_registradas","Citas Registradas");
    echo " || ";
    echo anchor("reporte/creporte/form_pacientes_registrados","Pacientes Registrados");
   ?>
</div>

<div id="caja_grillas" class="">

        <table class="table table-striped table-condensed table-bordered table-hover" id="example">
            <thead class="">
                    <th class="text-center" >Num. Historia</th>
                    <th class="text-center" >Nombres</th>
                    <th class="text-center" >DNI</th>

                    <th class="text-center" >Domicilio</th>
<!--                    <th class="text-center" >Editar</th>-->
                    <th class="text-center" >Ver Historia</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center" >Cita</th>
                   
            </thead>

        </table>
    <?php  $this->output->enable_profiler(false);?>
    
</div>

<div>
   
</div>