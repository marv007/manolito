<?php

require_once 'class.conexion.php';
require_once 'class.ticket.php';

class ManejadorTicket extends mysqli{
    
    
    public function insertarTicket(Ticket $t){
        try{
            
            $conn = conexion::getInstance();

            

            $idUsuario = $t->getIdUsuario();
            $asunto = $t->getAsunto();
            $problema = $t->getProblema();
            $solucion = $t->getSolucion();
            $fechaInicio = $t->getFechaInicio();
            $fechaFinal = $t->getFechaFinal();
            $estado = $t->getEstado();
            $prioridad = $t->getPrioridad();
            $idArchivo = $t->getIdArchivo();

            
            //
            if($idArchivo == NULL){
                $stmn = "INSERT INTO ticket(ID_usuario, asunto, problema, solucion, fechaInicio, estado, prioridad, ID_archivo, created_date, created_by) VALUES('".$idUsuario."', '".$asunto."', '".$problema."', '".$solucion."', '".$fechaInicio."', '".$estado."', '".$prioridad."', NULL, SYSDATE(), USER())";
            }else{
                $stmn = "INSERT INTO ticket(ID_usuario, asunto, problema, solucion, fechaInicio, estado, prioridad, ID_archivo, created_date, created_by) VALUES('".$idUsuario."', '".$asunto."', '".$problema."', '".$solucion."', '".$fechaInicio."', '".$estado."', '".$prioridad."', '".$idArchivo."', SYSDATE(), USER())";
            }
            
            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        

    
    }

    public function obtenerTickets(){
        try{
            $conn = conexion::getInstance();
            $stmn = "SELECT * from ticket WHERE status = 'active'";
            $resultado = $conn->execQuery($stmn);
            $Ticket = array();
            while($ticket = $resultado->fetch_assoc()){
                 //crea un objeto ticket
                 $tk = new Ticket();
                 $tk->setIdUsuario($ticket['ID_usuario']);
                 $tk->setIdTicket($ticket['ID_ticket']);
                 $tk->setAsunto($ticket['asunto']);
                 $tk->setProblema($ticket['problema']);
                 $tk->setSolucion($ticket['solucion']);
                     $time = strtotime($ticket['fechaInicio']);
                     $myFormater = date("d/m/Y g:i A", $time);
                 $tk->setFechaInicio($myFormater);
                 $tk->setFechaFinal($ticket['fechaFinal']);
                 $tk->setEstado($ticket['estado']);
                 $tk->setPrioridad($ticket['prioridad']);
                 //se a;ade el objeto ticket a la coleccion de objetos ticket
                 array_push($Ticket, $tk);

            }
            //se cierra la conexion
            $conn = null;
            return $Ticket;
            
        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        
    }

    //////////////////////////////////////////////////////
    public function obtenerTicket($idTicket){
        try{
            $conn = conexion::getInstance();
            $stmn = "SELECT * from ticket WHERE ID_ticket = $idTicket";
            $resultado = $conn->execQuery($stmn);
            
            while($ticket = $resultado->fetch_assoc()){
                 //crea un objeto ticket
                 $tk = new Ticket();
                 $tk->setIdTicket($ticket['ID_ticket']);
                 $tk->setIdUsuario($ticket['ID_usuario']);
                 $tk->setAsunto($ticket['asunto']);
                 $tk->setProblema($ticket['problema']);
                 $tk->setSolucion($ticket['solucion']);
                     $time = strtotime($ticket['fechaInicio']);
                     $myFormater = date("d/m/Y g:i A", $time);
                 $tk->setFechaInicio($myFormater);
                 $tk->setFechaFinal($ticket['fechaFinal']);
                 $tk->setEstado($ticket['estado']);
                 $tk->setPrioridad($ticket['prioridad']);
                 //se a;ade el objeto ticket a la coleccion de objetos ticket
                 

            }
            //se cierra la conexion
            $conn = null;
            return $tk;
            
        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        
    }

    //////////////////////////////////////////////////////

    public function obtenerTickett($idUsuario){
        try{
            $conn = conexion::getInstance();
            $stmn = "SELECT * from ticket WHERE status = 'active' AND ID_usuario= $idUsuario";
            $resultado = $conn->execQuery($stmn);
            $Ticket = array();
            while($ticket = $resultado->fetch_assoc()){
                 //crea un objeto ticket
                 $tk = new Ticket();
                 $tk->setIdTicket($ticket['ID_ticket']);
                 $tk->setAsunto($ticket['asunto']);
                 $tk->setProblema($ticket['problema']);
                 $tk->setSolucion($ticket['solucion']);
                     $time = strtotime($ticket['fechaInicio']);
                     $myFormater = date("d/m/Y g:i A", $time);
                 $tk->setFechaInicio($myFormater);
                 $tk->setFechaFinal($ticket['fechaFinal']);
                 $tk->setEstado($ticket['estado']);
                 $tk->setPrioridad($ticket['prioridad']);
                 //se a;ade el objeto ticket a la coleccion de objetos ticket
                 array_push($Ticket, $tk);

            }
            //se cierra la conexion
            $conn = null;
            return $Ticket;
            
        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        
    }
    //////////////////////////////////////////////////////

    public function actualizarTicket($idTicket, $pri){
        try{
            
            $conn = conexion::getInstance();
            $stmn = "UPDATE ticket SET prioridad='$pri' WHERE ID_ticket='$idTicket'";

            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
    }

    public function eliminarTicket(Ticket $t){
        try{
            
            $conn = conexion::getInstance();

            

            $idUsuario = $t->getIdUsuario();
            $asunto = $t->getAsunto();
            $problema = $t->getProblema();
            $solucion = $t->getSolucion();
            $fechaInicio = $t->getFechaInicio();
            $fechaFinal = $t->getFechaFinal();
            $estado = $t->getEstado();
            $prioridad = $t->getPrioridad();
            $idArchivo = $t->getIdArchivo();
            $idTicket = $t->getIdTicket();

            
            //Soft DELETE ticket
            $stmn = "UPDATE ticket SET status = 'deleted' WHERE ID_ticket ='".$idTicket."')";
            $conn->execQuery($stmn);

            //Soft DELETE archivo 
            $stmn = "UPDATE archivo SET status = 'deleted' WHERE ID_archivo ='".$idArchivo."')";
            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
    
    }


}//fin clase
  
?>