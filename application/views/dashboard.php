<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
            </div>
            <div>
               Dashboard
               <div class="page-title-subheading"></div>
            </div>
         </div>
         <div class="page-title-actions">
         </div>
      </div>
   </div>
   <div class="tabs-animation">
      <div class="row">
         <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
               <div class="widget-content-outer">
                  <div class="widget-content-wrapper">
                     <div class="widget-content-left">
                        <div class="widget-heading">Reservations</div>
                        <div class="widget-subheading">Depuis 2018</div>
                     </div>
                     <div class="widget-content-right">
                        <div class="widget-numbers text-success"><?php echo count($reservationRecords) ?></div>
                     </div>
                  </div>
                  <div class="widget-progress-wrapper">
                     <div class="progress-bar-sm progress">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                     </div>
                     <div class="progress-sub-label">
                        <div class="sub-label-left">Reservation</div>
                        <div class="sub-label-right">100%</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
               <div class="widget-content-outer">
                  <div class="widget-content-wrapper">
                     <div class="widget-content-left">
                        <div class="widget-heading">Clients</div>
                        <div class="widget-subheading">Depuis 2018</div>
                     </div>
                     <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><?php echo count($clientecords) ?></div>
                     </div>
                  </div>
                  <div class="widget-progress-wrapper">
                     <div class="progress-bar-sm progress-bar-animated-alt progress">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                     </div>
                     <div class="progress-sub-label">
                        <div class="sub-label-left">Client</div>
                        <div class="sub-label-right">100%</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
               <div class="widget-content-outer">
                  <div class="widget-content-wrapper">
                     <div class="widget-content-left">
                        <div class="widget-heading">Chiffres</div>
                        <div class="widget-subheading">Depuis 2016</div>
                     </div>
                     <div class="widget-content-right">
                        <div class="widget-numbers text-danger"><?php if($uid == 1 ){ echo ($chiffres->valeur)/1000 ; }  ?>M DT</div>
                     </div>
                  </div>
                  <div class="widget-progress-wrapper">
                     <div class="progress-bar-sm progress-bar-animated-alt progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 46%;"></div>
                     </div>
                     <div class="progress-sub-label">
                        <div class="sub-label-left">Chiffres</div>
                        <div class="sub-label-right">100%</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
          <div class="col-lg-12">
            <div class="mb-3 card">
               <div class="card-header-tab card-header">
                  <div class="card-header-title">
                     <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                     Reservation du jour
                  </div>
                  <div class="btn-actions-pane-right text-capitalize">
                     <button class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm">View All</button>
                  </div>
               </div>
               <div class="pt-2 pb-0 card-body">
                  <div class="row">
                     <table  style="width: 100%;"  class="table-hover table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th>titre</th>
                              <th>Date</th>
                              <th>Espace</th>
                              <th>Options</th>
                              <th>Contact</th>
                              <th width="5%">Statut</th>
                              <th width="5%">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!empty($ReservationRecords))
                              {
                                  foreach($ReservationRecords as $record)
                                  {
                              ?>
                           <tr>
                              <td>
                                 <b><?php echo $record->type ?> : </b> <br><?php echo $record->titre ?>
                              </td>
                              <td>
                                 <b><?php echo date_format(date_create($record->dateFin)  , 'd/m/20y');  ?></b><br>  de <?php echo date_format(date_create($record->heureDebut)  , 'H:i'); ?>  à  <?php echo date_format(date_create($record->heureFin)  , 'H:i'); ?>
                              </td>
                              <td>            
                                 <?php echo $record->salle  ?>
                              </td>
                              <td>
                                  <?php if ($record->cuisine == 1 ){ echo '<i class="fas fa-utensils"></i> Cuisine<br>';}  ?>
                                  <?php if ($record->tableCM == 1 ){ echo '<i class="fa fa-file" ></i> contrat de mariage<br>';}  ?>
                                  <?php if ($record->voiture == 1 ){ echo '<i class="fa fa-car" ></i> Limousine<br>';}  ?>
                                  <?php if ($record->troupe == 1 ){ echo '<i class="fa fa-music" ></i> troupe<br>';}  ?>
                                  <?php if ($record->photographe == 1 ){ echo '<i class="fa fa-camera"></i> photographe<br>';}  ?>
                              </td>
                              <td  onclick='tdclick(this.id)' id="<?php echo $record->reservationId ?>" >
                                 <?php if($record->clientName != '') { ?>
                                 <button type="button" class="btn" data-toggle="tooltip" data-html="true" data-placement="bottom" 
                                    title="<h6>Mobile :<small>  <a href=tel:<?php echo $record->mobile  ?> > <?php echo $record->mobile  ?> </a> </small> </h6>">
                                 <?php echo $record->clientName  ?>
                                 </button>
                                 <?php } ?>
                                 <?php if($record->clientName == '') { ?>
                                 <a href="<?php echo base_url()?>">Ajouter un client</a>                            
                                 <?php } ?>
                              </td>
                              <td> 
                                 <?php if ($record->statut == 0 ) { ?>
                                 <span class="badge badge-pill badge-success"><i class="metismenu-icon pe-7s-check"></i></span>
                                 <?php } ?>    
                                 <?php if ($record->statut == 1 ) { ?>
                                 <span class="badge badge-pill badge-warning"><i class="metismenu-icon pe-7s-stopwatch"></i></span>
                                 <?php } ?>
                                 <?php if ($record->statut == 2 ) { ?>
                                 <span class="badge badge-pill badge-dark"></span>
                                 <?php } ?>
                                 <?php if ($record->statut == 3 ) { ?>
                                 <span class="badge badge-pill badge-danger"><i class="metismenu-icon pe-7s-close"></i></span>
                                 <?php } ?>
                              </td>
                              <td>
                                 <a href="<?php echo base_url() ?>Reservation/view/<?php echo $record->reservationId ?>" >
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                       <g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M1 12s4-8 11-8s11 8 11 8s-4 8-11 8s-11-8-11-8z"/>
                                          <circle cx="12" cy="12" r="3"/>
                                       </g>
                                    </svg>
                                 </a>
                              </td>
                           </tr>
                           <?php
                              } 
                              }
                              ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>titre</th>
                              <th>Date</th>
                              <th>Espace</th>
                              <th>Options</th>
                              <th>Contact</th>
                              <th width="5%">Statut</th>
                              <th width="5%">Action</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
               <div class="divider mb-0"></div>
            </div>
         </div>
         <div class="col-lg-8 col-xl-8">
            <div class="mb-3 card">
               <div class="card-header-tab card-header">
                  <div class="card-header-title">
                     <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                     Chiffres par mois
                  </div>
                  <div class="btn-actions-pane-right text-capitalize">
                     <button class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm">View All</button>
                  </div>
               </div>
               <div class="pt-2 pb-0 card-body">
                  <div class="row">
                  </div>
               </div>
               <div class="widget-chart p-0">
                  <div id="parSalle" style="padding-right: 30px"></div>
                  <script type="text/javascript">
                     var options = {
                              series: 
                              [
                              {
                              name: 'Reservation',
                              data: [<?php foreach($reservationPerMounthRecords as $data) { echo $data->COUNT.',' ;  } ?>]
                              }, 
                              {
                              name: 'en attent',
                              data: [<?php foreach($reservationPerMounthRecords1 as $data) { echo $data->COUNT.',' ;  } ?>],
                               fillColor: '#EB8C87',
                               strokeColor: '#C23829'
                              }
                              ],
                              chart: {
                              height: 580,
                              type: 'bar',
                            },
                            plotOptions: {
                              bar: {
                                borderRadius: 2,
                                dataLabels: {
                                  position: 'top', // top, center, bottom
                                },
                              }
                            },
                            dataLabels: {
                              enabled: true,
                              formatter: function (val) {
                                return val ;
                              },
                              offsetY: -20,
                              style: {
                                fontSize: '12px',
                                colors: ["#304758"]
                              }
                            },
                            
                            xaxis: {
                              categories: [<?php foreach($reservationPerMounthRecords1 as $data) { echo '"'.$data->YEAR.'",' ;  } ?>],
                              position: 'buttom',
                              axisBorder: {
                                show: true
                              },
                              axisTicks: {
                                show: false
                              },
                              crosshairs: {
                                fill: {
                                  type: 'gradient',
                                  gradient: {
                                    colorFrom: '#D8E3F0',
                                    colorTo: '#BED1E6',
                                    stops: [0, 100],
                                    opacityFrom: 0.4,
                                    opacityTo: 0.5,
                                  }
                                }
                              },
                              tooltip: {
                                enabled: false,
                              }
                            },
                            yaxis: {
                              axisBorder: {
                                show: false
                              },
                              axisTicks: {
                                show: false,
                              },
                              labels: {
                                show: false,
                                formatter: function (val) {
                                  return val ;
                                }
                              }
                            
                            },
                            title: {
                              text: 'Reservation par mois',
                              floating: false,
                              offsetY: 0,
                              align: 'center',
                              style: {
                                color: '#444'
                              }
                            }
                            };
                     
                            var chart = new ApexCharts(document.querySelector("#parSalle"), options);
                            chart.render();
                  </script>
               </div>
               <div class="divider mb-0"></div>
               <div class="grid-menu grid-menu-2col">
                  <div class="no-gutters row">
                     <?php foreach ($ReservationPerYearRecords as $data ) { ?>
                     <div class="col-md-6">
                        <div class="widget-content mt-2">
                           <div class="widget-content-outer">
                              <div class="widget-content-wrapper">
                                 <div class="widget-content-left pr-2 fsize-1">
                                    <div class="widget-numbers fsize-3 text-danger"><?php echo $data->COUNT ?></div>
                                 </div>
                                 <div class="widget-content-right w-100">
                                    <div class="progress-bar-xs progress">
                                       <div class="progress-bar bg-danger" role="progressbar"
                                          aria-valuenow="<?php echo round(($data->COUNT/count($reservationRecords))*100) ?>" aria-valuemin="0" aria-valuemax="<?php echo count($reservationRecords) ?>" style="width: <?php echo round(($data->COUNT/count($reservationRecords))*100) ?>%;">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="widget-content-left fsize-1">
                                 <div class="text-muted opacity-6"><?php echo $data->COUNT ?> en <?php echo $data->YEAR ?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="mb-3 card">
               <div class="card-header-tab card-header">
                  <div class="card-header-title">
                     <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                     Statistique Par Salle
                  </div>
                  <div class="btn-actions-pane-right text-capitalize">
                     <button class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm">View All</button>
                  </div>
               </div>
               <div class="pt-2 pb-0 card-body">
                  <div class="row">
                  </div>
               </div>
               <div class="widget-chart p-0">
                  <div id="Salle"></div>
               </div>
               <div class="divider mb-0"></div>
            </div>
            <script type="text/javascript">
               var options = {
                     series: [<?php foreach($SalleRecords as $data) { echo $data->COUNT.',' ;  } ?>],
                     chart: {
                 
                     type: 'pie',
                   },
                   labels: [<?php foreach($SalleRecords as $data) { echo '"'.$data->nom.'",' ;  } ?>],
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
                     <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                     Statistique par Employée
                  </div>
                  <div class="btn-actions-pane-right text-capitalize">
                     <button class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm">View All</button>
                  </div>
               </div>
               <div class="pt-2 pb-0 card-body">
                  <div class="row">
                     <ul class="rm-list-borders list-group list-group-flush" style="width: 100%;padding: 20px">
                        <?php if($uid == 1 ){ foreach ($ReservationPerEmployeRecords as $Employer ) {  ?>
                        <li class="list-group-item">
                           <div class="widget-content p-0">
                              <div class="widget-content-wrapper">
                                 <div class="widget-content-left mr-3">
                                    <img width="42" class="rounded-circle" src="https://www.queenpark.tn/assets/img/teams/<?php echo $Employer->avatar  ?>" alt="">
                                 </div>
                                 <div class="widget-content-left">
                                    <div class="widget-heading"><?php echo  $Employer->name ?></div>
                                 </div>
                                 <div class="widget-content-right">
                                    <div class="font-size-xlg text-muted">
                                       <span> <?php echo $Employer->COUNT ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <?php  }  } ?>
                     </ul>
                  </div>
               </div>
               <div class="divider mb-0"></div>
            </div>
         </div>
        
      </div>
   </div>
</div>