
<style>
  


.form-style {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  max-width: 1000px;
  margin: auto;
}

.entree-row {
  border: 1px solid #ccc;
  padding: 15px;
  margin-bottom: 10px;
  border-radius: 8px;
  background-color: #fafafa;
}

.row {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.col {
  flex: 1;
  min-width: 150px;
  display: flex;
  flex-direction: column;
}

input, select, button {
  padding: 8px;
  margin-top: 5px;
  font-size: 14px;
}

button {
  cursor: pointer;
}

.delete-col {
  display: flex;
  align-items: end;
}

.remove-btn {
  background-color: #e74c3c;
  color: white;
  border: none;
  padding: 6px 10px;
  border-radius: 5px;
}

.form-buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

#add-row {
  background-color: #3498db;
  color: white;
  border: none;
  padding: 8px 15px;
  border-radius: 5px;
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
          Ajout des entrées 
          <div class="page-title-subheading"></div>
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
        
        <?php if (count($retours) == 0 ) { ?> 
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        

        <h3>Entrées existantes</h3>

         <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?= $this->session->flashdata('success') ?>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?= $this->session->flashdata('error') ?>
        </div>
      <?php endif; ?>

        <?php foreach ($entrees as $entree) : ?>
          <div class="entree-row old-entry mb-3" data-id="<?= $entree->entreeId ?>" style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
            <div class="row align-items-center">
              <div class="col">
                <h4><?= $entree->quantite ?>x</h4>
              </div>
              <div class="col">
                <h4><?= ucfirst($entree->nature) ?></h4>
              </div>
              <div class="col">
                <input type="number" min="0"  step="0,1" class="form-control quantite-input" placeholder="Ajouter...">
              </div>
              <div class="col">
                <select class="form-select moment-select" required>
                  <option value="">-- Choisir --</option>
                  <option value="debut" <?= $entree->moment_service == 'debut' ? 'selected' : '' ?>>Début</option>
                  <option value="diner" <?= $entree->moment_service == 'diner' ? 'selected' : '' ?>>Dîner</option>
                  <option value="milieu" <?= $entree->moment_service == 'milieu' ? 'selected' : '' ?>>Milieu</option>
                  <option value="fin" <?= $entree->moment_service == 'fin' ? 'selected' : '' ?>>Fin</option>
                </select>
              </div>
              <div class="col">
                <button type="button" class="btn btn-success btn-sm btn-confirmer" style="display: none;">
                  ✅ Confirmer
                </button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-outline-secondary btn-sm toggle-note" data-target="note-<?= $entree->entreeId ?>">
                  📄 Voir la note
                </button>
              </div>
            </div>

            <!-- Bloc note masqué -->
            <div id="note-<?= $entree->entreeId ?>" class="note-content mt-2" style="display: none; background: #f9f9f9; padding: 10px; border-left: 3px solid #007bff;">
              <?php echo $entree->note ?>
            </div>
          </div>
        <?php endforeach; ?>




          <!-- ➕ NOUVELLES ENTRÉES -->
      <form method="post" action="<?php echo base_url() ?>Service/addEntrees/<?php echo $reservation->reservationId ?>" class="form-style">
          <h3>Ajouter de nouvelles entrées</h3>
          <div id="entree-container">
            <div class="entree-row">
              <div class="row">
                <div class="col">
                  <label>Quantité</label>
                  <input type="number" step="0.1" name="quantite[]" required>
                </div>
                <div class="col">
                  <label>Nature</label>
                  <input list="natures" name="nature[]" required>
                </div>
                <div class="col">
                  <label>Moment</label>
                  <select name="moment_service[]" required>
                    <option value="">-- Choisir --</option>
                    <option value="debut">Début</option>
                    <option value="diner">Dîner</option>
                    <option value="milieu">Milieu</option>
                    <option value="fin">Fin</option>
                  </select>
                </div>
                <div class="col">
                  
                  <textarea hidden name="note[]"></textarea>
                </div>
                <div class="col delete-col">
                  <button type="button" class="remove-btn">X</button>
                </div>
              </div>
            </div>
          </div>

          <datalist id="natures">
            <!-- Optionnel : tu peux mettre des valeurs par défaut -->
            <option value="Jus">
            <option value="Eau">
            <option value="Pâtisserie">
            <option value="Gâteau">
            <option value="Salé">
          </datalist>

          <!-- ✅ BOUTONS -->
          <div class="form-buttons">
            <button type="button" id="add-row">+ Ajouter une ligne</button>
            <button type="submit">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </section>
 <?php } ?> 
        

    </div>
  </div>
</div>
<!-- Modal -->



      <script type="text/javascript">
        const naturesExistantes = [
              "Jus", "Eau", "Pâtisserie", "Gâteau", "Salé", "Boisson gazeuse", "Thé", "Café", "Snack", "Fruit"
            ];

            // Remplir datalist
            const datalist = document.getElementById("natures");
            naturesExistantes.forEach(nature => {
              const option = document.createElement("option");
              option.value = nature;
              datalist.appendChild(option);
            });

            // Ajouter ligne
            document.getElementById('add-row').addEventListener('click', () => {
              const container = document.getElementById('entree-container');
              const firstRow = container.querySelector('.entree-row');
              const clone = firstRow.cloneNode(true);
              clone.querySelectorAll('input, select').forEach(input => input.value = '');
              container.appendChild(clone);
            });

            // Supprimer ligne
            document.addEventListener('click', function (e) {
              if (e.target && e.target.classList.contains('remove-btn')) {
                const rows = document.querySelectorAll('.entree-row');
                if (rows.length > 1) {
                  e.target.closest('.entree-row').remove();
                }
              }
            });



      </script>

      <script>
        document.querySelectorAll('.toggle-note').forEach(function(button) {
          button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const note = document.getElementById(targetId);
            if (note.style.display === "none") {
              note.style.display = "block";
              this.innerText = "📄 Cacher la note";
            } else {
              note.style.display = "none";
              this.innerText = "📄 Voir la note";
            }
          });
        });
      </script>


