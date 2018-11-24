<?php
	require_once 'include/classes/user.php';
	require_once 'include/classes/questions.php';
	
	$user = new USER();
	$questions = new QUESTIONS();
	
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
	
	$current_page = isset($_GET['p']) ? $_GET['p'] : null;
	
	$admin_pages = array("questions", "events", "categories");
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
		default:
			$page = 'Dashboard';
			$title = 'Dashboard';
			include 'include/functions/dashboard.php';
		}
?>