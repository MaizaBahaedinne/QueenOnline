<style>
        .reserved {
            color: red;
        }
        .available {
            color: black;
        }
    </style>


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
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      <form action="<?php echo base_url() ?>Reservation/changeDate/<?php echo $projectInfo->reservationId ?>" method="post">
        <div class="card-body">
          <label for="formGroupExampleInput">Date</label>
          <div class="row">
            <div class="col-md-6">
              <input type="date" class="form-control" id="dateDebut" name="dateDebut" min="<?php echo date('Y-m-d') ?>" placeholder="Exemple input" value="<?php echo $projectInfo->dateDebut ?>" onchange="updateAvailableTimes()">
            </div> 
            <div class="col-md-3">
              <input type="time" class="form-control" id="heureDebut" name="heureDebut" value="<?php echo $projectInfo->heureDebut ?>" placeholder="Exemple input" onchange="validateTimes()">
            </div>
            <div class="col-md-3">
              <input type="time" class="form-control" id="heureFin" value="<?php echo $projectInfo->heureFin ?>" name="heureFin" placeholder="Exemple input" onchange="validateTimes()">
            </div>
            <div class="col-md-12">
              <h5 style="color: red" id="alert"></h5>
            </div>
            <div class="col-md-12" id="schedule">
                <!-- Les créneaux horaires réservés ou disponibles seront ajoutés ici par JavaScript -->
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
                    echo "Pas de réservation";
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
                  <?php } ?>
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
                    echo "Pas de réservation";
                  } else { ?>
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
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card-shadow-primary card-border mb-3 card">
                <div class="card-header">
                  <h5><i class="pe-7s-car"></i> Voiture</h5>
                </div>
                <div class="card-body">
                  <?php if ($projectInfo->voiture == 0) {
                    echo "Pas de réservation ";
                  } else { ?>
                    Départ  :   <?php echo $voiture->depart; ?><br>
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
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Modifier la réservation</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
var reseAvenir = <?php echo json_encode($reseAvenir); ?>;

function updateAvailableTimes() {
    const dateInput = document.getElementById('dateDebut');
    const heureDebutInput = document.getElementById('heureDebut');
    const heureFinInput = document.getElementById('heureFin');

    if (!dateInput) {
        console.error("L'élément dateDebut n'a pas été trouvé dans le DOM.");
        return;
    }

    const selectedDate = dateInput.value;

    if (!selectedDate) {
        console.error("Aucune date sélectionnée.");
        return;
    }

    // Filtrer les réservations pour la date sélectionnée
    const reservedTimes = reseAvenir.filter(reservation => reservation.dateDebut === selectedDate);

    // Vérifier si l'heure de début est réservée
    checkAvailability(heureDebutInput, reservedTimes);

    // Vérifier si l'heure de fin est réservée
    checkAvailability(heureFinInput, reservedTimes);
}

// Vérifier la disponibilité d'un créneau horaire
function checkAvailability(inputElement, reservedTimes) {
    const time = inputElement.value;
    let isReserved = false;

    // Vérifier si l'heure correspond à un créneau réservé
    reservedTimes.forEach(reservation => {
        if (reservation.heureDebut <= time && reservation.heureFin > time) {
            isReserved = true;
        }
    });

    // Si l'heure est réservée, appliquer la couleur rouge, sinon noir
    if (isReserved) {
        inputElement.style.backgroundColor = 'red';
    } else {
        inputElement.style.backgroundColor = 'black';
        inputElement.style.color = 'white'; // Pour rendre le texte visible sur fond noir
    }
}

function validateTimes() {
    const startTime = document.getElementById('heureDebut').value;
    const endTime = document.getElementById('heureFin').value;

    // Vérifier que l'heure de début est inférieure à l'heure de fin
    if (startTime && endTime && startTime >= endTime) {
        alert("L'heure de fin doit être supérieure à l'heure de début.");
        document.getElementById('heureFin').value = ''; // Réinitialiser l'heure de fin
    }
}

// Initialiser au chargement de la page
window.onload = function() {
    updateAvailableTimes();
};

</script>
