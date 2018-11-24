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
	
	public function removeCategory($id)
	{
		$stmt = $this->conn->prepare('DELETE FROM categories WHERE id = ?');
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	}
}