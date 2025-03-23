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
          Verification 
          <div class="page-title-subheading">Verification des disponibilité </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      <form action="<?php echo base_url() ?>Reservation/DateChange/<?php echo $projectInfo->reservationId ?>" method="post">
        <div class="card-body">
          
          <div class="row">
            <div class="col-md-4">
                      <label for="formGroupExampleInput">Espace</label>
                      <select  class="form-control" name="salle" id="salle"  required>
                            <option value=""></option>
                            <?php foreach ($salleRecords as $record ) {
                    ?>
                            <option value="<?php echo $record->salleID ?>"> <?php echo $record->nom ?> </option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="col-md-4">
                      <label for="formGroupExampleInput2">Type</label>
              
                      <select type="text" class="form-control" name="type" required>
                          <option value=""></option>
                          <option value="Marriage"> Marriage </option>
                          <option value="Finacailles"> Finacailles </option>
                          <option value="Hena"> Hena </option>
                          <option value="Outya"> Outya </option>
                          <option value="Congret"> Congret </option>
                          <option value="Circoncision"> Circoncision </option>
                          <option value="Team Building"> Team Building </option>
                          <option value="Anniversaire"> Anniversaire </option>
                          <option value="Evenement"> Evenement </option>
                      </select>
                      
                    </div>

                   
                    <div class="col-md-4">
                      <label for="formGroupExampleInput2">Prix (DT)</label>
                      <input type="number" class="form-control" value="<?php echo $projectInfo->prix ?>"   min="300" name="prix" placeholder="Prix">
                  </div>
            <div class="col-md-6">
              <label for="formGroupExampleInput">Date</label>
              <input type="date" class="form-control" id="dateDebut" name="dateDebut" min="<?php echo date('Y-m-d') ?>" placeholder="Exemple input" value="<?php echo $projectInfo->dateDebut ?>" onchange="updateAvailableTimes()">
            </div> 
            <div class="col-md-3">
              <select class="form-control" id="heureDebut" name="heureDebut" onchange="validateTimes()">
                <option value="">heure de début</option>
                <!-- Les options seront ajoutées par JavaScript -->
              </select>
            </div>
            <div class="col-md-3">
             <select class="form-control" id="heureFin" name="heureFin" onchange="validateTimes()">
              <option value="">heure de fin</option>
              <!-- Les options seront ajoutées par JavaScript -->
            </select>
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
          <button type="submit" class="btn btn-primary btn-lg btn-block">Continuer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
var reseAvenir = <?php echo json_encode($reseAvenir); ?>;

function updateAvailableTimes() {
    const dateInput = document.getElementById('dateDebut');
    const salleSelect = document.getElementById('salle');
    const heureDebutSelect = document.getElementById('heureDebut');
    const heureFinSelect = document.getElementById('heureFin');

    if (!dateInput || !salleSelect) {
        console.error("L'élément 'dateDebut' ou 'salle' n'a pas été trouvé dans le DOM.");
        return;
    }

    const selectedDate = dateInput.value;
    const selectedSalle = salleSelect.value;

    if (!selectedDate || !selectedSalle) {
        console.error("Aucune date ou salle sélectionnée.");
        return;
    }

    // Filtrer les réservations pour la date et la salle sélectionnées
    const reservedTimes = reseAvenir.filter(reservation =>
        reservation.dateDebut === selectedDate && reservation.salleID === selectedSalle
    );

    // Créer la liste des créneaux horaires disponibles
    let timeSlots = [];
    let startHour = 8; // 08:00 AM
    let endHour = 23; // 11:00 PM

    // Remplir la liste des créneaux horaires
    for (let hour = startHour; hour <= endHour; hour++) {
        let hourString = hour < 10 ? '0' + hour : hour;
        timeSlots.push(hourString + ":00");
        timeSlots.push(hourString + ":30");
    }

    // Ajouter 23:59 comme dernier créneau possible pour l'heure de fin
    timeSlots.push("23:59");

    // Ajouter les options dans le select "heureDebut"
    heureDebutSelect.innerHTML = '<option value="">heure de début</option>'; // Réinitialiser les options
    timeSlots.forEach(time => {
        let option = document.createElement('option');
        option.value = time;
        option.innerHTML = time;

        // Vérifier si l'heure est réservée pour la salle et la date sélectionnées
        let isReserved = reservedTimes.some(reservation => reservation.heureDebut <= time && reservation.heureFin > time);

        if (isReserved) {
            option.disabled = true; // Griser l'option si elle est réservée
        }

        heureDebutSelect.appendChild(option);
    });

    // Ajouter les options dans le select "heureFin"
    heureFinSelect.innerHTML = '<option value="">heure de fin</option>'; // Réinitialiser les options
    timeSlots.forEach(time => {
        let option = document.createElement('option');
        option.value = time;
        option.innerHTML = time;

        // Vérifier si l'heure est réservée pour la salle et la date sélectionnées
        let isReserved = reservedTimes.some(reservation => reservation.heureDebut <= time && reservation.heureFin > time);

        if (isReserved) {
            option.disabled = true; // Griser l'option si elle est réservée
        }

        heureFinSelect.appendChild(option);
    });

    // Récupérer les anciennes valeurs de réservation pour pré-sélectionner les horaires
    const currentStartTime = "<?php echo $projectInfo->heureDebut; ?>"; // Valeur d'heure de début actuelle
    const currentEndTime = "<?php echo $projectInfo->heureFin; ?>"; // Valeur d'heure de fin actuelle

    // Pré-sélectionner les anciennes valeurs dans les listes déroulantes
    if (currentStartTime) {
        heureDebutSelect.value = currentStartTime;
    }
    if (currentEndTime) {
        heureFinSelect.value = currentEndTime;
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

