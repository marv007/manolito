<?php
require_once 'class.conexion.php';
require_once 'class.archivo.php';

class ManejadorArchivo extends mysqli{
    
    
    public function insertarArchivo(Archivo $a){
        try{
            
            $conn = conexion::getInstance();

            $idArchivo = $a->getIdArchivo();
            $nombreArchivo = $a->getNombreArchivo();
            $rutaArchivo = $a->getRutaArchivo();
            
            //
            $stmn = "INSERT INTO archivo(ID_archivo, nombre, ruta) values('".$idArchivo."','".$nombreArchivo."', '".$rutaArchivo."')";
            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        

    
    }

    public function obtenerArchivo(){
        try{
            $conn = conexion::getInstance();
            $stmn = "SELECT * from documento";
            $resultado = $conn->execQuery($stmn);
            $Doc = array();
            while($docum = $resultado->fetch_assoc()){
                 //crea un objeto ticket
                 $dc = new Documento();
                 $dc->setIdDocumento($docum['ID_archivo']);
                 $dc->setNombreDocumento($docum['nombre']);
                 $dc->setProblema($docum['ruta']);
                 
                 //se a;ade el objeto documento a la coleccion de objetos Doc
                 array_push($Doc, $dc);

            }
            //se cierra la conexion
            $conn = null;
            return $Doc;
            
        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        
    }

    public function obtenerId(){
        try{ 
            $conn = conexion::getInstance();
            $stmn = "SELECT ID_archivo from archivo order by ID_archivo desc limit 1 ";
            $resultado = $conn->execQuery($stmn);
            $ID = $resultado->fetch_assoc();
            $id = $ID['ID_archivo'];
            return $id;
        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }

    }
}

?>