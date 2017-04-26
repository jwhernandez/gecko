<?php

require_once '/dao/dbconfig.php';

class USER
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
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($cedula,$nombre,$ape1,$ape2,$correo,$edad,$sexo,$upass)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO ge_suscritor(SUS_IDENTIFICATION,SUS_NAME,SUS_FSURNAME,SUS_SSURNAME,SUS_BIRTHDATE,SUS_EMAIL,SUS_GENDER,SUS_STATE,SUS_PASS) 
			                                             VALUES(:cedula, :nombre, :ape1, :ape2, :edad, :correo, :sexo, :estado, :pass)");
			$stmt->bindparam(":cedula",$cedula);
			$stmt->bindparam(":nombre",$nombre);
			$stmt->bindparam(":ape1",$ape1);
			$stmt->bindparam(":ape2",$ape2);
			$stmt->bindparam(":correo",$correo);
			$stmt->bindparam(":edad",$edad);
			$stmt->bindparam(":sexo",$sexo);
			$stmt->bindparam(":pass",$password);
			$stmt->bindparam(":estado",$sexo);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM ge_suscritor WHERE SUS_EMAIL=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['estado']=="Y")
				{
					if($userRow['pass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['cedula'];
						$_SESSION['user'] = $userRow['nombre'];
						return true;
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
			else
			{
				header("Location: index.php?error");
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