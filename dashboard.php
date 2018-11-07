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
$arrTicket = $tk->obtenerTickets();

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
        <title>Dashboard</title>
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
      
    <!--Si es administrador-->
     <?php if($_SESSION['idRol']==1){?>
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
    
      <!--Contenido pestañas-->
        <div class="container" style="background-color: #eaedfa">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified" >
                        <li class="active"><a href="#ticketsp" data-toggle="tab"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Tickets pendientes&nbsp;&nbsp; <span class="badge" style="background-color:#f55210; font-size: 18px"><?php echo $contPendientes?></span></a></li>
                        <li><a href="#ticketsall" data-toggle="tab"><i class="fa fa-list" ></i>&nbsp;&nbsp;Todos los tickets&nbsp;&nbsp; <?php $_SESSION['tabla']=="todos"?><span class="badge" style="background-color:#3498db; font-size: 18px"><?php echo $contador?></span></a></li>                        
                        <li><a href="#ticketsproc" data-toggle="tab"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Tickets en proceso&nbsp;&nbsp;<span class="badge" style="background-color: #f7822c; font-size: 18px">0</span></a></li>
                        <li><a href="#ticketsre" data-toggle="tab"><i class="fa fa-thumbs-o-up"></i>&nbsp;&nbsp;Tickets resueltos&nbsp;&nbsp; <?php $_SESSION['tabla']=="resuelto"?><span class="badge" style="background-color: #6ada13; font-size: 18px"><?php echo $contResueltos?></span></a></li>
                    </ul>
                </div>
            </div>
            

            <div class="tab-content" style= "max-height: 73vh; overflow: auto; padding:0px; overflow-x: hidden;">
                
                <div class="tab-pane active" id="ticketsp">
                    <div class="row">
                        <div class="col-md-12">
                        
                            <?php 
                               
                               include "inc/TablaPen.php";
                                
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
                
                             //include "inc/TablaPen.php";
                
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
                
                
                
                
            </div> <!--contenido de pestañas-->
       
       
       <!--fromulario modal-->
        <div class="modal fade" id="miModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Informacion del ticket </h4>
                    </div>
                    <div class="modal-body">
                        <h4><strong>Asunto: </strong><?php  echo $a->getAsunto()?></h4>
                        <strong>Problema: </strong><?php echo $a->getProblema() ?> <br>
                        <hr>
                        <h4>Asignar ticket</h4>
                        <strong>Depatamento: </strong>
                        <select>
                            <option value="it">IT</option>
                            <option value="mant">Mantenimiento</option>
                        </select>
                        <br>
                        <br>
                        <strong>Tecnico: </strong>
                        <select> <!--llenado de combo automatico -->
                        <option value="tec1">tecnico 1</option>
                        <option value="tec2">tecnico 2</option>
                        </select>
                        <br>
                        <br>
                        <strong>Prioridad: </strong>
                        <select>
                            <option value="alta">Alta</option>
                            <option value="media">Media</option>
                            <option value="baja">Baja</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Aceptar</button>
                    </div>
                
                </div>
            </div>
        </div>
        
          
    



        </div><!--container principal-->
     <?php }else{?>
        <div class="limiter">
            
     
        
            <!-- <div class="wrap-login800" style="background-color: #e8e8e8; border-color: #000000; width: 100%; height: 92vh; " >
            -->
            <div class="container">
            <br>
            <h3>Panel Administrativo</h3>
            <a class = "pull-right" href="ticket.php"><input type="button" value="Nuevo ticket" style="border-radius: 5px; padding: 10px 7px; text-decoration: none; color: #fff; background-color: #30914c; margin: 5px;"></a>
            <br>
            <ul class="nav nav-tabs" style= "width: 100%">
                    <li class="active"><a href="#ticketsin" data-toggle="tab">Tickets pendientes</a></li>
                    <li><a href="#ticketsproc" data-toggle="tab">Tickets en proceso</a></li>
                    <li><a href="#ticketsre" data-toggle="tab">Tickets resueltos</a></li>
                    <li><a href="#mytickets" data-toggle="tab">Mis tickets</a></li>
                    
                </ul>
    
    
            <div class="tab-content" style= "max-height: 75vh; overflow: auto; padding:0px">
              <div class="tab-pane active" id="ticketsin">  
                <div class="row">
                  <div class="col-md-12 contenido-scrollspy" data-spy="scroll" data-target="#menu" data-offset="0">
    
                <table class="table table-hover table-striped" style= "max-width: 100% border:0px">
               
               <thead style="background-color: #30914c; color: white" >
                 <tr>
                   <th scope="col" class="th-sm">ID</th>
                   <th scope="col" class="th-sm">Asunto</th>
                   <th scope="col" class="th-sm">Mensaje</th>
                   <th scope="col" class="th-sm">Estado</th>
                   <th scope="col" class="th-sm">Prioridad</th>
                   <th scope="col" class="th-sm">Tec. Encargado</th>
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
                   <td class="filterable-cell editar" scope="row"><?php echo $a->getIdTicket() ?></td>
                   <td class="filterable-cell"><?php echo $a->getAsunto() ?></td>
                   <td class="filterable-cell" style="max-width: 45vh; overflow: hidden" ><?php echo $a->getProblema() ?></td>
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
              
              </div>
       
        </div>
     <?php }?>
 <!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->
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

    </body>
</html>

  
