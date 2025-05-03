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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
           Liste des prestataires
          <div class="page-title-subheading">Les prestataires</div>
        </div>
      </div>
      <div class="page-title-actions">
        <div class="d-inline-block">
         <a href="<?php echo base_url() ?>Prestation/addNewPersta" class="btn  btn-info"> Ajouter </a>
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
              <th>Nom</th>
              <th>Mobile</th>
              <th>Prix</th>
              <th>Reservation</th>
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
            <tr class=""  > 
              
              <td>
                <?php echo $record->packId  ?>
              </td>
               <td>
                <?php echo $record->nom  ?>
              </td>
               <td>
                <?php echo $record->mobile  ?>
              </td>
              <td>
                <?php echo $record->prix  ?> DT
              </td>
              <td>
                <?php echo count( $record->projectInfo ) ?>
              </td>
             
              <td>
                  <div class="btn-group" role="group" > 
                    <a class="btn" href="<?php echo base_url() ?>Prestation/editPresta/<?php echo $record->packId ?>" >
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
              <th>Nom</th>
              <th>Mobile</th>
              <th>Prix</th>
              <th>Reservation</th>
              <th width="5%">Action</th>
            </tr>
          </tfoot>
        </table>
      
    </div>
  </div>
</div>
<!-- Modal -->
