<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
        </div>
        <div> Tableau de bord <div class="page-title-subheading"></div>
        </div>
      </div>
      <div class="page-title-actions"></div>
    </div>
  </div>
  <div class="tabs-animation">
    <div class="row">
      <div class="col-md-12 col-xl-12">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
              <i class="header-icon lnr-charts icon-gradient bg-happy-green"></i> Portfolio
            </div>
            <div class="btn-actions-pane-right text-capitalize">
           <!--   <a class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">View All</a> -->
            </div>
          </div>
          <div class="no-gutters row">
            <div class="col-sm-6 col-md-4 col-xl-4">
              <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                <div class="icon-wrapper rounded-circle">
                  <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                  <i class="lnr-calendar-full text-dark opacity-8"></i>
                </div>
                <div class="widget-chart-content">
                  <div class="widget-subheading">Projets</div>
                  <div class="widget-numbers"> <?php echo count($reservationRecords) ?> </div>
                  <!-- <div class="widget-description opacity-8 text-focus">
                    <div class="d-inline text-danger pr-1">
                      <i class="fa fa-angle-down"></i>
                      <span class="pl-1">54.1%</span>
                    </div> less earnings
                  </div> -->
                </div>
              </div>
              <div class="divider m-0 d-md-none d-sm-block"></div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
              <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                <div class="icon-wrapper rounded-circle">
                  <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                  <i class="lnr-user text-white"></i>
                </div>
                <div class="widget-chart-content">
                  <div class="widget-subheading">Clients</div>
                  <div class="widget-numbers">
                    <span> <?php echo count($clientecords) ?> </span>
                  </div>
                  <!--
                  <div class="widget-description opacity-8 text-focus"> Grow Rate: <span class="text-info pl-1">
                      <i class="fa fa-angle-down"></i>
                      <span class="pl-1">14.1%</span>
                    </span>
                  </div> -->
                </div>
              </div>
              <div class="divider m-0 d-md-none d-sm-block"></div>
            </div>
            <div class="col-sm-12 col-md-4 col-xl-4">
              <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                <div class="icon-wrapper rounded-circle">
                  <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                  <i class="lnr-rocket text-white"></i>
                </div>
                <div class="widget-chart-content">
                  <div class="widget-subheading">Gain</div>
                  <div class="widget-numbers text-success">
                    <span> <?php if($uid == 1 ){ echo ($chiffres->valeur)/1000 ; }  ?>M DT </span>
                  </div>
                  <div class="widget-description text-focus"> Augmentaion de <span class="text-warning pl-1">
                      <i class="fa fa-angle-up"></i>
                      <span class="pl-1"> <?php if($uid == 1 ){ echo ($chiffresPrec->valeur)/1000 ; }  ?>M DT </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--
          <div class="text-center d-block p-3 card-footer">
            <a href="
                     <?php echo base_url() ?>" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
              <span class="mr-2 opacity-7">
                <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
              </span>
            </a>
          </div>
        -->
        </div>
      </div>
      <div class="col-lg-12">
        <div class="mb-3 card bg-premium-dark">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> Reservation par semaine
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                        <?php echo base_url() ?>Reservation">Voir tout </a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body bg-dark">
            <div class="row">
              <div id="calendar1"></div>
            </div>
          </div>
          <div class="divider mb-0 bg-dark"></div>
        </div>
      </div>
      <div class="col-lg-12 col-xl-12">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> Chiffres par mois
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                        <?php echo base_url() ?>Reservation">Voir tout </a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            <div class="row">
         
          
            
              
                 <canvas id="parSalle" style="padding-right: 30px;padding-left: 30px;height:750px ;"></canvas>
              <script type="text/javascript">
                  document.addEventListener("DOMContentLoaded", function () {
                      var ctx = document.getElementById('parSalle').getContext('2d');

                      // Données PHP converties en JavaScript
                      var labels = [ <?php for ($i=2018; $i<=date('Y')+1; $i++) { echo "'$i',"; } ?> ];
                      
                      var termineeData = [ <?php                     
                          for ($i=2018; $i<=date('Y')+1; $i++) { 
                              foreach ($reservationDo as $data) {
                                  if ($data->yearDate == $i) {
                                      echo $data->countRes . ',';
                                  }
                              } 
                          } 
                      ?> ];
                      
                      var attenteData = [ <?php 
                          for ($i=2018; $i<=date('Y')+1; $i++) { 
                              $t = 0;
                              foreach ($reservationEnAttent as $data) {
                                  if ($data->yearDate == $i) {
                                      echo $data->countRes . ',';
                                      $t = 1;
                                  }
                              }
                              if ($t == 0) { echo "0,"; }
                          } 
                      ?> ];

                      var annuleeData = [ <?php    
                          for ($i=2018; $i<=date('Y')+1; $i++) { 
                              $t = 0;
                              foreach ($reservationAnnule as $data) {
                                  if ($data->yearDate == $i) {
                                      echo $data->countRes . ',';
                                      $t = 1;
                                  }
                              }
                              if ($t == 0) { echo "0,"; }
                          } 
                      ?> ];

                      // Création du graphe avec Chart.js
                      var chart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: labels,
                              datasets: [
                                  {
                                      label: 'Terminée',
                                      data: termineeData,
                                      backgroundColor: '#28a745',
                                      borderColor: '#1e7e34',
                                      borderWidth: 1
                                  },
                                  {
                                      label: 'En attente',
                                      data: attenteData,
                                      backgroundColor: '#ffc107',
                                      borderColor: '#e0a800',
                                      borderWidth: 1
                                  },
                                  {
                                      label: 'Annulée',
                                      data: annuleeData,
                                      backgroundColor: '#dc3545',
                                      borderColor: '#c82333',
                                      borderWidth: 1
                                  }
                              ]
                          },
                          options: {
                              responsive: true,
                              maintainAspectRatio: false,
                              plugins: {
                                  title: {
                                      display: true,
                                      text: 'Réservations par année',
                                      font: { size: 18 }
                                  },
                                  legend: {
                                      position: 'top'
                                  }
                              },
                              scales: {
                                  x: {
                                      title: {
                                          display: true,
                                          text: 'Année'
                                      }
                                  },
                                  y: {
                                      beginAtZero: true,
                                      title: {
                                          display: true,
                                          text: 'Nombre de réservations'
                                      }
                                  }
                              }
                          }
                      });
                  });
              </script>

          </div>
        <!--  <div class="divider mb-0"></div>
          <div class="grid-menu grid-menu-2col">
            <div class="no-gutters row"> <?php foreach ($ReservationPerYearRecords as $data ) { if ($data->YEAR > 0 ){  ?> <div class="col-md-6 ">
                <div class="widget-content mt-2 ">
                  <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left pr-2 fsize-1">
                        <div class="widget-numbers fsize-3 text-danger "> <?php echo $data->COUNT ?> </div>
                      </div>
                      <div class="widget-content-right w-100">
                        <div class="progress-bar-xs progress">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="
                                          <?php echo round(($data->COUNT/count($reservationRecords))*100) ?>" aria-valuemin="0" aria-valuemax="
                                          <?php echo count($reservationRecords) ?>" style="width: 
                                          <?php echo round(($data->COUNT/count($reservationRecords))*100) ?>%;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-content-left fsize-1">
                      <div class="text-muted opacity-6"> <?php echo $data->COUNT ?> en <?php echo $data->YEAR ?> </div>
                    </div>
                  </div>
                </div>
              </div> <?php } } ?> </div>
          </div>-->
       
      </div>
    </div>
  </div>

      <div class="col-lg-4">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> Reservation Par Salle ( <?php $year = date("Y"); echo $year; ?>)
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                        <?php echo base_url() ?>Reservation">Voir tout </a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            <div class="row"></div>
          </div>
          <div class="widget-chart p-0">
            <div id="Salle"></div>
          </div>
          <div class="divider mb-0"></div>
        </div>
        <script type="text/javascript">
          var options = {
            series: [ <?php  foreach($SalleRecords as $data) {
              echo $data->COUNT.
              ',';
            } ?> ],
            chart: {
              type: 'pie',
            },
            labels: [ <?php  foreach($SalleRecords as $data) {
              echo '"'.$data->nom.
              '",';
            } ?> ],
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
          var chart = new ApexCharts(document.querySelector("#Salle"), options);
          chart.render();
        </script>


          <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> Reservation Par type ( <?php $year = date("Y"); echo $year; ?>)
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                        <?php echo base_url() ?>Reservation">Voir tout </a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            <div class="row"></div>
          </div>
          <div class="widget-chart p-0">
            <div id="Types"></div>
          </div>
          <div class="divider mb-0"></div>
        </div>

        <script type="text/javascript">
          var options = {
            series: [ <?php  foreach($TypesRecords as $data) {
              echo $data->countTypes.
              ',';
            } ?> ],
            chart: {
              type: 'pie',
            },
            labels: [ <?php  foreach($TypesRecords as $data) {
              echo '"'.$data->type.
              '",';
            } ?> ],
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
          var chart = new ApexCharts(document.querySelector("#Types"), options);
          chart.render();
        </script>

        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> Statistique par Employée
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <button class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm">Voir tout</button>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            <div class="row">
              <ul class="rm-list-borders list-group list-group-flush" style="width: 100%;padding: 20px"> <?php if($uid == 1 ){ foreach ($ReservationPerEmployeRecords as $Employer ) {  ?> <li class="list-group-item">
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left mr-3">
                        <img width="42" class="rounded-circle" src="https://www.queenpark.tn/assets/img/teams/
                                       <?php echo $Employer->avatar  ?>" alt="">
                      </div>
                      <div class="widget-content-left">
                        <div class="widget-heading"> <?php echo  $Employer->name ?> </div>
                      </div>
                      <div class="widget-content-right">
                        <div class="font-size-xlg text-muted">
                          <span> <?php echo $Employer->COUNT ?> </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li> <?php  }  } ?> </ul>
            </div>
          </div>
          <div class="divider mb-0"></div>
        </div>
      </div>
  
      <div class="col-md-4">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> TOP 3 Salle
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                           <?php echo base_url() ?>Reservation">Voir</a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            
              <table class="table" width="100%">
                
                <?php $i = 0 ; foreach ($ClassementSalle as $salle) {
                          $i++ ; ?> 
                <tr>
                <td> <strong> <?php  echo $i ; ?> </strong> </td>
                <td> <?php  echo $salle->packname ; ?> </td>
                <td> <?php  echo $salle->countRes ; ?> </td> 
                </tr>
                <?php } ?>
              
            </table>
          </div>
          <div class="divider mb-0"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> TOP 3 Prestations 
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                           <?php echo base_url() ?>Prestation">Voir</a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            <table class="table" width="100%">
            <?php $i = 0 ; foreach ($ClassementPrestations as $prestation) {
                          $i++ ; ?> 
                <tr>
                <td> <strong> <?php  echo $i ; ?> </strong> </td>
                <td> <?php  echo $prestation->packname ; ?> </td>
                <td> <?php  echo $prestation->countRes ; ?> </td> 
                </tr>

            <?php } ?>
          </table>
          </div>
          <div class="divider mb-0"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> TOP 3 Chanteurs 
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                           <?php echo base_url() ?>Prestation">Voir</a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            <table class="table" width="100%">
                
                <?php $i = 0 ; foreach ($ClassementChanteurs as $chanteur) {
                          $i++ ; ?> 
                <tr>
                <td> <strong> <?php  echo $i ; ?> </strong> </td>
                <td> <?php  echo $chanteur->packname ; ?> </td>
                <td> <?php  echo $chanteur->countRes ; ?> </td> 
                </tr>
                <?php } ?>
              
            </table>
          </div>
          <div class="divider mb-0"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> TOP 3 Voitures
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                           <?php echo base_url() ?>Voiture">Voir</a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            <table class="table" width="100%">
               
                <?php $i = 0 ; foreach ($ClassementVoiture as $voiture) {
                          $i++ ; ?>  
                <tr>
                <td> <strong> <?php  echo $i ; ?> </strong> </td>
                <td> <?php  echo $voiture->name ; ?> </td>
                <td> <?php  echo $voiture->countRes ; ?> </td> 
                </tr>
                <?php } ?>
              
            </table>
          </div>
          <div class="divider mb-0"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i> TOP 3 Photographe
            </div>
            <div class="btn-actions-pane-right text-capitalize">
              <a class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm" href="
                           <?php echo base_url() ?>Photographe">Voir</a>
            </div>
          </div>
          <div class="pt-2 pb-0 card-body">
            
              <table class="table" width="100%">
                
                <?php $i = 0 ; foreach ($ClassementPhotographe as $photographe) {
                          $i++ ; ?> 
                <tr>
                <td> <strong> <?php  echo $i ; ?> </strong> </td>
                <td> <?php  echo $photographe->packname ; ?> </td>
                <td> <?php  echo $photographe->countRes ; ?> </td> 
                </tr>
                <?php } ?>
              
            </table>
          </div>
          <div class="divider mb-0"></div>
        </div>
      </div>
    </div>
  </div