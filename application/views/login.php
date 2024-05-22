<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login - Queen Online</title>
        <meta name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <link href="<?php echo base_url() ?>assets/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3WXM3GLE2B"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-3WXM3GLE2B');
        </script>
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100 mx-auto">
                               <form class="" method="post" action="<?php echo base_url() ?>loginMe" id="form-id" >
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                <div><img width="200px" src="<?php echo base_url() ?>assets/images/logo-inverse.png"> </div>
                                                <span>Merci de vous connecter avec votre compte.</span>
                                            </h4>
                                        </div>
                                        
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <input name="email" id="exampleEmail" placeholder="Email..." type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <input name="password" id="examplePassword" placeholder="Mot de passe..." type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="position-relative form-check">
                                             
                                            </div>
                                        
                                        <div class="divider"></div>
                                    <!--    <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6> -->
                                    </div>
                                    <div class="modal-footer clearfix">
                                        <div class="float-left">
                                           
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary btn-lg" onclick="document.getElementById('form-id').submit();" >Se connecter</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Copyright © Koussay Bahaedinne Maiza 2022</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
    </body>
</html>