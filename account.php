<?php
session_start();
include "models/class.upload.php";
require_once 'models/class.user.php';
$user_home = new USER();

if (!$user_home->is_logged_in()) {
    $user_home->redirect('index.php');
}

//Variables del metodo POST
$nombre       = $_POST['nombre'];
$ape1 = $_POST['ape1'];
$ape2 = $_POST['ape2'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$pass = $_POST['pass'];
$cedula = $_POST['userId'];

$files = array();
foreach ($_FILES['image'] as $k => $l) {
    foreach ($l as $i => $v) {
        if (!array_key_exists($i, $files))
            $files[$i] = array();
        $files[$i][$k] = $v;
    }
}

$url = "perfil/".$cedula;

deleteDirectory($url);
foreach ($files as $file) {
    $handle = new Upload($file);
    if ($handle->uploaded) {                
        $handle->Process($url);
        if ($handle->processed) {                        
            // usamos la funcion insert_img de la libreria db.php
            $user_home->ajaxRefresh($cedula,$nombre,$ape1,$ape2,$email,$edad,$pass,$url."/".$handle->file_dst_name);            
        } else {
            $error = true;
            echo 'Error1: ' . $handle->error;
        }
    } else {
        $error = true;
        echo 'Error2: ' . $handle->error;
    }
    unset($handle);
}
 echo'<script type="text/javascript">
                     window.location="perfil.php"
                </script>';

function deleteDirectory($dir) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($current = readdir($dh))) {
        if($current != '.' && $current != '..') {
            if (!@unlink($dir.'/'.$current)) 
                deleteDirectory($dir.'/'.$current);
        }       
    }
    closedir($dh);
    @rmdir($dir);
}

?>