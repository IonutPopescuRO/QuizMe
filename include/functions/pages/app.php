<?php
	$user = new USER();
	
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
	
	$admin_pages = array("questions", "events");
	if(in_array($current_page, $admin_pages) && $user_rows['admin']<1)
		$user->redirect('app');
	
	switch ($current_page) {
		case 'questions':
			$page = 'questions';
			$title = 'Managing questions';
			include 'include/functions/pages/admin/questions.php';
			break;
		case 'redeem':
			$page = 'redeem';
			$title = $lang['redeem-codes'];
			break;
		default:
			$page = 'news';
			$title = $lang['news'];
			include 'include/functions/news.php';
		}
?>