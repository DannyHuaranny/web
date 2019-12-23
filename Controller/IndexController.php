<?php 
//Llamada al modelo
require_once("Model/IndexModel.php");


Class IndexController{
    private $model;

    public function __construct(){
$this->model=new IndexModel;
    }
//Llamada a la vista



public function View(){
    
$datos=$this->model->ver();
// $this->model->paginacion();
require_once("Views/index.php");
}

public function Create(){
    
    
    require_once("Views/Index/create.php");
    }

    public function Update(){
        // recibir el id enviado en el formulario

       $id=$_REQUEST['id'];
       // enviar id al modelo
            $datos=$this->model->ver_editar($id);      
        require_once("Views/Index/update.php");                      
        }

    public function Crear(){

        $Indeximiento = new IndexModel();
        
        $Indeximiento->nom_mov = $_REQUEST['nom_mov'];
         $Indeximiento->Index = $_REQUEST['Index'];
       
   
        $this->model->crear($Indeximiento);
        //Redireccionar
        header('Location: ?c=Index&a=View');
        }

        public function Eliminar(){

            $idcliente=$_REQUEST['id'];
            $this->model->eliminar($idcliente);
           
            //Redireccionar
            header('Location: ?c=Index&a=View');
            }

         

            public function Editar(){

                $Indeximiento = new IndexModel();
        
                $Indeximiento->nom_mov = $_REQUEST['nom_mov'];
                $Indeximiento->Index = $_REQUEST['Index'];
                $Indeximiento->id = $_REQUEST['id'];
                $this->model->editar($Indeximiento);
                //Redireccionar
                header('Location: ?c=Index&a=View');
                               
                }

              

}



?>