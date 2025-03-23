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
              <select class="form-control" name="salle" id="salle" required onchange="updateAvailableTimes();">
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
              <input type="date" class="form-control" id="dateDebut" name="dateDebut" min="<?php echo date('Y-m-d') ?>" onchange="updateAvailableTimes();">
            </div>

            <!-- Sélecteur Heure de début -->
            <div class="col-md-3">
              <select class="form-control" id="heureDebut" name="heureDebut" onchange="updateAvailableTimes();">
                <option value="">heure de début</option>
              </select>
            </div>

            <!-- Sélecteur Heure de fin -->
            <div class="col-md-3">
              <select class="form-control" id="heureFin" name="heureFin" onchange="updateAvailableTimes()">
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
// Fonction pour formater l'heure en HH:MM
        function formatTime(hour, minutes) {
            return (hour < 10 ? "0" : "") + hour + ":" + (minutes < 10 ? "00" : minutes);
        }

        // Fonction pour vérifier si l'heure est dans l'intervalle entre heureDebut et heureFin
        function isTimeBetween(time, startTime, endTime) {
            return time >= startTime && time < endTime;
        }

        // Fonction pour mettre à jour les horaires disponibles en fonction de la salle et de la date
        function updateAvailableTimes() {
            var salleSelect = document.getElementById("salle");
            var dateDebutInput = document.getElementById("dateDebut");
            var heureDebutSelect = document.getElementById("heureDebut");
            var heureFinSelect = document.getElementById("heureFin");
            var submitBtn = document.getElementById("submitBtn");

            var salleId = salleSelect.value;
            var dateDebut = dateDebutInput.value;

            // Si la salle ou la date n'est pas sélectionnée, ne pas afficher les heures
            if (!salleId) {
                resetFields();
                return;
            }

            // Désactiver tous les champs après avoir changé la salle
            document.querySelector("form").classList.add("disabled");

            // Réinitialiser le bouton
            submitBtn.disabled = true;

            // Vider les options actuelles pour les heures de début et de fin
            heureDebutSelect.innerHTML = "<option value=''>Sélectionner une heure de début</option>";
            heureFinSelect.innerHTML = "<option value=''>Sélectionner une heure de fin</option>";
            heureFinSelect.disabled = true;

            // Réinitialiser les heures à zéro
            dateDebutInput.disabled = false;
            heureDebutSelect.disabled = false;
            heureFinSelect.disabled = false;

            // Filtrer les réservations pour la salle et la date spécifiées
            var reservedSlots = reservations.filter(function (reservation) {
                return reservation.salleId === salleId && reservation.dateDebut === dateDebut;
            });

            // Remplir les options d'heure de début en fonction des créneaux disponibles
            var startHour = 8;  // Par exemple, commencer à 8h du matin
            var endHour = 23;   // Fin de journée à 23h59

            for (var h = startHour; h <= endHour; h++) {
                for (var m = 0; m < 60; m += 30) {
                    var time = formatTime(h, m);
                    var isReserved = false;

                    // Vérifier si l'heure est réservée
                    for (var i = 0; i < reservedSlots.length; i++) {
                        var reservation = reservedSlots[i];

                        // Vérifier si l'heure de début est dans la plage horaire réservée
                        if (isTimeBetween(time, reservation.heureDebut, reservation.heureFin)) {
                            isReserved = true;
                            break;
                        }
                    }

                    if (!isReserved) {
                        // Ajouter l'heure à la liste des options disponibles pour l'heure de début
                        var option = document.createElement("option");
                        option.value = time;
                        option.textContent = time;
                        heureDebutSelect.appendChild(option);
                    }
                }
            }

            // Activer la salle, la date et les heures
            document.querySelector("form").classList.remove("disabled");
        }

        // Fonction pour mettre à jour les options de l'heure de fin en fonction de l'heure de début
        document.getElementById("heureDebut").addEventListener("change", function () {
            var heureDebutSelect = document.getElementById("heureDebut");
            var heureFinSelect = document.getElementById("heureFin");
            var submitBtn = document.getElementById("submitBtn");

            var heureDebut = heureDebutSelect.value;

            // Si aucune heure de début n'est sélectionnée, désactiver l'heure de fin
            if (!heureDebut) {
                heureFinSelect.disabled = true;
                submitBtn.disabled = true;
                return;
            }

            // Vider les options actuelles pour l'heure de fin
            heureFinSelect.innerHTML = "<option value=''>Sélectionner une heure de fin</option>";

            // Ajouter des options pour l'heure de fin (doit être supérieure à l'heure de début)
            var startHour = parseInt(heureDebut.split(":")[0]);
            var startMinute = parseInt(heureDebut.split(":")[1]);

            for (var h = startHour; h <= 23; h++) {
                for (var m = (h === startHour ? startMinute + 30 : 0); m < 60; m += 30) {
                    var time = formatTime(h, m);

                    // Ajouter l'heure à la liste des options disponibles pour l'heure de fin
                    var option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    heureFinSelect.appendChild(option);
                }
            }

            // Activer l'heure de fin
            heureFinSelect.disabled = false;
            submitBtn.disabled = false;
        });

        // Fonction de validation de l'heure
        function validateTime() {
            var heureDebutSelect = document.getElementById("heureDebut");
            var heureFinSelect = document.getElementById("heureFin");
            var submitBtn = document.getElementById("submitBtn");

            var heureDebut = heureDebutSelect.value;
            var heureFin = heureFinSelect.value;

            // Si l'heure de fin est inférieure à l'heure de début, désactiver le bouton
            if (heureDebut && heureFin && heureDebut >= heureFin) {
                submitBtn.disabled = true;
            } else {
                submitBtn.disabled = false;
            }
        }

        // Fonction pour réinitialiser les champs
        function resetFields() {
            document.getElementById("salle").value = "";
            document.getElementById("dateDebut").value = "";
            document.getElementById("heureDebut").value = "";
            document.getElementById("heureFin").value = "";
            document.getElementById("submitBtn").disabled = true;
            document.getElementById("heureDebut").disabled = true;
            document.getElementById("heureFin").disabled = true;
            document.getElementById("dateDebut").disabled = true;
        }
    </script>



