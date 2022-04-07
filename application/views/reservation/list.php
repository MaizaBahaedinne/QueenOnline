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
          <a href="<?php echo base_url() ?>Reservation/addNew" class="btn  btn-info">
          Ajouter
          </a>
          
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      
        <table id="example" style="width: 100%;" id="example" class="table  table-hover table-striped table-bordered table-responsive" cellspacing="0" >
          <thead>
            <tr>
              <th>Date</th>
              <th>titre</th>
              <th width="10%">Espace</th>
              <th width="5%">Prix</th>
              <th width="15%">Options</th>
              <th width="15%">Contact</th>
              <th width="5%">Statut</th>
              <th width="5%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if(!empty($userRecords))
              {
                  foreach($userRecords as $record)
                  {
              ?>
            <tr <?php  if( (date('d/m/Y', strtotime($record->dateDebut. '  - 30  days')) > date('d/m/Y') ) ) { echo 'style="background-color:yellow"' ;}   ?>>
              
              <td>
                <b><?php echo date_format(date_create($record->dateFin)  , 'd/m/20y');  ?></b><br>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?>
              </td>
              <td>
                <b><?php echo $record->type ?> : </b> <br><?php echo $record->titre ?>
              </td>
              <td>            
                <?php echo $record->salle  ?>
              </td>
              <td>            
                <b><?php echo $record->prix  ?> DT</b>
              </td>
              <td>
                <?php if ($record->cuisine == 1 ){ echo '<i class="fas fa-utensils"></i> Cuisine<br>';}  ?>
                <?php if ($record->tableCM == 1 ){ echo '<i class="fa fa-file" ></i> contrat de mariage<br>';}  ?>
                <?php if ($record->voiture != 0 ){ echo '<i class="fa fa-car" ></i> Voiture<br>';}  ?>
                <?php if ($record->troupe != 0  ){ echo '<i class="fa fa-music" ></i> troupe<br>';}  ?>
                <?php if ($record->photographe != 0  ){ echo '<i class="fa fa-camera"></i> photographe<br>';}  ?>

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
                <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i></span>
                <?php } ?>    
                <?php if ($record->statut == 1 ) { ?>
                <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                <?php } ?>
                <?php if ($record->statut == 2 ) { ?>
                <span class="badge badge-pill badge-dark"></span>
                <?php } ?>
                <?php if ($record->statut == 3 ) { ?>
                <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                <?php } ?>
              </td>
              <td>
                <div class="btn-group" role="group" > 
                <a class="btn" href="<?php echo base_url() ?>Reservation/view/<?php echo $record->reservationId ?>" >
                  <i class="fa fa-eye"></i>
                </a>
                <a class="btn" href="<?php echo base_url() ?>Reservation/edit/<?php echo $record->reservationId ?>" >
                  <i class="fas fa-pencil-alt"></i>
                </a>
              </div>
              </td>
            </tr>
            <?php
              } 
              }
              ?>
          </tbody>
          <tfoot>
            <tr>
              <th>titre</th>
              <th>Date</th>
              <th>Espace</th>
              <th>Prix</th>
              <th>Options</th>
              <th>Contact</th>
              <th >Statut</th>
              <th >Action</th>
            </tr>
          </tfoot>
        </table>
      
    </div>
  </div>
</div>
<!-- Modal -->
