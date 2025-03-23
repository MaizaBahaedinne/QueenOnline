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
              
            <label for="dateDebut">Date:</label>
            <input type="date" class="form-control" id="dateDebut" onchange="onDateChange();">
            </div>

            <!-- Sélecteur Heure de début -->
            <div class="col-md-3">
              <label for="heureDebut">Heure de début:</label>
              <select id="heureDebut" class="form-control" onchange="onHeureDebutChange();" disabled>
                  <option value="">Sélectionner une heure de début</option>
              </select>
            </div>

            <!-- Sélecteur Heure de fin -->
            <div class="col-md-3">
               <label for="heureFin">Heure de fin:</label>
              <select id="heureFin" class="form-control" disabled>
                  <option value="">Sélectionner une heure de fin</option>
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


<script>
// Récupérer les réservations depuis PHP
var reservations = <?php echo json_encode($reseAvenir); ?>;
</script>

<script>
// Fonction appelée lors du changement de la salle
function onSalleChange() {
    var salleId = document.getElementById("salle").value;
    var dateDebut = document.getElementById("dateDebut").value;

    // Réinitialisation des champs associés
    document.getElementById("dateDebut").disabled = false; // Activer le champ date
    document.getElementById("heureDebut").innerHTML = "<option value=''>Sélectionner une heure de début</option>"; // Vider les options d'heure de début
    document.getElementById("heureFin").innerHTML = "<option value=''>Sélectionner une heure de fin</option>"; // Vider les options d'heure de fin
    document.getElementById("heureDebut").disabled = true; // Désactiver l'heure de début
    document.getElementById("heureFin").disabled = true; // Désactiver l'heure de fin
    document.getElementById("submitBtn").disabled = true; // Désactiver le bouton de soumission

    // Si la salle et la date sont sélectionnées, mettre à jour les heures
    if (salleId && dateDebut) {
        updateAvailableTimes(salleId, dateDebut);
    }
}

// Fonction appelée lors du changement de la date
function onDateChange() {
    var salleId = document.getElementById("salle").value;
    var dateDebut = document.getElementById("dateDebut").value;

    // Réinitialiser les champs des heures si la date est changée
    document.getElementById("heureDebut").innerHTML = "<option value=''>Sélectionner une heure de début</option>"; // Vider les options d'heure de début
    document.getElementById("heureFin").innerHTML = "<option value=''>Sélectionner une heure de fin</option>"; // Vider les options d'heure de fin
    document.getElementById("submitBtn").disabled = true; // Désactiver le bouton de soumission

    // Si la salle et la date sont sélectionnées, mettre à jour les heures
    if (salleId && dateDebut) {
        updateAvailableTimes(salleId, dateDebut);
    }

    // Activer le champ d'heure de début
    document.getElementById("heureDebut").disabled = false;
}

// Fonction appelée lors du changement de l'heure de début
function onHeureDebutChange() {
    var heureDebut = document.getElementById("heureDebut").value;
    var heureFin = document.getElementById("heureFin");

    // Activer l'heure de fin et vérifier la validité
    if (heureDebut) {
        document.getElementById("heureFin").disabled = false;
        updateHeureFin(heureDebut);
    } else {
        document.getElementById("heureFin").disabled = true;
        document.getElementById("submitBtn").disabled = true;
    }
}

// Fonction pour mettre à jour les heures disponibles de fin
function updateHeureFin(heureDebut) {
    var heureFinSelect = document.getElementById("heureFin");
    heureFinSelect.innerHTML = "<option value=''>Sélectionner une heure de fin</option>";

    var startHour = parseInt(heureDebut.split(":")[0]);
    var startMinute = parseInt(heureDebut.split(":")[1]);

    // Remplir les options de l'heure de fin en fonction de l'heure de début
    for (var h = startHour; h <= 23; h++) {
        for (var m = 0; m < 60; m += 30) {
            var time = formatTime(h, m);
            var option = document.createElement("option");
            option.value = time;
            option.textContent = time;
            heureFinSelect.appendChild(option);
        }
    }

    // Activer le bouton de soumission si l'heure de fin est sélectionnée
    document.getElementById("submitBtn").disabled = false;
}

// Fonction pour mettre à jour les heures disponibles de début
function updateAvailableTimes(salleId, dateDebut) {
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

    // Mettre à jour les sélecteurs d'heure en fonction des heures réservées
    updateTimeSelectors(reservedHours);
}

// Fonction pour formater l'heure en "HH:MM"
function formatTime(hour, minutes) {
    return (hour < 10 ? "0" : "") + hour + ":" + (minutes < 10 ? "00" : minutes);
}

// Fonction pour mettre à jour les créneaux horaires disponibles
function updateTimeSelectors(reservedHours) {
    var heureDebutSelect = document.getElementById("heureDebut");

    // Vider les options actuelles
    heureDebutSelect.innerHTML = "<option value=''>Sélectionner une heure de début</option>";

    var startHour = 8;  // Par exemple, commencer à 8h du matin
    var endHour = 23;

    for (var h = startHour; h <= endHour; h++) {
        for (var m = 0; m < 60; m += 30) {
            var time = formatTime(h, m);
            var isReserved = false;

            // Vérification des réservations sur cette plage horaire
            reservedHours.forEach(function(reservation) {
                if (isTimeBetween(time, reservation.start, reservation.end)) {
                    isReserved = true;
                }
            });

            if (!isReserved) {
                var option = document.createElement("option");
                option.value = time;
                option.textContent = time;
                heureDebutSelect.appendChild(option);
            }
        }
    }
}

// Fonction pour vérifier si une heure est comprise entre deux heures
function isTimeBetween(time, start, end) {
    return time >= start && time <= end;
}

</script>



