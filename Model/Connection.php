<?php
 class Conexion 
{
public $con;
public $dbhost="localhost";
public $dbuser="root";
public $dbpass="";
public $dbname="dbsoporte_centecp";
}

//  function connect_db(){
//     $this->con = new PDO('mysql:host=localhost;dbname=dbsoporte_centecp', "root", "");
//     if(mysqli_connect_error()){
//         die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
//     }
// }


?>