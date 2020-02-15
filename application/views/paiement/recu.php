<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/prismjs/themes/prism.css">

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
               
                <div class="container-fluid d-flex justify-content-between">
                  <div class="col-lg-3 pl-0">
                    <a href="#" class="noble-ui-logo d-block mt-3">Queen <span>Park</span></a>                 
                    <p class="mt-1 mb-1"><b>Queen Online</b></p>
                    <p>MC 35,Route mornag,Boujardga , Ben Arous 2090.</p>
                    <p><b>e-mail :</b> info@queenpark.tn</p>
                    <p><b>mobile :</b> 54 419 959 </p>
                    <p><b>Fixe :</b> 79 153 352 </p>
                    <h5 class="mt-5 mb-2 text-muted">Récu par:</h5>
                    <p>  <?php echo $projectInfo->clientName ; ?>  </p>
                  </div>
                  
                </div>
                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                  <div class="table-responsive w-100">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                              <th>ID</th>
                           
                              <th class="text-right">Date</th>
                              <th class="text-right">libelé</th>
                              <th class="text-right">Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($paiementInfo as $res ) { ?>
                          <tr>
                            <td><?php echo $res->paiementId  ?></td>
                            <td><?php $date = new DateTime($res->createdDate); echo $date->format('d/m/Y H:i');  ?></td>
                             <td><?php echo  $res->libele   ;  ?></td>
                              <td><?php  echo  $res->valeur   ;  ?></td>
                            
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="container-fluid mt-5 w-100">
                  <div class="row">
                    <div class="col-md-6 ml-auto">
                        <div class="table-responsive">
                          <table class="table">
                              <tbody>
                                <tr>
                                  <td>Montant à payé </td>
                                  <td class="text-right"><?php echo $projectInfo->prix ?></td>
                                </tr>
                                
                                <tr>
                                  <td>montant payée </td>
                                  <td class="text-danger text-right">- <?php echo $totalPaiement->valeur  ?>  </td>
                                </tr>
                                <tr class="bg-light">
                                  <td class="text-bold-800">Reste à payer</td>
                                  <td class="text-bold-800 text-right"><?php echo $projectInfo->prix - $totalPaiement->valeur  ?> DT </td>
                                </tr>
                              </tbody>
                          </table>
                        </div>
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
    