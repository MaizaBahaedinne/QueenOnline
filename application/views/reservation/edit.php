<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion des reservations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Gestion des reservations</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
			<div>
					<div >
						
							<div class="modal-header">
								<h4 id="modalTitle2" class="modal-title">Modifier l'évenement </h4>
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
							<form action="<?php echo base_url() ?>Reservation/editReservation/<?php echo $projectInfo->reservationId ?>" method="post" >
								
								
									<div class="form-group">
										<label for="formGroupExampleInput">Date</label>
										<div class="row">
											<div class="col-md-6">
										<input type="date" class="form-control" name="dateDebut"  min="<?php echo date('Y-m-d') ?>" placeholder="Example input" value="<?php echo $projectInfo->dateDebut ?>" >
											</div> 
											<div class="col-md-3">
										<input type="time" class="form-control" name="heureDebut" value="<?php echo $projectInfo->heureDebut ?>" placeholder="Example input">
											</div>
											<div class="col-md-3">
										<input type="time" class="form-control" value="<?php echo $projectInfo->heureFin ?>" name="heureFin" placeholder="Example input">
											</div>
										</div>
										
									</div>
									
									<div class="form-group">
									    <label for="formGroupExampleInput">Espace</label>
											<select type="text" class="form-control" name="salle" id="salle" placeholder="Example input">
											<?php foreach ($salleRecords as $record ) {
											?>	
											<option value="<?php echo $record->salleID ?>" <?php if($record->salleID == $projectInfo->salleID ){ echo "selected" ; }  ?>  > <?php echo $record->nom ?> </option>
											<?php } ?>
										</select>
										
										
									</div>
									
									<div class="row form-group">
										<div class="col-md-6">
											<label for="formGroupExampleInput2">Type</label>
											<h1><?php echo $projectInfo->type ?></h1>
											<select type="text" class="form-control" name="type" >
											<option value="Marriage" <?php if ($projectInfo->type == "Marriage" ){ echo " selected"; } ?> > Marriage </option>
											<option value="Finacailles" <?php if ($projectInfo->type == "Finacailles" ){ echo " selected"; } ?>> Finacailles </option>
											<option value="Hena" <?php if ($projectInfo->type == "Hena" ){ echo " selected"; } ?> > Hena </option>
											<option value="Outya"  <?php if ($projectInfo->type == "Outya" ){ echo " selected"; } ?> > Outya </option>
											<option value="Congret" <?php if ($projectInfo->type == "Congret" ){ echo " selected"; } ?> > Congret </option>
											<option value="Circoncision"  > Circoncision </option>
											<option value="Team Building"  > Team Building </option>
											<option value="Anniversaire"> Anniversaire </option>
											<option value="Evenement" > Evenement </option>

										</select>
										</div>
										
										<div class="col-md-3">
											<label for="formGroupExampleInput2">Nombre des invités</label>
											<input type="number" class="form-control" value="<?php echo $projectInfo->nbPlace ?>" min="20" max="1000" name="nbPlace" placeholder="Nombre des invités">
										</div>
										<div class="col-md-3">
											<label for="formGroupExampleInput2">Prix</label>
											<input type="number" class="form-control" value="<?php echo $projectInfo->prix ?>"   min="300" name="prix" placeholder="Prix">
										</div>
									
										
									</div>

									<div class="form-group">
										<label for="formGroupExampleInput">Options  </label>
										<br>
										<input type="checkbox"  name="tableCM" value="1" 
									     <?php  if ($projectInfo->tableCM == 1 ){ echo 'checked'; } ?> > Table contrat de  mariage
										<br>
										<input type="checkbox"  name="cuisine"  value="1"   <?php  if ($projectInfo->cuisine == 1 ){ echo 'checked'; } ?>  > Cuisine
									</div>

									<div class="form-group">
										<label for="formGroupExampleInput">Titre</label>
										<input type="text" class="form-control" name="titre" placeholder="Titre de l'evenement" value="<?php echo $projectInfo->titre ?>">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput">Note Administratif </label>
										<textarea class="form-control" row="10" name="noteAdmin" > <?php echo $projectInfo->noteAdmin ?></textarea>
									</div>

									

										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button class="btn btn-primary">Ajouter</button>
										
									
								</form>
						
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

			