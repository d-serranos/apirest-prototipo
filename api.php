<?php 

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include $_SERVER['DOCUMENT_ROOT'] . '/apps/api_ingresos/sap/functions.php';

    class  Api extends Rest
    {
        public $dbConn;

		public function __construct(){

			parent::__construct();

			$db = new Db();
			$this->dbConn = $db->connect();

        }

        public function login(){
            $usuario = $this->param['usuario'];
            $password =  $this->param['password'];

            $query = "SELECT * FROM usuario
                        WHERE usuario = '$usuario' 
                       AND password = md5('$password')";

            $stid = $mysqli->query($this->dbConn, $query);

            

            if($stid){
                $result['resultado'] = 'S';
                $this->returnResponse(SUCCESS_RESPONSE, $result);
            }else{
                $result['resultado'] = 'N';
                $this->returnResponse(REQUEST_NOT_VALID, $result);
            }
            
        }


    }
    

?>