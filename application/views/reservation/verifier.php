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

// Récupérer les réservations depuis PHP
var reservations = <?php echo json_encode($reseAvenir); ?>;
  
// Fonction pour vérifier les disponibilités en fonction de la salle et de la date sélectionnées
function updateAvailableTimes() {
    var salleId = document.getElementById("salle").value;
    var dateDebut = document.getElementById("dateDebut").value;
    
    // Si la salle ou la date sont vides, ne pas afficher les créneaux
    if (!salleId || !dateDebut) {
        return;
    }

    var reservedHours = [];

    // Filtrer les réservations pour la salle et la date sélectionnées
    reservations.forEach(function(reservation) {
        if (reservation.salleId == salleId && reservation.dateDebut == dateDebut) {
            reservedHours.push({
                start: reservation.heureDebut,
                end: reservation.heureFin
            });
        }
    });

    // Mise à jour des créneaux horaires disponibles
    updateTimeSelectors(reservedHours);
}

// Mettre à jour les sélecteurs d'heure en fonction des réservations
function updateTimeSelectors(reservedHours) {
    var heureDebutSelect = document.getElementById("heureDebut");
    var heureFinSelect = document.getElementById("heureFin");

    // Vider les options actuelles
    heureDebutSelect.innerHTML = "<option value=''>heure de début</option>";
    heureFinSelect.innerHTML = "<option value=''>heure de fin</option>";

    // Plage horaire à vérifier (par exemple de 8h à 23h)
    var startHour = 8;
    var endHour = 23;

    for (var h = startHour; h <= endHour; h++) {
        for (var m = 0; m < 60; m += 30) {  // Incrément de 30 minutes
            var time = formatTime(h, m);
            var isReserved = false;

            // Vérification des réservations sur cette plage horaire
            reservedHours.forEach(function(reservation) {
                if (isTimeBetween(time, reservation.start, reservation.end)) {
                    isReserved = true;
                }
            });

            if (!isReserved) {
                // Ajouter l'heure de début et de fin disponible
                var optionDebut = document.createElement("option");
                optionDebut.value = time;
                optionDebut.textContent = time;
                heureDebutSelect.appendChild(optionDebut);
                
                var optionFin = document.createElement("option");
                optionFin.value = time;
                optionFin.textContent = time;
                heureFinSelect.appendChild(optionFin);
            } else {
                // Désactiver l'option si l'heure est réservée
                var optionDebut = document.createElement("option");
                optionDebut.value = time;
                optionDebut.textContent = time;
                optionDebut.disabled = true;  // Désactiver l'option réservée
                heureDebutSelect.appendChild(optionDebut);

                var optionFin = document.createElement("option");
                optionFin.value = time;
                optionFin.textContent = time;
                optionFin.disabled = true;  // Désactiver l'option réservée
                heureFinSelect.appendChild(optionFin);
            }
        }
    }
}

// Fonction pour formater les heures en "HH:MM"
function formatTime(hour, minutes) {
    return (hour < 10 ? "0" : "") + hour + ":" + (minutes < 10 ? "0" : "") + minutes;
}

// Fonction pour vérifier si une heure est comprise entre deux heures
function isTimeBetween(time, start, end) {
    return time >= start && time <= end;
}

</script>



