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
         <?php 
         // Tableau des mois en français
         $mois_francais = [
            1 => 'Janvier',
            2 => 'Février',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre'
         ];
         
         for ($i = 1; $i <= 12; $i++) { 
            // Remplacer le numéro de mois par son nom en français
            $mois_nom = $mois_francais[$i];
            echo '<div class="col-md-12 col-xl-12"><h4>'.$mois_nom."</h4></div>"; // Afficher le nom du mois
         ?>
         <?php foreach ($satisfactionSalles as $satisfactionSalle) { 
            if ($satisfactionSalle->MONTH == $i ) {  ?>
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
                        <td width="20%">Salle</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_salle)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_salle, 1) ?></td>
                     </tr>
                     <tr>
                        <td>Service</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_service)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_service, 1) ?></td>
                     </tr>
                     <tr>
                        <td>Propreté</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_proprete)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_proprete, 1) ?></td>
                     </tr>
                     <tr>
                        <td>Lumière</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_lumiere)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_lumiere, 1) ?></td>
                     </tr>
                     <tr>
                        <td>Décoration</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_decoration)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_decoration, 1) ?></td>
                     </tr>
                     <tr>
                        <td>Photographe</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_photographe)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_photographe, 1) ?></td>
                     </tr>
                     <tr>
                        <td>Troupe</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_musicale)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_musicale, 1) ?></td>
                     </tr>
                     <tr>
                        <td>Voiture</td>
                        <td><?php echo str_repeat("⭐", round($satisfactionSalle->avg_voiture)) ?></td>
                        <td><?php echo round($satisfactionSalle->avg_voiture, 1) ?></td>
                     </tr>
                  </table>
               </div>
               <div class="divider mb-0"></div>
            </div>
         </div>
         <?php } } 
            echo "</hr>" ;} ?>
      </div>
   </div>
</div>
