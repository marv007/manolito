<?php

require_once 'class.conexion.php';
require_once 'class.usuario.php';

class ManejadorUsuario extends mysqli{


   
   public function obtenerUsuario($idUsuario){
    try{
        $conn = conexion::getInstance();
        $stmn = "SELECT * from usuario WHERE ID_usuario = $idUsuario";
        $resultado = $conn->execQuery($stmn);
        
        $us = new Usuario();
        while($user = $resultado->fetch_assoc()){
             //crea un objeto usuario
             
             $us->setIdUsuario($user['ID_usuario']);
             $us->setDepartamento($user['ID_departamento']);
             $us->setNombre($user['nombre']);
             $us->setCorreo($user['correo']);
             $us->setPassword($user['password']);
             $us->setRol($user['ID_rol']);
             
             

        }
        //se cierra la conexion
        $conn = null;
        return $us;
        
    }catch(exeption $e){
        die("Error :". $e->getMessage());
    }
    
}


public function obtenerTecnicos(){
    try{
        $conn = conexion::getInstance();
        $stmn = "SELECT * from usuario WHERE ID_rol = 2";
        $resultado = $conn->execQuery($stmn);
        $Usuario = array();
        while($user = $resultado->fetch_assoc()){
             //crea un objeto usuario
             $us = new Usuario();
             $us->setIdUsuario($user['ID_usuario']);
             $us->setDepartamento($user['ID_departamento']);
             $us->setNombre($user['nombre']);
             $us->setCorreo($user['correo']);
             $us->setPassword($user['password']);
             $us->setRol($user['ID_rol']);
             //se a;ade el objeto usuario a la coleccion de objetos ticket
             array_push($Usuario, $us);

        }
        //se cierra la conexion
        $conn = null;
        return $Usuario;
        
    }catch(exeption $e){
        die("Error :". $e->getMessage());
    }
    
}



}
?>
    