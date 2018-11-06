<?php
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: index.php");
}

  require 'clases/manejadorTicket.php';

 
//////////////////////////////////////////////////////////

$tk = new ManejadorTicket();
$arrTicket = array();

//Sirve para mostrar las distintas tablas
if(!isset($_SESSION['tabla'])){
    $_SESSION['tabla']="todos";
}


//Arreglo con todos los tickets
$arrTicket = $tk->obtenerTicket();

//Arreglo de solucionados
$arrRes = array();

//Arreglo de pendientes
$arrPen = array();

$contador = count($arrTicket);
$contPendientes = 0;
$contResueltos =0;
$i = 0;
while($i < count($arrTicket)){
    if($arrTicket[$i]->getSolucion()==""){
      $arrPen[] = $arrTicket[$i];
      $contPendientes++;
    }else{
      $arrRes[] = $arrTicket[$i];
      $contResueltos++;
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
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <!--NAVBAR-->
    <?php include "inc/navBar.php"; ?>

    <!-- ENCABEZADO -->
    <div class="container" style="color: white">
          <div class="row">
            <div class="col-sm-12">
              <br>
                <h3>Panel Administrativo</h3>                
                <p class="pull-right text-primary">
                  <strong style="color:white">
                  <?php include "inc/timezone.php"; ?>
                 </strong>
               </p>
            </div>
        </div>
    </div>
    
    <!-- ENCABEZADO 
    <div class="container" style="background-color: white">
          <div class="row">
            <div class="col-sm-2">
              <img src="images/msj.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-10">
              <p class="lead text-info">Bienvenido, aquí se muestran todos los Tickets los cuales podrá eliminar, modificar e imprimir.</p>
            </div>
          </div>
        </div>
           
      MENU TICKETS Y TABLA-->

      
        <div class="container" style="background-color: #eaedfa">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified" >
                        <li class="active"><a href="#ticketsp" data-toggle="tab"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Tickets pendientes&nbsp;&nbsp; <span class="badge" style="background-color:#f55210">0</span></a></li>
                        <li><a href="#ticketsall" data-toggle="tab"><i class="fa fa-list" ></i>&nbsp;&nbsp;Todos los tickets&nbsp;&nbsp; <?php $_SESSION['tabla']=="todos"?><span class="badge" style="background-color:#3498db"><?php echo $contador?></span></a></li>                        
                        <li><a href="#ticketsproc" data-toggle="tab"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Tickets en proceso&nbsp;&nbsp;<span class="badge" style="background-color: #f7822c"><?php echo $contPendientes?></span></a></li>
                        <li><a href="#ticketsre" data-toggle="tab"><i class="fa fa-thumbs-o-up"></i>&nbsp;&nbsp;Tickets resueltos&nbsp;&nbsp; <?php $_SESSION['tabla']=="resuelto"?><span class="badge" style="background-color:  #6ada13"><?php echo $contResueltos?></span></a></li>
                    </ul>
                </div>
            </div>
            

            <div class="tab-content" style= "max-height: 73vh; overflow: auto; padding:0px; overflow-x: hidden;">
                
                <div class="tab-pane active" id="ticketsp">
                    <div class="row">
                        <div class="col-md-12">
                        
                            <?php 
                                //include "inc/TablaPen.php";
                                
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="ticketsall">  
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                
                                include "inc/TablaAlls.php";
                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="ticketsproc">  
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                
                             include "inc/TablaPen.php";
                
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="ticketsre">  
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                
                             include "inc/TablaRes.php";
                
                            ?>
                        </div>
                    </div>
                </div>
                
                
                
            </div><!--contenido de pestañas-->
            
        
        <div class="modal fade" id="miModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Titulo del modal</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                
                </div>
            </div>
        </div>
        </div><!--container principal-->



      
  <!--
      <footer class="footer">
        <p>&copy; Manolito 2018</p>
      </footer>
      -->
       
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>


          <script type=”text/javascript” src="stack/stacktable.js"></script>
<!--===============================================================================================-->
<script type="text/javascript">
$(document).ready(function() {
$('#stac').stacktable();
});
</script>
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
    </body>
</html>

  
