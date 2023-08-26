<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Modification de reservation
          <div class="page-title-subheading"><?php echo $projectInfo->type ?> <?php echo $projectInfo->dateDebut ?> | <?php echo $projectInfo->salle ?> | <?php echo $projectInfo->titre ?> </div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
          

          
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      
        <form action="<?php echo base_url() ?>Reservation/editReservation/<?php echo $projectInfo->reservationId ?>" method="post" >
                
                
                 
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

                      <div class="col-md-4">
                      <label for="formGroupExampleInput">Espace</label>
                      <select type="text" class="form-control" name="salle" id="salle" placeholder="Example input">
                      <?php foreach ($salleRecords as $record ) {
                      ?>  
                      <option value="<?php echo $record->salleID ?>" <?php if($record->salleID == $projectInfo->salleID ){ echo "selected" ; }  ?>  > <?php echo $record->nom ?> </option>
                      <?php } ?>
                    </select>
                    
                    </div>

                    <div class="col-md-4">
                      <label for="formGroupExampleInput2">Type</label>
              
                      <select type="text" class="form-control" name="type" >
                      <option value="Marriage" <?php if ($projectInfo->type == "Marriage" ){ echo " selected"; } ?> > Marriage </option>
                      <option value="Finacailles" <?php if ($projectInfo->type == "Finacailles" ){ echo " selected"; } ?>> Finacailles </option>
                      <option value="Hena" <?php if ($projectInfo->type == "Hena" ){ echo " selected"; } ?> > Hena </option>
                      <option value="Outya"  <?php if ($projectInfo->type == "Outya" ){ echo " selected"; } ?> > Outya </option>
                      <option value="Congret" <?php if ($projectInfo->type == "Congret" ){ echo " selected"; } ?> > Congret </option>
                      <option value="Circoncision" <?php if ($projectInfo->type == "Circoncision" ){ echo " selected"; } ?> > Circoncision </option>
                      <option value="Team Building" <?php if ($projectInfo->type == "Team Building" ){ echo " selected"; } ?> > Team Building </option>
                      <option value="Anniversaire" <?php if ($projectInfo->type == "Anniversaire" ){ echo " selected"; } ?> > Anniversaire </option>
                      <option value="Evenement" <?php if ($projectInfo->type == "Evenement" ){ echo " selected"; } ?> > Evenement </option>

                    </select>
                    </div>

                    <div class="col-md-2">
                      <label for="formGroupExampleInput2">Nombre des invités (Personne)</label>
                      <input type="number" class="form-control" value="<?php echo $projectInfo->nbPlace ?>" min="20" max="1000" name="nbPlace" placeholder="Nombre des invités">
                    </div>
                    <div class="col-md-2">
                      <label for="formGroupExampleInput2">Prix (DT)</label>
                      <input type="number" class="form-control" value="<?php echo $projectInfo->prix ?>"   min="300" name="prix" placeholder="Prix">
                    </div>


                  </div>
                    


                  <div class="form-group">
                    <label for="formGroupExampleInput">Options  </label>
                    <br>
                    <input type="checkbox"  name="tableCM" value="1" 
                       <?php  if ($projectInfo->tableCM == 1 ){ echo 'checked'; } ?> >  Table contrat de  mariage
                    <br>
                    <input type="checkbox"  name="cuisine"  value="1"   <?php  if ($projectInfo->cuisine == 1 ){ echo 'checked'; } ?>  >  Cuisine
              
                    <br>
                  </div>

                  <hr>
                  
                  

                  <div class="form-group">
                    <label for="formGroupExampleInput">Titre</label>
                    <input type="text" class="form-control" name="titre" placeholder="Titre de l'evenement" value="<?php echo $projectInfo->titre ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Note Administratif </label>
                    <textarea class="form-control" row="40" name="noteAdmin" > <?php echo $projectInfo->noteAdmin ?></textarea>
                  </div>

                  
                    <button class="btn btn-block btn-primary">Enregistrer</button>
                  
                    
                    
                  
                </form>
      
    </div>
  </div>
</div>