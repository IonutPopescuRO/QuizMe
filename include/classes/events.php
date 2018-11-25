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
	
	public function addEvent($name, $expire, $score, $questions)
	{
		print $expire;
		die();
		$stmt = $this->conn->prepare("INSERT INTO events (name, expire, score) VALUES (:name, :expire, :score)");
		$stmt->execute(array(':name'=>$name,':expire'=>$expire,':score'=>$score));
		$lastId = $this->conn->lastInsertId();
		
		foreach($questions as $q)
		{
			$stmt = $this->conn->prepare("INSERT INTO events_questions (event, question) VALUES (:event, :question)");
			$stmt->execute(array(':event'=>$lastId,':question'=>$q));
		}
	}
	
	public function removeEvent($id)
	{
		$stmt = $this->conn->prepare('DELETE FROM events WHERE id = ?');
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	public function getAllEvents()
	{
		$stmt = $this->conn->prepare("SELECT * FROM events WHERE expire < NOW() order by date DESC");
		$stmt->execute();
		$result=$stmt->fetchAll();
		
		return $result;
	}
	
	public function addQrCode($event, $code)
	{
		$stmt = $this->conn->prepare("INSERT INTO qrcodes (event, code) VALUES (:event, :code)");
		$stmt->execute(array(':event'=>$event, ':code'=>$code));
	}
	
	public function getCurrentEvent($id)
	{
		$stmt = $this->conn->prepare("SELECT * FROM events_users WHERE event=? AND user = ?");
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->bindParam(2, $_SESSION['userSession'], PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	public function updateScore($event, $score, $status=0)
	{
		$stmt = $this->conn->prepare("UPDATE events_users SET status=status+:status, score=:score WHERE event=:event AND user = :user");
		$stmt->execute(array(':score'=>$score, ':event'=>$event, ':status'=>$status, ':user'=>$_SESSION['userSession']));
	}
}