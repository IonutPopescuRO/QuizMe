<?php
require_once 'dbconfig.php';
require_once 'include/config.php';
require 'include/mailer/PHPMailer.php';
require 'include/mailer/SMTP.php';
require 'include/mailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;

class USER
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
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($uname,$email,$phone,$upass,$code,$sms,$qr_code=null)
	{
		try
		{
			
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_users(userName,userEmail,userPhone,userPass,tokenCode,tokenSMS,current_event) 
			                                             VALUES(:user_name, :user_mail, :user_phone, :user_pass, :active_code, :sms_code, :current_event)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_phone",$phone);//
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->bindparam(":sms_code",$sms);//
			$stmt->bindparam(":current_event",$qr_code['event']);//
			
			if($qr_code)
			{
				$last_id = $this->conn->lastInsertId();
				$this->setEvent($qr_code['id'], $qr_code['event'], $last_id);
			}
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function getUserRow($row)
	{
		$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userID = :id");
		$stmt->bindParam(':id', $_SESSION['userSession'], PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		
		return $result[$row];
	}
	
	public function getUserAllRow()
	{
		$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userID = :id");
		$stmt->bindParam(':id', $_SESSION['userSession'], PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	public function login($user,$upass)
	{
		try
		{
			$phone = substr($user, -9);
			$type = 0;
			if(ctype_digit($phone) && strlen($phone)==9)
			{
				$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userPhone=:email_id");
				$stmt->execute(array(":email_id"=>$phone));
				$type = 1;
			}
			else
			{
				$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userEmail=:email_id");
				$stmt->execute(array(":email_id"=>$user));
				$type = 2;
			}

			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
				if($type==1)
				{
					if($userRow['smsStatus']=="Y")
					{
						if($userRow['userPass']==md5($upass))
						{
							$_SESSION['userSession'] = $userRow['userID'];
							return true;
						}
						else
						{
							header("Location: login?error");
							exit;
						}
					}
					else
					{
						header("Location: login?inactive");
						exit;
					}	
				}
				else if($type==2)
				{
					if($userRow['userStatus']=="Y")
					{
						if($userRow['userPass']==md5($upass))
						{
							$_SESSION['userSession'] = $userRow['userID'];
							return true;
						}
						else
						{
							header("Location: login?error");
							exit;
						}
					}
					else
					{
						header("Location: login?inactive");
						exit;
					}	

				}
			}
			else
			{
				header("Location: login?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		global $site_url;
		header("Location: $site_url$url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	public function send_mail($email,$user_name,$message,$subject, $alt_message='')
	{	
		global $SMTPAuth, $SMTPSecure, $EmailHost, $emailPort, $email_username, $email_password, $site_title;
		
		$this->mail             = new PHPMailer();
		$this->mail->IsSMTP();
		$this->mail->SMTPDebug  = 0;							// enables SMTP debug information (for testing)
														// 1 = errors and messages
														// 2 = messages only
		$this->mail->Timeout	  =	30;							// set the timeout (seconds)
		$this->mail->CharSet    = 'UTF-8';					// for special chars
		$this->mail->SMTPAuth   = $SMTPAuth;					// enable SMTP authentication
		$this->mail->SMTPSecure = $SMTPSecure;				// sets the prefix to the servier
		$this->mail->Host       = $EmailHost;					// sets GMAIL as the SMTP server
		$this->mail->Port       = $emailPort;					// set the SMTP port for the GMAIL server
		$this->mail->Username   = $email_username;			// GMAIL username
		$this->mail->Password   = $email_password;			// GMAIL password
		
		$this->mail->SetFrom($email_username, $site_title);
		$this->mail->AddReplyTo($email_username, $site_title);

		$this->mail->Subject    = $subject;

		$this->mail->AltBody    = $alt_message;
		$html_mail = $message;
		$this->mail->MsgHTML($html_mail);

		$this->mail->AddAddress($email, $user_name);

		if(!$this->mail->Send()) {
			print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>Please contact an administrator!</br>'.$this->mail->ErrorInfo.'</div>';
		}
	}
	
	public function sendMsgWithSmsGatewayApi($msg,$number,$deviceid)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
			CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
			CURLOPT_SSL_VERIFYPEER=>false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "[{\"phone_number\": \"$number\", \"message\": \"$msg\", \"device_id\": $deviceid}]",
			CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 0dfb5acc-f0ae-415b-a5d3-ca12a2dfdfd3",
            "authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0MzAwMTQ0NiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY0NTQ3LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.ORa51HHJPxS9mm0ZEOA3WW1qFaca9NPOp84MieOgeaw"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
			echo "cURL Error #:" . $err;
        } else {
			//echo $response;//sms trimis =)
        }
    }
	
    public function validate_phone_number($phone)
    {
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14)
			return false;
        else
			return true;
    }
	
	public function isValidEmail($email) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email)<=64)
			return true;
		else return false;
	}

	public function isValidUserPassword($password) {
		if(preg_match('/^[a-zA-Z0-9 @!#$%&(){}*+,\-.\/:;<>=?[\\]\^_|~]*$/', $password) && strlen($password)>=5 && strlen($password)<=16)
			return true;
		else return false;
	}
	
	function checkForCode($code)
	{
		global $database;

		$stmt = $this->conn->prepare("SELECT * FROM qrcodes WHERE code = ?");
		$stmt->bindParam(1, $code, PDO::PARAM_STR);
		$stmt->execute();
		$check = $stmt->fetch(PDO::FETCH_ASSOC);

		return $check;
	}
	
	function getEventQuestions($event)
	{
		global $database;

		$stmt = $this->conn->prepare("SELECT * FROM events_questions WHERE event = ?");
		$stmt->bindParam(1, $event, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$array = array();
		
		foreach($result as $r)
			$array[]=$r['question'];
		
		shuffle($array);

		$str = implode(",", $array);
		return $str;
	}
	
	function setEvent($id,	$event, $user)
	{
		$questions = $this->getEventQuestions($event);

		$stmt = $this->conn->prepare("UPDATE qrcodes SET used=1, user=:user WHERE id=:id");
		$stmt->execute(array(':user'=>$user, ':id'=>$id));
		
		$stmt = $this->conn->prepare("UPDATE tbl_users SET current_event=:event WHERE userID=:id");
		$stmt->execute(array(':event'=>$event, ':id'=>$user));
		
		$stmt = $this->conn->prepare("INSERT INTO events_users(user, event, questions) VALUES (:user, :event, :questions)");
		$stmt->execute(array(':user'=>$user, ':event'=>$event, ':questions'=>$questions));
	}
	
	function removeEvent()
	{
		$stmt = $this->conn->prepare("UPDATE tbl_users SET current_event=-1 WHERE userID=:id");
		$stmt->execute(array(':id'=>$_SESSION['userSession']));
	}
}