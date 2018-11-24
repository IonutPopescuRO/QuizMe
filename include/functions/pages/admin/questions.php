<?php
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
?>