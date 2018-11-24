<?php
	if(isset($_POST['name']))
	{
		$questions->addCategory($_POST['name']);
		$user->redirect('app/categories');
	}
	if(isset($_GET['delete']))
	{
		$questions->removeCategory($_GET['delete']);
		$user->redirect('app/categories');
	}
	
	$categories = $questions->getAllCategories();
?>