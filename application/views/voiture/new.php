
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
<form action="<?php echo base_url()?>Voiture/addNewReservationL" method="post">
              <input
                    name="clientId"
                    class="form-control mb-4 mb-md-0"
                    readonly
                    type="text"
                    required
                    value="<?php echo $projectInfo->clientId  ?>"
                    hidden
                />
                <input
                    name="reservationId"
                    class="form-control mb-4 mb-md-0"
                    readonly
                    type="text"
                    required
                    value="<?php echo $projectInfo->reservationId  ?>"
                    hidden
                />
                <div class="modal-body">
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
                                                            readonly
                                                            type="text"
                                                            required
                                                           value="<?php echo $projectInfo->dateDebut   ?>"
                                                            
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
                                                        <input type="text" class="form-control" name="l3" value="<?php echo $projectInfo->salle   ?> (Queen Park)"  readonly  />
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
                                                    <strong>Contact</strong>
                                                </div>
                                                <div class="col-md-6">
                                                        <label for="formGroupExampleInput">mobile 1</label>
                                                        <input type="tel" class="form-control" name="mobile1"  value="<?php echo $projectInfo->mobile ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                        <label for="formGroupExampleInput">mobile 2</label>
                                                        <input type="tel" class="form-control" name="mobile2"  />
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
                                                
                                                <div class="col-md-12">
                                                        <br>
                                                        <button type="submit" class="btn btn-info btn-block" >Envoyer</button>
                                                </div>

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