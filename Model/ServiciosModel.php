<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	 require_once('Connection.php');
	// Heredar la conexión
	class ServiciosModel extends Conexion {
		private $servicios;

	//	public $iddetalle_servicio;
		public $id;
		public $dni;
		public $ruc;
		public $descripcion_servicio;
		public $idusuario;
		public $idcliente;
		public $fecha;
		public $condicion_servicio;
		 public $ultimoid;
	
		// public $idequipo;
		// public $descripcion;
		// public $problema_equipo;
		// public $solucion_equipo;
		// public $estado_equipo;

		function __construct(){
			$this->connect_db();

			$this->servicios=array();

		}
		//Conexión a la BD
		public function connect_db(){
			$this->con = new PDO('mysql:host=localhost;dbname=dbsoporte_centecp', "root", "");
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		//Funciones
		public function validar_datos($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}

	// 	public function paginacion(){
	// echo "<h1>lala</h1>";
	// 	}
		public function crear(ServiciosModel $datos){
			try {
				//$this->con->beginTransaction();
				$sql = "INSERT INTO `servicio` (DESCRIPCION, IDUSUARIO,IDCLIENTE,FECHA,CONDICION_SERVICIO,ESTADO) 
				VALUES (?,?,?,?,?,'A')";

				$this->con->prepare($sql)
				->execute(
				   array(
						$datos->descripcion_servicio, 
					   $datos->idusuario,
					   $datos->idcliente, 
					   $datos->fecha, 
					   $datos->condicion_servicio, 
						
					  
				   )
			   );

			 $LastId= $this->con->lastInsertId();
			 return $LastId;
			// $datos->ultimoid;
			// ->con->lastInsertId();
			} catch (Exception $e) {
				die($e->getMessage());
			}
			
		}
		public function ver(){
			$sql = "SELECT s.IDSERVICIO,s.CONDICION_SERVICIO,c.NOMBRE_CONDICION,s.IDCLIENTE,cli.NOMBRE_CLIENTE,cli.CELULAR_REPRESENTANTE,cli.CORREO,cli.DIRECCION,cli.TIPO_DOC,cli.NUM_DOC,s.IDUSUARIO,s.FECHA FROM servicio s join CONDICION_SERVICIO c on s.CONDICION_SERVICIO=c.NOMBRE_CONDICION JOIN clientes cli ON s.IDCLIENTE=cli.IDCLIENTE where s.estado='A'  order by s.IDSERVICIO desc";
			

			foreach ($this->con->query($sql) as $filas) {
				$this->servicios[] = $filas;
			}
			
			return $this->servicios;
		}
		
		//Declarar las variables a utilizar
		public function ver_editar($id){
			// utilizar la variable $id en la consulta SQL
			// $sql = "SELECT ID,IDSERVICIO,CODIGO,DESCRIPCION_ITEM,UNIDAD_MEDIDA,CANTIDAD,COSTO,ESTADO FROM tabla_servicios where idservicio=$id";

			/*$sql="SELECT ts.ID as ID,ts.IDSERVICIO as IDSERVICIO,@idc:=ts.CODIGO as CODIGO, IF(ts.TIPO_ITEM='ARTICULO',(SELECT a.NOM_ARTICULO from articulos a  where a.CODIGO =@idc  ),(SELECT tps.NOMBRE_TIPO from tipo_servicio tps  where tps.COD_TIPO =@idc  ))AS DESCRIPCION_ITEM,ts.UNIDAD_MEDIDA as UNIDAD_MEDIDA, ts.CANTIDAD as CANTIDAD,ts.COSTO as COSTO,ts.ESTADO FROM tabla_servicios ts  where idservicio=$id";*/

			$sql="SELECT ts.ID as ID,ts.IDSERVICIO as IDSERVICIO,@idc:=ts.CODIGO as CODIGO, IF(ts.TIPO_ITEM='ARTICULO',(SELECT a.NOM_ARTICULO from articulos a where a.CODIGO =@idc ),(SELECT tps.NOMBRE_TIPO from tipo_servicio tps where tps.COD_TIPO =@idc ))AS DESCRIPCION_ITEM,ts.UNIDAD_MEDIDA as UNIDAD_MEDIDA, ts.CANTIDAD as CANTIDAD,ts.COSTO as COSTO,ts.ESTADO,cli.NOMBRE_CLIENTE,cli.TIPO_DOC,cli.DIRECCION,cli.CORREO,cli.NUM_DOC FROM tabla_servicios ts join servicio s on ts.IDSERVICIO=s.IDSERVICIO join clientes cli on s.IDCLIENTE=cli.IDCLIENTE where ts.idservicio=$id";
			 foreach ($this->con->query($sql) as $filas) {
					$this->servicios[] = $filas;
					}
		
				
				
			return $this->servicios;
		
				
		}
		public function editar( $datos){
			try {
				//code...
			
			$sql = "UPDATE clientes SET NOMBRE_CLIENTE=?,TIPO_DOC=?,NUM_DOC=?,DIRECCION=?,CELULAR=?,CORREO=? WHERE IDCLIENTE=?";
			
			$this->con->prepare($sql)
			->execute(
			   array(
					$datos->nombre_cliente, 
				   $datos->tipo_doc,
				   $datos->num_doc, 
				   $datos->direccion, 
					$datos->celular,
					$datos->correo, 
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
				
			$sql = "UPDATE clientes SET ESTADO='I' WHERE IDCLIENTE=$id";
			
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

public function lista_articulos(){
			$sql = "SELECT IDARTICULO,NOM_ARTICULO,PRECIO_VENTA,STOCK,CODIGO FROM articulos";
			foreach ($this->con->query($sql) as $filas) {
				$this->servicio_articulos[] = $filas;
			}
			
			return $this->servicio_articulos;
		}

		public function lista_equipos(){
			$sql = "SELECT IDEQUIPO,NOMBRE_EQUIPO FROM equipos";
			foreach ($this->con->query($sql) as $filas) {
				$this->servicios_equipos[] = $filas;
			}
			
			return $this->servicios_equipos;
		}

		public function lista_tipo_servicio(){
			$sql = "SELECT IDTIPO_SERVICIO,NOMBRE_TIPO,COD_TIPO FROM tipo_servicio";
			foreach ($this->con->query($sql) as $filas) {
				$this->servicios_tipo[] = $filas;
			}
			
			return $this->servicios_tipo;
		}

			public function lista_marca_equipo(){
			$sql = "SELECT IDMARCA_EQUIPO,NOMBRE FROM marca_equipo";
			foreach ($this->con->query($sql) as $filas) {
				$this->marca_equipo[] = $filas;
			}
			
			return $this->marca_equipo;
		}

		public function datos_reniec($dni){

error_reporting(E_ALL ^ E_NOTICE);
 			$consulta = file_get_html('http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI='.$dni)->plaintext;
 
 //LA LOGICA DE LA PAGINAS ES APELLIDO PATERNO | APELLIDO MATERNO | NOMBRES
 
 $partes = explode("|", $consulta);
 
 $datos = array(
 0 => $dni,
 1 => $partes[0],
 2 => $partes[1],
 3 => $partes[2],
 );
 
 $apaterno= $datos[1];
 $amaterno=$datos[2];
 $nombres=$datos[3];

echo json_encode($datos);
//echo $apaterno . " " . $amaterno  . " " . $nombres;
		}


				public function datos_sunat($ruc){

error_reporting(E_ALL ^ E_NOTICE);
//$ruc = $_POST['ruc'];
$data = file_get_contents("https://api.sunat.cloud/ruc/".$ruc);
$info = json_decode($data, true);
 
if($data==='[]' || $info['fecha_inscripcion']==='--'){
	$datos = array(0 => 'nada');
	echo json_encode($datos);
}else{
$datos = array(
	0 => $info['ruc'], 
	1 => $info['razon_social'],
	2 => date("d/m/Y", strtotime($info['fecha_actividad'])),
	3 => $info['contribuyente_condicion'],
	4 => $info['contribuyente_tipo'],
	5 => $info['contribuyente_estado'],
	6 => date("d/m/Y", strtotime($info['fecha_inscripcion'])),
	7 => $info['domicilio_fiscal'],
	8 => date("d/m/Y", strtotime($info['emision_electronica']))
);
	echo json_encode($datos);
}
		}

		

	}
	
	

?>