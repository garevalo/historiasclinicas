    $(document).ready( function () {
        var i=1;
     
                                         
   $(".nuevos_campos").live("click",function(){
       
      
       
       var diagnostico='<div id="nuevo_diagnostico" ><hr>\n\
                        <div  class="form-group clase_diagnostico" >\n\
                            <label class="col-md-2">Diagnostico</label>\n\
                            <div class="col-md-4">\n\
                                <input type="text" name="enfermedad[]" id="enfermedad" value="" placeholder="enfermedad" class="input-sm form-control enfermedad">\n\
                            </div>\n\
                            <div class="col-md-2">\n\
                                <input type="text" name="cie[]" id="cie" value="" placeholder="CIE10" class="input-sm form-control cie">\n\
                            </div>\n\
                            <div class="col-md-2">\n\
                            </div>\n\
                            <div class="col-md-1">\n\
                                <span class="glyphicon glyphicon-minus-sign text-danger quitar" id=""></span> \n\
                            </div>\n\
                        </div>\n\
                        <div id="campos_tratamiento" data-cod="'+i+'">\n\
                            <div class="form-group">\n\
                                    <label class="col-md-2">Tratamiento</label>\n\
                                    <div class="col-md-8">\n\
                                         <textarea name="tratamiento[]" id="dosis" placeholder="tratamiento'+i+'" class="form-control"></textarea>\n\
                                    </div>\n\
                                    <div class="col-md-2">\n\
                                       <span class="glyphicon glyphicon-plus" id="agregar_tratamiento" ></span>\n\
                                    </div>\n\
                            </div>\n\
                        </div>\n\
                      </div>';
       
              
              $("#div_agregar").append(diagnostico);
              //alert(i);
              i++;
          });
          
          $(".quitar").live("click",function(){
              
              $(this).parents("#nuevo_diagnostico").remove();
          });
		  
	  $("#agregar_tratamiento").live("click",function(){
              
               if(i===0)
                  i="";
                var y= $(this).parents("#campos_tratamiento").data("cod");
                
//                if(y===0)
//                    y="";
                var tratamiento='<div class="form-group">\n\
                   <div class="col-md-2"></div>\n\
                   <div class="col-md-8">\n\
                        <textarea name="tratamiento'+y+'[]" id="dosis" placeholder="tratamiento'+y+'" class="form-control"></textarea>\n\
                   </div>\n\
                   <div class="col-md-2">\n\
                      <span class="glyphicon glyphicon-minus-sign quitar_tratamiento" id=""></span>\n\
                   </div>\n\
               </div>';
		$(this).parents("#campos_tratamiento").append(tratamiento);
//                var x =$(this).parents(".clase_diagnostico").data("cod");
//                var parentEls = $( this ).parents()
//                .map(function() {
//                  return this.className ;
//                })
//                .get()
//                .join( ", " );
             // $( "b" ).append( "<strong>" + parentEls + "</strong>" );
//
//                alert(parentEls+'-'+y);
//                y++;
          });
          
           $(".quitar_tratamiento").live("click",function(){
              
                $(this).parents(".form-group").remove();
            // alert("hola");
          });
		  
//          $( "body" ).on( "click", ".quitar", function() {
//           // $( this ).after( "<p>Another paragraph! " + (++count) + "</p>" );
//           alert("holsd0");
//          });
          
          
    } );
    