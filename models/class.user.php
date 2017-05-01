<?php

require_once '/repositories/conn.php';
require_once '/repositories/DBAccess.php';
class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
		
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($cedula,$nombre,$ape1,$ape2,$correo,$edad,$sexo,$upass,$estado)
	{
		$database = new DBAccess();
		try
		{							
			$password = md5($upass);
			$stmt = $database->GetData("INSERT INTO ge_suscritor
			(SUS_IDENTIFICATION,SUS_NAME,SUS_FSURNAME,SUS_SSURNAME,SUS_BIRTHDATE,SUS_EMAIL,SUS_GENDER,SUS_STATE,SUS_PASS) 
			VALUES('".$cedula."', '".$nombre."', '".$ape1."', '".$ape2."', '".$edad."', 
				   '".$correo."', '".$sexo."', '".$estado."', '".$password."')");	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($email,$upass)
	{
		$database = new DBAccess();
		try
		{
			$conn = new mysqli('localhost', 'root', 'root', 'geckodb');
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "SELECT * FROM ge_suscritor WHERE SUS_EMAIL='".$email."'";
			$result = $conn->query($sql);		
			if($result->num_rows > 0)
			{	
				while($userRow = $result->fetch_assoc()) {
					if($userRow["SUS_STATE"]=="1")
					{
						echo '<script language="javascript">alert("pedro");</script>'; 
						if($userRow["SUS_PASS"]==md5($upass))
						{
							$_SESSION['userId'] = $userRow["SUS_IDENTIFICATION"];
							$_SESSION['user'] = $userRow["SUS_NAME"];
							$_SESSION['userSFirth'] = $userRow["SUS_FSURNAME"];
							$_SESSION['userSSecond'] = $userRow["SUS_SSURNAME"];
							$_SESSION['userEmail'] = $userRow["SUS_EMAIL"];
							$_SESSION['userImage'] = $userRow["SUS_IMAGE"];
							$_SESSION['userBirth'] = $userRow["SUS_BIRTHDATE"];
							$_SESSION['userGender'] = $userRow["SUS_GENDER"];							
							header("Location: inicio.php");
							exit;
						}
						else
						{
							header("Location: index.php?error");
							exit;
						}
					}
					else
					{
						header("Location: index.php?inactive");
						exit;
					}
				}	
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}		
		}
		catch(Exception $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function ajaxRefresh($id,$name,$sfirth,$ssecond,$email,$birthdate,$upass,$image)
	{
		$database = new DBAccess();
		try
		{
			$password = md5($upass);
			$conn = new mysqli('localhost', 'root', 'root', 'geckodb');
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "UPDATE ge_suscritor SET SUS_NAME = '".$name."', SUS_FSURNAME = '".$sfirth."',
					SUS_SSURNAME = '".$ssecond."', SUS_EMAIL = '".$email."', SUS_IMAGE = '".$image."',
					SUS_BIRTHDATE = '".$birthdate."', SUS_PASS = '".$password."' WHERE SUS_IDENTIFICATION='".$id."'";
			$result = $conn->query($sql);		
			$this->login($email,$upass);
		}
		catch(Exception $ex)
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

	public function GetData($Query) {
        if (!$link = mysql_connect('localhost', 'root', 'root')) {
            echo 'Could not connect to mysql';
            exit;
        }
        if (!mysql_select_db('geckodb', $link)) {
            echo 'Could not select database';
            exit;
        }
        $result = mysql_query($Query, $link);
        return $result;
    }
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username="your_gmail_id_here@gmail.com";  
		$mail->Password="your_gmail_password_here";            
		$mail->SetFrom('your_gmail_id_here@gmail.com','Coding Cage');
		$mail->AddReplyTo("your_gmail_id_here@gmail.com","Coding Cage");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}	
}