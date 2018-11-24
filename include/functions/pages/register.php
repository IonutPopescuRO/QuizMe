<?php
$user = new USER();

if($user->is_logged_in()!="")
	$user->redirect('app/');

$errors = array();

if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['email']))
{
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$rpassword = trim($_POST['rpassword']);
	$phone = trim($_POST['phone']);
	
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	
	$stmt2 = $user->runQuery("SELECT * FROM tbl_users WHERE userPhone=:phone");
	$stmt2->execute(array(":phone"=>$phone));
	
	$code = md5(uniqid(rand()));
	$sms_code = md5(uniqid(rand()));
	
	if(strlen($_POST['name'])<3 || strlen($_POST['name'])>40)
		$errors[]='The name contains disallowed characters.';
	if(!ctype_digit($_POST['phone']) || (ctype_digit($_POST['phone']) && strlen($_POST['phone'])>9))
		$errors[]='Incorrect phone number.';
	if(!$user->isValidUserPassword($_POST['password']))
		$errors[]='The password you entered contains disallowed characters.';
	if($_POST['password'] != $_POST['rpassword'])
		$errors[]='Passwords do not match.';
	if(!$user->isValidEmail($_POST['email']))
		$errors[]='You did not enter a valid email address.';
	if($stmt->rowCount() > 0)
		$errors[]='Email allready exists. Please try another one.';
	if($stmt2->rowCount() > 0)
		$errors[]='Phone number allready exists. Please try another one.';
	if(strlen($phone)!=9)
		$phone='';
	
	if(!count($errors))
	{
		if($user->register($name,$email,$phone,$password,$code,$sms_code))
		{			
			$id = $user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $name,
						<br /><br />
						Welcome to $site_title!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='".$site_url."verify?id=$id&type=email&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks!";
						
			$subject = "Confirm Registration";
			
						
			$user->send_mail($email, $name,$message,$subject);
			
			$message = "Welcome to $site_title! To complete your registration  please, just click following link: ".$site_url."verify?id=$id&type=sms&code=$sms_code";
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong> The user account has been successfully created.
			  		</div>
					<div class='alert alert-warning'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Please activate your account by clicking the link received by email.
			  		</div>
					";
			if($phone)
			{
				$user->sendMsgWithSmsGatewayApi($message, '0'.$phone, 105832);
				$msg.= "
						<div class='alert alert-warning'>
							<button class='close' data-dismiss='alert'>&times;</button>
							You received an SMS to validate your phone number.
						</div>
						";
			}
			
		}
		else
		{
			echo "sorry , Query could no execute...";
		}
	}
}
?>