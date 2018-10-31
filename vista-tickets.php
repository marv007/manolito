<?php
require 'clases/manejadorTicket.php';

$tk = new ManejadorTicket();
$arrTicket = array();
$arrTicket = $tk->obtenerTicket();
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <a class="navbar-brand" href="#">Ticket System</a>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Buscar Tickets">
            </div>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
          </form>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="vista-tickets.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
            <li><a href="ticket.php"><span class="glyphicon glyphicon-list-alt"></span>  Nuevo ticket</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuario</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Acerca de</a></li>
        </ul>
       
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    <div class="limiter">
            
      <div class="container-general">
        <div class="wrap-login800" style="background-color: #e8e8e8; border-color: #000000;" >
        
         <table class="table table-hover table-striped">
           <h2><span class="glyphicon glyphicon-list-alt"></span> Mis Tickets</h2>
            <thead style="background-color: #30914c; color: white" >
              <tr>
                <th scope="col" class="th-sm">ID</th>
                <th scope="col" class="th-sm">Asunto</th>
                <th scope="col" class="th-sm">Mensaje</th>
                <th scope="col" class="th-sm">Estado</th>
                <th scope="col" class="th-sm">Prioridad</th>
                <th scope="col" class="th-sm">Departamento</th>
                <th scope="col" class="th-sm">Fecha añadido</th>
              </tr>
            </thead>
         
            <?php
            $i = 0;
            while($i < count($arrTicket)){
                $a = $arrTicket[$i];
            ?>
            <tbody class="tabla-scroll" style="background-color: #d3d3d3">
              <tr>
                <td class="filterable-cell" scope="row"><?php echo $a->getIdTicket() ?></td>
                <td class="filterable-cell"><?php echo $a->getAsunto() ?></td>
                <td class="filterable-cell"><?php echo $a->getProblema() ?></td>
                <td class="filterable-cell"><?php echo $a->getEstado() ?></td>
                <td class="filterable-cell"><?php echo $a->getPrioridad() ?></td>
                <td class="filterable-cell"></td>
                <td class="filterable-cell"><?php echo $a->getfechaInicio() ?></td>

              </tr>
            </tbody>
            <?php
            $i++;
            }
            ?>
         
          </table>
          
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
