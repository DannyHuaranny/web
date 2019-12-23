<?php

	 require_once('Connection.php');
	// Heredar la conexión
	class TipoMovModel extends Conexion {
		private $listado;

		public $id;
		public $nom_mov;
		public $tipo_mov;
		public $estado;
		


		function __construct(){
			$this->connect_db();

			$this->listado=array();

		}
		//Conexión a la BD
		public function connect_db(){
			$this->con = new PDO('mysql:host=localhost;dbname=dbsoporte_centecp', "root", "");
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
	
		public function crear(TipoMovModel $datos){
			try {
				$sql = "INSERT INTO `tipo_movimientos` (NOM_MOV,TIPO_MOV,ESTADO) 
				VALUES (?,?,'A')";

				$this->con->prepare($sql)
				->execute(
				   array(
						$datos->nom_mov, 
						$datos->tipo_mov					  
				   )
			   );
				
			} catch (Exception $e) {
				die($e->getMessage());
			}
			
		}
		public function ver(){
			$sql = "SELECT * FROM tipo_movimientos where ESTADO='A'";
			

			foreach ($this->con->query($sql) as $filas) {
				$this->listado[] = $filas;
			}
			
			return $this->listado;
		}
		
		//Declarar las variables a utilizar
		public function ver_editar($id){
			// utilizar la variable $id en la consulta SQL
			$sql = "SELECT * FROM tipo_movimientos where idtipo_movimiento=$id";
				
			 foreach ($this->con->query($sql) as $filas) {
					$this->listado[] = $filas;
					}
				
			return $this->listado;
		
				
		}



		public function editar($datos){
			try {
				//code...
			
			$sql = "UPDATE tipo_movimientos SET NOM_MOV=?,TIPO_MOV=? WHERE IDTIPO_MOVIMIENTO=?";
			
			$this->con->prepare($sql)
			->execute(
			   array(
					$datos->nom_mov, 
				   $datos->tipo_mov,
				  
				   
					$datos->id 
			   )
		   );
		} catch (Exception $e) {
			die($e->getMessage());
		}
		
	}
		public function eliminar($id){
			try {
	
			// $sql="DELETE FROM clientes WHERE idcliente= $id ";
				
			$sql = "UPDATE tipo_movimientos SET ESTADO='I' WHERE IDTIPO_MOVIMIENTO=$id";
			
			$res = $this->con->query($sql);			          
			
			if($res){
				return true;
			}else{
				return false;
			}
		} 
			catch (Exception $e) {
				die($e->getMessage());
			}
			
		}
	}
	
	

?>