<?php

	 require_once('Connection.php');
	// Heredar la conexión
	class IndexModel extends Conexion {
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
			/*$this->con = new PDO('mysql:host=localhost;dbname=db_ugelweb', "root", "");
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}*/
		}
	
		public function ver(){
			$sql = "SELECT * FROM eventos where ESTADO='A'";
			

			foreach ($this->con->query($sql) as $filas) {
				$this->listado[] = $filas;
			}
			
			return $this->listado;
		}

	}
	
	

?>