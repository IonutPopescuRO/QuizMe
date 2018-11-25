<?php
	require_once 'include/classes/user.php';
	require_once 'include/classes/questions.php';
	require_once 'include/classes/events.php';
	
	$user = new USER();
	$questions = new QUESTIONS();
	$events = new EVENTS();
	
	if(!$user->is_logged_in())
		$user->redirect('login');
	
	if(isset($_GET['logout']))
	{
		if($user->is_logged_in()!="")
			$user->logout();	
		$user->redirect('login');
	}
	
	$user_rows = $user->getUserAllRow();
	$gravatar = md5(strtolower(trim($user_rows['userEmail'])));
	
	$code = isset($_GET['code']) ? $_GET['code'] : null;

	if($user_rows['current_event']==-1 && $code)
		$qr_code = $user->checkForCode($code);

	if($user_rows['current_event']==-1 && $code && isset($qr_code) && is_array($qr_code) && count($qr_code) && $qr_code['used']==0)
	{
		$user->setEvent($qr_code['id'], $qr_code['event'], $_SESSION['userSession']);
		$user->redirect('app/quiz');
	}
	
	$current_page = isset($_GET['p']) ? $_GET['p'] : null;
	
	$admin_pages = array("questions", "events", "categories", "qrcodes", "admins");
	if(in_array($current_page, $admin_pages) && $user_rows['admin']<1)
		$user->redirect('app/');
	
	switch ($current_page) {
		case 'questions':
			$page = 'questions';
			$title = 'Managing questions';
			include 'include/functions/pages/admin/questions.php';
			break;
		case 'categories':
			$page = 'categories';
			$title = 'Managing categories';
			include 'include/functions/pages/admin/categories.php';
			break;
		case 'events':
			$page = 'events';
			$title = 'Managing events';
			include 'include/functions/pages/admin/events.php';
			break;
		case 'qrcodes':
			$page = 'qrcodes';
			$title = 'QR Code Generator';
			include 'include/functions/pages/admin/qrcodes.php';
			break;
		case 'quiz':
			$page = 'quiz';
			$title = 'Quiz';
			include 'include/functions/pages/quiz.php';
			break;
		case 'admins':
			$page = 'admins';
			$title = 'Admins';
			break;
		default:
			$page = 'home';
			$title = 'Home';
			include 'include/functions/pages/home.php';
		}
?>