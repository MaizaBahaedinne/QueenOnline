    <style>
        .rating {
            display: flex;
            direction: row;
            font-size: 30px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            cursor: pointer;
            color: #ddd;
            transition: color 0.2s;
        }

        .rating input:checked ~ label {
            color: #ffcc00; /* Or couleur dorée */
        }

        .rating input:checked + label {
            color: #ffcc00;
        }

        .rating input:hover ~ label {
            color: #ffcc00;
        }

        .rating input:checked ~ label:hover {
            color: #ffcc00;
        }
    </style>




<div id="LoadingDiv" style="left: -200px;">
    <div>
        <img src="images/loading.gif" title="Loading" />
        <div class="LoadingTitle">Veuillez Patientez ...</div>
    </div>
</div>


<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Reservation de salle
          <div class="page-title-subheading">Les reservations</div>
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
                                            <div id="smartwizard">
                                            
                                                <div class="form-wizard-content">
                                                    <div id="step-1">
                                                        <div class="form-row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Salle : <?php echo $record->salle  ?></label>
                                                                    
                                                                </div>
                                                            </div>   
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Date : <?php  echo date_format(date_create($record->dateFin)  , 'd/m/20y');   ?> </label>
                                                                    
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

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Evaluation</label>
                                                                    
                                                                </div>
                                                            </div> 

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">La salle</label><br>
                                                                    <div class="rating1">
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
                                                                    <p id="rating-result1">Vous n'avez pas encore noté.</p>
                                                                    <script>
                                                                        const stars = document.querySelectorAll('.rating1 input');
                                                                        const resultText = document.getElementById('rating-result1');

                                                                        stars.forEach(star => {
                                                                            star.addEventListener('change', function() {
                                                                                const ratingValue = this.value;
                                                                                resultText.textContent = `Vous avez donné une note de ${ratingValue} étoile${ratingValue > 1 ? 's' : ''}.`;
                                                                            });
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Service</label>
                                                                    <div class="rating1">
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
                                                                    <p id="rating-result1">Vous n'avez pas encore noté.</p>
                                                                    <script>
                                                                        const stars = document.querySelectorAll('.rating1 input');
                                                                        const resultText = document.getElementById('rating-result1');

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
                                                                    <label class="control-label">Reclamation</label>
                                                                    
                                                                </div>
                                                            </div>                                                      
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <h4>Confirmation</h4>

                                                        <div class="no-results">
                                                            <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                                <span class="swal2-success-line-tip"></span>
                                                                <span class="swal2-success-line-long"></span>
                                                                <div class="swal2-success-ring"></div>
                                                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                            </div>
                                                            <div class="results-subtitle mt-4">Fini!</div>
                                                            <div class="results-title">Vous êtes arrivé à la dernière étape de l'assistant de formulaire</div>
                                                            <div class="mt-3 mb-3"></div>
                                                            <div class="text-center">
                                                                
                                                                <button type="submit" onclick="LoadingDiv()" class="btn-shadow btn-wide btn btn-success btn-lg" />Confirmer<span class="spinner"></span>
                                                               
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


<script type="text/javascript">
var div = $("#LoadingDiv");
function LoadingDiv() {
    div.animate({
        left: parseInt(div.css('left'), 10) == 0 ?
          -div.outerWidth() * 2 :
          0
    });
}</script>
