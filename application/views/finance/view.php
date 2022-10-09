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
      
        <table id="example" style="width: 100%;" id="example" class="table  table-hover table-striped table-bordered " cellspacing="0" >
          <thead>
            <tr>
              
              <th width="15%" >Date</th>
              <th >Espace</th>
              <th width="10%" >Date de reservation</th>
              <th width="15%" >Client</th>
              <th   width="5%" >Valeur</th>
              <th  width="15%" >recepteur</th>
              <th  width="20%" >Motif</th>
        
            </tr>
          </thead>
          <tbody> 
            <?php
              if(!empty($financeRecords))
              {
                  foreach($financeRecords as $record)
                  {
              ?>
              <tr>
                <td><?php echo date_format(date_create($record->createdDate)  , 'd/m/20y');  ?></b> à  <?php echo date_format(date_create($record->createdDate)  , 'H:i'); ?></td>
                <td><?php echo $record->espace ?></td>
                <td><?php echo $record->dateRes ?></td>
                <th><?php echo $record->clientName ?></th>
                <th><?php echo $record->valeur ?> DT</th>
                <td> <img width="30" class="rounded-circle" src="https://www.queenpark.tn/assets/img/teams/<?php echo $record->avatar ?>" alt=""> <?php echo $record->recuPar ?></td>
             
                <td> <?php echo $record->libele ?>  </td>
              </tr>
           
             
            <?php
              } 
              }
              ?>
          </tbody>
          <tfoot>
            <tr>
            
                 <th width="15%" >Date</th>
              <th >Espace</th>
              <th width="10%" >Date de reservation</th>
              <th width="15%" >Client</th>
              <th   width="5%" >Valeur</th>
              <th  width="15%" >recepteur</th>
              <th  width="20%" >Motif</th>
        

            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
<!-- Modal -->
