<?php
	if(isset($_POST['search']) && isset($_POST['search_category']) && isset($_POST['search_date']))
	{
		if($_POST['search']=='')
			$_POST['search']='*';
		header("Location: ".$site_url."app/questions/1/".$_POST['search']."/".$_POST['search_status']."/".$_POST['search_date']);
		die();
	}
	
	if(isset($_GET['search']))
	{
		$search[0] = strip_tags($_GET['search']);
		$search[1] = strip_tags($_GET['status']);
		$search[2] = strip_tags($_GET['date']);
	}
	
	if(isset($_GET['delete']))
	{
		$events->removeEvent($_GET['delete']);
		$user->redirect('app/questions');
	}
	
	require_once("include/classes/all_events.php");
	$paginate = new paginate();
	
	$info = 0;
	if(isset($_POST['name']))
	{
		$quest = array();
		if($_POST['questions_rules']==0)//auto
		{
			foreach($_POST as $key=>$post)
				if(substr($key, 0, 4 ) === "auto")
				{
					$q = explode("_", $key);
					$category = $q[1];
					$difficulty = $q[2];
					
					$q = $questions->getRandomQuestions($category, $difficulty, $post);
					foreach($q as $x)
						$quest[]=$x['id'];
				}
		} else {

		}

		$events->addEvent($_POST['name'], $_POST['expire'], $_POST['quiz_type'], $quest);

		$info = 1;
	}
	if(isset($_POST['upload']))
	{
		$rows = array_map(function($v){return str_getcsv($v, ";");}, file($_FILES['csv_file']['tmp_name']));
		$header = array_shift($rows);
		$csv = [];
		foreach($rows as $row)
			$csv[] = array_combine($header, $row);
		print_r($rows);
		die();
	}
	
	$categories = $questions->getAllCategories();
	
	$difficulty = array(1=>'Easy', 2=>'Normal', 3=>'Hard');
	$status = array(1=>'In progress', 2=>'In coming', 3=>'Expired');
	
	$cat = array();
	foreach($categories as $category)
		$cat[$category['id']]=$category['name'];
?>