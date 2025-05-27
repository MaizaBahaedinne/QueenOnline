<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Affecation des equipe dans les reservations
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
      
        <table id="example" style="width: 100%;"  class="table  table-hover table-striped table-bordered " cellspacing="0" >
          <thead>
            <tr>
              
              <th  >Date</th>
              <th width="10%" >Espace</th>
              <th >titre</th>
              <th width="15%">Options</th>
              <th width="15%">equipe</th>
             
            </tr>
          </thead>
          <tbody> 
            <?php
              if(!empty($userRecords))
              {
                  foreach($userRecords as $record)
                  {
              ?>
            <tr   >
              
              <td>
               

                <b><?php echo date_format(date_create($record->dateFin)  , 'd/m/20y');  ?></b><br>  de <b><?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?> </b> à  <b><?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?></b>
              </td>
              <td>            
                <?php echo $record->salle  ?>
              </td>
              <td>
                <b><?php echo $record->type ?> : </b> <br><?php echo $record->titre ?>
              </td>
              <td>
                <?php if ($record->cuisine == 1 ){ echo '<i class="fas fa-utensils"></i> ';}  ?>
                <?php if ($record->tableCM == 1 ){ echo '<i class="fa fa-file" ></i> ';}  ?>
                <?php if ($record->voiture != 0 ){ echo '<i class="fa fa-car" ></i> ';}  ?>
                <?php if ($record->troupe != 0  ){ echo '<i class="fa fa-users" ></i> ';}  ?>
                <?php if (count($record->prestation) > 0  ){ echo '<i class="fa fa-music" ></i>  ('.count($record->prestation).') ';}  ?>
                <?php if ($record->photographe != 0  ){ echo '<i class="fa fa-camera"></i> ';}  ?>
              </td>
            </tr>
            <?php
              } 
              }
              ?>
          </tbody>
          <tfoot>
            <tr>
              <th  >Date</th>
              <th width="10%" >Espace</th>
              <th >titre</th>
              <th width="15%">Options</th>
              <th width="15%">equipe</th>
              
            </tr>
          </tfoot>
        </table>
      
    </div>
  </div>
</div>
<!-- Modal -->
