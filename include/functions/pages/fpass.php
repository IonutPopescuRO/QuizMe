<?php
$user = new USER();

if($user->is_logged_in()!="")
	$user->redirect('app');

if(isset($_POST['username']))
{
	$email = $_POST['username'];
	
	$phone = substr($email, -9);
	$type = 0;
	
	if(ctype_digit($phone) && strlen($phone)==9)
	{
		$stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userPhone=:email LIMIT 1");
		$stmt->execute(array(":email"=>$phone));
		$type = 1;
	}
	else {
		$stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
		$stmt->execute(array(":email"=>$email));
		$type = 2;
	}
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		if($type==1)
		{
			$stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userPhone=:email");
			$stmt->execute(array(":token"=>$code,"email"=>$phone));
			
			$message= "Click Following Link To Reset Your Password: ".$site_url."resetpass?id=$id&code=$code";
			$user->sendMsgWithSmsGatewayApi($message, '0'.$phone, 105832);
		
			$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						We've sent an sms to 0$phone.
						Please click on the password reset link in the sms to generate new password. 
					</div>";
		} else {
			$stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
			$stmt->execute(array(":token"=>$code,"email"=>$email));
			
			$message= "
					   Hello , $email
					   <br /><br />
					   We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
					   <br /><br />
					   Click Following Link To Reset Your Password 
					   <br /><br />
					   <a href='".$site_url."resetpass?id=$id&code=$code'>click here to reset your password</a>
					   <br /><br />
					   thank you :)
					   ";
			$subject = "Password Reset";
			
			$user->send_mail($email,$message,$subject);
		
			$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						We've sent an email to $email.
						Please click on the password reset link in the email to generate new password. 
					</div>";
		}
	}
	else
	{
		if($type==1)
			$msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong> this phone number not found. 
					</div>";
		else
			$msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong> this email not found. 
					</div>";
	}
}
?>