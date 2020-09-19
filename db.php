<?php

	class Db{

		protected $link;

		protected $host = "localhost";
		protected $user = "root";
		protected $password = "";
		protected $dbName = "analisis";

		function connect(){
	
			//Creacion de nuevo objetopara obtener los parametros de la bd
			//$dbPara = new Dbconfig();

			$this->link = new mysqli($this->host, $this->user, $this->password, $this->dbName);

					if ($this->link->connect_errno) {
						echo "Fallo al conextar a MySql: ". $this->link->connect_error;
						return;
					}else{
						$this->link->set_charset("uft8");
    
						return $this->link;
	
					}
		
	}

}

?>