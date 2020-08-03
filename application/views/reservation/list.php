<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion des reservations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Gestion des reservations</a></li>
              <li class="breadcrumb-item active">Liste</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des clients</h3>
                <span class="float-sm-right"> 
                <button type="button" class="btn btn-default " data-toggle="modal" data-target="#reservationForm">
                 <i class="fas fa-user-plus"></i> Ajouter
                </button>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="table" class="table" style="width: cover" >
                    <thead>
                    <tr>
                       
                        <th>titre</th>
                        <th>Date</th>

                        <th>Espace</th>
                        <th>Prix</th>
                        <th>Contact</th>
                        <th>Actif</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>

                    <tbody>
            
                    
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                       
                       <td>
                            <b><?php echo $record->type ?> : </b> <?php echo $record->titre ?>
 
                        </td>
                        <td>
                            <b><?php echo date_format(date_create($record->dateFin)  , 'd/m/20y');  ?></b>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?>
 
                        </td>

                      
                        <td>            
                          <?php echo $record->salle  ?>
                        </td>
                        <td>            
                          <?php echo $record->prix  ?> DT
                         </td>
                        <td  onclick='tdclick(this.id)' id="<?php echo $record->reservationId ?>" >
                             <?php if($record->clientName != '') { ?>
                            <button type="button" class="btn" data-toggle="tooltip" data-html="true" data-placement="bottom" 
                            title="<h6>Mobile :<small>  <a href=tel:<?php echo $record->mobile  ?> > <?php echo $record->mobile  ?> </a> </small> </h6>">
                              <?php echo $record->clientName  ?>
                              
                            </button>
                                 <?php } ?>


                            <?php if($record->clientName == '') { ?>
                                <a href="<?php echo base_url()?>">Ajouter un client</a>                            
                              <?php } ?>
                           


                        </td>
                                                
                        <td> 
                            <?php if ($record->statut == 0 ) { ?>
                                <span class="badge badge-pill badge-success">&nbsp;&nbsp;Validé&nbsp;&nbsp;</span>
                            <?php } ?>    
                            <?php if ($record->statut == 1 ) { ?>
                                <span class="badge badge-pill badge-warning">&nbsp;&nbsp;paiement en Attente&nbsp;&nbsp;</span>
                            <?php } ?>
                            <?php if ($record->statut == 2 ) { ?>
                                <span class="badge badge-pill badge-dark">&nbsp;&nbsp;Pré-reservation&nbsp;&nbsp;</span>
                            <?php } ?>
                            <?php if ($record->statut == 3 ) { ?>
                                <span class="badge badge-pill badge-danger">&nbsp;&nbsp;Annulé&nbsp;&nbsp;</span>
                            <?php } ?>
                       
                       </td>
                        <td>

                            <a href="<?php echo base_url() ?>Reservation/view/<?php echo $record->reservationId ?>" >
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8s11 8 11 8s-4 8-11 8s-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></g></svg>
                            </a>



                        </td>
                       

                    </tr>
                    <?php
                       } 
                    }
                    ?>
                    
                    </tbody>

                  </table>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>


      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>









  <!-- Modal -->
<div class="modal fade" id="reservationForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="<?php echo base_url()?>Reservation/addNewReservation" method="post"  >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                                        <label for="formGroupExampleInput">Date</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                        <input type="date" class="form-control" name="dateDebut"  min="<?php echo date('Y-m-d') ?>" placeholder="Example input">
                                            </div> 
                                            <div class="col-md-3">
                                        <input type="time" class="form-control" name="heureDebut" placeholder="Example input">
                                            </div>
                                            <div class="col-md-3">
                                        <input type="time" class="form-control" name="heureFin" placeholder="Example input">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Espace</label>
                                            <select type="text" class="form-control" name="salle" id="salle" placeholder="Example input">
                                            <?php foreach ($salleRecords as $record ) {
                                            ?>  
                                            <option value="<?php echo $record->salleID ?>" > <?php echo $record->nom ?> </option>
                                            <?php } ?>
                                        </select>
                                        
                                        
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="formGroupExampleInput2">Type</label>
                                            <select type="text" class="form-control" name="type" >
                                                <option value="Marriage" > Marriage </option>
                                                <option value="Finacailles" > Finacailles </option>
                                                <option value="Hena" > Hena </option>
                                                <option value="Marriage" > Outya </option>
                                                <option value="Congret" > Congret </option>
                                                <option value="Circoncision" > Circoncision </option>
                                                <option value="Team Building" > Team Building </option>
                                                <option value="Team Building" > Anniversaire </option>
                                                <option value="Team Building" > Evenement </option>

                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="formGroupExampleInput2">Nombre des invités</label>
                                            <input type="number" class="form-control" min="20" max="1000" name="nbPlace" placeholder="Nombre des invités">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formGroupExampleInput2">Prix</label>
                                            <input type="number" class="form-control"   min="300" name="prix" placeholder="Prix">
                                        </div>
                                    
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Options  </label>
                                        <input type="checkbox"  name="tableCM" value="1" > Table contrat de  mariage
                                        <input type="checkbox"  name="cuisine"  value="1" > Cuisine
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Titre</label>
                                        <input type="text" class="form-control" name="titre" placeholder="Titre de l'evenement">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Note Administratif </label>
                                        <textarea class="form-control" row="10" name="noteAdmin" ></textarea>
                                    </div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Envoyer" >
      </div>
      </form>
    </div>
  </div>
</div>