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
              <select class="form-control" name="salle" id="salle" required onchange="onSalleChange();">
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
              <input type="date" class="form-control" id="dateDebut" name="dateDebut" min="<?php echo date('Y-m-d') ?>" onchange="updateAvailableTimes(); resetTimeFields(); onDateChange();">
            </div>

            <!-- Sélecteur Heure de début -->
            <div class="col-md-3">
              <select class="form-control" id="heureDebut" name="heureDebut" onchange="validateTimes(); onHeureDebutChange();">
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

<script>
// Récupérer les réservations depuis PHP
var reservations = <?php echo json_encode($reseAvenir); ?>;

// Fonction appelée lors du changement de la salle
function onSalleChange() {
    var salleId = document.getElementById("salle").value;
    var dateDebut = document.getElementById("dateDebut").value;

    // Désactivation du champ salle après sélection
    document.getElementById("salle").disabled = true;  // Désactiver le champ de salle après sélection

    // Réinitialisation des champs associés
    resetTimeFields();  // Appel de la fonction resetTimeFields pour réinitialiser les heures et le bouton

    // Si la salle et la date sont sélectionnées, mettre à jour les heures
    if (salleId && dateDebut) {
        updateAvailableTimes(salleId, dateDebut);
    }
}

// Fonction pour réinitialiser les champs liés aux heures
function resetTimeFields() {
    document.getElementById("heureDebut").innerHTML = "<option value=''>Sélectionner une heure de début</option>"; // Vider les options d'heure de début
    document.getElementById("heureFin").innerHTML = "<option value=''>Sélectionner une heure de fin</option>"; // Vider les options d'heure de fin
    document.getElementById("heureDebut").disabled = true; // Désactiver l'heure de début
    document.getElementById("heureFin").disabled = true; // Désactiver l'heure de fin
    document.getElementById("submitBtn").disabled = true; // Désactiver le bouton de soumission
}

// Fonction appelée lors du changement de la date
function onDateChange() {
    var salleId = document.getElementById("salle").value;
    var dateDebut = document.getElementById("dateDebut").value;

    // Réinitialiser les champs des heures si la date est changée
    resetTimeFields();  // Appel de la fonction resetTimeFields pour réinitialiser les heures et le bouton

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

    // Si une heure de début est sélectionnée, mettre à jour les heures de fin possibles
    if (heureDebut) {
        document.getElementById("heureFin").disabled = false;
        updateHeureFin(heureDebut);  // Mettre à jour les options d'heure de fin
    } else {
        document.getElementById("heureFin").disabled = true;
        document.getElementById("submitBtn").disabled = true; // Désactiver le bouton de soumission
    }
}

// Fonction pour mettre à jour les heures disponibles de fin
function updateHeureFin(heureDebut) {
    var heureFinSelect = document.getElementById("heureFin");
    heureFinSelect.innerHTML = "<option value=''>Sélectionner une heure de fin</option>"; // Réinitialiser les options

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

    // Activer le bouton de soumission si une heure de fin est sélectionnée
    document.getElementById("submitBtn").disabled = false;
}

// Fonction pour formater l'heure en "HH:MM"
function formatTime(hour, minutes) {
    return (hour < 10 ? "0" : "") + hour + ":" + (minutes < 10 ? "00" : minutes);
}

// Fonction pour mettre à jour les créneaux horaires disponibles
function updateAvailableTimes(salleId, dateDebut) {
    // Filtrer les réservations par salle et date
    var reservedHours = reservations.filter(function(reservation) {
        return reservation.salleId == salleId && reservation.dateDebut == dateDebut;
    });

    // Vider les options actuelles d'heure de début
    var heureDebutSelect = document.getElementById("heureDebut");
    heureDebutSelect.innerHTML = "<option value=''>Sélectionner une heure de début</option>";

    var startHour = 8;  // Par exemple, commencer à 8h du matin
    var endHour = 23;

    // Remplir les options d'heure de début disponibles en fonction des horaires réservés
    for (var h = startHour; h <= endHour; h++) {
        for (var m = 0; m < 60; m += 30) {
            var time = formatTime(h, m);
            var isReserved = false;

            // Vérification des créneaux réservés
            reservedHours.forEach(function(reservation) {
                if (isTimeBetween(time, reservation.heureDebut, reservation.heureFin)) {
                    isReserved = true;
                }
            });

            // Si l'heure n'est pas réservée, l'ajouter à la liste, sinon, désactiver l'option
            var option = document.createElement("option");
            option.value = time;
            option.textContent = time;
            if (isReserved) {
                option.disabled = true;  // Désactiver les heures réservées
            }
            heureDebutSelect.appendChild(option);
        }
    }

    // Réactiver l'heure de début
    document.getElementById("heureDebut").disabled = false;
}

// Fonction pour vérifier si une heure est comprise entre deux heures
function isTimeBetween(time, start, end) {
    return time >= start && time < end;
}

// Fonction de validation des heures (debut < fin)
function validateTimes() {
    var heureDebut = document.getElementById("heureDebut").value;
    var heureFin = document.getElementById("heureFin").value;

    // Si les heures sont valides, activer le bouton de soumission, sinon le désactiver
    if (heureDebut && heureFin) {
        var debutParts = heureDebut.split(":");
        var finParts = heureFin.split(":");

        var heureDebutMinutes = parseInt(debutParts[0]) * 60 + parseInt(debutParts[1]);
        var heureFinMinutes = parseInt(finParts[0]) * 60 + parseInt(finParts[1]);

        if (heureFinMinutes > heureDebutMinutes) {
            document.getElementById("submitBtn").disabled = false;  // Activer le bouton de soumission
        } else {
            document.getElementById("submitBtn").disabled = true;  // Désactiver le bouton de soumission
        }
    }
}

// Attacher la fonction de validation au changement d'heure de début et de fin
document.getElementById("heureDebut").addEventListener("change", validateTimes);
document.getElementById("heureFin").addEventListener("change", validateTimes);
</script>





