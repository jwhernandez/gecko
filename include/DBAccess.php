<?php
    class DBAccess {
        //Configuración para la conexión a la base de datos
        private $Server = "localhost";
        private $UserName = "root";
        private $Password = "root";
        private $DataBase = "turisteando";
        
        //Método para obtener los datos que resulten de la ejecución
        //de la consulta proporcionada
        public function GetData($Query) {
            
            //mysql_select_db($this->DataBase);
            @$Cnx = mysql_pconnect($this->Server, $this->UserName, $this->Password);
            
            //Si no se logró establecer la conexión se retorna FALSE
            if (!$Cnx) {
                return FALSE;
            } else {
            //Si no, se retornan los datos obtenidos de la consulta
                $Data = mysql_db_query($this->DataBase, $Query);
                return $Data;
            }
        }
    }
//Ing. José Luis Gutiérrez | politecnia.net/SirOne | facebook.com/SirOne2002
?>