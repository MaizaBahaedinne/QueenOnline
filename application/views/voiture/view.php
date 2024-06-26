<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-news-paper icon-gradient bg-grow-early"></i>
            </div>
            <div>
               Détails de la reservation
               <div class="page-title-subheading">Reservation de la voiture</div>
            </div>
         </div>
         <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Example Tooltip">
            <i class="fa fa-star"></i>
            </button>
            <div class="d-inline-block dropdown">
               <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
               <span class="btn-icon-wrapper pr-2 opacity-7">
               <i class="fa fa-business-time fa-w-20"></i>
               </span>
               Menu
               </button>
               <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                  <ul class="nav flex-column">
                     <li class="nav-item">
                        <a href="<?php echo base_url() ?>Voiture/edit/<?php   ?>" class="nav-link">
                           <i class="nav-link-icon lnr-inbox"></i>
                           <span> Modifier</span>
                          
                        </a>
                     </li>
                     <li class="nav-item">
                        <a  href="<?php echo base_url() ?>Voiture/deleteReservation/<?php echo $projectInfo->reservationVId   ?>" class="nav-link">
                        <i class="nav-link-icon lnr-file-empty"></i>
                        <span> Annuler</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">

      
      
    
      
      
      

      <!-- contrat -->
      <div class="col-md-8">
         <div class="main-card mb-3 card">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="card-title mb-0"></h6>
                  <div class="dropdown mb-2">
                     <?php if( $totalPaiement->valeur >= 100 ) {  ?>
                     
                      <?php   if ($projectInfo->statut != 3)  {  ?> 

                     <button id="printC" class="dropdown-item d-flex align-items-center"  onclick="print()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm mr-2">
                           <polyline points="6 9 6 2 18 2 18 9"></polyline>
                           <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                           <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                        <span >Imprimer</span>
                     </button>
                     <?php }  ?> 
                     <?php } else{   ?> 

                        <script type="text/javascript">
                           
                           Swal.fire({
                                      icon: 'error',
                                      title: 'Avance < 100 DT',
                                      text: 'il faut verser une avance superieure ou égale à 100 dt pour imprimer le contrat ',
                                      footer: ''
                                    })

                        </script>
                        <span style="color: red" >il faut verser une avance superieure ou égale à 100 dt pour imprimer le contrat <?php }    ?>  </span> 
                        <span style="color: red" >  <?php   if ($projectInfo->statut == 3) { echo "reservation annulée" ;  }  ?>   </span> 
                  </div>
               </div>
             
               <div class="contrat" id="contrat"  >
                  <div class="row ">
                     <div class="col-md-2"> </div>
                     <div class="col-md-8">
                        <p style="font-size: 25; text-align: center;" >Contrat de location de voiture <br> <b><?php echo $projectInfo->voitureName ; ?></b></p>
                     </div>
                     <div class="col-md-2"> </div>
                  </div>
                  <span class="align-items-center">  </span><br>
                  <hr>
                  <br>
                    <br>
                  Entre <b>Ste Queen Park</b> Mc 34 Route Mornag Boujardgha Ben Arous 2090, désigné ci-après « le bailleur » <br>
                  <b>ET</b> <br>
                  <b><?php echo $clientInfo->nom.' '.$clientInfo->prenom ;?></b> titulaire de la carte d’identité nationale <b>N°<?php echo $clientInfo->cin ;?></b> délivrée le <b><?php echo $clientInfo->dateCin ;?></b> et demeurant à <b>N°<?php echo $clientInfo->n.' '.$clientInfo->rue.' '.$clientInfo->ville.' '.$clientInfo->codePostal ;?></b>   désigné ci-après « le locataire »  <br><br> 

                  <h6>ARTICLE 1 – Voiture :</h6>
                  La voiture mis à disposition doit être rendu propre et en bon état de fonctionnement. Il fera l’objet d’un inventaire lors des états des lieux de l'utilisation . <br><br>
                  <hr>
                
                  <h6>ARTICLE 2 – DUREE::</h6>
                  Débute le <b><?php echo $projectInfo->date ;?> </b> , à <b><?php echo $projectInfo->depart ;?></b> <br>
                  <b>Point de départ  :</b> <?php echo $projectInfo->l1 ;?>  <b>vers</b> <?php echo $projectInfo->l2 ;?> <b>arrivant à </b>   <?php echo $projectInfo->l3 ;?><br><?php if ($projectInfo->l4 != '' ) { echo "<b>Retour vers : </b>".$projectInfo->l4 ;  } ?>

                  <hr>
                  <h6>ARTICLE 3 – PRIX DE LA LOCATION :</h6>
                  La présente location est consentie et acceptée moyennant le versement d’un loyer de <b><?php echo $projectInfo->prix ;?> DT</b>, payable au plus tard <b style="color: red"> 72 heures avant la date de début de location.</b> <br>
                  Il est demandé au locataire de verser <b style="color: green "><?php echo $projectInfo->avance ;?> DT  dès la signature du contrat.</b><br>
                  Le mode de paiement accepté est en espèces.<br>
                  <b>NB :<br>1. dans tous les cas le montant versé ne sera pas rembourser (le client  peut seulement reporter sa date de reservation) </b> <br>
                  <b>2. dans le cas de report du date de la reservation ce contrat sera systèmatiquement annulé et un autre sera signer avec une nouvelle négociation du montant tout en respectant le montant deja versé  </b> <br>
                  <hr>
                  <h6>ARTICLE 4 – RÈGLEMENT INTÉRIEUR :</h6>
                  - 
                  - Il est interdit de fumer à l’intérieur de la voiture. <br>
                  - Il est strictement interdit d’importer des boissons alcooliques à l’intérieur de la voiture.<br>
                 
                  - La voiture ne peut pas entrer dans les rues étroites et les routes non goudronnées.<small>(Dans ce cas, le client est responsable de se déplacer au point le plus proche possible)</small>
                  
      
                  <br>          
            <br><br>
                  <div class="row">
                     <div class="col-md-12"> Fait à Mornag , le <b><?php echo $projectInfo->createdDTM; ?></b>  </div>
                     <div class="col-md-6">Signature du bailleur :  </div>
                     <div class="col-xl-6">Signature du locataire :</div>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>          
                     <br>
                     <br>                          
                     <br>
                     <br>
                     <br>
                     <br>
                     <br> 
                  </div>
                  <table width="100%" class="table  table-hover table-striped table-bordered">
                     <thead>
                     </thead>
                     <tbody>
                        <tr>
                           <td width="30 %">
                              Réference
                           </td>
                           <td>
                              QP<?php echo  $clientInfo->cin ; ?>/<?php echo  $projectInfo->reservationVId ; ?>/<?php echo  $projectInfo->createdBy ; ?>
                           </td>
                           <td width="30 %">
                              Prix
                           </td>
                           <td>
                              <b ><?php echo $projectInfo->prix ;?></b>
                           </td>
                        </tr>
                        <tr>
                           <td width="30 %">
                              Event & Horaire
                           </td>
                           <td>
                              <br>
                              <b>Debut : </b><?php $date = new DateTime($projectInfo->date); echo $date->format('d/m/Y').' '.$projectInfo->depart;  ?><br>
                              <b>Fin :       
                           </td>
                           <td width="30 %">
                              Avance 
                              <br>Reste
                           </td>
                           <td>
                              <b style="color: green ">
                              <?php echo $projectInfo->avance ;?>
                              </b>
                              <br>
                              <b style="color: red ">
                              <?php echo $projectInfo->prix - $projectInfo->avance ;?>
                              </b>
                           </td>
                        </tr>
                        <tr>
                           <td width="30 %">
                              Options : 
                           </td>
                           <td>
                              
                           </td>
                           <td width="30 %">
                           </td>
                           <td>
                              Dernier delais de paiement : 
                           </td>
                        </tr>
                        <tr>
                           <td width="30 %">
                              Nombre de place
                           </td>
                           <td>
                     
                           </td>
                           <td width="30 %">
                           </td>
                           <td>
                              <?php  echo date('d/m/Y', strtotime($projectInfo->date. '  - 3  days'))  ; ?>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  
                  <br>
                 
                  <br>
                  <p style="text-align: center;">Queen Park - Mc 34 Route  Mornag boujardga 2090 - mobile : 54 419 959  - 79 352 153 - 58 465 249 </p>
               </div>
                             <!-- Modal -->
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card-shadow-primary card-border mb-3 card">
            <div class="dropdown-menu-header">
               <div class="dropdown-menu-header-inner bg-dark">
                  <div class="menu-header-content">
                     <div class="avatar-icon-wrapper mb-3 avatar-icon-xl">
                        <div class="avatar-icon">
                           <img src="assets/images/avatars/6.jpg" alt="Avatar 5">
                        </div>
                     </div>
                     <div>
                        <h5 class="menu-header-title"><?php echo $clientInfo->name ?></h5>
                        <h6 class="menu-header-subtitle"><b>CIN :</b> <?php echo $clientInfo->cin ?></h6>
                        <h6 class="menu-header-subtitle"><b>Mobile :</b> <?php echo $clientInfo->mobile ?> - <?php echo $clientInfo->mobile2 ?></h6>
                        <h6 class="menu-header-subtitle"><?php echo $clientInfo->n ?> <?php echo $clientInfo->rue ?> <?php echo $clientInfo->ville ?> <?php echo $clientInfo->codePostal ?> </h6>
                     </div>
                     <div class="menu-header-btn-pane pt-1">
                        <button class="btn-icon btn btn-warning btn-sm">View Complete Profile</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="p-3">
               <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Paiament</h6>

               <ul class="rm-list-borders list-group list-group-flush">
                  <?php foreach ($paiementInfo as $res ) { ?>
                  <li class="list-group-item">
                     <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                           <div class="widget-content-left mr-3">
                              <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                           </div>
                           <div class="widget-content-left">
                              <div class="widget-heading"><?php echo $res->libele ?></div>
                              <div class="widget-subheading"><?php $date = new DateTime($res->createdDate); echo $date->format('d/m/Y H:i');  ?><br> <?php echo $res->name ?></div>
                           </div>
                           <div class="widget-content-right">
                              <div class="font-size-xlg text-muted">
                                 <span> <?php echo $res->valeur ?> DT</span>
                                 <small class="opacity-5 pr-1">DT</small>
                                 <small class="text-success pl-2">
                                 <i class="fa fa-angle-up "></i>
                                 </small>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <?php } ?>
                  <?php if( $totalPaiement->valeur > 0 ){  ?>
                     <form style="display: none; border: 2px " 
                        id="addPayementForm" 
                        action="<?php echo base_url() ?>Voiture/addPaiement/<?php echo $projectInfo->reservationVId ?>" 
                        method="post"  >
                 
                     <hr>
                    <li class="list-group-item">
                     <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                           <div class="widget-content-left mr-3">
                              <img width="42" class="rounded-circle" src="https://www.queenpark.tn/assets/img/teams/<?php echo $avatar ?>" alt="">
                           </div>
                           <div class="widget-content-left">
                              <div class="widget-heading"><input type="text" class="form-control"  placeholder="motif" value="Partie" ></div>
                              <div class="widget-subheading"></div>
                           </div>
                  
                  <?php } if ($totalPaiement->valeur ==  0 ) {  ?>
                     <form style="display: none; border: 2px " 
                        id="addPayementForm" 
                        action="<?php echo base_url() ?>Voiture/addPaiement/<?php echo $projectInfo->reservationVId ?>" 
                        method="post"  >
                 
                     <hr>
                    <li class="list-group-item">
                     <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                           <div class="widget-content-left mr-3">
                              <img width="42" class="rounded-circle" src="https://www.queenpark.tn/assets/img/teams/<?php echo $avatar ?>" alt="">
                           </div>
                           <div class="widget-content-left">
                              <div class="widget-heading"><input type="text" class="form-control"  placeholder="motif" value="Avance" ></div>
                              <div class="widget-subheading"></div>
                           </div>
                            <?php } ?>   
                           <div class="widget-content-right">
                              <div class="font-size-xlg text-muted">
                                 <span> 
                                    <input type="number"  placeholder="DT" value="0" min="0" max="<?php echo ($projectInfo->prix - $totalPaiement->valeur ) ?>" name="avance" > 
                                   
                                 </span>
                                 <small class="opacity-5 pr-1">DT</small>
                                
                                 
                              </div>
                           </div>
                           
                        </div>
                        <hr>
                        <input  class="btn btn-block btn-primary block-page-btn-example-1"  type="submit" >
                     </div>
                  </li>
                 
                  </form>
               </ul>
               <hr>
               <span style="float: right">Prix : <?php echo $projectInfo->prix  ?> DT</span><br>
               <span style="float: right">Payé : <?php echo $totalPaiement->valeur  ?> DT</span><br>
               <span style="float: right">Reste : <?php echo ($projectInfo->prix - $totalPaiement->valeur ) ?> DT</span>
            </div>
            <div class="text-center d-block card-footer">
               <button class="btn btn-warning" id="addPayement" >Ajouter</button> <a href="<?php echo base_url() ?>Voiture/recuP/<?php echo $projectInfo->reservationVId ?>" class="btn btn-info">Reçu</a>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         $('#addPayement').click(function(){
            $('#addPayementForm').toggle() ;
         })
      </script>
        <script  type="text/javascript">
          function print() {
            
            printJS({
              printable: 'contrat',
              type: 'html',
              targetStyles: ['*']
           });

          }
  
         
  </script>

   <?php if( $projectInfo->statut == 3  ) {  ?>

                           <script type="text/javascript">
                           
                           Swal.fire({
                                      icon: 'error',
                                      title: 'Annulée',
                                      text: 'cette reservation a été annulée',
                                      footer: ''
                                    }); 

                           $('#printC').hide() ; 

                        </script>

                        <?php } ?> 



   </div>
</div>



