<!-- partial -->

	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?php echo base_url () ?>assets/vendors/fullcalendar/fullcalendar.min.css">
	<!-- end plugin css for this page -->

				<div class="row">
					<div class="col-md-12">
						<div class="row">
							
							<div class="col-12 col-md-12">
								<div class="card">
									<div class="card-body">
										<div id='fullcalendar'></div>
									</div>
									</div>
							</div>
						</div>
					</div>
				</div>

				<div id="fullCalModal" class="modal fade">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 id="modalTitle1" class="modal-title"></h4>
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
							</div>
							<div id="modalBody1" class="modal-body"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button class="btn btn-primary">Event Page</button>
							</div>
						</div>
					</div>
				</div>

				<div id="createEventModal" class="modal fade">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 id="modalTitle2" class="modal-title">Ajouter un evenement </h4>
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
							</div>
							<script type="text/javascript">
								$(document).ready(function(){
									        $("#sale").change(function(){                
									                $.ajax('ajax.php', {
									                   type: 'GET',
									                   success: function(html){
									                     alert(html) ;
									                   },
									                   error: function(XMLHttpRequest, textStatus, errorThrows) {alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");}
									                });
									        });
									});
							</script>
							<form action="<?php echo base_url()?>Reservation/addNewReservation" method="post" >
							<div id="modalBody2" class="modal-body">
								
									<div class="form-group">
										<label for="formGroupExampleInput">Date</label>
										<div class="row">
											<div class="col-md-6">
										<input type="date" class="form-control" name="dateDebut"  min="<?php echo date('Y-m-d') ?>" placeholder="Example input">
											</div> 
											<div class="col-md-3">
										<input type="time" class="form-control" name="heureDebut" placeholder="Example input">
											</div>
											<div class="col-md-3">
										<input type="time" class="form-control" name="heureFin" placeholder="Example input">
											</div>
										</div>
										
									</div>
									
									<div class="form-group">
									    <label for="formGroupExampleInput">Espace</label>
											<select type="text" class="form-control" name="salle" id="salle" placeholder="Example input">
											<?php foreach ($salleRecords as $record ) {
											?>	
											<option value="<?php echo $record->salleID ?>" > <?php echo $record->nom ?> </option>
											<?php } ?>
										</select>
										
										
									</div>
									
									<div class="row form-group">
										<div class="col-md-6">
											<label for="formGroupExampleInput2">Type</label>
											<select type="text" class="form-control" name="type" >
												<option value="Marriage" > Marriage </option>
												<option value="Finacailles" > Finacailles </option>
												<option value="Hena" > Hena </option>
												<option value="Marriage" > Outya </option>
												<option value="Congret" > Congret </option>
												<option value="Circoncision" > Circoncision </option>
												<option value="Team Building" > Team Building </option>
												<option value="Team Building" > Anniversaire </option>
												<option value="Team Building" > Evenement </option>

											</select>
										</div>
										
										<div class="col-md-3">
											<label for="formGroupExampleInput2">Nombre des invités</label>
											<input type="number" class="form-control" min="20" max="1000" name="nbPlace" placeholder="Nombre des invités">
										</div>
										<div class="col-md-3">
											<label for="formGroupExampleInput2">Prix</label>
											<input type="number" class="form-control"   min="300" name="prix" placeholder="Prix">
										</div>
									
										
									</div>

									<div class="form-group">
										<label for="formGroupExampleInput">Options  </label>
										<input type="checkbox"  name="tableCM" value="1" > Table contrat de  mariage
										<input type="checkbox"  name="cuisine"  value="1" > Cuisine
									</div>

									<div class="form-group">
										<label for="formGroupExampleInput">Titre</label>
										<input type="text" class="form-control" name="titre" placeholder="Titre de l'evenement">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput">Note Administratif </label>
										<textarea class="form-control" row="10" name="noteAdmin" ></textarea>
									</div>

									<div class="modal-footer">

										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button class="btn btn-primary">Ajouter</button>
										
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>

		
<!-- plugin js for this page -->
	<script defer src="<?php echo base_url () ?>assets/vendors/jquery-ui/jquery-ui.min.js"></script>
	<script defer src="<?php echo base_url () ?>assets/vendors/moment/moment.min.js"></script>
	<script  defer src="<?php echo base_url () ?>assets/vendors/fullcalendar/fullcalendar.min.js"></script>
	<!-- end plugin js for this page -->


	<script type="text/javascript">
		$(function() {

		  // sample calendar events data


		  // Calendar Event Source
		  var calendarEvents = {
		    id: 1,
		    backgroundColor: 'rgba(1,104,250, .15)',
		    borderColor: '#0168fa',
		    events: [
		    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
		      
		      {
		        id: '1',
		        start: '<?php echo date_format(date_create($record->dateDebut)  , '20y-m-d'); ?>T<?php echo $record->heureDebut ; ?>' ,
		        end: '<?php echo date_format(date_create($record->dateFin)  , '20y-m-d'); ?>T<?php echo $record->heureFin ; ?>',
		        title: '<?php echo $record->salle  ?> <?php echo $record->type  ?> : <?php echo $record->titre  ?>',
		        description: '<h6>Espace : <small><?php echo $record->salle  ?><small></h6><br><h6>Date : <small><?php echo date_format(date_create($record->dateDebut)  , 'd M 20y');  ?></b>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?><small></h6><br><h6>nombre de place : <small><?php echo $record->nbPlace  ?><small></h6><br><h6>Option : <small><?php If($record->cuisine == 1 ){echo 'Cuisine ' ; } If($record->tableCM == 1 ){echo '  Table contrat de  marriage' ; }    ?><small></h6><br><h6>Note Admin : <small><?php echo $record->noteAdmin  ?><small></h6><br>'
		      },

		                          <?php
                       } 
                    }
                    ?>
		    ]
		  };

		  // Birthday Events Source
		  var birthdayEvents = {
		    id: 2,
		    backgroundColor: 'rgba(253,126,20,.25)',
		    borderColor: '#10b759',
		    events: [
		    <?php
                    if(!empty($userRecords))
                    {
                        foreach($FarhetAmor as $record)
                        {
                    ?>
		      
		      {
		        id: '2',
		        start: '<?php echo date_format(date_create($record->dateDebut)  , '20y-m-d'); ?>T<?php echo $record->heureDebut ; ?>' ,
		        end: '<?php echo date_format(date_create($record->dateFin)  , '20y-m-d'); ?>T<?php echo $record->heureFin ; ?>',
		        title: '<?php echo $record->salle  ?> <?php echo $record->type  ?> : <?php echo $record->titre  ?>',
		        description: '<h6>Espace : <small><?php echo $record->salle  ?><small></h6><br><h6>Date : <small><?php echo date_format(date_create($record->dateDebut)  , 'd M 20y');  ?></b>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?><small></h6><br><h6>nombre de place : <small><?php echo $record->nbPlace  ?><small></h6><br><h6>Option : <small><?php If($record->cuisine == 1 ){echo 'Cuisine ' ; } If($record->tableCM == 1 ){echo '  Table contrat de  marriage' ; }    ?><small></h6><br><h6>Note Admin : <small><?php echo $record->noteAdmin  ?><small></h6><br>'
		      },

		                          <?php
                       } 
                    }
                    ?>

		      
		    ]
		  };


		  var holidayEvents = {
		    id: 3,
		    backgroundColor: 'rgba(241,0,117,.25)',
		    borderColor: '#f10075',
		    events: [
		    <?php
                    if(!empty($userRecords))
                    {
                        foreach($Laylina as $record)
                        {
                    ?>
		      
		      {
		        id: '3',
		        start: '<?php echo date_format(date_create($record->dateDebut)  , '20y-m-d'); ?>T<?php echo $record->heureDebut ; ?>' ,
		        end: '<?php echo date_format(date_create($record->dateFin)  , '20y-m-d'); ?>T<?php echo $record->heureFin ; ?>',
		        title: '<?php echo $record->salle  ?> <?php echo $record->type  ?> : <?php echo $record->titre  ?>',
		        description: '<h6>Espace : <small><?php echo $record->salle  ?><small></h6><br><h6>Date : <small><?php echo date_format(date_create($record->dateDebut)  , 'd M 20y');  ?></b>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?><small></h6><br><h6>nombre de place : <small><?php echo $record->nbPlace  ?><small></h6><br><h6>Option : <small><?php If($record->cuisine == 1 ){echo 'Cuisine ' ; } If($record->tableCM == 1 ){echo '  Table contrat de  marriage' ; }    ?><small></h6><br><h6>Note Admin : <small><?php echo $record->noteAdmin  ?><small></h6><br>'
		      },

		                          <?php
                       } 
                    }
                    ?>

		      
		    ]
		  };

		  var discoveredEvents = {
		    id: 4,
		    backgroundColor: 'rgba(0,204,204,.25)',
		    borderColor: '#00cccc',
		    events: [
		    <?php
                    if(!empty($userRecords))
                    {
                        foreach($Soltana as $record)
                        {
                    ?>
		      
		      {
		        id: '2',
		        start: '<?php echo date_format(date_create($record->dateDebut)  , '20y-m-d'); ?>T<?php echo $record->heureDebut ; ?>' ,
		        end: '<?php echo date_format(date_create($record->dateFin)  , '20y-m-d'); ?>T<?php echo $record->heureFin ; ?>',
		        title: '<?php echo $record->salle  ?> <?php echo $record->type  ?> : <?php echo $record->titre  ?>',
		        description: '<h6>Espace : <small><?php echo $record->salle  ?><small></h6><br><h6>Date : <small><?php echo date_format(date_create($record->dateDebut)  , 'd M 20y');  ?></b>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?><small></h6><br><h6>nombre de place : <small><?php echo $record->nbPlace  ?><small></h6><br><h6>Option : <small><?php If($record->cuisine == 1 ){echo 'Cuisine ' ; } If($record->tableCM == 1 ){echo '  Table contrat de  marriage' ; }    ?><small></h6><br><h6>Note Admin : <small><?php echo $record->noteAdmin  ?><small></h6><br>'
		      },

		                          <?php
                       } 
                    }
                    ?>

		      
		    ]
		  };

		  var meetupEvents = {
		    id: 5,
		    backgroundColor: 'rgba(91,71,251,.2)',
		    borderColor: '#5b47fb',
		    events: [
		      
		    ]
		  };


		  var otherEvents = {
		    id: 6,
		    backgroundColor: 'rgba(253,126,20,.25)',
		    borderColor: '#fd7e14',
		    events: [
		      
		    ]
		  };
		  

		  // initialize the external events
		  $('#external-events .fc-event').each(function() {
		    // store data so the calendar knows to render an event upon drop
		    $(this).data('event', {
		      title: $.trim($(this).text()), // use the element's text as the event title
		      stick: true // maintain when user navigates (see docs on the renderEvent method)
		    });
		    // make the event draggable using jQuery UI
		    $(this).draggable({
		      zIndex: 999,
		      revert: true,      // will cause the event to go back to its
		      revertDuration: 0  //  original position after the drag
		    });

		  });


		  // initialize the calendar
		  $('#fullcalendar').fullCalendar({
		    header: {
		      left: 'prev,today,next',
		      center: 'title',
		      right: 'month,agendaWeek,agendaDay,listMonth'
		    },
		    editable: false,
		    droppable: false, // this allows things to be dropped onto the calendar
		    dragRevertDuration: 0,
		    defaultView: 'month',
		    eventLimit: true, // allow "more" link when too many events
		    eventSources: [calendarEvents, birthdayEvents, holidayEvents, discoveredEvents, meetupEvents, otherEvents],
		    eventClick:  function(event, jsEvent, view) {
		      $('#modalTitle1').html(event.title);
		      $('#modalBody1').html(event.description);
		      $('#eventUrl').attr('href',event.url);
		      $('#fullCalModal').modal();
		    },
		    dayClick: function(date, jsEvent, view) {
		      $("#createEventModal").modal("show");
		    },
		   
		    eventDragStop: function( event, jsEvent, ui, view ) {
		      if(isEventOverDiv(jsEvent.clientX, jsEvent.clientY)) {
		        // $('#calendar').fullCalendar('removeEvents', event._id);
		        var el = $( "<div class='fc-event'>" ).appendTo( '#external-events-listing' ).text( event.title );
		        el.draggable({
		          zIndex: 999,
		          revert: true, 
		          revertDuration: 0 
		        });
		        el.data('event', { title: event.title, id :event.id, stick: true });
		      }
		    }
		  });


		  var isEventOverDiv = function(x, y) {
		    var external_events = $( '#external-events' );
		    var offset = external_events.offset();
		    offset.right = external_events.width() + offset.left;
		    offset.bottom = external_events.height() + offset.top;

		    // Compare
		    if (x >= offset.left
		      && y >= offset.top
		      && x <= offset.right
		      && y <= offset .bottom) { return true; }
		    return false;
		  }

		});
	</script>