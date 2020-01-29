<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/prismjs/themes/prism.css">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0"> <?php echo $projectInfo->titre ; ?> <small><small> de <b> <?php echo $projectInfo->clientName ; ?>

            <?php if ($projectInfo->clientName == '' ){ ?>                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                Ajouter un client
                     </button>
            <?php } ?>
            </small></b> <small><small>#<?php echo $projectInfo->reservationId ; ?></small></small> </small></h4>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">

              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Date</h6>
                      <div class="dropdown mb-2">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12 col-xl-12">
                        Debut : <h5 class="mb-1"><?php $date = new DateTime($projectInfo->dateDebut); echo $date->format('d/m/Y').' '.$projectInfo->heureDebut;  ?></h5> 

                        Fin : <h5 class="mb-1"><?php $date = new DateTime($projectInfo->dateFin); echo $date->format('d/m/Y').' '.$projectInfo->heureFin;  ?></h5>             
                      </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Espace</h6>
                      <div class="dropdown mb-2">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12 col-xl-12">
                        <h4 class="mb-1"><?php echo $projectInfo->salle;  ?></h4>              
                      </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Participant</h6>
                      <div class="dropdown mb-2">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12 col-xl-12">
                        <h4 class="mb-1"><?php echo $projectInfo->nbPlace;  ?></h4>              
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Type</h6>
                      <div class="dropdown mb-2">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12 col-xl-12">
                        <h4 class="mb-1"><?php echo $projectInfo->type  ?></h4>                       
                      </div>
                    </div>
                    <br> 
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">options</h6>
                      <div class="dropdown mb-2">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12 col-xl-12">
                        <h4 class="mb-1"><?php if ($projectInfo->cuisine == 1 ){ echo "Cuisine <br>";}  ?></h4>
                        <h4 class="mb-1"><?php if ($projectInfo->tableCM == 1 ){ echo "Table contrat de mariage";}  ?></h4>                        
                      </div>
                    </div>

                     <br> 
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">prix</h6>
                      <div class="dropdown mb-2">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12 col-xl-12">
                        <h4 class="mb-1"><?php echo $projectInfo->prix  ?> DT</h4>                       
                      </div>
                    </div>


                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Note</h6>
                      <div class="dropdown mb-2">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12 col-xl-12">
                        
                          <div class="row">

                            <div class="col-12 col-md-12 col-xl-12">
                                <h4 class="mb-1">
                            <?php if ($projectInfo->statut == 0 ) { ?>
                                <span class="badge badge-pill badge-success">&nbsp;&nbsp;Validé&nbsp;&nbsp;</span>
                            <?php } ?>    
                            <?php if ($projectInfo->statut == 1 ) { ?>
                                <span class="badge badge-pill badge-warning">&nbsp;&nbsp;paiement en Attente&nbsp;&nbsp;</span>
                            <?php } ?>
                            <?php if ($projectInfo->statut == 2 ) { ?>
                                <span class="badge badge-pill badge-dark">&nbsp;&nbsp;Pré-reservation&nbsp;&nbsp;</span>
                                <?php if ($projectInfo->clientName != '' ){ ?>  
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                  Generer le contrat
                                </button>
                               <?php } ?>
                            <?php } ?>
                            <?php if ($projectInfo->statut == 3 ) { ?>
                                <span class="badge badge-pill badge-danger">&nbsp;&nbsp;Annulé&nbsp;&nbsp;</span>
                            <?php } ?>
                                </h4>                       
                              </div>
                            </div>
                            <br> 
                            <div class="d-flex justify-content-between align-items-baseline">
                              <h6 class="card-title mb-0">note Admin</h6>
                              <div class="dropdown mb-2">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12 col-md-12 col-xl-12">
                                <h4 class="mb-1"><?php  echo $projectInfo->noteAdmin  ?></h4>                       
                              </div>
                            </div>

                             <br> 
                            <div class="d-flex justify-content-between align-items-baseline">
                              <h6 class="card-title mb-0"></h6>
                              <div class="dropdown mb-2">
                              </div>
                            </div>

                            

                            

                          </div>
                                             
                      </div>
                    </div>
                  </div>
                </div>
              </div>

             
            </div>
          </div>
       

      <?php if ($projectInfo->statut == 1 || $projectInfo->statut == 0  ) { ?>
        <div class="row">
          
          
        

        
          <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0"> <?php echo count($paiementInfo)?> Partie payée </h6>
                  
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                      <a class="dropdown-item d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm mr-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm mr-2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download icon-sm mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> <span class="">Download</span></a>
                    </div>
                  </div>

                </div>
               
                

                <div class="d-flex flex-column">
                  <?php foreach ($paiementInfo as $res ) {
                   ?>
                  <span class="d-flex align-items-center border-bottom pb-12">
                    <div class="mr-12">
                      <?php $date = new DateTime($res->createdDate); echo $date->format('d/m/Y H:i');  ?>
                    </div>
                    &nbsp; 
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2"><?php echo $res->libele ?></h6>
                        <p class="text-muted tx-12">
                          + <?php echo $res->valeur ?> DT
                        </p>
                      </div>
                      <b></b>
                      <p class="text-muted tx-10"><?php echo $res->name ?></p>
                    </div>
                  </span>
                  <?php 

                  } ?>
                 
                  <?php if ($projectInfo->prix - $totalPaiement->valeur > 0 ) { ?>
                  <button class="btn btn-secondary"   data-toggle="modal" data-target="#exampleModal3"  >Ajouter</button>
                <?php } ?>
                  <br>
                  <b>Total payée : <?php echo $totalPaiement->valeur  ?> DT </b> <br> <b>Reste : <?php echo $projectInfo->prix - $totalPaiement->valeur  ?> DT </b>  <br><br> 
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="card-title mb-0"></h6>
                  <div class="dropdown mb-2">
                    <button id="printC" class="dropdown-item d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm mr-2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> <span class=""  >Imprimer</span></button>
                   
                  </div>
                </div>
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
                    Le bailleur s’engage à mettre à disposition des locaux pouvant accueillir l’évènement organisé par le locataire, dans la limite de <NbPlace> personnes <br>
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
                    Le mode de paiement accepté est en espèces.<br> <br>
<hr>
                    <h6>ARTICLE 10 – RÈGLEMENT INTÉRIEUR :</h6>
                    - Il est interdit de fumer à l’intérieur des locaux. <br>
                    - Il est strictement interdit d’importer des boissons alcooliques à l’intérieur des locaux.<br>
                    - En aucun cas, le mobilier ne doit sortir de la salle. <br>
                    - La préparation des repas se fera exclusivement dans la cuisine de la salle.<br>
                    - Il est demandé aux utilisateurs de la salle d’éviter les nuisances sonores à l’extérieur de la salle.<br>
                    - Le bailleur ne pourra être tenu de tout dommage causé aux véhicules ou matériel situés sur le parking. <br>


                    <br>          <br>
   

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

                    <table class="table">
                        <thead>
                          <th></th>
                          <th></th>
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
                                <?php echo $contratInfo->prix ;?>
                            </td>
                          </tr>
                          <tr>
                            <td width="30 %">
                              Evenet & Horaire
                            </td>
                            <td>
                              <?php echo $contratInfo->type ;?> <br>
                              <?php echo $contratInfo->titre ;?> <br>
                               <b>Debut : </b><?php $date = new DateTime($projectInfo->dateDebut); echo $date->format('d/m/Y').' '.$projectInfo->heureDebut;  ?><br>
                               <b>Fin : </b><?php $date = new DateTime($projectInfo->dateFin); echo $date->format('d/m/Y').' '.$projectInfo->heureFin;  ?>          


                            </td>
                            <td width="30 %">
                              Avance 
                            </td>
                            <td>
                              <?php echo $contratInfo->avance ;?>
                            </td>
                          </tr>
                          <tr>
                            <td width="30 %">
                              Options : 
                            </td>
                            <td>
                              <?php if ($projectInfo->cuisine == 1 ){ echo "Cuisine <br>";}  ?>
                              <?php if ($projectInfo->tableCM == 1 ){ echo "Table contrat de mariage";}  ?>
                            </td>
                            <td width="30 %">
                             reste
                            </td>
                            <td>
                              <?php echo $contratInfo->prix - $contratInfo->avance ;?>
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
                              Dernier delais de paiement : 
                            </td>
                            <td>
                              <?php $date = new DateTime($contratInfo->deadline); echo $date->format('d/m/Y')  ;?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    
                      
                    <br>
                    <p style="text-align: center;">Queen Park - Mc 34 Route  Mornag boujardga 2090 - mobile : 54 419 959  - 79 352 153 </p>
                  







                
              </div> 
            </div>
          </div>
  


</div> <!-- row -->





<?php } ?>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generation de contrat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form method="post" action="<?php echo base_url()?>Reservation/generateContrat/<?php echo $projectInfo->reservationId ?>" >

                        <div class="form-group">
                          <label class="control-label">Avance</label>
                          <input type="number" min="0" max="<?php echo $projectInfo->prix - $totalPaiement->valeur  ?>" class="form-control" name="avance" placeholder="Avance" >
                        </div>
                        <div class="form-group">
                          <label class="control-label">Note Administratif</label>
                          <textarea class="form-control" name="noteAdmin" ><?php echo $projectInfo->noteAdmin ?></textarea>

                          
                        </div>

                        <input type="submit" class="btn btn-primary" value="Envoyer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </form>

      </div>

    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" id="exampleModal2"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form method="post" action="<?php echo base_url()?>Client/addClientandReservation/<?php echo $projectInfo->reservationId ?>"  >



    <div class="row">
          <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Ajouter un client</h6>
                  <form  id='form-id' action="<?php echo base_url() ?>Client/addNewClient" method="post">

                    <div class="row">
                          <label class="control-label">Type de client : </label>
                          &nbsp;&nbsp;
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" name="type"  onclick="show1();" checked value="personne" class="form-check-input">
                                Personne
                              <i class="input-frame"></i></label>
                            </div>
                          &nbsp;&nbsp;
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" name="type" onclick="show2();" id="compShow" value="ste" class="form-check-input">
                                Société
                              <i class="input-frame"></i></label>
                            </div>
                        
                    </div><!-- Row -->

                    <div class="row" id="company" style='display:none' >
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Raison social</label>
                          <input type="text" class="form-control" name="raisonSocial" placeholder="Nom de la société">
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Matricule Fiscale</label>
                          <input type="text" class="form-control" name="Matricule"  placeholder="Matricule Fiscale">
                        </div>
                      </div><!-- Col -->
                    </div><!-- Row -->  

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Nom</label>
                          <input type="text" class="form-control" name="nom" placeholder="Nom de famille" required>
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Prenom</label>
                          <input type="text" class="form-control" name="prenom"  placeholder="Prenom" required>
                        </div>
                      </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Date de naissance</label>
                          <input name="birthday" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="jj/mm/aaaa" im-insert="false" type="Date">
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-12">
                        <label class="control-label">Sexe : </label>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" name="sexe" checked value="Homme" class="form-check-input">
                                Homme
                              <i class="input-frame"></i></label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" name="sexe" value="Femme" class="form-check-input">
                                Femme
                              <i class="input-frame"></i></label>
                            </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Carte d'identié national</label>
                          <input type="text" class="form-control" name="CIN"  placeholder="CIN" required>
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Délivrée le </label>
                          <input  name="dateCin" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false" type="Date" required>
                        </div>
                      </div><!-- Col -->
                    </div><!-- Row -->


                    <div class="row">
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label class="control-label">N°</label>
                          <input type="text" class="form-control" name="n" placeholder="N°">
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="control-label">Rue</label>
                          <input type="text" class="form-control" name="rue" placeholder="Rue">
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="control-label">Ville</label>
                          <input type="text" class="form-control" name="ville" placeholder="Ville" required>
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="control-label">code postale</label>
                          <input type="text" class="form-control" name="codePostal" placeholder="Code postale">
                        </div>
                      </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input name="email" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" im-insert="true">
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Mobile</label>
                          <input name="mobile" class="form-control mb-4 mb-md-0" data-inputmask-alias="99999999" im-insert="true" required>
                        </div>
                      </div><!-- Col -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Mobile 2</label>
                          <input name="mobile2" class="form-control mb-4 mb-md-0" data-inputmask-alias="99999999" im-insert="true" required>
                        </div>
                      </div><!-- Col -->
                    </div><!-- Row -->
                    <input type="submit" class="btn btn-primary submit" value="Envoyer" >
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </form>
                  
              </div>
            </div>
          </div>
            </div>


            <script type="text/javascript">
              function show1(){
                  document.getElementById('company').style.display ='none';
                }
              function show2(){
                  document.getElementById('company').style.display = 'block';
                }
            </script>
                        

          </form>

      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout de paiement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form method="post" action="<?php echo base_url()?>Reservation/addPaiement/<?php echo $projectInfo->reservationId ?>" >

                        <div class="form-group">
                          <label class="control-label">Valeur</label>
                          <input type="number" min="0" max="<?php echo $projectInfo->prix - $totalPaiement->valeur  ?>" class="form-control" name="avance" placeholder="Avance" >
                        </div>
                        <div class="form-group">
                          <label class="control-label">Note Administratif</label>
                          <textarea class="form-control" name="noteAdmin" ><?php echo $projectInfo->noteAdmin ?></textarea>

                          
                        </div>

                        <input type="submit" class="btn btn-primary" value="Envoyer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </form>

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