 <?php
session_start();
require_once '/models/class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM ge_suscritor WHERE SUS_IDENTIFICATION=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Turisteando</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"> Inicio</a>
            </li>
            <li><a class="glyphicon glyphicon-info-sign" href="#"> Nosotros</a>
            </li>
            <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle glyphicon glyphicon-eye-open" data-toggle="dropdown"> Lugares <span class="caret"></span></a>
                <ul class="dropdown-menu mega-dropdown-menu ">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Playas</li>
                            <!--Insertamos aquí nuestro carrusel -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Playas"><img src="images/playa4.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Playas"><img src="images/playa1.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php
                                            echo '<a href="buscar.php?categoria=Playas"><img src="images/playa2.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item active">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Playas"><img src="images/playa3.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>

                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Montañas</li>
                            <!--Insertamos aquí nuestro carrusel -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Montanas"><img src="images/montana1.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Montanas"><img src="images/montana2.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Montanas"><img src="images/montana3.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item active">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Montanas"><img src="images/montana4.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>

                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Rios</li>
                            <!--Insertamos aquí nuestro carrusel -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Rios"><img src="images/rio4.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Rios"><img src="images/rio1.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Rios"><img src="images/rio2.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                    <div class="item active">
                                        <?php  
                                            echo '<a href="buscar.php?categoria=Rios"><img src="images/rio3.jpg" class="img-responsive" alt="..."> </a>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="glyphicon glyphicon-picture" href="#"> Galeria</a>
            </li>
            <li><a class="glyphicon glyphicon-share" href="compartir.php"> Compartir</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <i class="glyphicon glyphicon-user"></i>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i> 
                                <?php echo $row['correo']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="perfil.php"> Perfil</a>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
        </ul>
    </div>
</nav>