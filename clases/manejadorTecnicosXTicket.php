<?php

require_once 'class.conexion.php';
require_once 'class.ticket.php';
require_once 'class.usuario.php';

class ManejadorTecnicosXTicket extends mysqli{

    public function insertarTecnico($idTicket, $idUsuario){
        try{
            
            $conn = conexion::getInstance();

            $stmn = "INSERT INTO tecnicosxticket(ID_usuario, ID_ticket, created_date, created_by) VALUES('".$idUsuario."', '".$idTicket."', SYSDATE(), USER())";
                       
            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        

    
    }

    public function obtenerTecxticket($idTicket){
        try{
            $conn = conexion::getInstance();
            $stmn = "SELECT * from tecnicosxticket WHERE ID_ticket = $idTicket";
            $resultado = $conn->execQuery($stmn);
            $tk = new Ticket();
            while($ticket = $resultado->fetch_assoc()){
                 //crea un objeto ticket
                 
                 $tk->setIdTicket($ticket['ID_ticket']);
                 $tk->setIdUsuario($ticket['ID_usuario']);
                 
                 //se a;ade el objeto ticket a la coleccion de objetos ticket
                 

            }
            //se cierra la conexion
            $conn = null;
            return $tk;
            
        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        
    }


}


?> 