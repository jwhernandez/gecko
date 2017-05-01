<?php
    session_start();
    require_once 'models/class.user.php';
    $user_home = new USER();
    if(!$user_home->is_logged_in())
    {
        $user_home->redirect('index.php');
    }
?>
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
<nav class="navbar navbar-default navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand" href="inicio.php"><img src="image/logo.png" style="width:32px; height:32px; display:inline;"> Gecko Diabetes</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="padding-left: 0px;">
            <ul class="nav navbar-nav">
                <li><a href="inicio.php" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"> Inicio</a></li>
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-eye-open" data-toggle="dropdown"> Información <span class="caret"></span></a>
                    <div id="filters" class="dropdown-menu mega-dropdown-menu">
                        <div class="container-fluid2">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="kids">
                                    <ul class="nav-list list-inline">
                                        <li>
                                            <a data-filter=".89" href="#"><img src="image/nutricion1.jpg" style="width:100px; height:100px;"><span>Nutrición</span></a>
                                        </li>
                                        <li>
                                            <a data-filter=".97" href="#"><img src="image/ejercicios2.jpg" style="width:100px; height:100px;"><span>Actividades</span></a>
                                        </li>
                                        <li>
                                            <a data-filter=".96" href="#"><img src="image/emociones2.jpg" style="width:100px; height:100px;"><span>Emociones</span></a>
                                        </li>
                                        <li>
                                            <a data-filter=".87" href="#"><img src="image/peso2.jpg" style="width:100px; height:100px;"><span>Peso</span></a>
                                        </li>
                                        <li>
                                            <a data-filter=".85" href="#"><img src="image/consejos2.png" style="width:100px; height:100px;"><span>Consejos</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-question-sign" data-toggle="dropdown"> Diabetes <span class="caret"></span></a>
                    <div id="filters" class="dropdown-menu mega-dropdown-menu">
                        <div class="container-fluid2">
                            <div class="tab-content">
                                <div class="tab-pane active" id="kids">
                                    <ul class="nav-list list-inline">
                                        <li>
                                            <a data-filter=".89" href="#"><img src="image/d1.png" style="width:100px; height:100px;"><span>Diabetes tipo 1</span></a>
                                        </li>
                                        <li>
                                            <a data-filter=".97" href="#"><img src="image/d2.png" style="width:100px; height:100px;"><span>Diabetes tipo 2</span></a>
                                        </li>
                                        <li>
                                            <a data-filter=".96" href="#"><img src="image/dg.png" style="width:100px; height:100px;"><span>Diabetes gestacional</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a class="glyphicon glyphicon-info-sign" href="post.php"> Post</a></li>
                <li><a class="glyphicon glyphicon-scale" href="#"> Cálculo de Insulina</a></li>
                <li><a class="glyphicon glyphicon-list-alt" href="compartir.php"> Historial</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['user']." ".$_SESSION['userSFirth']; ?>
                            <img class="img-circle"  style="width:22px; height:22px;" src="<?php echo $_SESSION['userImage'] ?>" alt="Foto de Perfil"/>
                            <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-content">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="<?php echo $_SESSION['userImage']?>" alt="Alternate Text" class="img-responsive" />
                                        <p class="text-center small">
                                            <a href="#">Change Photo</a></p>
                                    </div>
                                    <div class="col-md-7">
                                        <span style="color: #1D5CAE;"><?php echo $_SESSION['user']." ".$_SESSION['userSFirth']." ".$_SESSION['userSSecond']; ?></span>
                                        <p class="text-muted small">
                                            <?php echo $_SESSION['userEmail']; ?>
                                        </p>
                                        <div class="divider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-footer">
                                <div class="navbar-footer-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="perfil.php" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-cog"></i> Información</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="" class="btn btn-default btn-sm pull-right"> <i class="glyphicon glyphicon-log-out"></i> Salir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="image/diabetes.png">
                <div class="carousel-caption">
                    <p style="text-align: justify;">
                        La diabetes es una afección crónica que se desencadena cuando el organismo pierde su 
                        capacidad de producir suficiente insulina o de utilizarla con eficacia. 
                        La insulina es una hormona que se fabrica en el páncreas y que permite que la glucosa 
                        de los alimentos pase a las células del organismo, en donde se convierte en energía 
                        para que funcionen los músculos y los tejidos. Como resultado, una persona con diabetes 
                        no absorbe la glucosa adecuadamente, de modo que ésta queda circulando en la sangre 
                        (hiperglucemia) y dañando los tejidos con el paso del tiempo. Este deterioro causa 
                        complicaciones para la salud potencialmente letales. 
                    </p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img src="image/complicaciones.png">
                <div class="carousel-caption">
                    <p style="text-align: justify;">
                        Las personas con diabetes corren un mayor riesgo de desarrollar una serie de problemas 
                        graves de salud. Unos niveles permanentemente altos de glucemia pueden causar graves 
                        enfermedades, que afectarán al corazón y los vasos sanguíneos, los ojos, los riñones y 
                        los nervios. Además, las personas con diabetes también corren un mayor riesgo de desarrollar 
                        infecciones. En casi todos los países de ingresos altos, la diabetes es una de las principales 
                        causas de enfermedad cardiovascular, ceguera, insuficiencia renal y amputación de extremidades 
                        inferiores.
                    </p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img src="image/control.png">
                <div class="carousel-caption">
                    <p style="text-align: justify;">
                        Mantener los niveles de glucemia, de tensión arterial y de colesterol cercanos a 
                        lo normal puede ayudar a retrasar o prevenir las complicaciones diabéticas. Las 
                        personas con diabetes necesitan hacerse revisiones con regularidad para detectar 
                        posibles complicaciones.
                    </p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img src="image/nosotros.png">
                <div class="carousel-caption">
                    <p style="text-align: center;">
                        GECKO DIABETES
                    </p>
                </div>
            </div>
            <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <ul class="nav nav-pills nav-justified">
            <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">¿QUÉ ES LA DIABETES?</a></li>
            <li data-target="#myCarousel" data-slide-to="1"><a href="#">COMPLICACIONES DIABÉTICAS</a></li>
            <li data-target="#myCarousel" data-slide-to="2"><a href="#">CONTROL</a></li>
            <li data-target="#myCarousel" data-slide-to="3"><a href="#">NOSOTROS</a></li>
        </ul>
    </div>
    <!-- End Carousel -->


