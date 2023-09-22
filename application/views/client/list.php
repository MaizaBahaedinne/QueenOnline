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
                  <th>Code </th>
                  <th>cin</th>
                  <th>Nom</th>
                  <th>Mobile</th>
                  
                  <th>adresse</th>
                  <th class="">Reservatoion</th>
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
                  <td> <?php echo $record->userId ?></td>
                  <td><i class="fa fa-id-card" aria-hidden="true"></i> <?php echo $record->cin ?></td>
                  <td><?php echo $record->nom ?> <?php echo $record->prenom ?> </td>
                  <td><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $record->mobile ?> <br>
                     <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $record->mobile2 ?>
                  </td>
                  <td><?php echo $record->n ?> <?php echo $record->rue ?> <?php echo $record->ville ?> </td>
                  <td class="">
                     
               
                
               <?php foreach($record->reservations as $reservation) { ?>
                  <a href="<?php echo base_url().'Reservation/view/'.$reservation->reservationId  ?>" >
                  <?php if ($reservation->statut == 0 ) { ?>
                <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i></span>
                <?php } ?>    
                <?php if ($reservation->statut == 1 ) { ?>
                <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                <?php } ?>
                
                <?php if ($reservation->statut == 3 ) { ?>
                <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                <?php } ?>
                <?php echo $reservation->salle." ".$reservation->dateDebut  ?><br>
               </a> 
               <?php    }   ?>
                  </td>
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
                  <th>Code </th>
                  <th>cin</th>
                  <th>Nom</th>
                  <th>Mobile</th>
                  
                  <th>adresse</th>
                  <th class="text-center">Reservatoion</th>
                  <th class="text-center">Actions</th>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<!-- Modal -->