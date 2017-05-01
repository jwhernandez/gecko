<?php
    session_start();
    require_once 'models/class.user.php';
    $user_login = new USER();
    if($user_login->is_logged_in()!="") { 
        
    }
    if(isset($_POST['btn-login'])) {
        echo '<script language="javascript">alert("2");</script>'; 
        $email = trim($_POST['txtemail']); 
        $upass = trim($_POST['txtupass']); 
        $user_login->login($email,$upass);
    } 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Turisteando</title>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style type="text/css">
        body { 
          background: url("img/logoTurist.png") no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }

        .panel-default {
        opacity: 0.9;
        margin-top:30px;
        }
        .form-group.last { margin-bottom:0px; }
    </style>
</head>

<body id="login">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title text-center"></div>
            </div> 
            <div class="panel-body" >
                <?php if(isset($_GET['inactive'])) { ?>
                <div class='alert alert-error'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it.
                </div>
                <?php } ?>
                <form class="form-signin" method="post">
                    <?php if(isset($_GET['error'])) { ?>
                    <div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Wrong Details!</strong>
                    </div>
                    <?php } ?>
                    <h2 class="form-signin-heading">Loguearse en Turisteando.</h2>
                    <hr />
                    <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
                    <input type="password" class="input-block-level" placeholder="Password" name="txtupass" required />
                    <hr />
                    <button class="btn btn-large btn-primary" type="submit" name="btn-login">Iniciar</button>
                    <a href="signup.php" style="float:right;" class="btn btn-large">Registrarse</a>
                    <hr />
                    <a href="fpass.php">Olvido la contraseña? </a>
                </form>
            </div>
        </div>
    </div>    
    <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>