<?php
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: index.php");
}

  require 'clases/manejadorTicket.php';
  require 'clases/manejadorDepartamento.php';
  require 'clases/manejadorUsuario.php';
  require 'clases/manejadorTecnicosXTicket.php';

  $tk = new ManejadorTicket();
  $md = new ManejadorDepartamento();
  $mtxt = new manejadorTecnicosXTicket();

  $arrTicket = array(); 

  $arrTicket = $tk->obtenerTickett($_SESSION['idUsuario']);
  
  //Arreglo con todos los tickets
  

  //Arreglo de solucionados
  $arrRes = array();

  //Arreglo de pendientes
  $arrPen = array();
  $arrProc = array();

  $sit = array();

  $contador = count($arrTicket);
  $contPendientes = 0;
  $contResueltos =0;
  $contProc = 0;
  $i = 0;
  while($i < count($arrTicket)){
      $sit = $mtxt->obtenerTecxticket($arrTicket[$i]->getIdTicket());
     
      

      if($arrTicket[$i]->getEstado()=="Solucionado"){
      
      $arrRes[] = $arrTicket[$i];
      $contResueltos++;
      }else if($sit->getIdTicket()==""){
          $arrPen[] = $arrTicket[$i];
          $contPendientes++;

      }else{
          $arrProc[] = $arrTicket[$i];
          $contProc++;
      }
      $i++;
  }

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vista Tickets</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/icons/lista.png"/>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php include "inc/navBar.php"; ?>

    
    
    <div class="limiter">
            
     
        
        
        <div class="container" style="color:white">
        <br>
        <h3>Mis Tickets<a class = "pull-right" style="color:white" href="ticket.php">Nuevo Ticket</a></h3>
        <p class="pull-right text-primary">
                  <strong style="color:white">
                  <?php include "inc/timezone.php"; ?>
                 </strong>
               </p>
        </div>
         <!--Contenido pestañas-->
         <div class="container" style="background-color: #eaedfa; color:black">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified" >
                    <li class="active"><a href="#ticketsp" data-toggle="tab"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Tickets pendientes&nbsp;&nbsp; <span class="badge" style="background-color:#f55210"><?php echo $contPendientes?></span></a></li>
                        <li><a href="#ticketsproc" data-toggle="tab"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Tickets en proceso&nbsp;&nbsp;<span class="badge" style="background-color: #f7822c"><?php echo $contProc?></span></a></li>
                        <li><a href="#ticketsre" data-toggle="tab"><i class="fa fa-thumbs-o-up"></i>&nbsp;&nbsp;Tickets resueltos&nbsp;&nbsp; <?php $_SESSION['tabla']=="resuelto"?><span class="badge" style="background-color:  #6ada13"><?php echo $contResueltos?></span></a></li>
                        <li><a href="#ticketsall" data-toggle="tab"><i class="fa fa-list" ></i>&nbsp;&nbsp;Todos mis tickets&nbsp;&nbsp; <?php $_SESSION['tabla']=="todos"?><span class="badge" style="background-color:#3498db"><?php echo $contador?></span></a></li>                        
                         
                    </ul>
                </div>
            </div>
            

            <div class="tab-content" style= "max-height: 73vh; overflow: auto; padding:0px; overflow-x: hidden;">
                
                <div class="tab-pane active" id="ticketsp">
                    <div class="row">
                        <div class="col-md-12">
                        
                            <?php 
                               
                               include "inc/TablaPenU.php";
                                
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="ticketsall">  
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                
                                include "inc/TablaAllsU.php";
                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="ticketsproc">  
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                
                             include "inc/TablaProcU.php";
                
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="ticketsre">  
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                
                                include "inc/TablaResU.php";
                
                            ?>
                        </div>
                    </div>
                </div>
                
                
                
                
                
            </div>

                    
          </div>
          
          

      
    </div>

   
  

      
  <!--
      <footer class="footer">
        <p>&copy; Manolito 2018</p>
      </footer>
      -->
    </div> <!-- /container -->       
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>
