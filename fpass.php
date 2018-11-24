<?php
session_start();
require_once 'include/classes/user.php';
require_once 'include/functions/pages/fpass.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password | <?php print $site_title; ?></title>
	<base href="<?php print $site_url; ?>">

	<link rel="stylesheet" href="vendor/iconfonts/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="vendor/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="vendor/css/vendor.bundle.addons.css">
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="shortcut icon" href="images/favicon.ico?v=" />
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
						<?php
							if(isset($msg))
								echo $msg;
							else
							{
						?>
							<div class='alert alert-info'>
								Please enter your email address or phone number. You will receive a link to create a new password!
							</div>  
						<?php
							}
						?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="label">Email or phone number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Email or phone number" name="username" pattern=".{5,64}" maxlength="64" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
											</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block" type="submit">Generate new Password</button>
                                </div>
                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">Not a member ?</span>
                                    <a href="register" class="text-black text-small">Create new account</a>
                                </div>
                            </form>
                        </div>
						<br><br><br>
                        <p class="footer-text text-center">Copyright &copy; 2018 <a href="https://ionut.work/" target="_blank">ionut.work</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
	
    <script src="vendor/js/vendor.bundle.base.js"></script>
    <script src="vendor/js/vendor.bundle.addons.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
  </body>
</html>