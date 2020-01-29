


<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Modifier un client <small></small></h6>
									<form  id='form-id' action="<?php echo base_url() ?>Client/editClient/<?php echo $clientInfo->userId ; ?> " method="post">

										<div class="row">
													<label class="control-label">Type de client : </label>
													&nbsp;&nbsp;
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" name="type"   value="personne" class="form-check-input">
																Personne
															<i class="input-frame"></i></label>
														</div>
													&nbsp;&nbsp;
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" name="type"  id="compShow" value="ste" class="form-check-input" <?php if ($clientInfo->type=='ste' ){ ?>checked <?php } ?> >
																Société
															<i class="input-frame"></i></label>
														</div>
												
										</div><!-- Row -->
										 <?php if ($clientInfo->type=='ste' ){ ?>
										<div class="row" id="company"  >
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Raison social</label>
													<input type="text" class="form-control"  value="<?php echo $clientInfo->raisonSocial ; ?>" name="raisonSocial" placeholder="Nom de la société">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Matricule Fiscale</label>
													<input type="text" class="form-control" name="Matricule"  value="<?php echo $clientInfo->matricule ; ?>"  placeholder="Matricule Fiscale" >
												</div>
											</div><!-- Col -->
										</div><!-- Row -->	
										 <?php } ?>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Nom</label>
													<input type="text" class="form-control" name="nom" value="<?php echo $clientInfo->nom ; ?>" placeholder="Nom de famille" required>
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Prenom</label>
													<input type="text" class="form-control" name="prenom" value="<?php echo $clientInfo->prenom ; ?>"  placeholder="Prenom" required>
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Date de naissance</label>
													<input name="birthday" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="jj/mm/aaaa" value="<?php echo $clientInfo->birthday ; ?>" im-insert="false" type="Date" required>
												</div>
											</div><!-- Col -->
											<div class="col-sm-12">
												<label class="control-label">Sexe : </label>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" name="sexe" value="Homme" class="form-check-input">
																Homme
															<i class="input-frame"></i></label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" name="sexe" value="Femme" class="form-check-input">
																Femme
															<i class="input-frame"></i></label>
														</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Carte d'identié national</label>
													<input type="text" class="form-control" value="<?php echo $clientInfo->cin ; ?>" name="CIN"  placeholder="CIN" required>
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Délivrée le </label>
													<input value="<?php echo $clientInfo->dateCin ; ?>"  name="dateCin" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false" type="Date" >
												</div>
											</div><!-- Col -->
										</div><!-- Row -->


										<div class="row">
											<div class="col-sm-1">
												<div class="form-group">
													<label class="control-label">N°</label>
													<input type="text" class="form-control" value="<?php echo $clientInfo->n ; ?>" name="n" placeholder="N°" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">Rue</label>
													<input type="text" class="form-control" name="rue" value="<?php echo $clientInfo->rue ; ?>" placeholder="Rue">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">Ville</label> 
													<input type="text" class="form-control" name="ville" value="<?php echo $clientInfo->ville ; ?>" placeholder="Ville" required>
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="form-group">
													<label class="control-label">code postale</label>
													<input type="text" class="form-control" name="codePostal" value="<?php echo $clientInfo->codePostal ; ?>" placeholder="Code postale">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="control-label">Email</label>
													<input name="email" value="<?php echo $clientInfo->email ; ?>" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" im-insert="true">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Mobile</label>
													<input name="mobile" class="form-control mb-4 mb-md-0" value="<?php echo $clientInfo->mobile ; ?>" data-inputmask-alias="99999999" im-insert="true" required>
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Mobile 2</label>
													<input name="mobile2" value="<?php echo $clientInfo->mobile2 ; ?>" class="form-control mb-4 mb-md-0" data-inputmask-alias="99999999" im-insert="true" required>
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<input type="submit" class="btn btn-primary submit" value="Envoyer" >
									</form>
									
							</div>
						</div>
					</div>
</div>


