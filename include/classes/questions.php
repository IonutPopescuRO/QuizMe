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
	}
}