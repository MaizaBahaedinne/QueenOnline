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
          Cars reservation
          <div class="page-title-subheading">Les reservations</div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
          <a href="<?php echo base_url() ?>Voiture/addNewO" class="btn  btn-info">
          Ajouter
          </a>
          
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      
       <table width="100%" id="example" class="table  table-hover table-striped table-bordered table-responsive" >
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Role</th>
                  <th>Created On</th>
                  <th class="text-center">Actions</th>
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
                  <td><?php echo $record->name ?></td>
                  <td><?php echo $record->email ?></td>
                  <td><?php echo $record->mobile ?></td>
                  <td><?php echo $record->role ?></td>
                  <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                  <td class="text-center">
                     <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$record->userId; ?>" title="Edit">Modifier</a>
                  </td>
               </tr>
               <?php
                  }
                  }
                  ?>
            </tbody>
            <tfoot>
               <th>Name</th>
               <th>Email</th>
               <th>Mobile</th>
               <th>Role</th>
               <th>Created On</th>
               <th class="text-center">Actions</th>
            </tfoot>
         </table>
      
    </div>
  </div>
</div>
<!-- Modal -->





