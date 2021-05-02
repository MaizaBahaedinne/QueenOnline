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
      
        <table id="example" style="width: 100%;" id="example" class="table  table-hover table-striped table-bordered" >
          <thead>
            <tr>
              <th>titre</th>
              <th>Date</th>
              <th>Espace</th>
              <th>Prix</th>
              <th>Options</th>
              <th>Contact</th>
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
            <tr>
              <td>
                <b><?php echo $record->type ?> : </b> <br><?php echo $record->titre ?>
              </td>
              <td>
                <b><?php echo date_format(date_create($record->dateFin)  , 'd/m/20y');  ?></b><br>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?>
              </td>
              <td>            
                <?php echo $record->salle  ?>
              </td>
              <td>            
                <b><?php echo $record->prix  ?> DT</b>
              </td>
              <td>
                <?php if ($record->cuisine == 1 ){ echo '<i class="fa fa-cutlery" ></i> Cuisine<br>';}  ?>
                <?php if ($record->tableCM == 1 ){ echo '<i class="fa fa-file" ></i> contrat de mariage<br>';}  ?>
                <?php if ($record->voiture != null ){ echo '<i class="fa fa-car" ></i> Limousine<br>';}  ?>
                <?php if ($record->troupe != null ){ echo '<i class="fa fa-music" ></i> troupe<br>';}  ?>
                <?php if ($record->photographe != null ){ echo '<i class="fa fa-camera"></i> photographe<br>';}  ?>

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
                <a href="<?php echo base_url() ?>Reservation/view/<?php echo $record->reservationId ?>" >
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M1 12s4-8 11-8s11 8 11 8s-4 8-11 8s-11-8-11-8z"/>
                      <circle cx="12" cy="12" r="3"/>
                    </g>
                  </svg>
                </a>
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
              <th width="5%">Statut</th>
              <th width="5%">Action</th>
            </tr>
          </tfoot>
        </table>
      
    </div>
  </div>
</div>
<!-- Modal -->
