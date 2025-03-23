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
            <div class="col-md-4">
              <label for="formGroupExampleInput">Espace</label>
              <select class="form-control" name="salle" id="salle" required>
                <option value=""></option>
                <?php foreach ($salleRecords as $record) { ?>
                  <option value="<?php echo $record->salleID ?>"> <?php echo $record->nom ?> </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="formGroupExampleInput2">Type</label>
              <select class="form-control" name="type" required>
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
              <input type="number" class="form-control" min="300" name="prix" placeholder="Prix">
            </div>

            <div class="col-md-6">
              <label for="formGroupExampleInput">Date</label>
              <input type="date" class="form-control" id="dateDebut" name="dateDebut" min="<?php echo date('Y-m-d') ?>" onchange="updateAvailableTimes()">
            </div>

            <div class="col-md-3">
              <select class="form-control" id="heureDebut" name="heureDebut" onchange="validateTimes()">
                <option value="">heure de début</option>
              </select>
            </div>

            <div class="col-md-3">
              <select class="form-control" id="heureFin" name="heureFin" onchange="validateTimes()">
                <option value="">heure de fin</option>
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
          <button type="submit" class="btn btn-primary btn-lg btn-block" id="submitBtn" disabled>Continuer</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    // Définir la fonction updateAvailableTimes ici
    var reseAvenir = <?php echo json_encode($reseAvenir); ?>;

    function updateAvailableTimes() {
        const dateInput = document.getElementById('dateDebut');
        const salleSelect = document.getElementById('salle');
        const heureDebutSelect = document.getElementById('heureDebut');
        const heureFinSelect = document.getElementById('heureFin');
        const submitButton = document.querySelector("button[type='submit']");

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

        const reservedTimes = reseAvenir.filter(reservation =>
            reservation.dateDebut === selectedDate && reservation.salleId === selectedSalle
        );

        let timeSlots = [];
        let startHour = 8; // 08:00 AM
        let endHour = 23; // 11:00 PM

        for (let hour = startHour; hour <= endHour; hour++) {
            let hourString = hour < 10 ? '0' + hour : hour;
            timeSlots.push(hourString + ":00");
            timeSlots.push(hourString + ":30");
        }

        timeSlots.push("23:59");

        heureDebutSelect.innerHTML = '<option value="">heure de début</option>';
        timeSlots.forEach(time => {
            let option = document.createElement('option');
            option.value = time;
            option.innerHTML = time;

            let isReserved = reservedTimes.some(reservation => reservation.heureDebut <= time && reservation.heureFin > time);

            if (isReserved) {
                option.disabled = true;
            }

            heureDebutSelect.appendChild(option);
        });

        heureFinSelect.innerHTML = '<option value="">heure de fin</option>';
        timeSlots.forEach(time => {
            let option = document.createElement('option');
            option.value = time;
            option.innerHTML = time;

            let isReserved = reservedTimes.some(reservation => reservation.heureDebut <= time && reservation.heureFin > time);

            if (isReserved) {
                option.disabled = true;
            }

            heureFinSelect.appendChild(option);
        });

        

        toggleSubmitButton();
    }

    function toggleSubmitButton() {
        const dateInput = document.getElementById('dateDebut');
        const salleSelect = document.getElementById('salle');
        const heureDebutSelect = document.getElementById('heureDebut');
        const heureFinSelect = document.getElementById('heureFin');
        const submitButton = document.querySelector("button[type='submit']");

        if (dateInput.value && salleSelect.value && heureDebutSelect.value && heureFinSelect.value) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    document.getElementById('salle').addEventListener('change', updateAvailableTimes);
    document.getElementById('dateDebut').addEventListener('change', updateAvailableTimes);

    // Initialiser les créneaux horaires à la première ouverture de la page
    updateAvailableTimes();
});

</script>

