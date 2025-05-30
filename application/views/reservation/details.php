
<!-- CSS for the Tabs -->
<style>
.tab-container {
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

.tab-buttons {
  display: flex;
  background: #2c3e50;
  border-radius: 8px 8px 0 0;
  overflow: hidden;
}

.tab-btn {
  flex: 1;
  padding: 12px 15px;
  background: none;
  border: none;
  color: white;
  cursor: pointer;
  transition: all 0.3s;
  font-weight: 600;
}

.tab-btn:hover {
  background: #34495e;
}

.tab-btn.active {
  background: #1abc9c;
}

.tab-pane {
  display: none;
  padding: 20px;
  background: white;
  border-radius: 0 0 8px 8px;
}

.tab-pane.active {
  display: block;
}

.select-image {
    display: inline-block;
    text-align: center;
    margin: 10px;
    cursor: pointer;
    position: relative;
    width: 80px;
}
.img-user {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    filter: grayscale(100%);
    transition: all 0.2s ease;
    object-fit: cover;
}
.select-image.checked .img-user {
    filter: none;
    border: 2px solid #007bff;
}
.checkmark {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 12px;
    display: none;
    align-items: center;
    justify-content: center;
}
.select-image.checked .checkmark {
    display: flex;
}
.user-name {
    margin-top: 5px;
    font-size: 12px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 80px;
}
</style>


<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-news-paper icon-gradient bg-grow-early"></i>
                </div>
                <div>
                    Détails de la reservation
                    <div class="page-title-subheading"><?php echo $projectInfo->type ?> <?php echo $projectInfo->dateDebut ?> | <?php echo $projectInfo->salle ?> | <?php echo $projectInfo->titre ?></div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Menu
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <?php if ($projectInfo->statut == 3 ) { ?>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Retour de la reservation</span>            
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($projectInfo->statut != 3 ) { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>Reservation/edit/<?php echo $projectInfo->reservationId; ?>" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Modifier</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php
                                    $annule = true;  
                                    if (!empty($troupe->STroupe)) { if ($troupe->STroupe != 3 ) { $annule = false; } } 
                                    if (!empty($photographe->Pstatut)) { if ($photographe->Pstatut != 3) { $annule = false; } } 
                                    if (!empty($voiture->statut)) { if ($voiture->statut != 3) { $annule = false; } } 
                                    if (!empty($projectInfo->statut)) { if ($projectInfo->statut == 3) { $annule = false; } }    
                                    if ($annule == true) {
                                ?>
                                <a href="<?php echo base_url(); ?>Reservation/deleteReservation/<?php echo $projectInfo->reservationId; ?>" class="nav-link">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span> Annuler</span>
                                </a>
                                <?php } ?>
                                <a class="nav-link o nannuler" onclick="annule()">
                                    <i class="nav-link-icon lnr-file-empty"></i> New Annuler
                                </a>
                            </li>
                            <?php } ?>
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
                    <h5><i class="pe-7s-users"></i> Troupe</h5>
                </div>
                <div class="card-body">
                    <?php if ($projectInfo->troupe == 0) {
                        echo '<a style="color: white" class="btn btn-info btn-block" href=' . base_url() . "Troupe/addNew/" . $projectInfo->reservationId . ">Ajouter</a>";
                    } else { ?>
                    <b>Pack :</b> <?php echo $troupe->packname; ?> <br> <?php echo $troupe->chanteurs ?> <br>  
                    <b>statut :</b>   
                    <?php if ($troupe->STroupe == 0) { ?>
                        <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> Validée</span>
                    <?php } ?>    
                    <?php if ($troupe->STroupe == 1) { ?>
                        <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i> En attente</span>
                    <?php } ?>
                    <?php if ($troupe->STroupe == 3) { ?>
                        <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                    <?php } ?>
                    <?php } ?>
                    <hr>
                    <?php if ($projectInfo->troupe != 0) { ?> 
                    <a style="color: white" href="<?php echo base_url(); ?>Troupe/view/<?php echo $projectInfo->troupe; ?>" class="btn btn-success btn-block">Details</a> 
                    <?php } ?>
                    <hr>
                    <?php foreach ($prestation as $pres) { ?>
                    <?php if ($pres->PresStatut == 0) { ?>
                        <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> </span>
                    <?php } ?>    
                    <?php if ($pres->PresStatut == 1) { ?>
                        <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                    <?php } ?>
                    <?php if ($pres->PresStatut == 3) { ?>
                        <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                    <?php } 
                    echo $pres->packname; ?> à <?php echo $pres->heure; echo "<br>"; } ?>
                    <br>
                    <?php echo '<a style="color: white" class="btn btn-info btn-block" href=' . base_url() . "Prestation/addNew/" . $projectInfo->reservationId . ">Ajouter une prestation</a>"; ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card-shadow-primary card-border mb-3 card">
                <div class="card-header">
                    <h5><i class="pe-7s-camera"></i> Photographe</h5>
                </div>
                <div class="card-body">
                    <?php if ($projectInfo->photographe == 0) {
                        echo '<a style="color: white" class="btn btn-info btn-block" href=' . base_url() . "Photographe/addNew/" . $projectInfo->reservationId . ">Ajouter</a>";
                    } else { ?>
                    Pack : <?php echo $photographe->packname; ?> <br>  
                    statut :   
                    <?php if ($photographe->Pstatut == 0) { ?>
                        <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> Validée</span>
                    <?php } ?>    
                    <?php if ($photographe->Pstatut == 1) { ?>
                        <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i> En attente</span>
                    <?php } ?>
                    <?php if ($photographe->Pstatut == 3) { ?>
                        <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                    <?php } ?>
                    <?php } ?>
                </div>
                <?php if ($projectInfo->photographe != 0) { ?> 
                <div class="card-footer">
                    <a style="color: white" href="<?php echo base_url(); ?>Photographe/view/<?php echo $projectInfo->photographe; ?>" class="btn btn-success btn-block">Details</a> 
                </div>
                <?php } ?>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card-shadow-primary card-border mb-3 card">
                <div class="card-header">
                    <h5><i class="pe-7s-car"></i> Voiture</h5>
                </div>
                <div class="card-body">
                    <?php if ($projectInfo->voiture == 0) {
                        echo '<a style="color: white" class="btn btn-info btn-block" href=' . base_url() . "Voiture/addNew/" . $projectInfo->reservationId . ">Ajouter</a>";
                    } else { ?>
                    Depart : <?php echo $voiture->depart; ?><br>
                    Point 1 : <?php echo $voiture->l1; ?><br>
                    Point 2 : <?php echo $voiture->l2; ?><br>
                    Point 3 : <?php echo $voiture->l3; ?><br>
                    statut :   
                    <?php if ($voiture->statut == 0) { ?>
                        <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i> Validée</span>
                    <?php } ?>    
                    <?php if ($voiture->statut == 1) { ?>
                        <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i> En attente</span>
                    <?php } ?>
                    <?php if ($voiture->statut == 2) { ?>
                        <span class="badge badge-pill badge-dark"></span>
                    <?php } ?>
                    <?php if ($voiture->statut == 3) { ?>
                        <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                    <?php } ?>
                    <?php } ?>
                </div>
                <?php if ($projectInfo->voiture != 0) { ?> 
                <div class="card-footer">
                    <a style="color: white" href="<?php echo base_url(); ?>Voiture/view/<?php echo $projectInfo->voiture; ?>" class="btn btn-success btn-block">Details</a> 
                </div>
                <?php } ?>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card-shadow-primary card-border mb-3 card">
                <div class="card-header">
                    <h5>Note</h5>
                </div>
                <div class="card-body">
                    <?php echo $projectInfo->noteAdmin; ?>
                    <hr>
                   
                    
                    <div class="modal fade bd-example-modal-lg" id="changements" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Historique de la reservation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="example" style="width: 100%;" class="table table-hover table-striped table-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10%">ID</th>
                                                <th width="10%">Date</th>
                                                <th width="10%">Espace</th>
                                                <th width="10%">titre</th>
                                                <th>Options</th>
                                                <th>Prix</th>
                                                <th width="5%">Statut</th>
                                                <th>note</th>
                                                <th width="5%">date et par</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($Backups)) {
                                                foreach ($Backups as $record) { ?>
                                            <tr class="<?php if (time() > strtotime($record->dateDebut . " - 30 days") && $record->statut != 0) {
                                                echo "alert-bg";
                                            } ?>">
                                                <td><?php echo $record->backupId; ?></td>
                                                <td>
                                                    <b><?php echo date_format(date_create($record->dateFin), "d/m/20y"); ?></b><br>
                                                    de <?php echo date_format(date_create($record->heureDebut), "H:i"); ?>  
                                                    à <?php echo date_format(date_create($record->heureFin), "H:i"); ?>
                                                </td>
                                                <td><?php echo $record->salle; ?></td>
                                                <td>
                                                    <b><?php echo $record->type; ?> : </b> <br><?php echo $record->titre; ?>
                                                </td>
                                                <td>
                                                    <?php if ($record->cuisine == 1) {
                                                        echo '<i class="fas fa-utensils"></i> Cuisine<br>';
                                                    } ?>
                                                    <?php if ($record->tableCM == 1) {
                                                        echo '<i class="fa fa-file"></i> contrat de mariage<br>';
                                                    } ?>
                                                    <?php if ($record->voiture != 0) {
                                                        echo '<i class="fa fa-car"></i> Voiture<br>';
                                                    } ?>
                                                    <?php if ($record->troupe != 0) {
                                                        echo '<i class="fa fa-music"></i> troupe<br>';
                                                    } ?>
                                                    <?php if ($record->photographe != 0) {
                                                        echo '<i class="fa fa-camera"></i> photographe<br>';
                                                    } ?>
                                                </td>
                                                <td><?php echo $record->prix; ?></td>
                                                <td style="text-align:center;"> 
                                                    <?php if ($record->statut == 0) { ?>
                                                        <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i></span>
                                                    <?php } ?>    
                                                    <?php if ($record->statut == 1) { ?>
                                                        <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                                                    <?php } ?>
                                                    <?php if ($record->statut == 2) { ?>
                                                        <span class="badge badge-pill badge-dark"></span>
                                                    <?php } ?>
                                                    <?php if ($record->statut == 3) { ?>
                                                        <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $record->noteAdmin; ?></td>
                                                <td>
                                                    <?php echo $record->editDTM; ?> Par                                                         
                                                    <img width="30" class="rounded-circle" src="<?php echo $record->avatar; ?>" alt="<?php echo $record->recuPar; ?>"> 
                                                </td>
                                            </tr>
                                            <?php }
                                            } ?>
                                            <tr class="<?php if (time() > strtotime($contratInfo->dateDebut . " - 30 days") && $contratInfo->statut != 0) {
                                                echo "alert-bg";
                                            } ?>">
                                                <td></td>
                                                <td>
                                                    <b><?php echo date_format(date_create($contratInfo->dateFin), "d/m/20y"); ?></b><br>
                                                    de <?php echo date_format(date_create($contratInfo->heureDebut), "H:i"); ?>  
                                                    à <?php echo date_format(date_create($contratInfo->heureFin), "H:i"); ?>
                                                </td>
                                                <td><?php echo $contratInfo->salle; ?></td>
                                                <td>
                                                    <b><?php echo $contratInfo->type; ?> : </b> <br><?php echo $contratInfo->titre; ?>
                                                </td>
                                                <td>
                                                    <?php if ($contratInfo->cuisine == 1) {
                                                        echo '<i class="fas fa-utensils"></i> Cuisine<br>';
                                                    } ?>
                                                    <?php if ($contratInfo->tableCM == 1) {
                                                        echo '<i class="fa fa-file"></i> contrat de mariage<br>';
                                                    } ?>
                                                    <?php if ($contratInfo->voiture != 0) {
                                                        echo '<i class="fa fa-car"></i> Voiture<br>';
                                                    } ?>
                                                    <?php if ($contratInfo->troupe != 0) {
                                                        echo '<i class="fa fa-music"></i> troupe<br>';
                                                    } ?>
                                                    <?php if ($contratInfo->photographe != 0) {
                                                        echo '<i class="fa fa-camera"></i> photographe<br>';
                                                    } ?>
                                                </td>
                                                <td><?php echo $contratInfo->prix; ?></td>
                                                <td style="text-align:center;"> 
                                                    <?php if ($contratInfo->statut == 0) { ?>
                                                        <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i></span>
                                                    <?php } ?>    
                                                    <?php if ($contratInfo->statut == 1) { ?>
                                                        <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                                                    <?php } ?>
                                                    <?php if ($contratInfo->statut == 2) { ?>
                                                        <span class="badge badge-pill badge-dark"></span>
                                                    <?php } ?>
                                                    <?php if ($contratInfo->statut == 3) { ?>
                                                        <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $contratInfo->noteAdmin; ?></td>
                                                <td>
                                                    <img width="30" class="rounded-circle" src="<?php echo $contratInfo->avatar; ?>" alt="<?php echo $contratInfo->recuPar; ?>"> 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                   <div class="row">
                        <?php if (count($Backups) > 0): ?>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#changements" title="Historique">
                                    <i class="fas fa-history"></i>
                                </button>
                            </div>
                        <?php endif; ?>
                        
                        <div class="col-4">
                            <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#affectationModal" title="Gérer les affectations" onclick="loadAffectationData(<?= $projectInfo->reservationId ?>)">
                                <i class="fas fa-users-cog"></i>
                            </button>
                        </div>

                        <div class="col-4">
                            <a href="<?= base_url('Service/entree/'.$projectInfo->reservationId) ?>" class="btn btn-primary w-100" title="Gestion des entrées">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                        </div>
                    </div>


                    <hr>
                    <div id="serveurAffectes" class="d-flex flex-wrap mt-4"></div>

                    <script>
                        


                    </script>
                 
                    
                   

                    <!-- Modal -->
                    <div class="modal fade" id="affectationModal" tabindex="-1" role="dialog" aria-labelledby="affectationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form id="affectationForm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="affectationModalLabel">Affectation des serveurs</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="serveurList" class="form-group">
                                            <!-- La liste des serveurs sera chargée ici -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="reservationId" value="<?= $projectInfo->reservationId ?>">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- contrat -->
        <!-- Partie HTML modifiée -->
            <div class="col-md-8">
                <?php if (!empty($contratInfo)) { ?>
                <div class="tab-container">
                      <div class="tab-buttons">
                        <button class="tab-btn active" data-target="contrat-tab">Contrat</button>
                        <button class="tab-btn" data-target="factures-tab">Factures</button>
                        <button class="tab-btn" data-target="satisfaction-tab">Satisfaction</button>
                      </div>
                      
                      <div class="tab-content-wrapper">
                        <div id="contrat-tab" class="tab-pane active">
                    
                            <button id="printC" class="dropdown-item d-flex align-items-center" onclick="print()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm mr-2">
                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                    <rect x="6" y="14" width="12" height="8"></rect>
                                </svg>
                                <span>Imprimer</span>
                            </button>
                            <div class="contrat" id="contrat">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <p style="font-size: 25px; text-align: center;">
                                        <b>Contrat de location de salle des fêtes</b><br>
                                        <?php echo $contratInfo->salle; ?>
                                    </p>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <hr><br>

                            Entre <b>Ste Queen Park</b>, MC 34 Route Mornag Boujardgha Ben Arous 2090, désignée ci-après « le bailleur »<br>
                            <b>ET</b><br>
                            <b><?php echo $contratInfo->nom . " " . $contratInfo->prenom; ?></b>, titulaire de la carte d'identité nationale <b>N°<?php echo $contratInfo->cin; ?></b> délivrée le <b><?php echo date_format(date_create($contratInfo->dateCin), 'd/m/Y'); ?></b> et demeurant à <b>N°<?php echo $contratInfo->n . " " . $contratInfo->rue . " " . $contratInfo->ville; ?></b>, désigné ci-après « le locataire ». <br><br>

                            <hr>
                            <h6>ARTICLE 1 – DESIGNATION DES LOCAUX :</h6>
                            Les locaux concernés par la location incluent la salle de réception <b><?php echo $contratInfo->salle; ?></b>, ainsi que les dépendances suivantes : cuisines, WC, vestiaires, parking.<br><br>

                            <hr>
                            <h6>ARTICLE 2 – ÉQUIPEMENTS :</h6>
                            Le matériel mis à disposition doit être rendu propre et en bon état de fonctionnement. Il fera l'objet d'un inventaire lors des états des lieux d'entrée et de sortie.<br><br>

                            <hr>
                            <h6>ARTICLE 3 – DESTINATION DES LIEUX LOUÉS :</h6>
                            La salle est louée pour accueillir l'évènement suivant : <b><?php echo $contratInfo->type; ?></b><br><br>

                            <hr>
                            <h6>ARTICLE 4 – DURÉE :</h6>
                            Débute le <b><?php echo date_format(date_create($contratInfo->dateDebut), 'd/m/Y'); ?></b> à <b><?php echo $contratInfo->heureDebut; ?></b><br>
                            Se termine le <b><?php echo date_format(date_create($contratInfo->dateFin), 'd/m/Y'); ?></b> à <b><?php echo $contratInfo->heureFin; ?></b><br><br>

                            Le transfert de responsabilité s'effectue à l'heure indiquée ci-dessus. Le locataire doit se présenter 1h avant pour l'état des lieux d'entrée, et rester 20 minutes après pour l'état des lieux de sortie. <br><br>

                            <hr>
                            <h6>ARTICLE 5 – CHARGES ET CONDITIONS DU LOCATAIRE :</h6>
                            Le locataire est tenu :<br>
                            - De régler les arrhes à la signature du contrat<br>
                            - De verser le dépôt de garantie<br>
                            - D'avoir réglé la totalité du loyer au plus tard 30 jours ouvrés avant le début de la location<br>
                            - De fournir une autorisation délivrée par le poste de police de Mornag<br><br>

                            <hr>
                            <h6>ARTICLE 6 – OBLIGATIONS DU BAILLEUR :</h6>
                            Le bailleur s'engage à mettre à disposition les locaux pour l'évènement, dans la limite de capacité autorisée.<br>
                            En cas de dépassement du nombre de personnes, la responsabilité du bailleur ne saurait être engagée.<br><br>

                            <hr>
                            <h6>ARTICLE 7 – CESSION, SOUS-LOCATION :</h6>
                            Toute sous-location est interdite. Le contrat est nominatif et non cessible.<br><br>

                            <hr>
                            <h6>ARTICLE 8 – CLAUSE RÉSOLUTOIRE :</h6>
                            - En cas de changement moins de 2 mois avant la date, les arrhes restent dues<br>
                            - En cas d'annulation durant la période, le loyer reste dû (sauf faute du bailleur)<br>
                            - Le bailleur peut mettre fin à la location si l'évènement ne correspond pas à celui déclaré<br><br>

                            <hr>
                            <h6>ARTICLE 9 – PRIX DE LA LOCATION :</h6>
                            Le loyer est de <b><?php echo $contratInfo->prix; ?> DT</b>, payable au plus tard <b style="color: red">30 jours avant le début de la location</b>.<br>
                            Une avance de <b style="color: green"><?php echo $contratInfo->avance; ?> DT</b> est exigée à la signature.<br>
                            Paiement uniquement en espèces.<br><br>

                            <b>NB :</b><br>
                            1. Aucun remboursement ne sera effectué. Le client peut seulement reporter la date de réservation.<br>
                            2. En cas de report, ce contrat est annulé et un nouveau sera signé avec renégociation, en tenant compte de l'avance déjà versée.<br><br>

                            <hr>
                            <h6>ARTICLE 10 – RÈGLEMENT INTÉRIEUR :</h6>
                            - Interdiction formelle d'amener de l'alcool et de fumer à l'intérieur<br>
                            - Le mobilier ne doit pas sortir de la salle<br>
                            - Le bailleur décline toute responsabilité pour les dommages sur véhicules/matériel sur le parking<br><br>

                            <table width="100%">
                                <tr>
                                    <td width="20%">
                                        <img src="<?php echo base_url() ?>assets/images/localisation.png" width="100px">
                                    </td>
                                    <td>
                                        <p style="text-align: right; background: #FFFC25;">
                                            يرجى ذكر العنوان أدناه في دعوات حفلتكم :<br>
                                            <b>"<?php echo $contratInfo->salle; ?> فضاء"</b><br>
                                            بوجردقة طريق مرناق - Queen Park Tunisie
                                        </p>
                                    </td>
                                </tr>
                            </table><br><br>

                            <div class="row">
                                <div class="col-md-12">Fait à Mornag, le <b><?php echo $contratInfo->createdDate; ?></b></div>
                                <div class="col-md-6">Signature du bailleur :</div>
                                <div class="col-md-6">Signature du locataire :</div>
                            </div><br><br><br><br><br><br><br><br><br>

                            <table class="table table-hover table-striped table-bordered" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="15%">Reference</td>
                                        <td width="40%">
                                            QP<?php echo $contratInfo->cin; ?>/<?php echo $contratInfo->reservationId; ?>/<?php echo $contratInfo->createdBy; ?>
                                        </td>
                                        <td width="15%" >Prix</td>
                                        <td width="15%"><b><?php echo $contratInfo->prix; ?> DT</b></td>
                                    </tr>
                                    <tr>
                                        <td >Évènement & Horaire</td>
                                        <td>
                                            <b><?php echo $contratInfo->type; ?> </b> de <b> <?php echo $projectInfo->titre; ?> </b> à l'espace <b><?php echo $contratInfo->salle; ?></b> pour <?php echo $contratInfo->nbPlace; ?> invités
                                            <br>
                                            <b>Début : </b><?php echo date("d/m/Y", strtotime($projectInfo->dateDebut)) . " " . $projectInfo->heureDebut; ?><br>
                                <b>Fin : </b><?php echo date("d/m/Y", strtotime($projectInfo->dateFin)) . " " . $projectInfo->heureFin; ?>
                                            <br>
                                            <?php if ($projectInfo->cuisine == 1 || $projectInfo->tableCM == 1) { echo "<b>avec</b>" ; } ?>
                                            <br>
                                             <?php if (
                                                        $projectInfo->cuisine == 1
                                                        ) {
                                                        echo "<i class='fas fa-utensils'></i> Cuisine <br> <small>disponible le jour de l'évenement à partir de 09h de matin</small> <br> ";
                                                        } ?>
                                                    <?php if (
                                                        $projectInfo->tableCM == 1
                                                        ) {
                                                        echo '<i class="fa fa-file" ></i> Table contrat de mariage<br>';
                                                        } ?>
                                                        
                                            
                                        </td>
                                        <td>Avance<hr>Reste<br><p style="color:white;">Paiement dû avant le : 01/05/2025</p></td>
                                        <td>
                                            <b style="color: green"><?php echo $contratInfo->avance; ?> DT</b>
                                            <hr>
                                            <b style="color: red"><?php echo $contratInfo->prix - $contratInfo->avance; ?> DT</b>
                                            <br><?= "Paiement dû avant le : <strong>".(new DateTime($projectInfo->dateFin))->sub(new DateInterval('P30D'))->format('d/m/Y')."</strong>" ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        
                    <div id="factures-tab" class="tab-pane">
                        <div class="facture-container" id="factures-tab"  >
                            <div class="facture-header" style="text-align: center; ">
                                <h2 style="color: #2c3e50;">FACTURE</h2>
                                <div style="display: flex; justify-content: space-between; ">
                                    <div class="info-client" style="text-align: left;">
                                        <h3 style="margin-bottom: 10px; color: #3498db;">Client</h3>
                                        <p><strong>Nom :</strong> <?php echo $clientInfo->name; ?></p>
                                        <p><strong>CIN :</strong> <?php echo $clientInfo->cin; ?></p>
                                        <p><strong>Adresse :</strong> <?php echo $clientInfo->n.' '.$clientInfo->rue.', '.$clientInfo->ville; ?></p>
                                        <p><strong>Tél :</strong> <?php echo $clientInfo->mobile; ?></p>
                                    </div>
                                    <div class="info-facture" style="text-align: right;">
                                        <p><strong>N° Facture :</strong> QP-<?php echo date('Ymd').'-'.$projectInfo->reservationId; ?></p>
                                        <p><strong>Date :</strong> <?php echo date('d/m/Y'); ?></p>
                                        <p><strong>Référence :</strong> <?php echo $projectInfo->type.' '.$projectInfo->titre; ?></p>
                                        <p><strong>Date événement :</strong> <?php echo date('d/m/Y', strtotime($projectInfo->dateDebut)); ?></p>
                                    </div>
                                </div>
                            </div>

                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                                <thead>
                                    <tr style="background-color: #3498db; color: white;">
                                        <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Désignation</th>
                                        <th style="padding: 10px; text-align: right; border: 1px solid #ddd;">Prix HT</th>
                                        <th style="padding: 10px; text-align: right; border: 1px solid #ddd;">TVA 19%</th>
                                        <th style="padding: 10px; text-align: right; border: 1px solid #ddd;">Prix TTC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalHT = $projectInfo->prix / 1.19;
                                    $montantTVA = $projectInfo->prix - $totalHT;
                                    ?>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Location salle <?php echo $projectInfo->salle; ?></td>
                                        <td style="padding: 10px; text-align: right; border: 1px solid #ddd;"><?php echo number_format($totalHT, 3, '.', ' '); ?> DT</td>
                                        <td style="padding: 10px; text-align: right; border: 1px solid #ddd;"><?php echo number_format($montantTVA, 3, '.', ' '); ?> DT</td>
                                        <td style="padding: 10px; text-align: right; border: 1px solid #ddd;"><?php echo number_format($projectInfo->prix, 3, '.', ' '); ?> DT</td>
                                    </tr>
                                    
                                    <!-- Ajoutez d'autres lignes si nécessaire -->
                                    <?php if($projectInfo->troupe != 0): ?>
                                    <?php
                                        $troupeHT = $troupe->prix / 1.19;
                                        $troupeTVA = $troupe->prix - $troupeHT;
                                        $totalHT += $troupeHT;
                                        $montantTVA += $troupeTVA;
                                    ?>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Prestation troupe <?php echo $troupe->packname; ?></td>
                                        <td style="padding: 10px; text-align: right; border: 1px solid #ddd;"><?php echo number_format($troupeHT, 3, '.', ' '); ?> DT</td>
                                        <td style="padding: 10px; text-align: right; border: 1px solid #ddd;"><?php echo number_format($troupeTVA, 3, '.', ' '); ?> DT</td>
                                        <td style="padding: 10px; text-align: right; border: 1px solid #ddd;"><?php echo number_format($troupe->prix, 3, '.', ' '); ?> DT</td>
                                    </tr>
                                    <?php endif; ?>
                                    
                                    <!-- Total -->
                                    <tr style="font-weight: bold; background-color: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd; text-align: right;" colspan="3">TOTAL</td>
                                        <td style="padding: 10px; text-align: right; border: 1px solid #ddd;"><?php echo number_format($projectInfo->prix + ($projectInfo->troupe != 0 ? $troupe->prix : 0), 3, '.', ' '); ?> DT</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="facture-footer" style="margin-top: 30px; border-top: 1px solid #ddd; padding-top: 20px;">
                                <div style="display: flex; justify-content: space-between;">
                                    <div class="conditions" style="width: 60%;">
                                        <h3 style="color: #3498db; margin-bottom: 10px;">Conditions de paiement</h3>
                                        <p>Paiement en espèce ou par virement bancaire</p>
                                        <p>RIB : XX XXX XXX XXX XXX XXX XX</p>
                                        <p>Banque : [Nom de votre banque]</p>
                                        <p>Code TVA : 1454754RAM000</p>
                                    </div>
                                    <div class="signature" style="width: 30%; text-align: center;">
                                        <p>Le <?php echo date('d/m/Y'); ?></p>
                                        <p style="margin-top: 50px;">Signature et cachet</p>
                                    </div>
                                </div>
                                <div class="mention-tva" style="margin-top: 20px; font-style: italic; text-align: center;">
                                    <p>TVA 19% incluse conformément à la législation tunisienne</p>
                                </div>
                            </div>
                            
                            <div class="facture-actions" style="margin-top: 30px; text-align: center;">
                                <button onclick="window.print()" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px;">Imprimer la facture</button>
                                <button onclick="downloadFacture()" style="background-color: #2ecc71; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; margin-left: 10px;">Télécharger PDF</button>
                            </div>
                        </div>

                        <script>
                        function downloadFacture() {
                            // Vous pouvez utiliser une bibliothèque comme jsPDF ou html2pdf pour générer un PDF
                            alert("Fonctionnalité PDF à implémenter");
                        }
                        </script>
                    </div>
                    <div id="satisfaction-tab" class="tab-pane">
                        <?php
                        function afficherEtoiles($note) {
                            $max = 5;
                            $output = '';
                            for ($i=1; $i <= $max; $i++) {
                                if ($i <= $note) {
                                    $output .= '⭐'; // étoile pleine
                                } else {
                                    $output .= '☆'; // étoile vide
                                }
                            }
                            return $output;
                        }
                        ?>

                        <table class="table table-bordered" >
                        <thead>
                          <tr>
                            <th width="30%">Nature</th>
                            <th width="10%">Moment</th>
                            <th>Quantité d’entrée</th>
                            
                            <th>Consommée</th>
                            <th>Quantité retournée</th>
                            <th width="20%">Note</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($rapport as $item): ?>
                            <tr>
                              <td><?= ucfirst($item->nature) ?></td>
                              <td><?= $item->moment_service ?></td>
                              <td><?= $item->quantite ?></td>
                              
                              <td><?= $item->quantite - $item->quantiteRetournee ?></td>
                              <td><?= $item->quantiteRetournee ?></td>
                              <td><?= $item->noteRetour ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                       <?php foreach($feedbacks as $fb): ?>
                            <div style="border:1px solid #ddd; padding:10px; margin-bottom:10px;">
                                <p><strong>Note Salle :</strong> 
                                    <?php echo afficherEtoiles($fb['note_salle']); ?>
                                </p>
                                <p><strong>Note Service :</strong> 
                                    <?php echo afficherEtoiles($fb['note_service']); ?>
                                </p>
                                <p><strong>Nom et prénom :</strong> 
                                    <?php echo $fb['nom']; ?>
                                </p>
                                <p><strong>Commentaire :</strong> <?= htmlspecialchars($fb['commentaire']); ?></p>
                                
                                <?php if(!empty($fb['photo_user'])){ ?>
                                    <img src="data:image/jpeg;base64,<?php echo $fb['photo_user']; ?>" alt="Photo utilisateur" style="max-width:150px; border-radius:8px;">
                                <?php } ?>
                            </div>
                        <?php endforeach; ?>

                        
                    </div>

                        
                    </div>
                </div>
                <?php } else { ?> 
                        <h5 style="color: red">Pour avoir votre contrat il faut verser une avance superieur à 1000DT</h5>  
                        <script type="text/javascript">
                            Swal.fire({
                                icon: 'error',
                                title: 'Avance < 1000 DT',
                                text: 'il faut verser une avance superieure ou égale à 1000 dt pour imprimer le contrat',
                                footer: ''
                            });
                            
                            $('#printC').hide(); 
                        </script>
                        <?php } ?>
            </div>

          <!-- JavaScript with Error Handling -->
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                  try {
                    // Get all tab buttons and panes
                    const tabButtons = document.querySelectorAll('.tab-btn');
                    const tabPanes = document.querySelectorAll('.tab-pane');
                    
                    // Check if elements exist
                    if (!tabButtons.length || !tabPanes.length) {
                      throw new Error('Tab elements not found!');
                    }
                    
                    // Add click event to each button
                    tabButtons.forEach(button => {
                      button.addEventListener('click', function() {
                        try {
                          const targetId = this.getAttribute('data-target');
                          const targetPane = document.getElementById(targetId);
                          
                          if (!targetPane) {
                            throw new Error(`Target pane not found: ${targetId}`);
                          }
                          
                          // Remove active classes
                          tabButtons.forEach(btn => btn.classList.remove('active'));
                          tabPanes.forEach(pane => pane.classList.remove('active'));
                          
                          // Add active classes
                          this.classList.add('active');
                          targetPane.classList.add('active');
                          
                        } catch (error) {
                          console.error('Tab switch error:', error);
                        }
                      });
                    });
                    
                  } catch (error) {
                    console.error('Tab initialization error:', error);
                  }
                });
                </script>
        

        <div class="col-md-4">
            <div class="card-shadow-primary card-border mb-3 card">
                <div class="dropdown-menu-header">
                    <div class="dropdown-menu-header-inner bg-dark">
                        <div class="menu-header-content">
                            <div class="avatar-icon-wrapper mb-3 avatar-icon-xl">
                                <div class="avatar-icon">
                                    <!-- <img src="assets/images/avatars/6.jpg" alt="Avatar 5"> -->
                                </div>
                            </div>
                            <div>
                                <h5 class="menu-header-title"><?php echo $clientInfo->name; ?></h5>
                                <h6 class="menu-header-subtitle"><b>CIN :</b> <?php echo $clientInfo->cin; ?></h6>
                                <h6 class="menu-header-subtitle"><b>Mobile :</b> <?php echo $clientInfo->mobile; ?> - <?php echo $clientInfo->mobile2; ?></h6>
                                <h6 class="menu-header-subtitle"><?php echo $clientInfo->n; ?> <?php echo $clientInfo->rue; ?> <?php echo $clientInfo->ville; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Paiament</h6>
                    <ul class="rm-list-borders list-group list-group-flush">
                        <?php foreach ($paiementInfo as $res) { ?>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading"><?php echo $res->libele; ?></div>
                                        <div class="widget-subheading">
                                            <?php
                                            $date = new DateTime($res->createdDate);
                                            echo $date->format("d/m/Y H:i");
                                            ?><br> <?php echo $res->name; ?>
                                        </div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="font-size-xlg text-muted">
                                            <span> <?php echo $res->valeur; ?> DT</span>
                                            <small class="opacity-5 pr-1">DT</small>
                                            <small class="text-success pl-2">
                                                <i class="fa fa-angle-up"></i>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        
                        <?php if ($totalPaiement->valeur > 0) { ?>
                        <form style="display: none; border: 2px" 
                            id="addPayementForm" 
                            action="<?php echo base_url(); ?>Reservation/addPaiement/<?php echo $projectInfo->reservationId; ?>" 
                            method="post">
                        <?php } ?>
                        <?php if ($totalPaiement->valeur == 0) { ?>
                        <form style="display: none; border: 2px" 
                            id="addPayementForm" 
                            action="<?php echo base_url(); ?>Reservation/generateContrat/<?php echo $projectInfo->reservationId; ?>" 
                            method="post">
                        <?php } ?>   
                        <hr>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading"><input type="text" class="form-control" placeholder="motif" value="Partie"></div>
                                        <div class="widget-subheading"></div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="font-size-xlg text-muted">
                                            <span> 
                                                <input type="number" placeholder="DT" value="0" min="0" max="<?php echo $projectInfo->prix - $totalPaiement->valeur; ?>" name="avance"> 
                                            </span>
                                            <small class="opacity-5 pr-1">DT</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <input class="btn btn-block btn-primary" type="submit">
                            </div>
                        </li>
                        </form>
                    </ul>
                    <hr>
                    <span style="float: right">Prix : <?php echo $projectInfo->prix; ?> DT</span><br>
                    <span style="float: right">Payé : <?php echo $totalPaiement->valeur; ?> DT</span><br>
                    <span style="float: right">Reste : <?php echo $projectInfo->prix - $totalPaiement->valeur; ?> DT</span>
                </div>
                <div class="text-center d-block card-footer">
                    <?php if (($projectInfo->prix - $totalPaiement->valeur) > 0) { ?> 
                    <button class="btn btn-warning" id="addPayement">Ajouter</button> 
                    <?php } ?> 
                    <a href="<?php echo base_url(); ?>Reservation/recuP/<?php echo $projectInfo->reservationId; ?>" class="btn btn-info">Reçu</a>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $('#addPayement').click(function(){
                $('#addPayementForm').toggle();
            });
            
            function print() {
                printJS({
                    printable: 'contrat',
                    type: 'html',
                    targetStyles: ['*']
                });
            }
            
            const tabs = document.querySelectorAll('.tab-link');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active classes
                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(c => c.classList.remove('active'));

                    // Add active class to clicked tab
                    tab.classList.add('active');
                    document.getElementById(tab.getAttribute('data-tab')).classList.add('active');
                });
            });
            
            </script>


           <script>
                function generateServeurHtml(serveur, isChecked) {
                    const checkedClass = isChecked ? 'checked' : '';
                    // Gérer image base64, si image_base64 commence pas par data:image, on le préfixe
                    const avatar = serveur.avatar 
                        ? (serveur.avatar.startsWith("data:image") ? serveur.avatar : 'data:image/png;base64,' + serveur.avatar)
                        : 'https://via.placeholder.com/60?text=?';

                    return `
                        <div class="select-image ${checkedClass}" data-userid="${serveur.userId}">
                            <img src="${avatar}" alt="${serveur.nom}" class="img-user">
                            <div class="checkmark"><i class="fas fa-check"></i></div>
                            <input type="hidden" name="userIds[]" value="${serveur.userId}" ${isChecked ? '' : 'disabled'}>
                            <div class="user-name">${serveur.nom} ${serveur.prenom}</div>
                        </div>
                    `;
                }

                function loadAffectationData(reservationId) {
                    $.ajax({
                        url: '<?= base_url("Reservation/getAffectationData/") ?>' + reservationId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var serveurList = $('#serveurList');
                            serveurList.empty();

                            data.serveurs.forEach(function(serveur) {
                                var isChecked = data.affectations.some(function(affectation) {
                                    return affectation.userId == serveur.userId;
                                });

                                var html = generateServeurHtml(serveur, isChecked);
                                serveurList.append(html);
                            });

                            // Toggle checked class and input disabled state on click
                            $('.select-image').off('click').on('click', function() {
                                $(this).toggleClass('checked');
                                const input = $(this).find('input[type="hidden"]');
                                input.prop('disabled', !$(this).hasClass('checked'));
                            });
                        },
                        error: function() {
                            alert('Erreur lors du chargement des données.');
                        }
                    });
                }

                // Gestion du submit du formulaire (si tu as un form autour)
                $('#affectationForm').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: '<?= base_url("Reservation/saveAffectations") ?>',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#affectationModal').modal('hide');
                            // Optionnel: refresh ou update interface
                        },
                        error: function() {
                            alert('Erreur lors de l\'enregistrement des affectations.');
                        }
                    });
                });
                </script>




            <script>
            function annule() {
                Swal.fire({
                    title: '<strong>Une nouvelle procédure d\'annulation d\'un contrat de location</strong>',
                    icon: 'info',
                    html:
                        '1. Vérification de la date de paiement <br>' +
                        '2. Invitation du client à se présenter à nos bureaux <a href="tel:<?php echo $clientInfo->mobile; ?>"><?php echo $clientInfo->mobile; ?></a> <br>' +
                        '3. Réunion de résiliation de contrat de location<br><br><b>Le client est pret à signer</b>',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: true,
                    confirmButtonText: '<a style="color: white" href="<?php echo base_url() ?>">Oui</a>',
                    confirmButtonAriaLabel: 'Pas encore',
                    cancelButtonText: 'Pas encore',
                    cancelButtonAriaLabel: 'Pas encore'
                });
            }
        </script>

        <?php if ($projectInfo->statut == 3) { ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Annulée',
                text: 'cette reservation a été annulée',
                footer: ''
            }); 
            
            $('#printC').hide(); 
        </script>
        <?php } ?> 
    </div>
</div>