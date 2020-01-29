


<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Ajouter un client</h6>
									<form  id='form-id' action="<?php echo base_url() ?>Client/addNewClient" method="post">

										<div class="row">
													<label class="control-label">Type de client : </label>
													&nbsp;&nbsp;
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" name="type"  onclick="show1();" checked value="personne" class="form-check-input">
																Personne
															<i class="input-frame"></i></label>
														</div>
													&nbsp;&nbsp;
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" name="type" onclick="show2();" id="compShow" value="ste" class="form-check-input">
																Société
															<i class="input-frame"></i></label>
														</div>
												
										</div><!-- Row -->

										<div class="row" id="company" style='display:none' >
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Raison social</label>
													<input type="text" class="form-control" name="raisonSocial" placeholder="Nom de la société">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Matricule Fiscale</label>
													<input type="text" class="form-control" name="Matricule"  placeholder="Matricule Fiscale">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->	

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Nom</label>
													<input type="text" class="form-control" name="nom" placeholder="Nom de famille">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Prenom</label>
													<input type="text" class="form-control" name="prenom"  placeholder="Prenom">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Date de naissance</label>
													<input name="birthday" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="jj/mm/aaaa" im-insert="false" type="Date">
												</div>
											</div><!-- Col -->
											<div class="col-sm-12">
												<label class="control-label">Sexe : </label>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" name="sexe" checked value="Homme" class="form-check-input">
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
													<input type="text" class="form-control" name="CIN"  placeholder="CIN">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Délivrée le </label>
													<input  name="dateCin" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false" type="Date">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->


										<div class="row">
											<div class="col-sm-1">
												<div class="form-group">
													<label class="control-label">N°</label>
													<input type="text" class="form-control" name="N" placeholder="N°">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">Rue</label>
													<input type="text" class="form-control" name="rue" placeholder="Rue">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">Ville</label>
													<input type="text" class="form-control" name="ville" placeholder="Ville">
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="form-group">
													<label class="control-label">code postale</label>
													<input type="text" class="form-control" name="codePostal" placeholder="Code postale">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="control-label">Email</label>
													<input name="email" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" im-insert="true">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Mobile</label>
													<input name="mobile" class="form-control mb-4 mb-md-0" data-inputmask-alias="99 999 999" im-insert="true">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Mobile 2</label>
													<input name="mobile2" class="form-control mb-4 mb-md-0" data-inputmask-alias="99 999 999" im-insert="true">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<input type="submit" class="btn btn-primary submit" value="Envoyer" >
									</form>
									
							</div>
						</div>
					</div>
</div>


<script type="text/javascript">
	function show1(){
		  document.getElementById('company').style.display ='none';
		}
	function show2(){
		  document.getElementById('company').style.display = 'block';
		}
</script>