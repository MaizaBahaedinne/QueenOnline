<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Modification de date
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
      
        <form action="<?php echo base_url() ?>Reservation/changeDate/<?php echo $projectInfo->reservationId ?>" method="post" >
                
                
             <div class="card-body">
                <label for="formGroupExampleInput">Date</label>
                    <div class="row">
                      <div class="col-md-6">
                            <input type="date" class="form-control" id="dateDebut" name="dateDebut" min="<?php echo date('Y-m-d') ?>" placeholder="Exemple input" value="<?php echo $projectInfo->dateDebut ?>" onchange="validateHours()">
                        </div> 
                        <div class="col-md-3">
                            <input type="time" class="form-control" id="heureDebut" name="heureDebut" value="<?php echo $projectInfo->heureDebut ?>" placeholder="Exemple input" onchange="validateHours()">
                        </div>
                        <div class="col-md-3">
                            <input type="time" class="form-control" id="heureFin" value="<?php echo $projectInfo->heureFin ?>" name="heureFin" placeholder="Exemple input" onchange="validateHours()">
                        </div>
                        <div class="col-md-12">
                            <h5 style="color: red" id="alert" ></h5>
                        </div>

                      <div class="col-md-4">
                      <label for="formGroupExampleInput">Espace</label>
                      <input readonly type="text" class="form-control" name="salle" id="salle" value="<?php echo$projectInfo->salle ?>">
                      
                   
                    
                    </div>

                    <div class="col-md-4">
                      <label for="formGroupExampleInput2">Type</label>
              
                      <input readonly type="text" class="form-control" name="type" value="<?php echo $projectInfo->type ;  ?>" >
                      
                    </div>

                   
                    <div class="col-md-2">
                      <label for="formGroupExampleInput2">Prix (DT)</label>
                      <input type="number" class="form-control" value="<?php echo $projectInfo->prix ?>"   min="300" name="prix" placeholder="Prix">
                    </div>
              </div> 
            </div> 

            <div class="card-body">

              <div class="row">


        <div class="col-md-4">
         <div class="card-shadow-primary card-border mb-3 card">
             <div class="card-header">
               <h5><i class="pe-7s-users"></i> Troupe</h5>
             </div>
             <div class="card-body">
                  <?php if ($projectInfo->troupe == 0) {
                      echo "Pas de reservation ";
                  } else { ?>
                    
                    Pack : <?php echo $troupe->packname; ?>  <br>  
                     statut :   <?php if ($troupe->STroupe == 0) { ?>
                   <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> Validée</span>
                   <?php } ?>    
                   <?php if ($troupe->STroupe == 1) { ?>
                   <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i> En attente</span>
                   <?php } ?>
                   <?php if ($troupe->STroupe == 3) { ?>
                   <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                   <?php } ?>
               
                  <?php  } ?>
                  <hr>
                  <?php if ($projectInfo->troupe != 0) { ?> 
                    
                  <a style="color: white" href="<?php echo base_url(); ?>Troupe/view/<?php echo $projectInfo->troupe; ?>"  class="btn btn-success btn-block">Details</a> 
               
               <?php } ?>
                  <hr>
                  <?php foreach ($prestation as $pres ){ ?>
                        <?php  ?>
                        <?php if ($pres->PresStatut == 0) { ?>
                       <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> </span>
                       <?php } ?>    
                       <?php if ($pres->PresStatut == 1) { ?>
                       <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                       <?php } ?>
                       <?php if ($pres->PresStatut == 3) { ?>
                       <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                  <?php } echo $pres->packname; ?> à <?php echo $pres->heure;  echo "<br>" ; } ?>
                  <br>
                 
             </div>
         </div>
          
           
      </div>
      <div class="col-md-4">
         <div class="card-shadow-primary card-border mb-3 card">
            <div class="card-header">
               <h5><i class="pe-7s-camera"></i> Photographe</h5>
             </div>
            <div class="card-body">
                <?php if ($projectInfo->photographe == 0) {
                    echo "Pas de reservation";
                } else {
                     ?>
                  
                  Pack : <?php echo $photographe->packname; ?>  <br>  
                  statut :   <?php if ($photographe->Pstatut == 0) { ?>
                <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> Validée</span>
                <?php } ?>    
                <?php if ($photographe->Pstatut == 1) { ?>
                <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i> En attente</span>
                <?php } ?>
                
                <?php if ($photographe->Pstatut == 3) { ?>
                <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                <?php } ?>
               <?php
                } ?>
              
             </div>
             <?php if ($projectInfo->photographe != 0) { ?> 
               <div class="card-footer">
                  <a style="color: white" href="<?php echo base_url(); ?>Photographe/view/<?php echo $projectInfo->photographe; ?>"  class="btn btn-success btn-block">Details</a> 
               </div>
               <?php } ?>
         </div>
          
           
      </div>
      
      <div class="col-md-4">
         <div class="card-shadow-primary card-border mb-3 card">
            <div class="card-header">
               <h5><i class="pe-7s-car"></i> Voiture</h5>
             </div>
            <div class="card-body">
               <?php if ($projectInfo->voiture == 0) {
                   echo "Pas de reservation ";
               } else {
                    ?>
                  Depart  :   <?php echo $voiture->depart; ?><br>
                  Point 1 :   <?php echo $voiture->l1; ?><br>
                  Point 2 :   <?php echo $voiture->l2; ?><br>
                  Point 3 :   <?php echo $voiture->l3; ?><br>

                  statut :   <?php if ($voiture->statut == 0) { ?>
                <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> Validée</span>
                <?php } ?>    
                <?php if ($voiture->statut == 1) { ?>
                <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i> En attente</span>
                <?php } ?>
                <?php if ($voiture->statut == 2) { ?>
                <span class="badge badge-pill badge-dark"></span>
                <?php } ?>
                <?php if ($voiture->statut == 3) { ?>
                <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                <?php } ?>
               <?php
               } ?>
             </div>
              <?php if ($projectInfo->voiture != 0) { ?> 
               <div class="card-footer">
                  <a style="color: white" href="<?php echo base_url(); ?>Voiture/view/<?php echo $projectInfo->voiture; ?>"  class="btn btn-success btn-block">Details</a> 
               </div>
               <?php } ?>
         </div>
          
           
      </div>



              </div>

            </div>
                    
                  
        </form>
      
    </div>
  </div>
