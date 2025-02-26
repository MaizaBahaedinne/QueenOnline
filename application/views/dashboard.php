<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
        </div>
        <div> Tableau de bord </div>
      </div>
      <div class="page-title-actions"></div>
    </div>
  </div>
  <div class="tabs-animation">
    <div class="row">
      <!-- Projets -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <div class="card-header-title">
              <i class="lnr-calendar-full text-dark opacity-8"></i> Projets
            </div>
          </div>
          <div class="widget-chart-content">
            <div class="widget-numbers"> <?php echo count($reservationRecords); ?> </div>
          </div>
        </div>
      </div>

      <!-- Clients -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <div class="card-header-title">
              <i class="lnr-user text-white"></i> Clients
            </div>
          </div>
          <div class="widget-chart-content">
            <div class="widget-numbers"> <?php echo count($clientecords); ?> </div>
          </div>
        </div>
      </div>

      <!-- Gain -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <div class="card-header-title">
              <i class="lnr-rocket text-white"></i> Gain
            </div>
          </div>
          <div class="widget-chart-content">
            <div class="widget-numbers text-success">
              <?php if($uid == 1) echo ($chiffres->valeur) / 1000; ?>M DT
            </div>
            <div class="widget-description text-focus">
              Augmentation de 
              <span class="text-warning pl-1">
                <?php if($uid == 1) echo ($chiffresPrec->valeur) / 1000; ?>M DT
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Réservations par semaine -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-header-title">
              <i class="lnr-rocket icon-gradient bg-tempting-azure"></i> Réservation par semaine
            </div>
            <div class="btn-actions-pane-right">
              <a href="<?php echo base_url() ?>Reservation" class="btn btn-outline-primary btn-sm">Voir tout</a>
            </div>
          </div>
          <div class="card-body">
            <div id="calendar1"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Chiffres par mois -->
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="card-header-title">
              <i class="lnr-rocket icon-gradient bg-tempting-azure"></i> Chiffres par mois
            </div>
            <div class="btn-actions-pane-right">
              <a href="<?php echo base_url() ?>Reservation" class="btn btn-outline-primary btn-sm">Voir tout</a>
            </div>
          </div>
          <div class="card-body">
            <div id="parSalle"></div>
          </div>
        </div>
      </div>

      <!-- Graphique des réservations par année -->
      <div class="widget-chart p-0">
        <script type="text/javascript">
          var options = {
            series: [{
              name: 'Terminée',
              data: [<?php
                foreach ($reservationDo as $data) {
                  echo $data->countRes . ',';
                }
              ?>]
            },
            {
              name: 'En attente',
              data: [<?php
                foreach ($reservationEnAttent as $data) {
                  echo $data->countRes . ',';
                }
              ?>]
            },
            {
              name: 'Annulée',
              data: [<?php
                foreach ($reservationAnnule as $data) {
                  echo $data->countRes . ',';
                }
              ?>]
            }],
            chart: {
              height: 580,
              type: 'bar',
            },
            xaxis: {
              categories: [<?php
                for ($i = 2018; $i <= date('Y') + 1; $i++) {
                  echo '"' . $i . '",';
                }
              ?>],
            },
            yaxis: {
              labels: { show: false },
            },
            title: {
              text: 'Réservations par année',
              align: 'center',
            }
          };

          var chart = new ApexCharts(document.querySelector("#parSalle"), options);
          chart.render();
        </script>
      </div>

      <!-- Réservations par salle -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <div class="card-header-title">
              <i class="lnr-rocket icon-gradient bg-tempting-azure"></i> Réservation Par Salle ( <?php echo date("Y"); ?>)
            </div>
          </div>
          <div class="card-body">
            <div id="Salle"></div>
          </div>
        </div>

        <script type="text/javascript">
          var options = {
            series: [<?php
              foreach ($SalleRecords as $data) {
                echo $data->COUNT . ',';
              }
            ?>],
            chart: {
              type: 'pie',
            },
            labels: [<?php
              foreach ($SalleRecords as $data) {
                echo '"' . $data->nom . '",';
              }
            ?>],
          };

          var chart = new ApexCharts(document.querySelector("#Salle"), options);
          chart.render();
        </script>
      </div>
    </div>

    <!-- Réservations par type -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <div class="card-header-title">
              <i class="lnr-rocket icon-gradient bg-tempting-azure"></i> Réservation Par Type ( <?php echo date("Y"); ?>)
            </div>
          </div>
          <div class="card-body">
            <div id="Types"></div>
          </div>
        </div>

        <script type="text/javascript">
          var options = {
            series: [<?php
              foreach ($TypesRecords as $data) {
                echo $data->countTypes . ',';
              }
            ?>],
            chart: {
              type: 'pie',
            },
            labels: [<?php
              foreach ($TypesRecords as $data) {
                echo '"' . $data->type . '",';
              }
            ?>],
          };

          var chart = new ApexCharts(document.querySelector("#Types"), options);
          chart.render();
        </script>
      </div>
    </div>
  </div>
</div>
