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
            $stmn = "INSERT INTO ticket(ID_usuario, asunto, problema, solucion, fechaInicio, estado, prioridad, ID_archivo) values('".$idUsuario."','".$asunto."', '".$problema."', '".$solucion."', '".$fechaInicio."', '".$estado."', '".$prioridad."', '".$idArchivo."')";
            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
        

    
    }

    public function obtenerTicket(){
        try{
            $conn = conexion::getInstance();
            $stmn = "SELECT * from ticket";
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

    public function actualizarTicket(Ticket $t){
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

            

            //$stmn = "INSERT INTO ticket(ID_usuario, asunto, problema, solucion, fechaInicio, estado, prioridad, ID_archivo) values('".$idUsuario."','".$asunto."', '".$problema."', '".$solucion."', '".$fechaInicio."', '".$estado."', '".$prioridad."', '".$idArchivo."')";
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

            

            //$stmn = "INSERT INTO ticket(ID_usuario, asunto, problema, solucion, fechaInicio, estado, prioridad, ID_archivo) values('".$idUsuario."','".$asunto."', '".$problema."', '".$solucion."', '".$fechaInicio."', '".$estado."', '".$prioridad."', '".$idArchivo."')";
            $conn->execQuery($stmn);
            

        }catch(exeption $e){
            die("Error :". $e->getMessage());
        }
    
    }


}//fin clase
  
?>