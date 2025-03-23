<!-- Formulaire HTML -->
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Verification
          <div class="page-title-subheading">Verification des disponibilités</div>
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      <form action="<?php echo base_url() ?>Reservation/addNew" method="get">
        <div class="card-body">
          <div class="row">
            <!-- Sélecteur Espace -->
            <div class="col-md-4">
              <label for="formGroupExampleInput">Espace</label>
              <select class="form-control" name="salle" id="salle" required>
                <option value=""></option>
                <?php foreach ($salleRecords as $record) { ?>
                  <option value="<?php echo $record->salleID ?>"> <?php echo $record->nom ?> </option>
                <?php } ?>
              </select>
            </div>

            <!-- Sélecteur Type -->
            <div class="col-md-4">
              <label for="formGroupExampleInput2">Type</label>
              <select class="form-control" name="type" required>
                <option value=""></option>
                <option value="Marriage">Marriage</option>
                <option value="Finacailles">Finacailles</option>
                <option value="Hena">Hena</option>
                <option value="Outya">Outya</option>
                <option value="Congret">Congret</option>
                <option value="Circoncision">Circoncision</option>
                <option value="Team Building">Team Building</option>
                <option value="Anniversaire">Anniversaire</option>
                <option value="Evenement">Evenement</option>
              </select>
            </div>

            <!-- Prix -->
            <div class="col-md-4">
              <label for="formGroupExampleInput2">Prix (DT)</label>
              <input type="number" class="form-control" min="300" name="prix" placeholder="Prix">
            </div>

            <!-- Sélecteur Date -->
            <div class="col-md-6">
              <label for="formGroupExampleInput">Date</label>
              <input type="date" class="form-control" id="dateDebut" name="dateDebut" min="<?php echo date('Y-m-d') ?>" onchange="updateAvailableTimes()">
            </div>

            <!-- Sélecteur Heure de début -->
            <div class="col-md-3">
              <select class="form-control" id="heureDebut" name="heureDebut" onchange="validateTimes()">
                <option value="">heure de début</option>
              </select>
            </div>

            <!-- Sélecteur Heure de fin -->
            <div class="col-md-3">
              <select class="form-control" id="heureFin" name="heureFin" onchange="validateTimes()">
                <option value="">heure de fin</option>
              </select>
              <h5 id="alert" ></h5>
            </div>

            <!-- Alerte d'erreur -->
            <div class="col-md-12">
              <h5 style="color: red" id="alert"></h5>
            </div>

            <!-- Zone des créneaux horaires -->
            <div class="col-md-12" id="schedule"></div>
          </div>
        </div>

        <!-- Bouton Continuer -->
        <div class="card-body">
          <button type="submit" class="btn btn-primary btn-lg btn-block" id="submitBtn" disabled>Continuer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  // Tableau PHP des réservations futures
  var reservations = <?php echo json_encode($reseAvenir); ?>;

  // Fonction pour vérifier les créneaux réservés
  function updateAvailableTimes() {
    // Récupération de la salle et de la date sélectionnée
    var salleId = document.getElementById('salle').value;
    var dateDebut = document.getElementById('dateDebut').value;

    // Vérification si la salle et la date sont valides
    if (!salleId || !dateDebut) {
      document.getElementById('alert').innerHTML = "Veuillez sélectionner la salle et la date.";
      return;
    }

    // Filtrer les réservations pour la salle et la date spécifiées
    var availableHours = getAvailableTimes(salleId, dateDebut);

    // Mettre à jour les options des heures de début et de fin
    updateTimeOptions(availableHours);
  }

  // Fonction pour obtenir les heures disponibles pour la salle et la date
  function getAvailableTimes(salleId, dateDebut) {
    var availableTimes = [];
    // Parcourir les réservations futures
    for (var i = 0; i < reservations.length; i++) {
      var reservation = reservations[i];

      // Vérifier si la réservation correspond à la salle et à la date
      if (reservation.salleId == salleId && reservation.dateDebut == dateDebut) {
        var startHour = reservation.heureDebut;
        var endHour = reservation.heureFin;

        // Ajouter les heures réservées à la liste des heures non disponibles
        availableTimes.push({ start: startHour, end: endHour });
      }
    }
    return availableTimes;
  }

  // Fonction pour mettre à jour les options des heures
  function updateTimeOptions(availableHours) {
    // Récupérer les éléments des heures de début et de fin
    var heureDebutSelect = document.getElementById('heureDebut');
    var heureFinSelect = document.getElementById('heureFin');

    // Effacer les options existantes
    heureDebutSelect.innerHTML = "<option value=''>heure de début</option>";
    heureFinSelect.innerHTML = "<option value=''>heure de fin</option>";

    // Ajouter les options d'heures disponibles
    for (var i = 8; i <= 22; i++) { // Disons que les créneaux horaires vont de 8h à 22h
      var startHour = i + ":00";
      var endHour = (i + 1) + ":00";

      // Vérifier si l'heure de début et l'heure de fin sont disponibles
      var isAvailable = true;
      for (var j = 0; j < availableHours.length; j++) {
        if ((startHour >= availableHours[j].start && startHour < availableHours[j].end) || 
            (endHour > availableHours[j].start && endHour <= availableHours[j].end)) {
          isAvailable = false;
          break;
        }
      }

      // Ajouter les heures disponibles
      if (isAvailable) {
        heureDebutSelect.innerHTML += "<option value='" + startHour + "'>" + startHour + "</option>";
        heureFinSelect.innerHTML += "<option value='" + endHour + "'>" + endHour + "</option>";
      }
    }
  }

  // Fonction pour valider les heures de début et de fin
  function validateTimes() {
    var heureDebut = document.getElementById('heureDebut').value;
    var heureFin = document.getElementById('heureFin').value;
    var alertElement = document.getElementById('alert');

    // Vérifier si l'heure de fin est après l'heure de début
    if (heureDebut && heureFin && heureDebut >= heureFin) {
      alertElement.innerHTML = "L'heure de fin doit être après l'heure de début.";
      document.getElementById('submitBtn').disabled = true;
    } else {
      alertElement.innerHTML = "";
      document.getElementById('submitBtn').disabled = false;
    }
  }
</script>



