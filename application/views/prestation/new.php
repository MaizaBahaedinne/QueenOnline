
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-car icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Reservation des prestations
          <div class="page-title-subheading">Nouvelle reservation</div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
         
          
        </div>
      </div>
    </div>
  </div>
<form action="<?php echo base_url()?>Prestation/addNewReservationP" method="post">
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
                />vgfb 
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                           
                                           <div class="row">
                                            <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="control-label">Prestataire</label>
                                                        <select class="form-control" name="packId" required>
                                                            <option value=""></option>
                                                            <?php foreach ($Packs as $Pack ) {  ?>
                                                                <option value="<?php echo $Pack->packId ?>" ><?php echo $Pack->nom ?> - <?php echo $Pack->prix ?> </option>
                                                            <?php } ?>
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
                                                
                                                <div class="col-md-12">
                                                    <br>
                                                    <strong>Note</strong>
                                                </div>   
                                                 <div class="col-md-12">
                                                        <label for="formGroupExampleInput">Note Admin</label>
                                                        <textarea  rows="10" class="form-control" name="noteAdmin"></textarea>
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

                                               
                                                <div class="col-md-12">
                                                        <br>
                                                        <button type="submit"  class="btn btn-info btn-block block-page-btn-example-1"  >Envoyer</button>
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