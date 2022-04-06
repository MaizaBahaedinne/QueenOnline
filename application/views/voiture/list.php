<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Reservation
          <div class="page-title-subheading">Les reservations</div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
          <a href="<?php echo base_url() ?>Reservation/addNew" class="btn  btn-info">
          Ajouter
          </a>
          
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      
        <table id="example" style="width: 100%;" id="example" class="table  table-hover table-striped table-bordered table-responsive" cellspacing="0"  >
          <thead>
            <tr>
              <th>Date</th>
              <th>voiture</th>
              <th width="15%">Depart</th>
              <th width="15%">arret</th>
              <th width="15%">arrivé</th>
              <th width="15%">mobile 1</th>
              <th width="15%">mobile 2</th>
              <th width="5%">Statut</th>
              <th width="5%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if(!empty($userRecords))
              {
                  foreach($userRecords as $record)
                  {
              ?>
            <tr>
              
              <td>
                <b><?php echo date_format(date_create($record->date)  , 'd/m/20y');  ?></b><br> <?php echo $record->depart ;  ?> 
              </td>
              <td>
                <b><?php echo $record->voitureName ?>
              </td>
              <td>            
                <?php echo $record->l1  ?>
              </td>
              <td>            
                <b><?php echo $record->l2  ?></b>
              </td>
              <td>
               <?php echo $record->l3  ?>

              </td>
              <td  onclick='tdclick(this.id)' id="<?php echo $record->reservationId ?>" >
               <a href="tel:<?php echo $record->mobile1   ?>"><?php echo $record->mobile2  ?></a>   
              </td>
              <td>
               <a href="tel:<?php echo $record->mobile2   ?>"><?php echo $record->mobile2   ?></a> 

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
                <div class="btn-group" role="group" > 
                <a class="btn" href="<?php echo base_url() ?>Voiture/view/<?php echo $record->reservationVId ?>" >
                  <i class="fa fa-eye"></i>
                </a>
                <a class="btn" href="<?php echo base_url() ?>Reservation/edit/<?php echo $record->reservationVId ?>" >
                  <i class="fas fa-pencil-alt"></i>
                </a>
              </div>
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
              <th>Prix</th>
              <th>Options</th>
              <th>Contact</th>
              <th >Statut</th>
              <th >Action</th>
            </tr>
          </tfoot>
        </table>
      
    </div>
  </div>
</div>
<!-- Modal -->
