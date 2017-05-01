<!DOCTYPE html>
<html>
    <head>
        <title>Gecko</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CDN Jquery-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- CDN Bootstrap-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <!-- Autor -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <?php include('include/navbarUsuario.php'); ?>
            <div class="page-header">
                <h1>BIENVENIDOS</h1>
            </div>
            <div class="timeline">
                <div class="line text-muted"></div>
                <article class="panel panel-danger panel-outline">
                    <div class="panel-heading icon">
                        <i class="glyphicon glyphicon-heart"></i>
                    </div>
                    <div class="panel-body">
                        <h2><strong>Somos tus amigos</strong>, queremos mostrarte los mejores lugares para salir un rato y desestresarte</h2>
                    </div>
                </article>
                <article class="panel panel-default panel-outline">
                    <div class="panel-heading icon">
                        <i class="glyphicon glyphicon-picture"></i>
                    </div>
                    <div class="panel-body">
                        <img class="img-responsive img-rounded" src="img/logoTurist.png" />
                    </div>
                </article>
                <article class="panel panel-primary">
                    <div class="panel-heading icon">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                    <div class="panel-heading">
                        <h2 class="panel-title">Historia</h2>
                    </div>
                    <div class="panel-body">
                        <h2><p style="text-align: justify;">El hombre siempre ha tenido el afán de viajar. Al principio lo hacía por necesidad, luego por curiosidad o por ambición de conquista, y actualmente, aunque repuntan los motivos laborales, la mayoría de los viajes que realizamos, tienen  carácter lúdico.</p>
                                    <p style="text-align: justify;">Por suerte, el ser humano sigue teniendo esa necesidad de saber que hay más allá de lo que nuestra mente conoce. ¿De donde viene su significado? Pues como la mayoría de nuestros vocablos deriva del latín "viaticum", que era la provisión de dinero y otros enseres que se necesitaban antes de emprender un camino ("via" en latín).</p>
                                    <p style="text-align: justify;">Pero ¿Que es viajar? Cada uno tiene su destino y razón, y cada edad tiene su modalidad. Pero viajar es moverse, y para hacerlo no es necesario  recorrer 1.000 Km, se viaja incluso por tu misma ciudad, es solo  cuestión de poner "ojos viajeros", para observar el entorno con una nueva perspectiva. </p></h2>
                    </div>
                    <div class="panel-footer">
                        <small> Derechos Reservados Turisteando &copy; 2016</small>
                    </div>
                </article>
                <article class="panel panel-success">
                    <div class="panel-heading icon">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                    <div class="panel-heading">
                        <h2 class="panel-title">Frases Motivadoras</h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            <h2>“Vivimos en un mundo maravilloso que está lleno de belleza, encanto y aventura. No hay un límite para las aventuras que podemos tener siempre y cuando las busquemos con los ojos bien abiertos”.<a>–Jawaharial Nehru</a></h2>
                        </p>
                        <p>
                            <h2> “El único verdadero viaje de descubrimiento consiste no en buscar nuevos paisajes, sino en mirar con nuevos ojos”. <a>-Marcel Proust<a></h2>
                        </p>
                    </div>
                </article>
                <article class="panel panel-info panel-outline">
                    <div class="panel-heading icon">
                        <i class="glyphicon glyphicon-info-sign"></i>
                    </div>
                    <div class="panel-body">
                        <h2>Gracias por visitarnos...</h2>
                    </div>
                </article>
            </div>
        </div>
        </div>
        <div class="modal fade" id="loginmodal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><h1>Cuentas!</h1></h4>
                    </div>
                    <div class="modal-body">
                        <div id="map-container">
                            <?php require_once('include/usuario.php'); ?>
                        </div>                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div id="test2" class="modal fade" role="dialog" style="z-index: 1600;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">                       
                    <div class="modal-body">
                        <form class="form-signin" method="post" action="index.php">
                            <h2 class="form-signin-heading">Nueva Contraseña!</h2><hr />
                            <?php
                                if(isset($msg))
                                {
                                    echo $msg;
                                }
                                else
                                {
                            ?>
                                    <div class='alert alert-info'>
                                        Digite su Email. Usted resibirá un link para crear una nueva contraseña.!
                                    </div>  
                            <?php
                                }
                            ?>
                            <input type="email" class="form-control" placeholder="Email address" name="mail" id="mail" required />
                            <hr />
                            <input class="btn btn-danger btn-primary" type="submit" name="button" id="button" value="Enviar Email" />
                        </form>
                    </div> <!-- /container -->
                    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
                    <script src="bootstrap/js/bootstrap.min.js"></script>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    </div>    
                </div>
            </div>
        </div>
    </body>
</html>

<?php
error_reporting(E_ERROR);
if($_SESSION["userSession"] == "SI"){ 
header ("Location: inicio.php");
}
?>
<?php
if($_POST['button']){
    if($_POST['mail']){
        
        $mail = htmlentities($_POST['mail']);
        
        $link = mysql_connect ('localhost', 'root', 'root');
        mysql_select_db('geckodb',$link);
        
        $queEmp = "SELECT * FROM ge_suscritor WHERE SUS_EMAIL='".$mail."'";
        $resEmp = mysql_query($queEmp, $link) or die(mysql_error());
        $totEmp = mysql_num_rows($resEmp);
        if($totEmp == 0){
        $msg = "<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Disculpa!</strong>  Email Incorrecto!. 
                </div>";
        exit();
        }       
        
        $row = mysql_fetch_assoc($resEmp);
        $hash = md5(md5($row['SUS_NAME']).md5($row['SUS_PASS']));

        $headers .= "From:Recuperar Contraseña <info@turisteando.com>\r\n";  
        $message = "Para recuperar tu Contraseña dar click en la url de abajo.
        http://localhost/Turisteando/fpass.php?id=".$hash."&mail=".$mail."";
        
        if (mail($mail,"Recuperar password",$message,$headers)){
        $msg = "<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    Enviamos un email a $mail.
                    Por favor revisa el email para generar una nueva contraseña!. 
                </div>";
        }
    }
}
?>