<?php
    class DBAccess {
        //Configuración para la conexión a la base de datos
        private $Server = "localhost";
        private $UserName = "root";
        private $Password = "root";
        private $DataBase = "geckodb";
        
        //Método para obtener los datos que resulten de la ejecución
        //de la consulta proporcionada
        public function GetData($Query) {
            if (!$link = mysql_connect($this->Server, $this->UserName, $this->Password)) {
                echo 'Could not connect to mysql';
                exit;
            }
            if (!mysql_select_db($this->DataBase, $link)) {
                echo 'Could not select database';
                exit;
            }
            $result = mysql_query($Query, $link);
            return $result;
        }
    }
?>