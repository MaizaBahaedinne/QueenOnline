<style> 
.alert-bg {
  background: red;
  animation: mymove 5s infinite;
}

@keyframes mymove {
  from {background-color: ghostwhite;}
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
          SMS
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
      
        <table id="example" style="width: 100%;"  class="table  table-hover table-striped table-bordered " cellspacing="0" border="1px" >
          <thead>
            <tr>
              <th width="10%">id</th>
              <th >numero</th>
              <th width="50%">text</th>
              <th width="10%" >statut</th>
            </tr>
          </thead>
          <tbody> 
            <?php
              if(!empty($smsRecords))
              {
                  foreach($smsRecords as $record)
                  {
              ?>
            <tr  >
              
             <td width="10%"><?php echo $record->smsId ?> </td>
              <td ><?php echo $record->destination ?> </td>
              <td width="50%"><?php echo $record->text ?> </td>
      
              <td style="text-align:center;"> 
                <?php if ($record->statut == 0 ) { ?>
                <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i></span>
                <?php } ?>    
                <?php if ($record->statut == 1 ) { ?>
                <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                <?php } ?>
                
                <?php if ($record->statut == 3 ) { ?>
                <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                <?php } ?>
              </td>
              <td ><?php echo $record->statut ?> </td>
            </tr>
            <?php
              } 
              }
              ?>
          </tbody>
          <tfoot>
            <tr>
              <th >id</th>
              <th >numero</th>
              <th >text</th>
              <th >statut</th>
            </tr>
          </tfoot>
        </table>
      
    </div>
  </div>
</div>
<!-- Modal -->
