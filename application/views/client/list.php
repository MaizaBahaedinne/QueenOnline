<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion des clients</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Gestion des clients</a></li>
              <li class="breadcrumb-item active">Liste</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des clients</h3>
                <span class="float-sm-right"> 
                <button type="button" class="btn btn-default " data-toggle="modal" data-target="#addUser">
                 <i class="fas fa-user-plus"></i> Ajouter
                </button>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nom</th>
            
                        <th>Mobile</th>
                        <th>cin</th>
                        <th>adresse</th>
                        <th class="text-center">Actions</th>
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
                        <td><?php echo $record->nom ?> <?php echo $record->prenom ?> </td>
                        <td><?php echo $record->mobile ?> <br>
                           <?php echo $record->mobile2 ?></td>
                        <td><?php echo $record->cin ?></td>
                        <td><?php echo $record->ville ?> </td>
                       
                        
                        <td class="text-center">

                          <a class="btn btn-info btn-sm" href="<?php echo base_url() ?>editOld/<?php echo $record->userId ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Modifier
                          </a>
                          <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>User/sms/<?php echo $record->userId ?>" ><i class="fas fa-pencil-alt"> SMS </i></a>
                          
                      </td>
                        
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                  </table>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <div class="modal" tabindex="-1" role="dialog" id="addUser">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form action="<?php echo base_url() ?>addNewUser" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Nom</label>
                                        <input type="text" class="form-control required"  id="fname" name="fname" maxlength="128" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control required email" id="email" value="" name="email" maxlength="128" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" class="form-control required" id="password" name="password" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirmer Mot de passe</label>
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control required digits" id="mobile"  name="mobile" maxlength="8" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option value="3">Agent</option>
                                            <option value="2">Administrateur</option>
                                        </select>
                                    </div>
                                </div>    
                            </div>
                          
                         
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                         <input type="submit" class="btn btn-primary swalDefaultSuccess" value="Envoyer"> 
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>


      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>





