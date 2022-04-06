<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-news-paper icon-gradient bg-grow-early"></i>
            </div>
            <div>
               Détails de la reservation
               <div class="page-title-subheading">Instead of regular checkboxes, use these toggle widgets for a better UX.</div>
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
                        <a href="<?php echo base_url() ?>Reservation/edit/<?php echo $projectInfo->reservationId  ?>" class="nav-link">
                           <i class="nav-link-icon lnr-inbox"></i>
                           <span> Modifier</span>
                          
                        </a>
                     </li>
                     <li class="nav-item">
                        <a  href="<?php echo base_url() ?>Reservation/deleteReservation/<?php echo $projectInfo->reservationId  ?>" class="nav-link">
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

       <div class="col-md-3">
         <div class="card-shadow-primary card-border mb-3 card">
             <div class="card-header">
               <h5>Troupe</h5>
             </div>
             <div class="card-body">
                  <?php if ($projectInfo->troupe == 0 ){ echo '<a style="color: white"  class="btn btn-info btn-block" >Ajouter</a> ';}  ?>
             </div>
         </div>
          
           
      </div>
      <div class="col-md-3">
         <div class="card-shadow-primary card-border mb-3 card">
            <div class="card-header">
               <h5>Photographe</h5>
             </div>
            <div class="card-body">
               <?php if ($projectInfo->photographe == 0 ){  echo '<a style="color: white"  class="btn btn-info btn-block" >Ajouter</a> ';}  ?>
             </div>
         </div>
          
           
      </div>
      
      <div class="col-md-3">
         <div class="card-shadow-primary card-border mb-3 card">
            <div class="card-header">
               <h5>Voiture</h5>
             </div>
            <div class="card-body">
               <?php if ($projectInfo->voiture == 0 ){  echo '<a  style="color: white"  class="btn btn-info btn-block" href='.base_url().'Voiture/addNew/'.$projectInfo->reservationId.' >Ajouter</a> ';} else {   ?>
                  Depart  :   <?php echo $voiture->depart ; ?><br>
                  Point 1 :   <?php echo $voiture->l1 ; ?><br>
                  Point 2 :   <?php echo $voiture->l2 ; ?><br>
                  Point 3 :   <?php echo $voiture->l3 ; ?><br>

                  statut :   <?php if ($voiture->statut == 0 ) { ?>
                <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> Validée</span>
                <?php } ?>    
                <?php if ($voiture->statut == 1 ) { ?>
                <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i> En attente</span>
                <?php } ?>
                <?php if ($voiture->statut == 2 ) { ?>
                <span class="badge badge-pill badge-dark"></span>
                <?php } ?>
                <?php if ($voiture->statut == 3 ) { ?>
                <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                <?php } ?>
               <?php }   ?>
             </div>
              <?php if ($projectInfo->voiture != 0 ){ ?> 
               <div class="card-footer">
                  <a style="color: white" href="<?php echo base_url() ?>Voiture/view/<?php echo $projectInfo->voiture ?>"  class="btn btn-success btn-block">Details</a> 
               </div>
               <?php }   ?>
         </div>
          
           
      </div>
      
      <div class="col-md-3">
         <div class="card-shadow-primary card-border mb-3 card">
            <div class="card-header">
               <h5>Note</h5>
             </div>
            <div class="card-body">
            <?php  echo $projectInfo->noteAdmin ;  ?>
             </div>
         </div>
          
           
      </div>
      
      
      
      

      <!-- contrat -->
      <div class="col-md-8">
         <div class="main-card mb-3 card">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="card-title mb-0"></h6>
                  <div class="dropdown mb-2">
                     <?php if(!empty($contratInfo)) {  ?>
                     <button id="printC" class="dropdown-item d-flex align-items-center"  onclick="print()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm mr-2">
                           <polyline points="6 9 6 2 18 2 18 9"></polyline>
                           <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                           <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                        <span   >Imprimer</span>
                     </button>
                     <?php }  ?>
                  </div>
               </div>
               <?php if(!empty($contratInfo)) {  ?>
               <div class="contrat" id="contrat"  >
                  <div class="row ">
                     <div class="col-md-2"> </div>
                     <div class="col-md-8">
                        <p style="font-size: 25; text-align: center;" >Contrat de location de salle des fêtes <br> <b><?php echo $contratInfo->salle ; ?></b></p>
                     </div>
                     <div class="col-md-2"> </div>
                  </div>
                  <span class="align-items-center">  </span><br>
                  <hr>
                  <br>
                  Entre <b>Ste Queen Park</b> Mc 34 Route Mornag Boujardgha Ben Arous 2090, désigné ci-après « le bailleur » <br>
                  <b>ET</b> <br>
                  <b><?php echo $contratInfo->nom.' '.$contratInfo->prenom ;?></b> titulaire de la carte d’identité nationale <b>N°<?php echo $contratInfo->cin ;?></b> délivrée le <b><?php echo $contratInfo->dateCin ;?></b> et demeurant à <b>N°<?php echo $contratInfo->n.' '.$contratInfo->rue.' '.$contratInfo->ville.' '.$contratInfo->codePostal ;?></b>   désigné ci-après « le locataire »  <br><br> 
                  <br>
                  <hr>
                  <h6>ARTICLE 1 – DESIGNATION DES LOCAUX :</h6>
                  Les locaux concernés par la location incluent la salle de réception <?php echo $contratInfo->salle ; ?> , ainsi que les dépendances listées ci-dessous : Cuisines, WC, Vestiaires, parking.<br><br>
                  <hr>
                  <h6>ARTICLE 2 – EQUIPEMENTS :</h6>
                  Le matériel mis à disposition doit être rendu propre et en bon état de fonctionnement. Il fera l’objet d’un inventaire lors des états des lieux d’entrée et de sortie de la salle. <br><br>
                  <hr>
                  <h6>ARTICLE 3 – DESTINATION DES LIEUX LOUES :</h6>
                  La salle est louée pour accueillir l’évènement suivant : <?php echo $contratInfo->type ;?> <br><br>
                  <hr>
                  <h6>ARTICLE 4 – DUREE::</h6>
                  Débute le <b><?php echo $contratInfo->dateDebut ;?> </b> , à <b><?php echo $contratInfo->heureDebut ;?></b> <br>
                  Elle prend fin le <b><?php echo $contratInfo->dateFin ;?></b>  , à <b><?php echo $contratInfo->heureFin ;?></b> <br>
                  <br>
                  Le transfert de responsabilité s'effectue à la date et l’heure fixée ci-dessus. Le locataire est tenu de se présenter 
                  1 Heure avant l’heure de début de location pour procéder à l’état des lieux d’entrée. La salle doit être vidée et rendue dans son état initial à la date et l’heure de fin de location fixée ci-dessus. Le locataire est tenu de rester 20 minutes après la fin de location pour procéder à l’état des lieux de sortie. <br><br>
                  <hr>
                  <h6>ARTICLE 5 – CHARGES ET CONDITIONS DU LOCATAIRE :</h6>
                  Le locataire est tenu : <br>
                  - De régler les arrhes à signature du présent contrat<br>
                  - De verser le dépôt de garantie à signature du présent contrat <br>
                  - D’avoir réglé la totalité du loyer au plus tard 30 jours ouvrés avant le début de la location <br>
                  - De fournir une autorisation de l’évènement délivrée la poste de police de Mornag.<br><br>
                  <hr>
                  <h6>ARTICLE 6 – OBLIGATIONS DU BAILLEUR :</h6>
                  Le bailleur s’engage à mettre à disposition des locaux pouvant accueillir l’évènement organisé par le locataire, dans la limite de 
                  <br>
                  personnes <br>
                  En cas d’accident, la responsabilité du bailleur ne pourra être engagée si le nombre de personnes est supérieur à la capacité de la salle. <br><br>
                  <hr>
                  <h6>ARTICLE 7 – CESSION, SOUS LOCATION :</h6>
                  Toute sous-location est interdite. Le titre de location est nominatif et ne peut être cédé à un tiers. <br><br>
                  <hr>
                  <h6>ARTICLE 8 – CLAUSE RESOLUTOIRE :</h6>
                  - En cas de changement de la part du locataire moins de 2 mois avant la date de location, les arrhes versées restent dues. <br>
                  - En cas d’annulation de l’évènement durant la période de location, la totalité du loyer reste du, sauf si la responsabilité du bailleur est démontrée et prouvée. <br>
                  - Le bailleur se réserve le droit d'interdire l'accès aux salles ou de mettre fin à la location s'il apparaissait que la manifestation organisée ne correspond pas à celle décrite dans le présent contrat. <br><br>
                  <hr>
                  <h6>ARTICLE 9 – PRIX DE LA LOCATION :</h6>
                  La présente location est consentie et acceptée moyennant le versement d’un loyer de <b><?php echo $contratInfo->prix ;?> DT</b>, payable au plus tard <b style="color: red"> 30 jours avant la date de début de location.</b> <br>
                  Il est demandé au locataire de verser <b style="color: green "><?php echo $contratInfo->avance ;?> DT  dès la signature du contrat.</b><br>
                  Le mode de paiement accepté est en espèces.<br>
                  <b>NB :<br>1. dans tous les cas le montant versé ne sera pas rembourser (le client  peut seulement reporter sa date de reservation) </b> <br>
                  <b>2. dans le cas de report du date de la reservation ce contrat sera systèmatiquement annulé et un autre sera signer avec une nouvelle négociation du montant tout en respectant le montant deja versé  </b> <br>
                  <hr>
                  <h6>ARTICLE 10 – RÈGLEMENT INTÉRIEUR :</h6>
                  - Il est interdit de fumer à l’intérieur des locaux. <br>
                  - Il est strictement interdit d’importer des boissons alcooliques à l’intérieur des locaux.<br>
                  - En aucun cas, le mobilier ne doit sortir de la salle. <br>
                  - La préparation des repas se fera exclusivement dans la cuisine de la salle.<br>
                  - Il est demandé aux utilisateurs de la salle d’éviter les nuisances sonores à l’extérieur de la salle.<br>
                  - Le bailleur ne pourra être tenu de tout dommage causé aux véhicules ou matériel situés sur le parking. <br>
                  <br>          
                  <br>
                  <p style="text-align: right;">يرجى ذكر العنوان أدناه في دعوات حفلتكم : 
                     <br>
                     <b>   "<?php echo $contratInfo->salle ; ?>&nbsp;فضاء  "</b> 
                     <br> 
                     بوجردقة طريق مرناق      Centre Queen Park
                  </p>
                  <br><br>
                  <div class="row">
                     <div class="col-md-12"> Fait à Mornag , le <b><?php echo $contratInfo->createdDate; ?></b>  </div>
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
                              QP<?php echo  $contratInfo->cin ; ?>/<?php echo  $contratInfo->reservationId ; ?>/<?php echo  $contratInfo->createdBy ; ?>
                           </td>
                           <td width="30 %">
                              Prix
                           </td>
                           <td>
                              <b ><?php echo $contratInfo->prix ;?></b>
                           </td>
                        </tr>
                        <tr>
                           <td width="30 %">
                              Event & Horaire
                           </td>
                           <td>
                              <?php echo $contratInfo->type ;?> à l'espace  <b> <?php echo $contratInfo->salle ; ?> </b> <br>
                              <?php echo $contratInfo->titre ;?> <br>
                              <b>Debut : </b><?php $date = new DateTime($projectInfo->dateDebut); echo $date->format('d/m/Y').' '.$projectInfo->heureDebut;  ?><br>
                              <b>Fin : </b><?php $date = new DateTime($projectInfo->dateFin); echo $date->format('d/m/Y').' '.$projectInfo->heureFin;  ?>          
                           </td>
                           <td width="30 %">
                              Avance 
                              <br>Reste
                           </td>
                           <td>
                              <b style="color: green ">
                              <?php echo $contratInfo->avance ;?>
                              </b>
                              <br>
                              <b style="color: red ">
                              <?php echo $contratInfo->prix - $contratInfo->avance ;?>
                              </b>
                           </td>
                        </tr>
                        <tr>
                           <td width="30 %">
                              Options : 
                           </td>
                           <td>
                              <?php if ($projectInfo->cuisine == 1 ){ echo "Cuisine (Disponible le jour de l'évenement de 09h) <br>";}  ?>
                              <?php if ($projectInfo->tableCM == 1 ){ echo "Table contrat de mariage";}  ?>
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
                              <?php echo $contratInfo->nbPlace ;?>
                           </td>
                           <td width="30 %">
                           </td>
                           <td>
                              <?php  echo date('d/m/Y', strtotime($contratInfo->dateDebut. '  - 30  days'))  ; ?>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <br>
                  <p style="text-align: center;">Queen Park - Mc 34 Route  Mornag boujardga 2090 - mobile : 54 419 959  - 79 352 153 - 58 465 249 </p>
               </div>
               <?php } else{ echo '<h5 style="color : red" >Pour avoir votre contrat il faut verser une avance superieur à 2000DT </h5>' ;}  ?>
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
                        action="<?php echo base_url() ?>Reservation/addPaiement/<?php echo $projectInfo->reservationId ?>" 
                        method="post"  >
                  <?php } if ($totalPaiement->valeur ==  0 ) {  ?>
                     <form style="display: none; border: 2px " 
                        id="addPayementForm" 
                        action="<?php echo base_url() ?>Reservation/generateContrat/<?php echo $projectInfo->reservationId ?>" 
                        method="post"  >
                  <?php } ?>   
                     <hr>
                    <li class="list-group-item">
                     <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                           <div class="widget-content-left mr-3">
                              <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                           </div>
                           <div class="widget-content-left">
                              <div class="widget-heading"><input type="text" class="form-control"  placeholder="motif" value="Partie" ></div>
                              <div class="widget-subheading"></div>
                           </div>
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
                        <input  class="btn btn-block btn-primary"  type="submit" >
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
               <button class="btn btn-warning" id="addPayement" >Ajouter</button> <a href="<?php echo base_url() ?>Reservation/recuP/<?php echo $projectInfo->reservationId ?>" class="btn btn-info">Reçu</a>
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


   </div>
</div>



