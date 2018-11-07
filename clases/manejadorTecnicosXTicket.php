<?php

require_once 'class.conexion.php';
require_once 'class.ticket.php';
require_once 'class.usuario.php';

class ManejadorTecnicosXTicket extends mysqli{

    public function insertarTecnico(Ticket $t, Usuario $u){
        try{
            
            $conn = conexion::getInstance();

            $idUsuario = $u->getIdUsuario();            
            $idTicket = $t->getIdTicket();

            $stmn = "INSERT INTO tecnicosxticket(ID_usuario, ID_ticket, created_date, created_by) VALUES('".$idUsuario."', '".$idTicket."', SYSDATE(), USER())";
                       
            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        

    
    }
}


?> 
