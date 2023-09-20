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

		<?php for ($i=2018 ; $i <= date(Y) ; $i++) { ?>

		
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
                  <div id="Salle<?php echo $i; ?>"></div>
               </div>
               <div class="divider mb-0"></div>
            </div>
			<script type="text/javascript">
               var options = {
                     series: [<?php foreach($stats as $data) {  if ($i == $data->da ) { echo $stats->COUNT.',' ; }  } ?>],
                     chart: {
                 
                     type: 'pie',
                   },
                   labels: [<?php foreach($stat as $data) {   if ($i == $data->da ){ echo '"'.$data->sallename.'",' } ;  } ?>],
                   responsive: [{
                     breakpoint: 500,
                     options: {
                       chart: {
                         width: 100
                       },
                       legend: {
                         position: 'buttom'
                       }
                     }
                   }]
                   };
               
                   var chart = new ApexCharts(document.querySelector("#Salle<?php echo $i; ?>"), options);
                   chart.render();
               
            </script>
            <?php } ?>

		</div>
	</div>
</div>