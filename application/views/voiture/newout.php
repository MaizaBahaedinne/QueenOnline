<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
            </div>
            <div>
               Reservation
               <div class="page-title-subheading">Les reservations</div>
            </div>
         </div>
         <div class="page-title-actions">
            <div class="d-inline-block">
            </div>
         </div>
      </div>
   </div>
   <form action="<?php echo base_url()?>Reservation/addNewReservation" method="post">
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
                                             <div class="tab-content">
                                                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                                   <div class="row">
                                                      <div class="col-lg-12 col-md-12">
                                                         <div class="main-card mb-3 card">
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div class="col-md-7">
                                                                     <div class="form-group">
                                                                        <label class="control-label">Voiture </label>
                                                                        <select class="form-control" name="voitureName" required>
                                                                           <option value=""></option>
                                                                           <option value="Limou'queen">Limou'queen</option>
                                                                           <option value="Queen traction">Queen traction</option>
                                                                        </select>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                     <div class="form-group">
                                                                        <label class="control-label">Date </label>
                                                                        <input
                                                                           name="date"
                                                                           class="form-control mb-4 mb-md-0"
                                                                          
                                                                           type="date"
                                                                           required
                                                                          
                                                                           />
                                                                        <!-- value="<?php echo date_format(date_create($projectInfo->dateDebut)  , 'd/m/20y');  ?>"-->
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-2">
                                                                     <label for="formGroupExampleInput">Départ</label>
                                                                     <input type="time" class="form-control" name="depart"  />
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                     <br>
                                                                     <strong>Détail de transfère</strong>
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <label for="formGroupExampleInput">Point de départ</label>
                                                                     <input type="text" class="form-control" name="l1"  />
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <label for="formGroupExampleInput">Point d'arret </label>
                                                                     <input type="text" class="form-control" name="l2"  />
                                                                  </div>
                                                                  <div class="col-md-4">
                                                                     <label for="formGroupExampleInput">Point d'arrivé</label>
                                                                     <input type="text" class="form-control" name="l3"   />
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                     <br>
                                                                     <label for="formGroupExampleInput">type de transfère</label>
                                                                     <br>
                                                                     <input type="checkbox"    id="aller" />
                                                                     <label for="formGroupExampleInput">Aller/retour</label>
                                                                  </div>
                                                                  <div class="col-md-4" id="l4" style="display: none">
                                                                     <label for="formGroupExampleInput">Point de retour</label>
                                                                     <input type="text" class="form-control" name="l4"  />
                                                                     <script type="text/javascript">
                                                                        $("#aller").click( function(){  $("#l4").toggle(); } ) ;
                                                                     </script>
                                                                  </div>
                                                                  
                                                                  <div class="col-md-12">
                                                                     <br>
                                                                     <strong>Administration/Finance</strong>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                     <label for="formGroupExampleInput">Prix</label>
                                                                     <input type="number" class="form-control" name="prix"  />
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                     <label for="formGroupExampleInput">Avance</label>
                                                                     <input type="number" class="form-control" name="avance"  />
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <label for="formGroupExampleInput">Note Admin</label>
                                                                     <textarea  row="80" class="form-control" name="noteAdmin"></textarea>
                                                                  </div>
                                                                  
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
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