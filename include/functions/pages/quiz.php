<?php
	$current_event = $user_rows['current_event'];
	$my_events = $events->getOwnEvents();
	
	if($current_event==-1)
	{
		$user->redirect('app/');
		die();
	}
	
	$ev = $events->getCurrentEvent($current_event);
	
	$quest = explode(",", $ev['questions']);

	if($ev['status']==0)
	{
		$events->updateScore($current_event, 0, 1, $questions->getQuestion($quest[$ev['status']])['time']);
		$user->redirect('app/quiz/');
	}
	else if($ev['status']+1>count($quest))
	{
		$events->updateScore($current_event, $ev['score']);
		$user->removeEvent();
		$user->redirect('app/');
	}
	
	if(isset($_GET['next']))
	{
		$events->updateScore($current_event, $ev['score'], 1);
		if($question_info['time'])
			$events->updateScore($current_event, $ev['score'], 0, $questions->getQuestion($quest[$ev['status']])['time']);
		$user->redirect('app/quiz/');
	}
	
	$current_question = $quest[$ev['status']-1];
	$question_info = $questions->getQuestion($current_question);
	
	if(isset($_POST['answer']))
	{
		if($question_info['type']==0)
		{
			$answer = $_POST['answer_one_check'];
			$correct = 0;
			if($question_info['check'.$answer]==1)
			{
				$correct = 1;
				$events->updateScore($current_event, $ev['score']+3);
			} else $events->updateScore($current_event, $ev['score']-2);
			$questions->addAnswer($current_event, $question_info['id'], $correct);
		} else if($question_info['type']==2) {
			$correct = 1;
			if(strtolower(preg_replace( "/\s+/", " ", $_POST['free_answer'])) == strtolower($question_info['answer0']))
			{
				$correct = 1;
				$events->updateScore($current_event, $ev['score']+4);
			} else $events->updateScore($current_event, $ev['score']-1);
			$questions->addAnswer($current_event, $question_info['id'], $correct);
		} else {
			$score=0;
			$correct=1;
			for($i=0;$i<4;$i++)
				if(isset($_POST['answer_many_check_'.$i]) && $question_info['check'.$i])
					$score+=2;
				else if(!isset($_POST['answer_many_check_'.$i]) && $question_info['check'.$i])
				{
					$correct = 0;
					$score-=1;
				}
			
			$events->updateScore($current_event, $ev['score']+$score);
			$questions->addAnswer($current_event, $question_info['id'], $correct);
		}
		$user->redirect('app/quiz');
	}
	
	$check_answer=$questions->checkAnswers($current_event, $question_info['id']);
?>