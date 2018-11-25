<?php
require_once 'dbconfig.php';
require_once 'include/config.php';

class QUESTIONS
{	
	private $conn;
	private $mail;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function getAllCategories()
	{
		$stmt = $this->conn->prepare("SELECT * FROM categories order by name ASC");
		$stmt->execute();
		$result=$stmt->fetchAll();
		
		return $result;
	}
	
	public function addCategory($name)
	{
		$stmt = $this->conn->prepare("INSERT INTO categories (name) VALUES (:name)");
		$stmt->execute(array(':name'=>$name));
	}
	
	public function addQuestion($question, $category, $answer_type, $time, $difficulty, $answer, $check)
	{
		$stmt = $this->conn->prepare("INSERT INTO questions (question, category, type, time, difficulty, answer0, answer1, answer2, answer3, check0, check1, check2, check3) 
		VALUES (:question, :category, :type, :time, :difficulty, :answer0, :answer1, :answer2, :answer3, :check0, :check1, :check2, :check3)");
		$stmt->execute(
			array(
				':question'=>$question,
				':category'=>$category, 
				':type'=>$answer_type, 
				':time'=>$time, 
				':difficulty'=>$difficulty, 
				':answer0'=>$answer[0], 
				':answer1'=>$answer[1], 
				':answer2'=>$answer[2], 
				':answer3'=>$answer[3], 
				':check0'=>$check[0], 
				':check1'=>$check[1], 
				':check2'=>$check[2], 
				':check3'=>$check[3]
			)
		);
	}
	
	public function removeCategory($id)
	{
		$stmt = $this->conn->prepare('DELETE FROM categories WHERE id = ?');
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		
		$stmt = $this->conn->prepare('DELETE FROM questions WHERE category = ?');
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	public function removeQuestion($id)
	{
		$stmt = $this->conn->prepare('DELETE FROM questions WHERE id = ?');
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	public function countAllQuestions()
	{
		$categories = $this->getAllCategories();
		$all_questions = array();
		//1-easy 2-normal 3-hard
		foreach($categories as $category)
		{
			$easy=$normal=$hard=0;
			$stmt = $this->conn->prepare("SELECT count(*) FROM questions WHERE category = ? AND difficulty = 1");
			$stmt->bindParam(1, $category['id'], PDO::PARAM_INT);
			$stmt->execute(); 
			$easy = $stmt->fetchColumn();
			
			$stmt = $this->conn->prepare("SELECT count(*) FROM questions WHERE category = ? AND difficulty = 2");
			$stmt->bindParam(1, $category['id'], PDO::PARAM_INT);
			$stmt->execute(); 
			$normal = $stmt->fetchColumn();
			
			$stmt = $this->conn->prepare("SELECT count(*) FROM questions WHERE category = ? AND difficulty = 3");
			$stmt->bindParam(1, $category['id'], PDO::PARAM_INT);
			$stmt->execute(); 
			$hard = $stmt->fetchColumn();
			
			if($easy>0)
				$all_questions[]=array(
					'id'=>$category['id'],
					'type'=>1,
					'count'=>$easy
				);
			if($normal>0)
				$all_questions[]=array(
					'id'=>$category['id'],
					'type'=>2,
					'count'=>$normal
				);
			if($hard>0)
				$all_questions[]=array(
					'id'=>$category['id'],
					'type'=>3,
					'count'=>$hard
				);
		}

		return $all_questions;
	}
	
	public function getRandomQuestions($category, $difficulty, $limit)
	{
		$stmt = $this->conn->prepare("SELECT id FROM questions WHERE category = :category AND difficulty=:difficulty ORDER BY RAND() LIMIT :limit");
		$stmt->bindParam(':category', $category, PDO::PARAM_INT);
		$stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
		$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetchAll();
		
		return $result;
	}
}