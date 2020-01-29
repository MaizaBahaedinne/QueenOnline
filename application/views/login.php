<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.nobleui.com/html/template/demo_1/pages/auth/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2019 11:43:34 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>NobleUI Responsive Bootstrap 4 Dashboard Template</title>
	<!-- core:css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/core/core.css">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/feather-font/css/iconfont.css">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo_1/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Queen Park<span>Online</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Nous saluons le retour! Connectez-vous à votre compte.</h5>
					        <?php
						$this->load->helper('form');
						$error = $this->session->flashdata('error');
						if($error)
						{
							?>
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<?php echo $error; ?>                    
							</div>
						<?php }
						$success = $this->session->flashdata('success');
						if($success)
						{
							?>
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<?php echo $success; ?>                    
							</div>
						<?php } ?>
                    <form class="forms-sample" action="<?php echo base_url(); ?>loginMe" method="post" >
                      <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" required />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required />
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          Remember me
                        </label>
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">S'identifier</button>

                      </div>
                     
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="<?php echo base_url() ?>assets/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="<?php echo base_url() ?>assets/vendors/feather-icons/feather.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/template.js"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
	<!-- end custom js for this page -->
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo_1/pages/auth/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2019 11:43:34 GMT -->
</html>