<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.entree-row').forEach(row => {
    const id = row.dataset.id;
    if (!id) {
      console.warn("⚠️ Ligne sans data-id. Ignorée.");
      return;
    }

    const quantiteInput = row.querySelector('.quantite-input');
    const momentSelect = row.querySelector('.moment-select');
    const btnConfirmer = row.querySelector('.btn-confirmer');

    if (!quantiteInput || !momentSelect || !btnConfirmer) {
      console.warn("❌ Élément manquant dans la ligne avec id", id);
      return;
    }

    // Affiche bouton si quantite ou moment change
    const showBtn = () => { btnConfirmer.style.display = 'inline-block'; };

    quantiteInput.addEventListener('change', showBtn);
    momentSelect.addEventListener('change', showBtn);

    btnConfirmer.addEventListener('click', () => {
      const quantite = parseInt(quantiteInput.value);
      const moment_service = momentSelect.value;

      if (isNaN(quantite) || quantite < 0 || moment_service === '') {
        alert("⚠️ Veuillez entrer une quantité valide et choisir un moment de service.");
        return;
      }

      fetch('<?= base_url("API/update_entree") ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, quantite, moment_service })
      })
      .then(response => {
        if (!response.ok) throw new Error('Erreur serveur');
        return response.json();
      })
      .then(data => {
        if (data.success) {
          alert("✅ Entrée mise à jour !");
          btnConfirmer.style.display = 'none';
          // Ne vide pas le champ, laisse l'utilisateur décider
          location.reload();
        } else if (data.error) {
          throw new Error(data.error);
        } else {
          throw new Error("Erreur de mise à jour inconnue");
        }
      })
      .catch(error => {
        console.error("Erreur fetch:", error.message);
        alert(`❌ Une erreur est survenue : ${error.message}`);
      });
    });
  });
});
</script>



