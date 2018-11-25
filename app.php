<?php
session_start();
require_once 'include/functions/pages/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php print $title. ' | '.$site_title; ?></title>
  <base href="<?php print $site_url; ?>">

  <link rel="stylesheet" href="vendor/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendor/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendor/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="vendor/iconfonts/font-awesome/css/font-awesome.min.css" />
  
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

  <link rel="shortcut icon" href="images/favicon.ico?v=" />
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="app/">
          <img src="images/logo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="app/">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="app/" class="nav-link">Home
            </a>
          </li>
          <li class="nav-item">
            <a href="app/quiz" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Quiz</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php print $user_rows['userName']; ?>!</span>
              <img class="img-xs rounded-circle" src="https://www.gravatar.com/avatar/<?php print $gravatar; ?>" alt="<?php print $user_rows['userName']; ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a href="app/account" class="dropdown-item mt-2">
                Account Settings
              </a>
			  <?php if($user_rows['admin']) { ?>
              <a href="app/admins" class="dropdown-item">
                Manage Administrators
              </a>
			  <?php } ?>
              <a href="app?logout" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
					<a target="_blank" href="https://en.gravatar.com/site/login"><img src="https://www.gravatar.com/avatar/<?php print $gravatar; ?>" alt="<?php print $user_rows['userName']; ?>"></a>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php print $user_rows['userName']; ?></p>
                  <div>
                    <small class="designation text-muted"><?php if($user_rows['admin']) print 'Administrator'; else print 'User'; ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
			  <?php if($user_rows['admin']) { ?>
              <a href="app/events" class="btn btn-success btn-block">New Event
                <i class="mdi mdi-plus"></i>
              </a>
			  <?php } ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="app/">
              <i class="menu-icon mdi mdi-home"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <?php if($user_rows['admin']) { ?>
          <li class="nav-item">
            <a class="nav-link" href="app/dashboard">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon fa fa-cogs"></i>
              <span class="menu-title">Administration</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="app/questions">
					<i class="menu-icon fa fa-question"></i>
					<span class="menu-title">Managing questions</span>
				  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="app/categories">
					<i class="menu-icon fa fa-folder-open-o"></i>
					<span class="menu-title">Managing question categories</span>
				  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="app/events">
					<i class="menu-icon fa fa-retweet"></i>
					<span class="menu-title">Managing events</span>
				  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="app/qrcodes">
					<i class="menu-icon fa fa-qrcode"></i>
					<span class="menu-title">QR Code Generator</span>
				  </a>
                </li>
              </ul>
            </div>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
			<?php
				switch ($current_page) {
					case 'questions':
						include 'pages/admin/questions.php';
						break;
					case 'categories':
						include 'pages/admin/categories.php';
						break;
					case 'events':
						include 'pages/admin/events.php';
						break;
					case 'qrcodes':
						include 'pages/admin/qrcodes.php';
						break;
					case 'quiz':
						include 'pages/quiz.php';
						break;
					case 'admins':
						include 'pages/admin/admins.php';
						break;
					case 'dashboard':
						include 'pages/admin/dashboard.php';
						break;
					case 'account':
						include 'pages/account.php';
						break;
					default:
						include 'pages/home.php';
				}
			?>
        </div>
		
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy; 2018 <a href="https://ionut.work/" target="_blank">ionut.work</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="vendor/js/vendor.bundle.base.js"></script>
  <script src="vendor/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/dashboard.js"></script>
  <?php if($current_page=='questions') { ?>
	<script>
		(function($) {
			'use strict';
			$('.dropify').dropify();
		})(jQuery);
		
		function answerType(that) {
			document.getElementById("one_answer").style.display = "none";
			document.getElementById("many_answer").style.display = "none";
			document.getElementById("free_answer").style.display = "none";
			document.getElementById("radio_check").required = false;
			
			if (that.value == 0)
			{
				document.getElementById("one_answer").style.display = "block";
				document.getElementById("radio_check").required = true;
			}
			else if (that.value == 1)
				document.getElementById("many_answer").style.display = "block";
			else
				document.getElementById("free_answer").style.display = "block";
		}
	</script>
  <?php } else if($current_page=='events') { ?>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
		$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
		
		function questions(that) {
			document.getElementById("auto").style.display = "none";
			document.getElementById("manual").style.display = "none";
			
			if (that.value == 0)
				document.getElementById("auto").style.display = "block";
			else
				document.getElementById("manual").style.display = "block";
		}
	</script>
  <?php } else if($current_page=='quiz' && $question_info['time']) { ?>
	<script>
		var end = new Date('<?php print date ("m/d/Y H:i:s", strtotime($ev['expire_time'])); ?>');

		var _second = 1000;
		var _minute = _second * 60;
		var _hour = _minute * 60;
		var _day = _hour * 24;
		var timer;

		function showRemaining() {
			var now = new Date();
			var distance = end - now;

			if (distance < 0) {

				clearInterval(timer);
				document.getElementById('countdown').innerHTML = 'EXPIRED!';
				document.getElementById('answer').submit();
				return;
			}
			var days = Math.floor(distance / _day);
			var hours = Math.floor((distance % _day) / _hour);
			var minutes = Math.floor((distance % _hour) / _minute);
			var seconds = Math.floor((distance % _minute) / _second);

			document.getElementById('countdown').innerHTML = minutes + ' mins ';
			document.getElementById('countdown').innerHTML += seconds + ' secs';
			
			if(minutes==0 && seconds==0)
				document.getElementById('answer').submit();
		}

		timer = setInterval(showRemaining, 1000);
	</script>
  <?php } ?>
</body>

</html>