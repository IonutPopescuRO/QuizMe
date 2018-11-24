<?php
	$user = new USER();

	if(empty($_GET['id']) && empty($_GET['code']))
		$user->redirect('index.php');

	if(isset($_GET['id']) && isset($_GET['type']) && isset($_GET['code']) && ($_GET['type']=='email' || $_GET['type']=='sms'))
	{
		$id = base64_decode($_GET['id']);
		$type = $_GET['type'];
		$code = $_GET['code'];
		
		$statusY = "Y";
		$statusN = "N";
		
		if($type=="sms")
		{
			$stmt = $user->runQuery("SELECT userID, smsStatus FROM tbl_users WHERE userID=:uID AND tokenSMS=:code LIMIT 1");
			$stmt->execute(array(":uID"=>$id,":code"=>$code));
		} else {
			$stmt = $user->runQuery("SELECT userID, userStatus FROM tbl_users WHERE userID=:uID AND tokenCode=:code LIMIT 1");
			$stmt->execute(array(":uID"=>$id,":code"=>$code));
		}
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0)
		{
			if($type=="sms")
				$status = $row['smsStatus'];
			else
				$status = $row['userStatus'];
			
			if($status==$statusN)
			{
				if($type=="sms")
					$stmt = $user->runQuery("UPDATE tbl_users SET smsStatus=:status WHERE userID=:uID");
				else
					$stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userID=:uID");
				$stmt->bindparam(":status",$statusY);
				$stmt->bindparam(":uID",$id);
				$stmt->execute();	
				
				$msg = "
					   <div class='alert alert-success'>
					   <button class='close' data-dismiss='alert'>&times;</button>
						  <strong>WoW!</strong>  Your Account is Now Activated : <a href='".$site_url."login'>Login here</a>
					   </div>
					   ";	
			}
			else
				$msg = "
					   <div class='alert alert-danger'>
					   <button class='close' data-dismiss='alert'>&times;</button>
						  <strong>Sorry!</strong>  Your Account is allready Activated : <a href='".$site_url."login'>Login here</a>
					   </div>
					   ";
		}
		else
			$msg = "
				   <div class='alert alert-danger'>
				   <button class='close' data-dismiss='alert'>&times;</button>
				   <strong>Sorry!</strong>  No Account Found : <a href='".$site_url."register'>Signup here</a>
				   </div>
				   ";
	}
?>