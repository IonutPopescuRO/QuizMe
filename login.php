<?php
session_start();
require_once 'include/classes/user.php';
require_once 'include/functions/pages/login.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login | <?php print $site_title; ?></title>
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
		<?php 
		if(isset($_GET['inactive']))
		{
			?>
            <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This account is not activated. Go to your inbox and activate it. 
			</div>
            <?php
		}
		?>
        <?php
        if(isset($_GET['error']))
		{
			?>
            <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Wrong Details!</strong> 
			</div>
            <?php
		}
		?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Email or phone number" name="username" pattern=".{5,64}" maxlength="64" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="*********" name="password" pattern=".{5,16}" maxlength="16" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                                    </div>
                                    <a href="forgot" class="text-small forgot-password text-black">Forgot Password</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block g-login" type="button" onclick="fbLogin()">
                    <i class="mdi mdi-facebook" style="color: #3b579d;"></i> Log in with Facebook</button>
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
	
	<script>
	window.fbAsyncInit = function() {
		// FB JavaScript SDK configuration and setup
		FB.init({
		  appId      : '374376776049353', // FB App ID
		  cookie     : true,  // enable cookies to allow the server to access the session
		  xfbml      : true,  // parse social plugins on this page
		  version    : 'v2.8' // use graph api version 2.8
		});
		
		// Check whether the user already logged in
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				//display user data
				getFbUserData();
			}
		});
	};

	// Load the JavaScript SDK asynchronously
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	// Facebook login with JavaScript SDK
	function fbLogin() {
		FB.login(function (response) {
			if (response.authResponse) {
				// Get and display the user profile data
				getFbUserData();
			} else {
				document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
			}
		}, {scope: 'email'});
	}

	// Fetch the user profile data from facebook
	function getFbUserData(){
		FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
		function (response) {
			document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
			document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
			document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
			document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
			
			// Save user data
			//saveUserData(response);
		});
	}

	// Save user data to the database
	/*function saveUserData(userData){
		$.post('userData.php', {oauth_provider:'facebook',userData: JSON.stringify(userData)}, function(data){ return true; });
	}*/

	// Logout from facebook
	function fbLogout() {
		FB.logout(function() {
			document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
			document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
			document.getElementById('userData').innerHTML = '';
			document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
		});
	}
	</script>
  </body>
</html>