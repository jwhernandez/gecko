<?php
    require_once 'repositories/DBAccess.php';
    function calculaedad($fechanacimiento){
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
        return $ano_diferencia;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gecko Diabetes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CDN Jquery-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- CDN Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

    <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="js/bootstrap.min.js"></script>
    <script src="js/fileinput.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jQuery.paginate.js"></script>
</head>

<body>
    <div class="container">
        <?php include('include/navbar.php'); ?>
        <br>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h1 class="panel-title"><i class="fa fa-users fa-1x"> </i> Información de la Cuenta</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    <!-- profile-widget -->
                    <div class="col-lg-12">
                        <div class="profile-widget profile-widget-info">
                            <div class="panel-body">
                                <div class="col-lg-4 col-sm-4">                                    
                                    <div class="follow-ava">
                                        <img class="img-circle" src="<?php echo $_SESSION['userImage'] ?>" alt="Foto de Perfil"/>
                                    </div>                                    
                                </div>
                                <div class="col-lg-4 col-sm-4 follow-info">                                    
                                    <p>
                                        <i class="fa fa-user-o fa-1x"></i> <?php echo $_SESSION['user']." ".$_SESSION['userSFirth']." ".$_SESSION['userSSecond'];?>
                                    </p>
                                    <p><i class="fa fa-id-card-o fa-1x"></i> <?php echo $_SESSION['userId'];?></p>
                                    <p><i class="fa fa-address-card-o fa-1x"></i> <?php echo $_SESSION['userEmail'];?></p>
                                </div>
                                <div class="col-lg-4 col-sm-4 follow-info weather-category">
                                    <p>
                                        <i class="fa fa-venus-mars fa-1x"></i> 
                                        <?php 
                                        if($_SESSION['userGender']=='M')
                                            echo 'Masculino';
                                        else
                                            echo 'Femenino';
                                        ?>
                                    </p>
                                    <p><i class="fa fa-clock-o fa-1x"></i> <?php echo calculaedad ($_SESSION['userBirth']);?> años</p>
                                    <p><i class="fa fa-gift fa-1x"> </i>
                                        <?php
                                            setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                                            $fecha = strftime("%d de %B de %Y", strtotime($_SESSION['userBirth']));
                                            echo $fecha;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-info">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#recent-activity">
                                    <i class="glyphicon glyphicon-log-out"></i> Actividades
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="recent-activity" class="tab-pane active">
                                <div class="profile-activity">
                                    <div id="disponibles">
                                        <?php $database = new DBAccess();
                                            try
                                            {
                                                $conn = new mysqli('localhost', 'root', 'root', 'geckodb');
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                } 
                                                $sql = "SELECT * FROM ge_experiences ORDER BY EXP_DATE DESC";
                                                $result = $conn->query($sql);       
                                                if($result->num_rows > 0)
                                                {   
                                                    while($userRow = $result->fetch_assoc()) {
                                                        $sql2 = "SELECT * FROM ge_suscritor WHERE SUS_IDENTIFICATION = '".$userRow['EXP_SUSID']."'";
                                                        $result2 = $conn->query($sql2);
                                                        while($userRow2 = $result2->fetch_assoc()) {
                                                        ?>                                
                                                        <label class="col-sm-12 col-xs-12">
                                                            <div class="act-time">
                                                                <div class="activity-body act-in">
                                                                    <span class="arrow"></span>
                                                                    <div class="text">
                                                                        <a href="#" class="activity-img"><img class="avatar" src="<?php echo $userRow2['SUS_IMAGE'] ?>" alt=""></a>
                                                                        <p class="attribution">
                                                                            <a href="#"><?php echo $userRow2['SUS_NAME']." ".$userRow2['SUS_FSURNAME']." ".$userRow2['SUS_SSURNAME']?></a>
                                                                            <?php
                                                                                setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                                                                                $fecha = strftime("%d de %B de %Y", strtotime($userRow["EXP_DATE"]));
                                                                                echo $fecha;
                                                                            ?>
                                                                        </p>
                                                                        <p><?php echo $userRow['EXP_COMMENT'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <?php    
                                                        }   
                                                    }
                                                }
                                                else
                                                {      
                                                }       
                                            }
                                            catch(Exception $ex)
                                            {
                                                echo $ex->getMessage();
                                            }
                                        ?>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>     
    </div>
</body>

<script>
    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-folder-openg'></i>"
    });
    $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
    });
</script>

<script>
    $('#disponibles').paginate({
        items_per_page: 2
    });
    $( ".pagination__controls" ).addClass( "col-md-12" );
    $( ".pag" ).addClass( "page-item" );
</script>

<style type="text/css">
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        background-color: #2e6f5b;
        border-color: #2e6f5b;
        color: #fff;
    }
    .pagination > li > a,
    .pagination > li > span {
        color: #2e6f5b;
    }

    .widget .tab-content{
        margin-bottom: 10px;
    }
    .profile-activity h5 {
        font-weight: 300;
        margin-top: 0;
        color: #c3c3c3;
    }
    .profile-activity:before {
        background: rgba(0, 0, 0, 0.1);
        bottom: 0;
        top: 0;
        width: 2px;
    }
    .profile-activity, .act-time , .profile-activity .act-in, .profile-activity .act-out {
        position: relative;
    }
    .profile-activity .act-in  .arrow {
        /*border-right: 8px solid #F4F4F4 !important;*/
    }
    .profile-activity .act-in .arrow {
        border-bottom: 8px solid transparent;
        border-top: 8px solid transparent;
        display: block;
        height: 0;
        left: -8px;
        position: absolute;
        top: 13px;
        width: 0;
    }
    .profile-activity .act-out  .arrow {
        /*border-right: 8px solid #34aadc !important;*/
    }
    .profile-activity .act-out .arrow {
        border-bottom: 8px solid transparent;
        border-top: 8px solid transparent;
        display: block;
        height: 0;
        left: -8px;
        position: absolute;
        top: 13px;
        width: 0;
    }

    .act-time:first-child:before {
        margin-top: 16px;
    }
    .act-time:before {
        background:#CCCCCC;
        border: 2px solid #FAFAFA;
        border-radius: 100px;
        -moz-border-radius: 100px;
        -webkit-border-radius: 100px;
        height: 14px;
        margin: 23px 0 0 -6px;
        width: 14px;
    }
    .act-time:hover:before {
        background: #34aadc;
    }
    .act-time:first-child {
        padding-top: 0;
    }
    .act-time .act-in .text {
        border: 1px solid #e3e6ed;
        padding: 10px;
        border-radius: 4px;
        -webkit-border-radius: 4px;

    }
    .act-time .act-out .text {
        border: 1px solid #e3e6ed;
        padding: 10px;
        border-radius: 4px;
        -webkit-border-radius: 4px;
    }
    .act-time p {
        margin: 0;
    }
    .act-time .attribution {
        font-size: 11px;
        margin: 0px 0 5px;
    }
    .act-time {
        overflow: hidden;
        padding:8px 0;
    }

    .act-in a, .act-in a:hover{
        color: #b64c4c;
        text-decoration: none;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        margin-right: 10px;
        font-weight: 400;
        font-size: 13px;

    }

    .activity-img {
        float: left;
        margin-right: 30px;
        overflow: hidden;
    }
    .activity-img img {
        display: block;
        height: 44px;
        width: 44px;
    }

    #easyPaginate {
        width:300px;
    }
    #easyPaginate img {
        display:block;
        margin-bottom:10px;
    }
    .easyPaginateNav a {
        padding:5px;
    }
    .easyPaginateNav a.current {
        font-weight:bold;
        text-decoration:underline;
    }
</style>

</html>