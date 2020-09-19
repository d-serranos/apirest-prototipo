<?php

	//include $_SERVER['DOCUMENT_ROOT'] . '/ave_api/Dbconfig.php';

	class Db{

		protected $connection;

		protected $host = 'localhost';
		protected $user = 'root';
		protected $password = '';
		protected $dbName = 'analisis';

		function connect(){

			//Creacion de nuevo objetopara obtener los parametros de la bd
			//$dbPara = new Dbconfig();

			$this->connection = mysqli($this->host, $this->user, $this->password, $this->dbName);

			if (!$this->connection) {
		    	die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
			}else{
				return $this->connection;
			}
		}

		function disconnect($conn){

			$mysqli->close();

		}

	}

?>
