<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
            </div>
            <div>
               Satisfaction des services pour <?php echo $satisfactionSalles[0]->YEAR ?>
               <div class="page-title-subheading"></div>
            </div>
         </div>
         <div class="page-title-actions">
         </div>
      </div>
   </div>
   <div class="tabs-animation">
      <div class="row">
         <?php foreach ( $satisfactionSalles as $satisfactionSalle ) { ?>
         <div class="col-md-4 col-xl-4">
            <div class="mb-3 card">
               <div class="card-header-tab card-header">
                  <div class="card-header-title">
                     <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                       <?php echo $satisfactionSalle->salle ; ?>
                  </div>
                  <div class="btn-actions-pane-right text-capitalize">
                     <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="<?php echo base_url() ?>Reservation" >Voir tout</a>
                  </div>
               </div>
               <div class="pt-2 pb-0 card-body">
                  <div class="row">
                  </div>
               </div>
               <div class="widget-chart p-0">
                  <table width="100%">
                                        <tr>
                                            <td width="20%"><strong>Salle</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_salle) ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Service</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_service) ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Propreté</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_proprete) ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lumière</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_lumiere) ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Décoration</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_decoration) ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Photographe</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_photographe) ?></td>
                                            <td></td>
                                        </tr>
                                       
                                        <tr>
                                            <td><strong>Troupe musicale</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_musicale) ?></td>
                                            <td></td>
                                        </tr>                                        
                                        <tr>
                                            <td><strong>Voiture</strong></td>
                                            <td><?php echo str_repeat("⭐",$satisfactionSalle->avg_voiture) ?></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
               </div>
               <div class="divider mb-0"></div>
            </div>
            
         </div>
         <?php } ?>
      </div>
   </div>
</div>