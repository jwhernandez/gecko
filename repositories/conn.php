<?php
	class Database
	{
	    public $conn;
	     
	    public function dbConnection()
		{
		    $test = mysql_connect('localhost', 'root', 'root');
		  	mysql_select_db('geckodb');
		  	return $test;
	    }
	}
?>