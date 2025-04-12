
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-car icon-gradient bg-tempting-azure"></i>
        </div>
        <div>
          Prestataire
          <div class="page-title-subheading">Nouveau prestataire</div>
        </div>
      </div>
      <div class="page-title-actions">
       
        <div class="d-inline-block">
         
          
        </div>
      </div>
    </div>
  </div>
    <form action="<?php echo base_url(); ?>Prestation/addNewPrestataire" method="post">                
             <input type="text" name="nom">   
             <input type="text" name="prix">
             <textarea row="20" name="description"></textarea>
             <select  name="type">
                <option value="Chanteur" >Chanteur</option>
                <option value="Notaire" >Notaire</option>
                <option value="prestataire" >prestataire</option>
             </select>
    </form>
</div>