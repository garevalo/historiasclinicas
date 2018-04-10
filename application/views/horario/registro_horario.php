<link rel='stylesheet' type="text/css" href="<?php echo base_url()?>css/fullcalendar.css" >
<link href='<?php echo base_url()?>css/fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='<?php echo base_url()?>js/fullcalendar.min.js'></script>
<script>

	jQuery(function($) {

/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	
	var calendar = $('#calendar').fullCalendar({
		theme:true, 
                buttonText: {
			prev: '<i class="icon-chevron-left"></i>',
			next: '<i class="icon-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
                eventBackgroundColor: '#378006',
                monthNames:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'],        
                dayNamesShort:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
		events:  <?= $calendar;?>,
		editable: true,
                eventDrop: function(event, delta) {
                 start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                 end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                 $.ajax({
                 url: '<?php echo site_url("calendar/ccalendar/actualizar_evento")?>',
                 data: 'start='+ start +'&end='+ end +'&id='+ event.id ,
                 type: "POST",
                 success: function(json) {
                 alert('ok');
                 }
                 });
                },
                eventResize: function(event) {
                 start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                 end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                 $.ajax({
                 url: '<?php echo site_url("calendar/ccalendar/actualizar_evento")?>',
                 data: 'start='+ start +'&end='+ end +'&id='+ event.id ,
                 type: "POST",
                 success: function(json) {
                 alert('ok');
                 }
                 });

                },                
		droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
                        var $extraId = $(this).attr('id');
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                       
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
                        start = $.fullCalendar.formatDate(date, "yyyy-MM-dd HH:mm:ss");
			$.ajax({
                             url: '<?php echo site_url("calendar/ccalendar/agregar_evento")?>',
                             data: 'title='+ $extraId+'&start='+ start +'&end='+ '' ,
                             type: "POST",
                             success: function(json) {
                             bootbox.alert("Ok");
                             }
                        });
		},
		selectable: true,

		select: function(start, end, allDay) {
			
			bootbox.prompt("New Event Title:", function(title) {
				if (title !== null) {
                                         start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
                                         end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
                                         $.ajax({
                                         url: '<?php echo site_url("calendar/ccalendar/agregar_evento")?>',
                                         data: 'title='+ title+'&start='+ start +'&end='+ end ,
                                         type: "POST",
                                         success: function(json) {
                                         bootbox.alert('OK');
                                         }
                                         });

					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
			});
			

			calendar.fullCalendar('unselect');
			
		},
		eventClick: function(calEvent, jsEvent, view) {

			var form = $("<form class='form-inline'><label>Change event name &nbsp;</label></form>");
			form.append("<input class='middle' autocomplete=off type=text value='" + calEvent.title + "' /> ");
			form.append("<button type='submit' class='btn btn-sm btn-success'><i class='icon-ok'></i> Save</button>");
			
			var div = bootbox.dialog({
				message: form,
			
				buttons: {
					"delete" : {
						"label" : "<i class='icon-trash'></i> Delete Event",
						"className" : "btn-sm btn-danger",
						"callback": function() {
                                                        $.ajax({
                                                            url: '<?php echo site_url("calendar/ccalendar/eliminar_evento")?>',
                                                            data: '&id='+ calEvent.id ,
                                                            type: "POST",
                                                            success: function(json) {
                                                           bootbox.alert("Elimado Correctamente");
                                                            }
                                                        });
							calendar.fullCalendar('removeEvents' , function(ev){
								return (ev._id == calEvent._id);
							});
						}
					} ,
					"close" : {
						"label" : "<i class='icon-remove'></i> Close",
						"className" : "btn-sm"
					} 
				}

			});
			
			form.on('submit', function(){
                               /*   $.ajax({
                                    url: '<?php echo site_url("calendar/ccalendar/actualizar_evento")?>',
                                    data: 'title='+ calEvent.title+'&start='+ start +'&end='+ end +'&id='+ calEvent.id ,
                                    type: "POST",
                                    success: function(json) {
                                    alert("OK"+calEvent.id);
                                    }
                                 }); */
				calEvent.title = form.find("input[type=text]").val();

				calendar.fullCalendar('updateEvent', calEvent);
                                div.modal("hide");
                               
				return false;
			});
			
		
			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}
		
	});


});

</script>
<style>



</style>

<div class="row">
    
      <div class="col-md-3">
          
            <div class="widget-box transparent">
                    <div class="widget-header">
                        <h4 class="text-success">Médicos</h4><?= anchor("calendar/ccalendar/ver_calendar", "CLick", "");?>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <div id="external-events">
                                    <?php 
                                    foreach ($medicos as $rowmedico) {
                                    ?>
                                    
                                    <div class="external-event label-yellow ui-draggable" data-class="label-yellow" style="position: relative;" id="<?= $rowmedico->idpersonal;?>">
                                        <i class="icon-move"></i>
                                        <?= $rowmedico->nombre;?>
                                    </div>
                                    <?php

                                    }
                                    ?>
<!--
                                    <div class="external-event label-success ui-draggable" data-class="label-success" style="position: relative; z-index: auto; left: 0px; top: 0px;">
                                            <i class="icon-move"></i>
                                            My Event 2
                                    </div>





                                    <div class="external-event label-yellow ui-draggable" data-class="label-yellow" style="position: relative;">
                                            <i class="icon-move"></i>
                                            My Event 5
                                    </div>

                                    <div class="external-event label-pink ui-draggable" data-class="label-pink" style="position: relative;">
                                            <i class="icon-move"></i>
                                            My Event 6
                                    </div>

                                    <div class="external-event label-info ui-draggable" data-class="label-info" style="position: relative;">
                                            <i class="icon-move"></i>
                                            My Event 7
                                    </div>
-->
                                    <label>
                                            <input type="checkbox" class="ace ace-checkbox" id="drop-remove">
                                            <span class="lbl"> Remove after drop</span>
                                    </label>
                            </div>
                        </div>
                    </div>
            </div>     

          
    </div>
    <div class="col-md-7">
            <div id='calendar'></div>
            <div style='clear:both'></div>
    </div>
    
</div>



