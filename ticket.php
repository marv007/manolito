<?php
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: index.php");
}

require 'clases/class.ticket.php';
require 'clases/manejadorTicket.php';
require 'clases/class.archivo.php';
require 'clases/manejadorArchivo.php';

$mt = new ManejadorTicket();
$ticket = new Ticket();


if(!empty($_POST['asunto']) && !empty($_POST['descripcion'])){
  $ma = new ManejadorArchivo();
  if(!empty($_FILES['Fichier1']['name'])){
     //guardando archivos en servidor
    $nombre_archivo = $_FILES['Fichier1']['name'];
    $tipo_archivo = $_FILES['Fichier1']['type'];
    $tamanio_archivo = $_FILES['Fichier1']['size'];
    //Ruta del directorio destino servidor
    $destino = $_SERVER['DOCUMENT_ROOT'].'/manolito/uploads/';
    move_uploaded_file($_FILES['Fichier1']['tmp_name'], $destino.$nombre_archivo);

    //insertando archivo
    $archivo = new Archivo();

    $archivo->setNombreArchivo($nombre_archivo);
    $archivo->setRutaArchivo($destino);

    $ma->insertarArchivo($archivo);
    $ticket->setIdArchivo($ma->obtenerId());
  } //fin validacion si archivo es distinto de null 
  else{
    $ticket->setIdArchivo(NULL);
  }
  
    //Capturando y guardando datos en BD
    $hoy = date('Y-m-d H:i:s');
   
    

    $ticket->setAsunto($_POST['asunto']);
    $ticket->setProblema($_POST['descripcion']);
    $ticket->setFechaInicio($hoy);
    $ticket->setIdUsuario($_SESSION['idUsuario']);
    
    $mt->insertarTicket($ticket);
    

}?>
    


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Redactar ticket </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/ticket-add.png"/>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->



        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        

       <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        
        
         

    </head>
    <body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <?php include "inc/navBar.php"; ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
     
     
    
        <div class="limiter">
        

            <div class="container-general">
               
        <div class="wrap-login800">
            <form class="login800-form validate-form" action="ticket.php" enctype="multipart/form-data" method="POST" name="form">
                <span class="general-form-title">
                    Redactar nuevo Ticket
                  </span>
        
                  <div class="wrap-input800 validate-input" data-validate = "Escriba asunto">
                    <input class="input800 " type="text" name="asunto" required minlength="7" maxlength="70" placeholder="Asunto">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">              
                    </span>
                  </div>
        
                  <div class="wrap-input100 validate-input" data-validate = "Describa el problema">
                    <textarea class="input-text-area" type="text" name="descripcion" required minlength="25" maxlength="600" placeholder="Descripción del problema"></textarea>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">                      
                    </span>
                  </div>
                  
                  <div class="form-group">
                      <div class="input-group input-file" name="Fichier1" type="file" >
                          <input type="text" class="form-control" placeholder='Selecciona un archivo...' />			
                              <span class="input-group-btn">
                                <button class="btn btn-default btn-choose" type="button">Examinar</button>
                              </span>
                  
                  
                      </div>
                    </div>

                  <div class="  my-container-form-btn">
                      
                    <button class="login100-form-btn " style="width: 200px; margin-right: 8px;" data-toggle="modal" data-target="#myModal">
                      Enviar Ticket
                    </button>
                    <?php
                       if(!empty($_POST['asunto']) && !empty($_POST['descripcion'])){?>
                               <!--  alert -->
                               <div class="alert alert-success" role="alert" style="position:absolute; top:60px; right:15px;">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <span class= "glyphicon glyphicon-ok"></span><strong>¡Con éxito!</strong><br>¡El ticket fue enviado correctamente! 
                                </div>
                               <!--alert-->
                               <?php
                        }else if($_POST!=null){ ?>
                               
                       <?php }?>

      
                    <button type="reset" class="cancell-form-btn" style="width: 200px; margin-left: 8px;">
                      Reset
                    </button>
                  </div>


              </form>
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
        <script src="js/push.min.js"></script>

        <script src="js/main.js"></script>
        <!--Scrip para que desaparezca el mensaje de alerta en 4seg-->
        <script>
              window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
             $(this).remove(); 
              });
              }, 4000);
        </script>
       
    </body>
</html>
