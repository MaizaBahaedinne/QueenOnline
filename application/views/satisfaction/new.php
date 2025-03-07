<style>
    .rating-container {
    background-color: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-bottom: 20px;
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
    font-size: 30px;
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
    .rating-container p {
    font-size: 16px;
    margin-top: 10px;
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
    <form action="<?php echo base_url(); ?>Satisfaction/addNewSatisfaction" method="post" >
        <div class="modal-body">
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h6 class="control-label"><b><?php echo $projectInfo->type; ?> :</b> <?php echo $projectInfo->titre; ?> </h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h6 class="control-label"><b>Lieu :</b> <?php echo $projectInfo->salle; ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h6 class="control-label"><b>Date :</b> <?php echo date_format(
                                                    date_create(
                                                        $projectInfo->dateFin
                                                    ),
                                                    "d/m/20y"
                                                    ); ?> </h6>
                                                    <input type="" hidden  name="reservationId" 
                                                    value="<?php echo $projectInfo->reservationId ?>" >
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label"> <i class="fa fa-sign-in" aria-hidden="true"></i> Remarque d'entrée</label>
                                                <textarea class="form-control" name="entre" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label"><i class="fa fa-sign-out" aria-hidden="true"></i> Remarque de sortie</label>
                                                <textarea class="form-control" name="sortie" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4 class="control-label">Evaluation</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Salle</h4>
                                                <div class="rating rating-salle">
                                                    <input type="radio" name="salle" id="salle5" value="5"><label for="salle5">&#9733;</label>
                                                    <input type="radio" name="salle" id="salle4" value="4"><label for="salle4">&#9733;</label>
                                                    <input type="radio" name="salle" id="salle3" value="3"><label for="salle3">&#9733;</label>
                                                    <input type="radio" name="salle" id="salle2" value="2"><label for="salle2">&#9733;</label>
                                                    <input type="radio" name="salle" id="salle1" value="1"><label for="salle1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Service -->
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Service</h4>
                                                <div class="rating rating-service">
                                                    <input type="radio" name="service" id="service5" value="5"><label for="service5">&#9733;</label>
                                                    <input type="radio" name="service" id="service4" value="4"><label for="service4">&#9733;</label>
                                                    <input type="radio" name="service" id="service3" value="3"><label for="service3">&#9733;</label>
                                                    <input type="radio" name="service" id="service2" value="2"><label for="service2">&#9733;</label>
                                                    <input type="radio" name="service" id="service1" value="1"><label for="service1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Propreté -->
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Propreté</h4>
                                                <div class="rating rating-proprete">
                                                    <input type="radio" name="proprete" id="proprete5" value="5"><label for="proprete5">&#9733;</label>
                                                    <input type="radio" name="proprete" id="proprete4" value="4"><label for="proprete4">&#9733;</label>
                                                    <input type="radio" name="proprete" id="proprete3" value="3"><label for="proprete3">&#9733;</label>
                                                    <input type="radio" name="proprete" id="proprete2" value="2"><label for="proprete2">&#9733;</label>
                                                    <input type="radio" name="proprete" id="proprete1" value="1"><label for="proprete1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Lumière -->
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Lumière</h4>
                                                <div class="rating rating-lumiere">
                                                    <input type="radio" name="lumiere" id="lumiere5" value="5"><label for="lumiere5">&#9733;</label>
                                                    <input type="radio" name="lumiere" id="lumiere4" value="4"><label for="lumiere4">&#9733;</label>
                                                    <input type="radio" name="lumiere" id="lumiere3" value="3"><label for="lumiere3">&#9733;</label>
                                                    <input type="radio" name="lumiere" id="lumiere2" value="2"><label for="lumiere2">&#9733;</label>
                                                    <input type="radio" name="lumiere" id="lumiere1" value="1"><label for="lumiere1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ajout de la décoration, photographe, troupe musicale, voiture -->
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Décoration</h4>
                                                <div class="rating rating-decoration">
                                                    <input type="radio" name="decoration" id="decoration5" value="5"><label for="decoration5">&#9733;</label>
                                                    <input type="radio" name="decoration" id="decoration4" value="4"><label for="decoration4">&#9733;</label>
                                                    <input type="radio" name="decoration" id="decoration3" value="3"><label for="decoration3">&#9733;</label>
                                                    <input type="radio" name="decoration" id="decoration2" value="2"><label for="decoration2">&#9733;</label>
                                                    <input type="radio" name="decoration" id="decoration1" value="1"><label for="decoration1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Photographe</h4>
                                                <div class="rating rating-photographe">
                                                    <input type="radio" name="photographe" id="photographe5" value="5"><label for="photographe5">&#9733;</label>
                                                    <input type="radio" name="photographe" id="photographe4" value="4"><label for="photographe4">&#9733;</label>
                                                    <input type="radio" name="photographe" id="photographe3" value="3"><label for="photographe3">&#9733;</label>
                                                    <input type="radio" name="photographe" id="photographe2" value="2"><label for="photographe2">&#9733;</label>
                                                    <input type="radio" name="photographe" id="photographe1" value="1"><label for="photographe1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Troupe musicale</h4>
                                                <div class="rating rating-musicale">
                                                    <input type="radio" name="musicale" id="musicale5" value="5"><label for="musicale5">&#9733;</label>
                                                    <input type="radio" name="musicale" id="musicale4" value="4"><label for="musicale4">&#9733;</label>
                                                    <input type="radio" name="musicale" id="musicale3" value="3"><label for="musicale3">&#9733;</label>
                                                    <input type="radio" name="musicale" id="musicale2" value="2"><label for="musicale2">&#9733;</label>
                                                    <input type="radio" name="musicale" id="musicale1" value="1"><label for="musicale1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="rating-container">
                                                <h4>Voiture</h4>
                                                <div class="rating rating-voiture">
                                                    <input type="radio" name="voiture" id="voiture5" value="5"><label for="voiture5">&#9733;</label>
                                                    <input type="radio" name="voiture" id="voiture4" value="4"><label for="voiture4">&#9733;</label>
                                                    <input type="radio" name="voiture" id="voiture3" value="3"><label for="voiture3">&#9733;</label>
                                                    <input type="radio" name="voiture" id="voiture2" value="2"><label for="voiture2">&#9733;</label>
                                                    <input type="radio" name="voiture" id="voiture1" value="1"><label for="voiture1">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Réclamation client</label>
                                                <textarea class="form-control" name="reclamation" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Réinitialiser</button>
                                <button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Envoyer</button>
                                <!--      <button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Précédent</button> -->
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