<?php
	$user = new USER();
	
	if($user->is_logged_in()!="")
		$user->redirect('app');

	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		
		if($user->login($username,$password))
			$user->redirect('app');
	}
?>