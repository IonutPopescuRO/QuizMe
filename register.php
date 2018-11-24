<?php
session_start();
require_once 'include/classes/user.php';
require_once 'include/functions/pages/register.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register | <?php print $site_title; ?></title>
	<base href="<?php print $site_url; ?>">

	<link rel="stylesheet" href="vendor/iconfonts/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="vendor/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="vendor/css/vendor.bundle.addons.css">
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="shortcut icon" href="images/favicon.ico?v=" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <form action="" method="post">
							<?php
								foreach($errors as $error)
											print '<div class="alert alert-danger alert-dismissible" role="alert">
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											  </button>
											  '.$error.'
											</div>';
								if(isset($msg))
									echo $msg;
							?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
											</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" pattern=".{7,64}" maxlength="64" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
												<i class="mdi mdi-check-circle-outline" id="checkemail"></i>
											</span>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">+40</span>
										</div>
										<input type="number" class="form-control" name="phone" value="7" maxlength="9">
										<div class="input-group-append">
											<span class="input-group-text">Not required</span>
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" pattern=".{5,16}" maxlength="16" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
											</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="rpassword" pattern=".{5,16}" maxlength="16" id="rpassword" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
												<i class="mdi mdi-check-circle-outline" id="checkpassword"></i>
											</span>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group d-flex justify-content-center">
								  <div class="form-check form-check-flat mt-0">
									<label class="form-check-label">
									  <input type="checkbox" class="form-check-input" checked=""> I agree to the terms
									<i class="input-helper"></i></label>
								  </div>
								</div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block" type="submit">Register</button>
                                </div>
								<div class="text-block text-center my-3">
									<span class="text-small font-weight-semibold">Already have and account ?</span>
									<a href="login.html" class="text-black text-small">Login</a>
								</div>
                            </form>
                        </div>
						<br><br><br>
                        <p class="footer-text text-center">Copyright &copy; 2018 <a href="https://ionut.work/" target="_blank">ionut.work</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/js/vendor.bundle.base.js"></script>
    <script src="vendor/js/vendor.bundle.addons.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>