<style type="text/css">
    .navbar-custom {
        color: #FFFFFF;
        background-color: #1D5CAE;
    }
    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 20;
        margin-top: 20px;
    }

    /* Flip around the padding for proper display in narrow viewports */
    .navbar-wrapper .container {
        padding-left: 0;
        padding-right: 0;
    }
    .navbar-wrapper .navbar {
        padding-left: 15px;
        padding-right: 15px;
    }

    .navbar-content
    {
        width:320px;
        padding: 15px;
        padding-bottom:0px;
    }
    .navbar-content:before, .navbar-content:after
    {
        display: table;
        content: "";
        line-height: 0;
    }
    .navbar-nav.navbar-right:last-child {
        margin-right: 15px !important;
    }
    .navbar-footer 
    {
        background-color:#DDD;
    }
    .navbar-footer-content { padding:15px 15px 15px 15px; }
    .dropdown-menu {
        padding: 0px;
        overflow: hidden;
    }
    .navbar-brand { 
      width: 200px;
      height: 50px;
      background-size: 50px;  
    }
    .nav-tabs {
      display: inline-block;
      border-bottom: none;
      padding-top: 15px;
      font-weight: bold;
    }
    .nav-tabs > li > a, 
    .nav-tabs > li > a:hover, 
    .nav-tabs > li > a:focus, 
    .nav-tabs > li.active > a, 
    .nav-tabs > li.active > a:hover,
    .nav-tabs > li.active > a:focus {
      border: none;
      border-radius: 0;
    }

    .nav-list { border-bottom: px solid #eee; }
    .nav-list > li { 
      padding: 20px 15px 15px;
     
    }
    .nav-list > li:last-child { border-right: 0px solid #eee; }
    .nav-list > li > a:hover { text-decoration: none; }
    .nav-list > li > a > span {
      display: block;
      font-weight: bold;
      text-transform: uppercase;
    }

    .mega-dropdown { position: static !important; }
    .mega-dropdown-menu {
      padding: 20px 15px 15px;
      text-align: center;
      width: 100%;
    }


    #login-dp{
        min-width: 250px;
        padding: 14px 14px 0;
        overflow:hidden;
        background-color:rgba(255,255,255,.8);
    }
    #login-dp .help-block{
        font-size:12px    
    }
    #login-dp .bottom{
        background-color:rgba(255,255,255,.8);
        border-top:1px solid #ddd;
        clear:both;
        padding:14px;
    }
    #login-dp .social-buttons{
        margin:12px 0    
    }
    #login-dp .social-buttons a{
        width: 49%;
    }
    #login-dp .form-group {
        margin-bottom: 10px;
    }
    .btn-fb{
        color: #fff;
        background-color:#3b5998;
    }
    .btn-fb:hover{
        color: #fff;
        background-color:#496ebc 
    }
    .btn-tw{
        color: #fff;
        background-color:#55acee;
    }
    .btn-tw:hover{
        color: #fff;
        background-color:#59b5fa;
    }
    @media(max-width:768px){
        #login-dp{
            background-color: inherit;
            color: #fff;
        }
        #login-dp .bottom{
            background-color: inherit;
            border-top:0 none;
        }
    }
    .navbar-login
    {
        width: 305px;
        padding: 10px;
        padding-bottom: 0px;
    }

    .navbar-login-session
    {
        padding: 10px;
        padding-bottom: 0px;
        padding-top: 0px;
    }

    .icon-size
    {
        font-size: 87px;
    }
    .navbar-brand {
        width: 200px;
        height: 50px;
        background: url('http://www.sneaker-mission.com/uploads/3/1/2/7/31279819/5617441.png') no-repeat center center;
        background-size: 50px;
        padding-top: 7px;
    }
    .navbar-nav {
        padding-left: 15px;
    }
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
        border-color: #00486c;
    }
    .container-fluid {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        background-color: rgb(51,79,111);
    }
    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus {
        color: white;
        background-color: #428bca;
        
    }
    .navbar-default .navbar-nav>li>a {
        color: white;
    }
    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0px;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0px;
        margin: 2px 0px 0px;
        font-size: 14px;
        list-style: none;
        background-color: white;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.14902);
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        border-radius: 4px;
        box-shadow: rgba(0, 0, 0, 0.172549) 0px 6px 12px;
    }
    .nav-list > li {
        padding: 20px 15px 15px;
        border-left:0px;
    .nav-list {
        border-bottom: 0px;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        color: white;
        cursor: default;
        background-color: #428bca;
    }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        color: black;
        cursor: default;
        background-color: rgb(255, 255, 255);
        border: solid black 1px;
    }
    body
    {
        padding-top: 20px;
    }
    #myCarousel .nav a small
    {
        display: block;
    }
    #myCarousel .nav
    {
        background: #eee;
    }
    .nav-justified > li > a
    {
        border-radius: 0px;
    }
    .nav-pills>li[data-slide-to="0"].active a { background-color: #16a085; }
    .nav-pills>li[data-slide-to="1"].active a { background-color: #e67e22; }
    .nav-pills>li[data-slide-to="2"].active a { background-color: #2980b9; }
    .nav-pills>li[data-slide-to="3"].active a { background-color: #8e44ad; }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');        
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');       
            }
        );
    });

    $(document).ready( function() {
        $('#myCarousel').carousel({
            interval:   4000
        });
        
        var clickEvent = false;
        $('#myCarousel').on('click', '.nav a', function() {
                clickEvent = true;
                $('.nav li').removeClass('active');
                $(this).parent().addClass('active');        
        }).on('slid.bs.carousel', function(e) {
            if(!clickEvent) {
                var count = $('.nav').children().length -1;
                var current = $('.nav li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if(count == id) {
                    $('.nav li').first().addClass('active');    
                }
            }
            clickEvent = false;
        });
    });
</script>