<?php 
//Llamada al modelo
require_once("Model/TipoMovModel.php");


Class TipoMovController{
    private $model;

    public function __construct(){
$this->model=new TipoMovModel;
    }
//Llamada a la vista



public function View(){
    
$datos=$this->model->ver();
// $this->model->paginacion();
require_once("Views/tipo_mov/view.php");
}

public function Create(){
    
    
    require_once("Views/tipo_mov/create.php");
    }

    public function Update(){
        // recibir el id enviado en el formulario

       $id=$_REQUEST['id'];
       // enviar id al modelo
            $datos=$this->model->ver_editar($id);      
        require_once("Views/tipo_mov/update.php");                      
        }

    public function Crear(){

        $tipo_movimiento = new TipoMovModel();
        
        $tipo_movimiento->nom_mov = $_REQUEST['nom_mov'];
         $tipo_movimiento->tipo_mov = $_REQUEST['tipo_mov'];
       
   
        $this->model->crear($tipo_movimiento);
        //Redireccionar
        header('Location: ?c=TipoMov&a=View');
        }

        public function Eliminar(){

            $idcliente=$_REQUEST['id'];
            $this->model->eliminar($idcliente);
           
            //Redireccionar
            header('Location: ?c=TipoMov&a=View');
            }

         

            public function Editar(){

                $tipo_movimiento = new TipoMovModel();
        
                $tipo_movimiento->nom_mov = $_REQUEST['nom_mov'];
                $tipo_movimiento->tipo_mov = $_REQUEST['tipo_mov'];
                $tipo_movimiento->id = $_REQUEST['id'];
                $this->model->editar($tipo_movimiento);
                //Redireccionar
                header('Location: ?c=TipoMov&a=View');
                               
                }

              

}



?>