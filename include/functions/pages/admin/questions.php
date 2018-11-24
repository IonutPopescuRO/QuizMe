<?php
	if(isset($_POST['search']) && isset($_POST['search_category']) && isset($_POST['search_date']))
	{
		if($_POST['search']=='')
			$_POST['search']='*';
		header("Location: ".$site_url."app/questions/1/".$_POST['search']."/".$_POST['search_category']."/".$_POST['search_date']."/".$_POST['search_difficulty']);
		die();
	}
	
	if(isset($_GET['search']))
	{
		$search[0] = strip_tags($_GET['search']);
		$search[1] = strip_tags($_GET['category']);
		$search[2] = strip_tags($_GET['date']);
		$search[3] = strip_tags($_GET['level']);
	}
	
	require_once("include/classes/all_questions.php");
	$paginate = new paginate();
	
	$info = 0;
	if(isset($_POST['question']))
	{
		$time = $_POST['time_minutes']*60+$_POST['time_seconds'];
		$answer[0]=$answer[1]=$answer[2]=$answer[3]='';
		$check[0]=$check[1]=$check[2]=$check[3]=0;
		
		if($_POST['answer_type']==0)
		{
			$check[$_POST['answer_one_check']]=1;
			for($i=0;$i<4;$i++)
				$answer[$i]=$_POST['answer_one_'.$i];
		} else if($_POST['answer_type']==1)
		{
			for($i=0;$i<4;$i++)
			{
				if(isset($_POST['answer_many_check_'.$i]))
					$check[$i]=1;
				$answer[$i]=$_POST['answer_many_'.$i];
			}
		} else $answer[0]=$_POST['free_answer'];
		
		$questions->addQuestion($_POST['question'], $_POST['category'], $_POST['answer_type'], $time, $_POST['difficulty'], $answer, $check);
		$info = 1;
	}
	$categories = $questions->getAllCategories();
	
	$difficulty = array(1=>'Easy', 2=>'Normal', 3=>'Hard');
	
	$cat = array();
	foreach($categories as $category)
		$cat[$category['id']]=$category['name'];
?>