<?php
require_once 'dbconfig.php';
require_once 'include/config.php';

class EVENTS
{	
	private $conn;
	
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
	
	public function addCategory($name)
	{
		$stmt = $this->conn->prepare("INSERT INTO categories (name) VALUES (:name)");
		$stmt->execute(array(':name'=>$name));
	}
	
	public function getOwnEvents()
	{
		$stmt = $this->conn->prepare("SELECT * FROM events_users WHERE user = :id");
		$stmt->bindParam(':id', $_SESSION['userSession'], PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetchAll();
		
		return $result;
	}
	
	public function getUserRank($event)
	{

		$ranking = array();

		$sql =  "SELECT r.position FROM events_users u 
					LEFT JOIN (SELECT r.*, @rownum := @rownum + 1 AS position
					FROM events_users r CROSS JOIN
					(SELECT @rownum := 0) r WHERE r.event = :id";
		$sql.= " ORDER BY r.score DESC, r.completed DESC) r
				ON r.user = u.user
				WHERE u.user = :user";
					
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $event, PDO::PARAM_INT);
		$stmt->bindParam(':user', $_SESSION['userSession'], PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		return $result['position'];
	}	
	
	public function getEventRow($id, $row)
	{
		$stmt = $this->conn->prepare("SELECT * FROM events WHERE id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		
		return $result[$row];
	}
}