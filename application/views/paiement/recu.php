
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
                          <tr><td><H5>Queen Park</H5> </td></tr>
                          <tr><td><p>MC 35,Route mornag,Boujardga , Ben Arous 2090.
                           <br><p><b>e-mail :</b> info@queenpark.tn <br><b>mobile :</b> 54 419 959  <br><b>Fixe :</b> 79 153 352 </p> </td></tr>
                          
                        </table> 
                        </td>
                    </tr>  
                  </table>
                
                <hr>
                <br><br><br>
                                  
              
                  
                      <h4>Recu de paiement <small><?php echo $projectInfo->reservationId ?> - <?php $date = new DateTime() ; echo $date->format('dmYHi') ?> </small></h4><br>
                    <p >
                      <b>Sujet :</b> &nbsp; Location de l'espace <b><?php echo $projectInfo->salle ?>  (Ref : QP<?php echo $contratInfo->cin; ?>/<?php echo $contratInfo->reservationId; ?>/<?php echo $contratInfo->createdBy; ?>) </b> pour  le <?php echo $projectInfo->dateDebut ?>  <?php echo $projectInfo->heureDebut ?> au  <?php echo $projectInfo->heureFin ?> 
                    </p>
                     
                    <br>
                   
                      <b>Récu par:</b> &nbsp; <?php echo $projectInfo->clientName ; ?> 
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
                                  <td class="text-right" > <b>montant payé</b> </td>
                                  <td class="text-success text-right"><?php echo $totalPaiement->valeur  ?> DT </td>
                                  <?php if (  $totalPaiement->valeur < 1000 ) { ?>

                                    <script type="text/javascript">
                                       
                                       Swal.fire({
                                                  icon: 'info',
                                                  title: 'Rappler le client',
                                                  text: 'Ce reçu de paiement atteste simplement que la somme mentionnée a été reçue.               Avance > 1000 DT doit être versé dans un délai maximum de 10 jours ',
                                                  footer: ''
                                                })

                                    </script>

                                  <?php } ?>
                                </tr>
                                <tr class="bg-light">
                                  <td class="text-right"><b>Reste à payer</b></td>
                                  <td class="text-danger text-right"><?php echo $projectInfo->prix - $totalPaiement->valeur  ?> DT </td>
                                </tr>
                              </tbody>
                          </table>

                          <span style="color:gray;" >
                            * Ce reçu de paiement atteste simplement que la somme mentionnée a été reçue.<br>
                            * un montant égal ou supérieur à 1000 DT doit être versé dans un délai maximum de 10 jours à compter de la date de ce reçu. En cas de non-paiement dans ce délai, le montant mentionné dans ce reçu sera annulé et considéré comme non versé.</span>




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
    