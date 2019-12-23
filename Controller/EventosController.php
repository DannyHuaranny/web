<?php 
//Llamada al modelo
require_once("Model/EventosModel.php");


Class EventosController{
    private $model;

    public function __construct(){
$this->model=new EventosModel;
    }
//Llamada a la vista



public function View(){
    
$datos=$this->model->ver();
// $this->model->paginacion();
require_once("Views/eventos.php");
}

public function Create(){
    
    
    require_once("Views/eventos/create.php");
    }

    public function Update(){
        // recibir el id enviado en el formulario

       $id=$_REQUEST['id'];
       // enviar id al modelo
            $datos=$this->model->ver_editar($id);      
        require_once("Views/eventos/update.php");                      
        }

    public function Crear(){

        $eventosimiento = new EventosModel();
        
        $eventosimiento->nom_mov = $_REQUEST['nom_mov'];
         $eventosimiento->eventos = $_REQUEST['eventos'];
       
   
        $this->model->crear($eventosimiento);
        //Redireccionar
        header('Location: ?c=Eventos&a=View');
        }

        public function Eliminar(){

            $idcliente=$_REQUEST['id'];
            $this->model->eliminar($idcliente);
           
            //Redireccionar
            header('Location: ?c=Eventos&a=View');
            }

         

            public function Editar(){

                $eventosimiento = new EventosModel();
        
                $eventosimiento->nom_mov = $_REQUEST['nom_mov'];
                $eventosimiento->eventos = $_REQUEST['eventos'];
                $eventosimiento->id = $_REQUEST['id'];
                $this->model->editar($eventosimiento);
                //Redireccionar
                header('Location: ?c=Eventos&a=View');
                               
                }

              

}



?>