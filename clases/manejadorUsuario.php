<?php

require_once 'class.conexion.php';
require_once 'class.usuario.php';

class ManejadorUsuario extends mysqli{


   
   public function obtenerUsuario($idUsuario){
    try{
        $conn = conexion::getInstance();
        $stmn = "SELECT * from usuario WHERE ID_usuario = $idUsuario";
        $resultado = $conn->execQuery($stmn);
        
        while($user = $resultado->fetch_assoc()){
             //crea un objeto usuario
             $us = new Usuario();
             $us->setIdUsuario($user['ID_usuario']);
             $us->setDepartamento($user['departamento']);
             $us->setNombre($user['nombre']);
             $us->setCorreo($user['correo']);
             $us->setPassword($user['password']);
             $us->setRol($user['ID_rol']);
             //se a;ade el objeto usuario a la coleccion de objetos ticket
             

        }
        //se cierra la conexion
        $conn = null;
        return $us;
        
    }catch(exeption $e){
        die("Error :". $e->getMessage());
    }
    
}




}
?>
    