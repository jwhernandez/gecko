<style type="text/css">
    .panel-login {
        border-color: #ccc;
        -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
        -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
        box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    }
    .panel-login>.panel-heading {
        color: #00415d;
        background-color: #fff;
        border-color: #fff;
        text-align:center;
    }
    .panel-login>.panel-heading a{
        text-decoration: none;
        color: #666;
        font-weight: bold;
        font-size: 15px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }
    .panel-login>.panel-heading a.active{
        color: #029f5b;
        font-size: 18px;
    }
    .panel-login>.panel-heading hr{
        margin-top: 10px;
        margin-bottom: 0px;
        clear: both;
        border: 0;
        height: 1px;
        background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
        background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    }
    .panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
        height: 45px;
        border: 1px solid #ddd;
        font-size: 16px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }
    .panel-login input:hover,
    .panel-login input:focus {
        outline:none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border-color: #ccc;
    }
    .btn-login {
        background-color: #59B2E0;
        outline: none;
        color: #fff;
        font-size: 14px;
        height: auto;
        font-weight: normal;
        padding: 14px 0;
        text-transform: uppercase;
        border-color: #59B2E6;
    }
    .btn-login:hover,
    .btn-login:focus {
        color: #fff;
        background-color: #53A3CD;
        border-color: #53A3CD;
    }
    .forgot-password {
        text-decoration: underline;
        color: #888;
    }
    .forgot-password:hover,
    .forgot-password:focus {
        text-decoration: underline;
        color: #666;
    }

    .btn-register {
        background-color: #1CB94E;
        outline: none;
        color: #fff;
        font-size: 14px;
        height: auto;
        font-weight: normal;
        padding: 14px 0;
        text-transform: uppercase;
        border-color: #1CB94A;
    }
    .btn-register:hover,
    .btn-register:focus {
        color: #fff;
        background-color: #1CA347;
        border-color: #1CA347;
    }
</style>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#" class="active" id="login-form-link">Iniciar</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="#" id="register-form-link">Registrar</a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="panel-body">
                <?php if(isset($msg)) echo $msg;?>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-signin" action="signin.php" id="login-form" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="txtemail" id="txtemail" tabindex="1" class="form-control" placeholder="Email" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtupass" id="txtupass" tabindex="2" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Recordar Contraseña!</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="btn-login" id="btn-login" tabindex="4" class="form-control btn btn-login" value="Iniciar">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <input type="button" class="btn btn-link" value="Olvidé mi contraseña!" data-toggle="modal" data-target="#test2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" enctype="multipart/form-data" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="txtid" id="txtid" tabindex="1" class="form-control" placeholder="Cedula o Pasaporte" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtname" id="txtname" tabindex="1" class="form-control" placeholder="Nombre" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtape1" id="txtape1" tabindex="1" class="form-control" placeholder="P. Apellido" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtape2" id="txtape2" tabindex="1" class="form-control" placeholder="S. Apellido" value="">
                                </div>
                                <div class="form-group">
                                    <input type="date" name="txtedad" id="txtedad" tabindex="1" class="form-control" placeholder="Fecha Nacimiento" value="">
                                </div>
                                <div class="form-group">
                                    <select name="txtgenero" class="form-control" required="required">
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="txtemail" id="txtemail" tabindex="1" class="form-control" placeholder="Email" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtpass" id="txtpass" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="btn-signup" id="btn-signup" tabindex="4" class="form-control btn btn-register" value="Registrar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
    });
</script>

<?php
    error_reporting(E_ERROR);
    session_start();
    require_once '/models/class.user.php';
    require_once '/repositories/DBAccess.php';
    include "/models/class.upload.php";
    $reg_user = new USER();
    $database = new DBAccess();
    if($reg_user->is_logged_in()!="")
    {
        $reg_user->redirect('inicio.php');
    }
    if(isset($_POST['btn-signup']))
    {
        $cedula = trim($_POST['txtid']);
        $nombre = trim($_POST['txtname']);
        $ape1 = trim($_POST['txtape1']);
        $ape2 = trim($_POST['txtape2']);
        $edad = trim($_POST['txtedad']);
        $sexo = trim($_POST['txtgenero']);
        $correo = trim($_POST['txtemail']);
        $upass = trim($_POST['txtpass']);
        $estado="1";
        $code = md5(uniqid(rand()));
        $stmt = $database->GetData("SELECT * FROM ge_suscritor WHERE SUS_EMAIL='".$correo."'");
        if(mysql_num_rows($stmt) > 0)
        {
            $msg = "
                  <div class='alert alert-error'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry !</strong>  email allready exists , Please Try another one
                  </div>
                  ";
        }
        else
        {
            if($reg_user->register($cedula,$nombre,$ape1,$ape2,$correo,$edad,$sexo,$upass,$estado))
            {   
                $id = $reg_user->lasdID();      
                $key = base64_encode($id);
                $id = $key;
                $message = "                    
                            Hello $nombre,
                            <br /><br />
                            Welcome to Coding Cage!<br/>
                            To complete your registration  please , just click following link<br/>
                            <br /><br />
                            <a href='verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
                            <br /><br />
                            Thanks,";                           
                $subject = "Confirm Registration";       
                $reg_user->send_mail($correo,$message,$subject);    
                $msg = "
                        <div class='alert alert-success'>
                            <button class='close' data-dismiss='alert'>&times;</button>
                            <strong>Success!</strong>  We've sent an email to $email.
                        Please click on the confirmation link in the email to create your account. 
                        </div>
                        ";
            }
            else
            {
                echo "sorry , Query could no execute...";
            }       
        }
    }
?>

