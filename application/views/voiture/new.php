
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-car icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Reservation des voitures
          <div class="page-title-subheading">Nouvelle reservation</div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
         
          
        </div>
      </div>
    </div>
  </div>
<form action="<?php echo base_url()?>Voiture/addNewReservation" method="post">
              
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div id="smartwizard">
                                                <ul class="forms-wizard">
                                                    <li>
                                                        <a href="#step-1" disabled>
                                                            <em><i class="fa fa-user"></i></em><span>Client</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-2" disabled>
                                                            <em><i class="fa fa-calendar" aria-hidden="true"></i></em><span>Reservation</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-3" disabled>
                                                            <em><i class="fa fa-file"></i></em><span>Verification</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <br><br>
                                                <div class="form-wizard-content">
                                                    <div id="step-1">
                                                        <div class="form-row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Carte d'identié national</label>
                                                                    <input type="text" class="form-control" name="CIN" id="cin"  onkeyup="cinClient(this.value)" placeholder="CIN" value="<?php echo $this->input->get('cin') ?>" required />
                                                                    <input hidden type="text" class="form-control" name="clientId" id="clientId" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Délivrée le </label>
                                                                    <input
                                                                        name="dateCin"
                                                                        class="form-control mb-4 mb-md-0"
                                                                        im-insert="false"
                                                                        type="Date"
                                                                        required
                                                                        max="<?php echo date('Y-m-d') ?>"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group">
                                                                    <label class="control-label">Nom</label>
                                                                    <input type="text" class="form-control" name="nom" id="nom" required placeholder="Nom de famille" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group">
                                                                    <label class="control-label">Prenom</label>
                                                                    <input type="text" class="form-control" name="prenom" id="prenom" required placeholder="Prenom" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="position-relative form-group">
                                                                    <label class="control-label">Date de naissance</label>
                                                                    <input
                                                                        name="birth"
                                                                        id="birth"
                                                                        class="form-control mb-4 mb-md-0"
                                                                        data-inputmask="'alias': 'datetime'"
                                                                        data-inputmask-inputformat="dd/mm/yyyy"
                                                                        im-insert="false"
                                                                        type="Date"
                                                                        required
                                                                        max="<?php echo date('Y-m-d') ?>"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative form-group">
                                                            <div class="form-group">
                                                                <label class="control-label">Sexe : </label>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="sexe" checked value="Homme" class="form-check-input" />
                                                                        Homme
                                                                        <i class="input-frame"></i>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="sexe" value="Femme" class="form-check-input" />
                                                                        Femme
                                                                        <i class="input-frame"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row"></div>
                                                        <div class="position-relative form-group"></div>
                                                        <div class="form-row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">N°</label>
                                                                    <input type="text" class="form-control" name="N" id="n" placeholder="N°" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label class="control-label">Rue</label>
                                                                    <input type="text" class="form-control" name="rue" id="rue" placeholder="Rue" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label class="control-label">Ville</label>
                                                                    <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" required />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">code postale</label>
                                                                    <input type="text" class="form-control" name="codePostal" id="codePostal" placeholder="Code postale" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input name="email" id="email" placeholder="E-mail" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" im-insert="true" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Mobile</label>
                                                                    <input id="mobile" name="mobile" class="form-control mb-4 mb-md-0" data-inputmask-alias="99 999 999" im-insert="true" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Mobile 2</label>
                                                                    <input id="mobile2" name="mobile2" class="form-control mb-4 mb-md-0" data-inputmask-alias="99 999 999" im-insert="true" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                        </div>
                                                    </div>
                                                    <div id="step-2">
                                                        <div data-parent="#accordion" id="collapseOne" aria-labelledby="headingOne" class="collapse show">
                                                            <div class="card-body">
                                                                <div class="form-row">

                                                                	<div class="col-md-12">
                                                                        <label for="formGroupExampleInput">Code Reservation</label>
                                                                        <input readonly type="number" class="form-control" value="<?php echo $this->input->get('reservationId') ?>" name="reservationId"  placeholder="Reservation Hors queen park" />
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <label for="formGroupExampleInput">Date et heure</label>
                                                                        <input type="date" class="form-control" name="dateDebut" min="<?php echo date('Y-m-d') ?>" placeholder="Example input" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    	<label for="formGroupExampleInput">heure de départ du client</label>
                                                                        <input type="time" class="form-control" name="heureDebut" placeholder="" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    	<label for="formGroupExampleInput">heure de retoure vers queen park</label>
                                                                        <input type="time" class="form-control" name="heureFin" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                    	 <label for="formGroupExampleInput2">Lieu de Départ</label>
                                                                        <input type="url" class="form-control" row="20" name="depart"  required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    	 <label for="formGroupExampleInput2">Lieu de Arrivée</label>
                                                                        <input type="url" class="form-control" row="20" name="arrivee" required>
                                                                    </div>


                                                                    <div class="col-md-12">
                                                                    	 <label for="formGroupExampleInput2">Google Maps</label>
                                                                        <textarea type="url" class="form-control" row="20" name="maps" required></textarea>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="col-md-12">
                                                                        <label for="formGroupExampleInput2">Prix</label>
                                                                        <input type="number" class="form-control" min="300" name="prix"  placeholder="Prix" />
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="formGroupExampleInput2">Avance</label>
                                                                        <input type="number" class="form-control" min="300" name="avance"  placeholder="Prix" />
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <label for="formGroupExampleInput">Note Administratif </label>
                                                                        <textarea class="form-control" row="40" name="noteAdmin"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="step-3">
                                                        <div class="no-results">
                                                            <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                                <span class="swal2-success-line-tip"></span>
                                                                <span class="swal2-success-line-long"></span>
                                                                <div class="swal2-success-ring"></div>
                                                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                            </div>
                                                            <div class="results-subtitle mt-4">Finished!</div>
                                                            <div class="results-title">You arrived at the last form wizard step!</div>
                                                            <div class="mt-3 mb-3"></div>
                                                            <div class="text-center">
                                                                <input type="submit" class="btn-shadow btn-wide btn btn-success btn-lg" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                        <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                        <button type="button" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Suivant</button>
                        <button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Précedent</button>
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