
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/prismjs/themes/prism.css">

<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
  
      <div class="container-fluid">



        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">paiement</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recu</li>
          </ol>
        </nav>

        <div class="row" >
          <div class="col-md-12">
            <div class="card">
              <div class="container-fluid w-100">

                  <button id="printC"  class="btn btn-outline-primary float-right mt-4">Imprimer</button>
                </div>  
              <div class="card-body" id="contrat" name="contrat">
               
                <div class="container-fluid d-flex">
                  <div class="row">
                    <div class="col-lg-2 ">
                        <img src="<?php echo base_url() ?>assets/images/logo.png" width="75%">
                      </div>
                    <div class="col-lg-10 ">
                      <b>Queen Online</b>
                      <p>MC 35,Route mornag,Boujardga , Ben Arous 2090.</p>
                      <p><b>e-mail :</b> info@queenpark.tn</p>
                      <p><b>mobile :</b> 54 419 959 </p>
                      <p><b>Fixe :</b> 79 153 352 </p>
                        
                    </div>

                  </div>
                  
                </div>
                
                <hr>
                <br><br><br><br><br><br><br><br><br>
                                  
                <div class="container-fluid d-flex justify-content-between">   
                    <div class="row">
                      
                    <p  class="col-lg-12 mb-2 ">
                      <b>Sujet :</b> &nbsp; Location de l'espace <?php echo $projectInfo->salle ?> pour  le <?php echo $projectInfo->dateDebut ?>  <?php echo $projectInfo->heureDebut ?> au  <?php echo $projectInfo->heureFin ?> 
                    </p>
                     
                    <br>
                    <p class="col-lg-12 mb-2 ">
                      <b>Récu par:</b> &nbsp; <?php echo $projectInfo->clientName ; ?> 
                    </p>  
                      
                      <br><br><br><br>
                    </div > 

                  </div>
                  <table class="table" width="100%">
                        <thead>
                          <tr>
                              <th>ID</th>
                           
                              <th class="text">Date</th>
                              <th class="text">libelé</th>
                              <th class="text">Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($paiementInfo as $res ) { ?>
                          <tr>
                            <td><?php echo $res->paiementId  ?></td>
                            <td><?php $date = new DateTime($res->createdDate); echo $date->format('d/m/Y H:i');  ?></td>
                             <td><?php echo  $res->libele   ;  ?></td>
                              <td><?php  echo  $res->valeur   ;  ?> DT</td>
                            
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>


               
                          <table class="table">
                              <tbody>
                                <tr>
                                  <td class="text-right"><b>Montant à payé</b> </td>
                                  <td class="text-right" width="10%"><?php echo $projectInfo->prix ?> DT</td>
                                </tr>
                                
                                <tr>
                                  <td class="text-right" > <b>montant payée</b> </td>
                                  <td class="text-danger text-right">- <?php echo $totalPaiement->valeur  ?> DT </td>
                                </tr>
                                <tr class="bg-light">
                                  <td class="text-right"><b>Reste à payer</b></td>
                                  <td class="text-right"><?php echo $projectInfo->prix - $totalPaiement->valeur  ?> DT </td>
                                </tr>
                              </tbody>
                          </table>




                           <br><br><br><br> <br><br><br><br><br><br><br><br>
                           <div style="text-align: right" >
                             <b >à Mornag , Le <?php echo  Date('d/m/Y') ?> <br> Signature </b>
                           </div>
                        
                </div>


  

              </div>
            </div>
          </div>
        </div>

</div>



  <!-- plugin js for this page -->
  <script defer src="<?php echo base_url() ?>assets/vendors/prismjs/prism.js"></script>x
  <script defer  src="<?php echo base_url() ?>assets/vendors/clipboard/clipboard.min.js"></script>
  <script defer  src="<?php echo base_url() ?>assets/js/print.js"></script>
  <!-- end plugin js for this page -->

        <script  type="text/javascript">
          function print() {
            printJS({
              printable: 'contrat',
              type: 'html',
              targetStyles: ['*']
           })
          }

          document.getElementById('printC').addEventListener ("click", print) ; 
  </script>
    