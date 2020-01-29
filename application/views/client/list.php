<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Client</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Liste</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Liste des clients</h6>
            <!--begin: Datatable -->
        <!--begin: Datatable -->

        <table id="example" class="table dataTable no-footer" style="width:100%" >
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>CIN</th>
                        <th>Nom et prénom</th>
                        <th>Ville</th>
                        <th>Contact</th>
                        <th width="10%">Action</th>
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
                            <?php echo $record->userId ?>
                        </td>
                        <td>
                            <?php echo $record->cin ?>
                        </td>
                      
                        <td>                
                                <a class="kt-user-card-v2__name" href="#">
                                     <?php if ($record->raisonSocial != ''){  ?> STE <?php echo $record->raisonSocial ;?><hr> <?php } ?>    <?php echo $record->nom ?>&nbsp;<?php echo $record->prenom ?>
                                </a>
                                        <br>                             
                        </td>
                        <td><?php echo $record->ville ?> </td>
                        <td>                                
                            <?php echo $record->mobile ?> <br> <hr>   <?php echo $record->mobile2 ?>             
                        </td>
                        <td>
                            <a href="" >
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8s11 8 11 8s-4 8-11 8s-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></g></svg>
                            </a>

                            &nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url() ?>CLient/edit/<?php echo $record->userId ?>" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></g></svg></a>

                           
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

             <!-- begin::Global Config(global config for global JS sciprts) -->

        <!-- end::Global Config -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>

        <!--end::Page Scripts -->


<script>
$('table').dataTable( {

  paginate: true,
  
} );
</script>