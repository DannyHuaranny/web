<?php

	 require_once('Connection.php');
	// Heredar la conexión
	class IndexModel extends Conexion {
		private $listado;

		
		


		function __construct(){
			$this->connect_db();

			$this->listado=array();

		}
		//Conexión a la BD
		public function connect_db(){
		
		}
	
		public function ver(){
			
		}

	}
	
	

?>