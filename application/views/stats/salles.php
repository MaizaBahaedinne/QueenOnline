<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
            </div>
            <div>
               Statistique des salles par ans
               <div class="page-title-subheading"></div>
            </div>
         </div>
         <div class="page-title-actions">
         </div>
      </div>
   </div>
   <div class="tabs-animation">
      <div class="row">
         <?php for ($i=2018 ; $i <= date('Y') ; $i++) { ?>
         <div class="col-md-4 col-xl-4">
            <div class="mb-3 card">
               <div class="card-header-tab card-header">
                  <div class="card-header-title">
                     <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                     Reservation Par Salle (<?php echo $i; ?>)
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
                  <canvas id="Salle<?php echo $i; ?>" style="width: 100%; height: 500px;"></canvas>
               </div>
               <div class="divider mb-0"></div>
            </div>
            <script type="text/javascript">
               document.addEventListener("DOMContentLoaded", function () {
                   var ctx = document.getElementById('Salle<?php echo $i; ?>').getContext('2d');
               
                   // Données PHP converties en JavaScript
                   var labels = [<?php foreach($stats as $data) { if ($i == $data->da) { echo '"'.$data->sallename.'",'; } } ?>];
                   var dataValues = [<?php foreach($stats as $data) { if ($i == $data->da) { echo $data->COUNTRES.','; } } ?>];
               
                   var chart = new Chart(ctx, {
                       type: 'pie',
                       data: {
                           labels: labels,
                           datasets: [{
                               data: dataValues,
                               backgroundColor: [
                                   '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                               ],
                               borderColor: '#ffffff',
                               borderWidth: 1
                           }]
                       },
                       options: {
                           responsive: true,
                           maintainAspectRatio: false,
                           plugins: {
                               title: {
                                   display: true,
                                   text: 'Répartition des Salles',
                                   font: { size: 18 }
                               },
                               legend: {
                                   position: 'bottom'
                               }
                           }
                       }
                   });
               });
            </script>
         </div>
         <?php } ?>
      </div>
   </div>
</div>