</div>



<script>
    // Tableau des horaires réservés à l'avance (exemple en PHP converti en JavaScript)
    var reseAvenir = <?php echo json_encode($reseAvenir); ?>;

    // Fonction pour vérifier si l'heure choisie entre en conflit avec les horaires réservés
    function checkReservationConflict(date, heureDebut, heureFin) {
        for (var i = 0; i < reseAvenir.length; i++) {
            var reservation = reseAvenir[i];
            if (reservation.date === date) {
                // Vérification du chevauchement des horaires
                if ((heureDebut >= reservation.heureDebut && heureDebut < reservation.heureFin) || 
                    (heureFin > reservation.heureDebut && heureFin <= reservation.heureFin) || 
                    (heureDebut <= reservation.heureDebut && heureFin >= reservation.heureFin)) {
                    return true; // Conflit trouvé
                }
            }
        }
        return false; // Aucun conflit
    }

    // Fonction pour alerter l'utilisateur
    function validateHours() {
        var date = document.getElementById('dateDebut').value;
        var heureDebut = document.getElementById('heureDebut').value;
        var heureFin = document.getElementById('heureFin').value;

        if (date && heureDebut && heureFin) {
            // Appel de la fonction de vérification
            var conflit = checkReservationConflict(date, heureDebut, heureFin);
            var alertDiv = document.getElementById('alert');

            if (conflit) {
                alertDiv.style.display = 'block';  // Afficher l'alerte
                alertDiv.textContent = "Désolé, cet horaire est déjà réservé. Veuillez choisir un autre horaire.";
            } else {
                alertDiv.style.display = 'none';  // Masquer l'alerte
            }
        }
    }
    </script>