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
    <form action="<?php echo base_url()?>Reservation/addNewReservation" method="post" >
              
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
                                                                    <input type="text" class="form-control" name="CIN" id="cin" onkeyup="cinClient(this.value)" placeholder="CIN"   required />
                                                                    <input hidden type="text" class="form-control" name="clientId" id="clientId" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Délivrée le </label>
                                                                    <input
                                                                        name="dateCin"
                                                                        id="dateCin"
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
                                                            <!-- Col -->
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label class="control-label">Nom</label>
                                                                    <input type="text" class="form-control" name="nom" id="nom" required placeholder="Nom de famille" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label class="control-label">Prenom</label>
                                                                    <input type="text" class="form-control" name="prenom" id="prenom" required placeholder="Prenom" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
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
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">N°</label>
                                                                    <input type="number" class="form-control" name="N" id="n" placeholder="N°" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Rue</label>
                                                                    <input type="text" class="form-control" name="rue" minlength="6" id="rue" placeholder="Rue" />
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Ville</label>
                                                                    
                                                                    <select name="ville" class="form-control" id="ville" required>
                                                                        <option value="">—— Selectionner —— </option>
                                                                        <option value="Ariana">Ariana</option>
                                                                        <option value="Béja">Béja</option>
                                                                        <option value="Ben Arous">Ben Arous</option>
                                                                        <option value="Bizerte">Bizerte</option>
                                                                        <option value="Gabes">Gabès</option>
                                                                        <option value="Gafsa">Gafsa</option>
                                                                        <option value="Jendouba">Jendouba</option>
                                                                        <option value="Kairouan">Kairouan</option>
                                                                        <option value="Kasserine">Kasserine</option>
                                                                        <option value="Kébili">Kébili</option>
                                                                        <option value="Kef">Kef</option>
                                                                        <option value="Mahdia">Mahdia</option>
                                                                        <option value="Manouba">Manouba</option>
                                                                        <option value="Médenine">Médenine</option>
                                                                        <option value="Monastir">Monastir</option>
                                                                        <option value="Nabeul">Nabeul</option>
                                                                        <option value="Sfax">Sfax</option>
                                                                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                                                                        <option value="Siliana">Siliana</option>
                                                                        <option value="Sousse">Sousse</option>
                                                                        <option value="Tataouine">Tataouine</option>
                                                                        <option value="Tozeur">Tozeur</option>
                                                                        <option value="Tunis">Tunis</option>
                                                                        <option value="Zaghouan">Zaghouan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- Col -->
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">code postale</label>
                                                                    <input type="number" class="form-control" min="1000" max="8000" name="codePostal" id="codePostal" placeholder="Code postale" />
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
                                                                        <label for="formGroupExampleInput">Titre</label>
                                                                        <input type="text" class="form-control" name="titre" placeholder="Titre de l'evenement" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="formGroupExampleInput">Date et heure</label>
                                                                        <!-- min="<?php echo date('Y-m-d') ?>" -->
                                                                        <input type="date" class="form-control" name="dateDebut"  placeholder="Example input" />
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="formGroupExampleInput">Debut</label>
                                                                        <input type="time" class="form-control" name="heureDebut" placeholder="Example input" />
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="formGroupExampleInput">Fin</label>
                                                                        <input type="time" class="form-control" name="heureFin" placeholder="Example input" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="formGroupExampleInput">Espace</label>
                                                                        <select  class="form-control" name="salle" id="salle"  required="">
                                                                            <option value=""></option>
                                                                            <?php foreach ($salleRecords as $record ) {
                                                                    ?>
                                                                            <option value="<?php echo $record->salleID ?>"> <?php echo $record->nom ?> </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="formGroupExampleInput2">Type</label>
                                                                        <select type="text" class="form-control" name="type">
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
                                                                    
                                                                    <div class="col-md-6">
                                                                        <label for="formGroupExampleInput2">Prix</label>
                                                                        <input type="number" class="form-control" min="300" name="prix" id="prix" placeholder="Prix" />
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="formGroupExampleInput2">invités</label>
                                                                        <input type="number" class="form-control" min="20" max="1000" name="nbPlace" id="nbPlace" placeholder="Nombre des invités" />
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="formGroupExampleInput">Options </label><br />
                                                                        <input type="checkbox" name="tableCM" value="1" /> Table contrat de mariage <br />
                                                                        <input type="checkbox" name="cuisine" value="1" /> Cuisine <br />
                                                                        <input type="checkbox" name="Troupe" value="1" /> Troupe<br />
                                                                        <input type="checkbox" name="Photographe" value="1" /> Photographe<br />
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="formGroupExampleInput">Note Administratif </label>
                                                                        <textarea class="form-control" row="20" name="noteAdmin"></textarea>
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
                        <button type="button" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
                        <button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
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