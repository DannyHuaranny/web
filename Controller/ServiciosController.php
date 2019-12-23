<?php 
//Llamada al modelo
require_once("Model/ServiciosModel.php");
require_once("Model/DetalleServiciosModel.php");
require_once("Model/ClientesModel.php");
Class ServiciosController{
    private $model;
    private $detalle_model;
    private $cliente_model;

    public function __construct(){
$this->model=new ServiciosModel;
$this->detalle_model=new DetalleServiciosModel;
$this->cliente_model=new ClientesModel;
    }
//Llamada a la vista



public function verServicios(){
    
$datos=$this->model->ver();
// $this->model->paginacion();
require_once("Views/servicios/view.php");
}

public function addServicios(){
    
    $datos=$this->model->lista_equipos();
    $datos_tipo_serv=$this->model->lista_tipo_servicio();
    $datos_articulos=$this->model->lista_articulos();
    $marca_equipos=$this->model->lista_marca_equipo();
    require_once("Views/servicios/create.php");
    }

    public function Detallar(){
        // recibir el id enviado en el formulario

       $idservicio=$_REQUEST['id'];
       // enviar id al modelo
            $datos=$this->model->ver_editar($idservicio);
                          
        require_once("Views/servicios/details.php");     
        }

    public function Crear(){
try {
    //code...
$this->model->con->beginTransaction();
       
        $cliente= new ClientesModel();
        $cliente->nombre_cliente=$_REQUEST['nombre_cliente'];
        $cliente->razon_social=$_REQUEST['razon_social'];
        $cliente->tipo_doc=$_REQUEST['tipo_doc'];
        $cliente->num_doc=$_REQUEST['num_doc'];
        $cliente->direccion=$_REQUEST['direccion'];
        $cliente->celular_empresa=$_REQUEST['celular_empresa'];
        $cliente->celular_representante=$_REQUEST['celular_representante'];
        $cliente->correo=$_REQUEST['correo'];
        $LastIdCliente=$this->cliente_model->crear($cliente);

        $servicios = new ServiciosModel();
        $servicios->descripcion_servicio = $_REQUEST['descripcion_servicio'];
        $servicios->idusuario = $_REQUEST['idusuario'];
        $servicios->idcliente = $LastIdCliente;
        $servicios->fecha = $_REQUEST['fecha'];
        $servicios->condicion_servicio = $_REQUEST['cond_servicio'];
        $LastId=$this->model->crear($servicios);
        
        //Insertar Detalles '$d'
        $didequipo=$_REQUEST['idequipo'];            
        $dcod_servicio=$_REQUEST['cod_servicio'];
        // $dcant_servicio=$_REQUEST['cant_servicio'];
        $dcosto_servicio=$_REQUEST['costo_servicio'];
         $dmarca_equipo=$_REQUEST['marca_equipo'];
         $dserie=$_REQUEST['serie'];
        $ddescripcion=$_REQUEST['descripcion_detalle'];
        $dproblema_equipo=$_REQUEST['problema_equipo'];
        $dsolucion_equipo=$_REQUEST['solucion_equipo'];
        
             //Insertar Detalle Accesorios '$dac'
        $dacaccesorio=$_REQUEST['accesorio'];
        $dacmarca=$_REQUEST['marca'];
        $dacmodelo=$_REQUEST['modelo'];
        $dacdescripcion=$_REQUEST['descripcion_accesorio'];
        
              //Insertar Detalle Articulos Servicio '$das'
        $dasidarticulo=$_REQUEST['idarticulo'];
        $dascodarticulo=$_REQUEST['cod_articulo'];
        $dascant_articulo=$_REQUEST['cant_articulo'];
        $dascosto_articulo=$_REQUEST['costo_articulo'];
        

        $cont=0;

        while($cont < count($didequipo)){
            //Insertar detalle Servicio
            $detalle=new DetalleServiciosModel();
            $detalle->idservicio=$LastId;
            $detalle->idequipo=$didequipo[$cont];
            $detalle->cod_servicio=$dcod_servicio[$cont];
            // $detalle->cant_servicio=$dcant_servicio[$cont];
            $detalle->costo_servicio=$dcosto_servicio[$cont];
            $detalle->descripcion_detalle=$ddescripcion[$cont];
            $detalle->marca_equipo=$dmarca_equipo[$cont];
            $detalle->serie=$dserie[$cont];
            $detalle->problema_equipo=$dproblema_equipo[$cont];
            $detalle->solucion_equipo=$dsolucion_equipo[$cont];
            $this->detalle_model->crear($detalle);
            
            $cont=$cont+1;
           
        }

        $cont_ac=0;
        while($cont_ac < count($dacaccesorio)){

            //Insertar Accesorios Equipo
            $detalle_accesorios=new DetalleServiciosModel();
            $detalle_accesorios->idservicio=$LastId;
            $detalle_accesorios->accesorio=$dacaccesorio[$cont_ac];
            $detalle_accesorios->marca=$dacmarca[$cont_ac];
            $detalle_accesorios->modelo=$dacmodelo[$cont_ac];
            $detalle_accesorios->descripcion_accesorio=$dacdescripcion[$cont_ac];
            $this->detalle_model->add_accesorios($detalle_accesorios);
            $cont_ac=$cont_ac+1;
        }

        $cont_art=0;
        while($cont_art < count($dasidarticulo)){
            //Insertar Articulos Servicio
            $articulos_servicio=new DetalleServiciosModel();
            $articulos_servicio->idservicio=$LastId;
            $articulos_servicio->cod_articulo=$dascodarticulo[$cont_art];
            $articulos_servicio->cant_articulo=$dascant_articulo[$cont_art];
            $articulos_servicio->costo_articulo=$dascosto_articulo[$cont_art];
            $this->detalle_model->add_articulos($articulos_servicio);
            $cont_art=$cont_art+1;
        }

        $this->model->con->commit();
    } catch (\Throwable $e) {
        die($e->getMessage());
        $this->model->con->rollback();
    }
       header('Location: ?c=Servicios&a=verServicios');


        }

        public function Eliminar(){

            $idcliente=$_REQUEST['id'];
            $this->model->eliminar($idcliente);
           
            //Redireccionar
            header('Location: index.php');
            }

         

            public function Editar(){

                $cliente = new ClientesModel();
        
                $cliente->nombre_cliente = $_REQUEST['nombre_cliente'];
                $cliente->tipo_doc = $_REQUEST['tipo_doc'];
                $cliente->num_doc = $_REQUEST['num_doc'];
                $cliente->direccion = $_REQUEST['direccion'];
                $cliente->celular = $_REQUEST['celular'];  
                $cliente->correo = $_REQUEST['correo'];  
                $cliente->id = $_REQUEST['id'];   
                $this->model->editar($cliente);
                //Redireccionar
                header('Location: index.php');
                               
                }

                public function DatosReniec(){
            require 'simple_html_dom.php';
            $dni=$_REQUEST['fNumDoc'];
            $this->model->datos_reniec($dni);
           
            //Redireccionar

           // header('Location: index.php');
            }

                 public function DatosSunat(){
         
            $ruc=$_REQUEST['fNumDoc'];
            $this->model->datos_sunat($ruc);
           
            //Redireccionar
           
           // header('Location: index.php');
            }

            

           

}



?>