    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .rating-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .rating {
            display: inline-flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 20px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s ease, transform 0.2s ease;
            margin: 0 5px;
        }

        .rating label:hover,
        .rating label:hover ~ label {
            color: #ffcc00;
            transform: scale(1.2);
        }

        .rating input:checked ~ label {
            color: #ffcc00;
        }

        .rating input:checked + label {
            color: #ffcc00;
        }

        .rating-container p {
            font-size: 18px;
            margin-top: 20px;
            color: #555;
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
                    Satisfaction  de salle
                    <div class="page-title-subheading">satisfacation</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block">
                </div>
            </div>
        </div>
    </div>
    <form action="<?php echo base_url()?>Satisfaction/addNewSatisfaction" method="post" >
        <div class="modal-body">
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                  
                                        
                                                <div class="form-row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Lieu : <?php echo $projectInfo->salle  ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Date : <?php  echo date_format(date_create($projectInfo->dateFin)  , 'd/m/20y');   ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo $projectInfo->type ?> : <?php echo $projectInfo->titre ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Remarque pour l'entré</label>
                                                            <textarea class="form-control" name="entre" rows="20"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Remarque pour le sortie</label>
                                                            <textarea class="form-control" name="sortie" rows="20"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <h4 class="control-label">Evaluation</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">La salle</label><br>
                                                            <<div class="rating-container">
                                                                <h4>Notez la salle</h4>
                                                                <div class="rating">
                                                                    <input type="radio" name="rating" id="star5" value="5">
                                                                    <label for="star5">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star4" value="4">
                                                                    <label for="star4">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star3" value="3">
                                                                    <label for="star3">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star2" value="2">
                                                                    <label for="star2">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star1" value="1">
                                                                    <label for="star1">&#9733;</label>
                                                                </div>
                                                                <p id="rating-result">Vous n'avez pas encore noté.</p>
                                                                <script>
                                                                    const stars = document.querySelectorAll('.rating input');
                                                                    const resultText = document.getElementById('rating-result');

                                                                    stars.forEach(star => {
                                                                        star.addEventListener('change', function() {
                                                                            const ratingValue = this.value;
                                                                            resultText.textContent = `Vous avez donné une note de ${ratingValue} étoile${ratingValue > 1 ? 's' : ''}.`;
                                                                        });
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Service</label>
                                                            <div class="rating2">
                                                                <input type="radio" name="rating" id="star1" value="1">
                                                                <label for="star1">&#9733;</label>
                                                                <input type="radio" name="rating" id="star2" value="2">
                                                                <label for="star2">&#9733;</label>
                                                                <input type="radio" name="rating" id="star3" value="3">
                                                                <label for="star3">&#9733;</label>
                                                                <input type="radio" name="rating" id="star4" value="4">
                                                                <label for="star4">&#9733;</label>
                                                                <input type="radio" name="rating" id="star5" value="5">
                                                                <label for="star5">&#9733;</label>
                                                            </div>
                                                            <p id="rating-result2">Vous n'avez pas encore noté.</p>
                                                            <script>
                                                                const stars = document.querySelectorAll('.rating2 input');
                                                                const resultText = document.getElementById('rating-result2');
                                                                
                                                                stars.forEach(star => {
                                                                    star.addEventListener('change', function() {
                                                                        const ratingValue = this.value;
                                                                        resultText.textContent = `Vous avez donné une note de ${ratingValue} étoile${ratingValue > 1 ? 's' : ''}.`;
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Réclamation</label>
                                                            <textarea class="form-control" name="Reclamation" rows="20"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                        
                                        
                                   
                                </div>
                            </div>
                            <div class="clearfix">
                            <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                            <!--     <button type="button" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Suivant</button>
                                <button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Précédent</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</form>
</div>