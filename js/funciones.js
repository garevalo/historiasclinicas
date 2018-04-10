// :::: ::::::: /
 $(function(){
			$(".date").datepicker({
				dateFormat: "dd/mm/yy",
				changeMonth: true,
				changeYear: true ,
				monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiebre", "Octubre", "Noviembre", "Diciembre" ],
				monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
				dayNamesMin: [ "Do", "Lu", "Ma", "Mie", "Jue", "Vie", "Sa" ]
			});
                        
                        

 }); 
  

function contador_input(form){
    
     var cont=0;
        $(form).find(':input').each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();  
            if (type === 'text' || type === 'password' || tag === 'textarea' || type === 'date' || tag==='select')
           {
              if(this.value ===''){
               cont++;
              }
            }
    
        });
        return cont;
}

   
function cargar_select(direccion,id,cargar,limpiar){
    var base_url=$("#base_url").val();
    $('#'+cargar).html("<option value=''>CARGANDO...</option>");   
    
    $.post(direccion,{id:id},function(data){

         $('#'+cargar).html(data);
         $('#'+limpiar).html("<option value=''>"+limpiar+"</option>");
    });

}


function modal(titulo,dir){

    $( "#ventana" ).dialog({
            modal: true,
            width: 300,
            title: titulo,
            show: {
            effect: "scale",
            duration: 200
            },
            hide: {
            effect: "scale",
            duration: 200
            },

            position: { my: "center top", at: "center top", of: "#contenidocentro" },
 
            open: function(){

                $("#ventana").load(dir,function(){});
                
            }                   
        });
   
}


function ventana_modal(pariente,dir,input){

    $( "#ventana" ).dialog({
            modal: true,
            width: 300,
            title: pariente,
            show: {
            effect: "scale",
            duration: 200
            },
            hide: {
            effect: "scale",
            duration: 200
            },

            position: { my: "center top", at: "center top", of: "#contenidocentro" },
 
            open: function(){
            
                 $.post(dir,{pariente:pariente},                    
                    function(data){
                     $("#ventana").html(data);
                    
                });
            }                   
        });
   $("#comodin").val(input);
}

function registrar_ajax(dir,formulario){
   
        var cont = contador_input("#"+formulario);
        var datos=$("#"+formulario).serialize();
        var padre;
        if(cont===0){
            
           $.post(dir,datos,function(data, status){
             if(status === 'success'){
                 
                 var comodin=$("#comodin").val();
                 
                 padre=$("#nombre_pariente").val()+' '+$("#ape_paterno_pariente").val()+' '+$("#ape_materno_pariente").val();
                 
                 $("#"+comodin).val(padre);
                 $("#"+comodin).attr("readonly","");

                   var datosreturn=jQuery.parseJSON(data); 
                  if(datosreturn.idpersona > 0){
                      
                      if(datosreturn.idpersona > 0){ 

                        $("#id_"+comodin).val(datosreturn.idpersona);
                   }
                  } 
                   

                 cerrar_ventana();
             }else{
                 alert('error:'+data);
             }

         });

            event.preventDefault();
             
        } 
}



function registro_ajax(dir,formulario,dir2){
   
        var cont = contador_input("#"+formulario);
        var datos=$("#"+formulario).serialize();
      
        if(cont===0){
            
           $.post(dir,datos,function(data, status){
             if(status === 'success'){
               
               if(dir2){
                  //$("#ocupacion").load(dir2,function(){}) ; 
                  $.post(dir2,function(data){
                      $("#ocupacion").append(data);
                  });
               }
              
                   cerrar_ventana();
             }else{
                 alert('error:'+data);
             }

         });

            event.preventDefault();
             
        } 
}



function cerrar_ventana(){
    $( "#ventana"  ).dialog( "close" );
}


function buscardor(baseurl){
    var  tipbusc =  $( "input:radio[name=radiob]:checked" ).val();
 // var  tipbusc=$("input:checked").val();
       
        if(tipbusc !== undefined){
            
             var valor=$("#buscagrilla").val(); 
        //alert(valor);
         $.post(baseurl,{tipo:tipbusc,buscar:valor},function(data){
               
              $("#grid_pacientes").html(data);
               
           });
          
         }
   
}