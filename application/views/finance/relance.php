

<form  action="<?php echo base_url() ?>Finance/addRelance " method="post" > 


<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Relance
          <div class="page-title-subheading">Les relanceS</div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
          <button  class="btn  btn-info"> <i class="metismenu-icon pe-7s-mail-open"></i>
          Relance 
          </button>
          
        </div>
      </div>
    </div>
  </div>
  <div class="main-card mb-3 card">
    <div class="card-body" style="width: 100%;">
      

      <table id="example" style="width: 100%;" id="example" class="table  table-hover table-striped table-bordered " cellspacing="0" >
          <thead>
            <tr>
              
              <th width="5%" ></th>
              <th width="10%" >Date de reservation</th>
              <th width="10%" >Espace</th>
              <th width="10%" >Date de paiement </th>
              <th width="30%" >Client</th>
              <th   width="5%" >Relance</th>
              <th   width="10%" >Dernier relance</th>
              <th   width="5%" >action</th>
              
           
        
            </tr>
          </thead>
          <tbody>
          
            <?php
              if(!empty($financeRecords))
              {
                  foreach($financeRecords as $record)
                  {
              ?>
              <tr>
                <td><input type="checkbox" name="check[]" value="<?php echo $record->reservationId ?>"  ></td>
                <td><?php echo $record->dateDebut ?></td>
                <td><?php echo $record->salle ?></td>
                <td><?php echo $record->delai ?></td>
                <th><?php echo $record->clientName ?></th>
                <th><?php echo $record->relance ?> </th>
                <th><?php  
                          if  ($record->last->createdDTM  != '' ){
                             $now = time(); // or your date as well
                            $your_date = strtotime($record->last->createdDTM );
                            $datediff = $now - $your_date;

                            echo "il y a ".round($datediff / (60 * 60 * 24))." jours"; } ?>
                                 </th>
                <th>
                  <div class="btn-group" role="group" > 
                      <a class="btn" href="<?php echo base_url() ?>Reservation/view/<?php echo $record->reservationId ?>" >
                        <i class="fa fa-eye"></i>
                      </a>
                  </div> 
                </th>
               
             
               
              </tr>
           
             
            <?php
              } 
              }
              ?>
          </tbody>
        
          <tfoot>
            <tr>
            
              <th width="5%" ></th>
              <th width="10%" >Date de reservation</th>
              <th width="10%" >Espace</th>
              <th width="10%" >Date de paiement </th>
              <th width="30%" >Client</th>
              <th   width="5%" >Relance</th>
              <th   width="10%" >Dernier relance</th>
              <th   width="5%" >action</th>
              
            

            </tr>
          </tfoot>
        </table>
       
      </div>
    </div>
  </div>
<!-- Modal -->

  </form>
