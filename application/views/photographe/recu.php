
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
               
              
                
                  <table>
                       <tr><td width="20%"> <img src="<?php echo base_url() ?>assets/images/logo-inverse.png" width="75%"></td>
                      <td>
                        <table>
                          <tr><td>Queen Park </td></tr>
                          <tr><td><p>MC 35,Route mornag,Boujardga , Ben Arous 2090.</p> </td></tr>
                          <tr><td> <p><b>e-mail :</b> info@queenpark.tn</p> </td></tr>
                          <tr><td> <p><b>mobile :</b> 54 419 959 </p> </td></tr>
                          <tr> <td><p><b>Fixe :</b> 79 153 352 </p> </td></tr>
                        </table> 
                        </td>
                    </tr>  
                  </table>
                
                <hr>
                <br><br><br>
                                  
              
                  
                      <h3>Recu de paiement</h3><br>
                    <p >
                      <b>Sujet :</b> &nbsp; Paiement de photographe  pour  le <?php echo $projectInfo->date ?> 
                    </p>
                     
                    <br>
                   
                      <b>Récu par:</b> &nbsp; <?php echo $clientInfo->nom.' '.$clientInfo->prenom ;?>
                      <br><br><br><br><br>
                 
                      
             

                
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
                              <td class="text-right"><?php  echo  $res->valeur   ;  ?> DT</td>
                            
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




                           <br><br><br><br> 
                           <div style="text-align: right" >
                             <b >à Mornag , Le <?php echo  Date('d/m/Y') ?> <br> Signature </b>
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
    