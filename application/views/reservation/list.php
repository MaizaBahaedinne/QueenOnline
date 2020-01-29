
<style type="text/css">
    
    .content-loader tr td {
    white-space: nowrap;
}

</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/prismjs/themes/prism.css">




                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Reservation</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Liste</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                                <h6 class="card-title">Liste des reservations</h6>
                                   
                <div class="container">
                    <table id="example" class="table dataTable no-footer" style="width: 100%" >
                    <thead>
                    <tr>
                       
                        <th>titre</th>
                        <th>Date</th>

                        <th>Espace</th>
                        <th>Prix</th>
                        <th>Contact</th>
                        <th>Actif</th>
                        <th>Action</th>
                        
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
                            <b><?php echo $record->type ?> : </b> <?php echo $record->titre ?>
 
                        </td>
                        <td>
                            <b><?php echo date_format(date_create($record->dateDebut)  , 'd M 20y');  ?></b>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?>
 
                        </td>

                      
                        <td>            
                          <?php echo $record->salle  ?>
                        </td>
                        <td>            
                          <?php echo $record->prix  ?> DT
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
                                <span class="badge badge-pill badge-success">&nbsp;&nbsp;Validé&nbsp;&nbsp;</span>
                            <?php } ?>    
                            <?php if ($record->statut == 1 ) { ?>
                                <span class="badge badge-pill badge-warning">&nbsp;&nbsp;paiement en Attente&nbsp;&nbsp;</span>
                            <?php } ?>
                            <?php if ($record->statut == 2 ) { ?>
                                <span class="badge badge-pill badge-dark">&nbsp;&nbsp;Pré-reservation&nbsp;&nbsp;</span>
                            <?php } ?>
                            <?php if ($record->statut == 3 ) { ?>
                                <span class="badge badge-pill badge-danger">&nbsp;&nbsp;Annulé&nbsp;&nbsp;</span>
                            <?php } ?>
                       
                       </td>
                        <td>

                            <a href="<?php echo base_url() ?>Reservation/view/<?php echo $record->reservationId ?>" >
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8s11 8 11 8s-4 8-11 8s-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></g></svg>
                            </a>

                            &nbsp;&nbsp;|&nbsp;&nbsp;<a href="" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></g></svg></a>

                            &nbsp;&nbsp;|&nbsp;&nbsp;<a href="" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10s10-4.486 10-10S17.514 2 12 2zM4 12c0-1.846.634-3.542 1.688-4.897l11.209 11.209A7.946 7.946 0 0 1 12 20c-4.411 0-8-3.589-8-8zm14.312 4.897L7.103 5.688A7.948 7.948 0 0 1 12 4c4.411 0 8 3.589 8 8a7.954 7.954 0 0 1-1.688 4.897z" fill="#626262"/></svg></a>

                        </td>
                       

                    </tr>
                    <?php
                       } 
                    }
                    ?>
                    
                    </tbody>

                  </table>


                </div>
              </div>
            </div>
                    </div>
                </div>


             <!-- begin::Global Config(global config for global JS sciprts) -->
              <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
              <script defer src="<?php echo base_url() ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
              <script defer src="<?php echo base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
              

            
            <script src="<?php echo base_url() ?>assets/vendors/prismjs/prism.js"></script>
            <script src="<?php echo base_url() ?>assets/vendors/clipboard/clipboard.min.js"></script>
            <!-- end plugin js for this page -->

<script type="text/javascript">
              $(document).ready( function () {
                    $('table').DataTable();
                } );

  </script>



