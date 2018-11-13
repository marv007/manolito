 <?php 
 session_start(); 

 if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
  }

  require 'clases/manejadorTicket.php';
  
 
  //Se usa el manejador ticket para ir a traer un tiquet especifico
  $mt = new ManejadorTicket();

  
  $ticket = $mt->obtenerTicket($_GET['id']);


  //eliminar ticket
  $mt->eliminarTicket($ticket);

  

  header("Location: dashboard.php");
?>



