<style> 
.alert-bg {
  background: red;
  animation: mymove 4s infinite;
}

@keyframes mymove {
  from {background-color: whitesmoke;}
  to {background-color: indianred ;}
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
          Reservation troupe lahmedi
          <div class="page-title-subheading">Les reservations</div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
         <!-- <a href="<?php echo base_url() ?>Voiture/addNewO" class="btn  btn-info">
          Ajouter
          </a>-->
          
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      
        <table id="example" style="width: 100%;" id="example" class="table  table-hover table-striped table-bordered table-responsive" cellspacing="0"  >
          <thead>
            <tr>
               <th>ID</th>
              <th>Date</th>
              <th >Espace</th>
              <th >Pack</th>
              <th width="5%">prix</th>
              <th width="5%">avance</th>
              <th width="10%">mobile 1</th>
              <th width="10%">mobile 2</th>
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
            <tr class="<?php if ( (time() > strtotime($record->date. '  - 3  days') && $record->statut != 0 ) )  { echo "alert-bg" ;}  ?>"  >
              <td>
                <b><?php echo $record->reservationTId ?>
              </td>
              <td>
                <b><?php echo date_format(date_create($record->date)  , 'd/m/20y');  ?>
              </td>
               <td>
                <b><?php echo $record->projectInfo->salle ?>
              </td>
              <td>
                <b><?php echo $record->packname ?>
              </td>
              <td>            
                <?php echo $record->prix  ?>
              </td>
              <td>            
                <b><?php echo $record->avance  ?></b>
              </td>
            
              <td>
               <a href="tel:<?php $record->projectInfo->mobile   ?>"><?php echo $record->projectInfo->mobile  ?></a>   
              </td>
              <td>
               <a href="tel:<?php $record->projectInfo->mobile2   ?>"><?php echo $record->projectInfo->mobile2   ?></a> 

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
                <a class="btn" href="<?php echo base_url() ?>Troupe/view/<?php echo $record->reservationTId ?>" >
                  <i class="fa fa-eye"></i>
                </a>
                <a class="btn" href="<?php echo base_url() ?>Troupe/edit/<?php echo $record->reservationTId ?>" >
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
               <th>ID</th>
              <th>Date</th>
              <th >Espace</th>
              <th >Pack</th>
              <th width="5%">prix</th>
              <th width="5%">avance</th>
              <th width="10%">mobile 1</th>
              <th width="10%">mobile 2</th>
              <th width="5%">Statut</th>
              <th width="5%">Action</th>
            </tr>
          </tfoot>
        </table>
      
    </div>
  </div>
</div>
<!-- Modal -->
