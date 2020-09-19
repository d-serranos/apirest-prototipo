<?php 

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");


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

            $stid = $this->dbConn->query($query);
            $number = $stid->num_rows;
            $result = array();

            $result = $stid->fetch_array(MYSQLI_ASSOC);

            $stid->free();

            if($number>0){
                $result['resultado'] = 'S';
                $this->returnResponse(SUCCESS_RESPONSE, $result);
            }else{
                $result['resultado'] = 'N';
                $this->returnResponse(REQUEST_NOT_VALID, $result);
            }
            
        }

        public function datosEstudiante() {
            
            $usuario = $this->param['usuario'];
            

            $query = "SELECT name, notas, credito FROM notas WHERE usuario = '$usuario'";
            $stid = $this->dbConn->query($query);
            $number = $stid->num_rows;
            $result = array();

            $total_clases = 0;
            $total_Credito = 0;

            while ($row = $stid->fetch_array(MYSQLI_ASSOC)){
                array_push($result,$row);
                $total_clases += $row['notas'];
                $total_Credito += $row['credito'];
            }

            $stid->free();


            if($number>0){
                $promedio = number_format(($total_clases/$number),2);
                $result['promedio']=$promedio;
                $result['acumulado_credito'] = $total_Credito;
                $result['resultado'] = 'S';
                $this->returnResponse(SUCCESS_RESPONSE, $result);
            }else{
                $result['resultado'] = 'El estudiante no tiene ninguna clase registrada';
                $this->returnResponse(REQUEST_NOT_VALID, $result);
            }

        }


    }
    

?>