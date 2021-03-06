<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-users icon-gradient bg-tempting-azure"></i>
            </div>
            <div>
               Client
               <div class="page-title-subheading">Nos client</div>
            </div>
         </div>
         <div class="page-title-actions">
            <div class="d-inline-block">
            </div>
         </div>
      </div>
   </div>
   <div class="main-card mb-3 card">
      <div class="card-body">
         <table id="example" style="width: 100%;" id="example" class="table  table-hover table-striped table-bordered" >
            <thead>
               <tr>
                  <th>Nom</th>
                  <th>Mobile</th>
                  <th>cin</th>
                  <th>adresse</th>
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
                  <td><?php echo $record->nom ?> <?php echo $record->prenom ?> </td>
                  <td><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $record->mobile ?> <br>
                     <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $record->mobile2 ?>
                  </td>
                  <td><i class="fa fa-id-card" aria-hidden="true"></i> <?php echo $record->cin ?></td>
                  <td><?php echo $record->ville ?> </td>
                  <td class="text-center">
                     
                  </td>
               </tr>
               <?php
                  }
                  }
                  ?>
            </tbody>
            <tfoot>
               <tr>
                  <th>Nom</th>
                  <th>Mobile</th>
                  <th>cin</th>
                  <th>adresse</th>
                  <th class="text-center">Actions</th>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<!-- Modal -->