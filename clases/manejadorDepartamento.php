<?php

require_once 'class.conexion.php';
require_once 'class.departamento.php';

class ManejadorDepartamento extends mysqli {

    public function obtenerDepartamento($idDepartamento){
        try{
            $conn = conexion::getInstance();
            $stmn = "SELECT * from departamento WHERE ID_departamento = $idDepartamento";
            $resultado = $conn->execQuery($stmn);
            
            while($departamento = $resultado->fetch_assoc()){
                 //crea un objeto usuario
                 $dep = new Departamento();
                 $dep->setIdDepartamento($departamento['ID_departamento']);                 
                 $dep->setNombre($departamento['nombre']);
                 
                 //se a;ade el objeto usuario a la coleccion de objetos ticket
                 
    
            }
            //se cierra la conexion
            $conn = null;
            return $dep;
            
        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        
    }
}

?>
