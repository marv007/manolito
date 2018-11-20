<?php 
 session_start(); 

 if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
  }

  require 'clases/manejadorTicket.php';
  require 'clases/manejadorUsuario.php';
  require 'clases/manejadorDepartamento.php';
  require 'clases/manejadorTecnicosXTicket.php';
  require 'clases/manejadorArchivo.php';
 
  //Se usa el manejador ticket para ir a traer un tiquet especifico
  $mt = new ManejadorTicket();
  $ticket = $mt->obtenerTicket($_GET['id']);
  
  //se usa manejador usuario para ir a traer un usuario en especifico
  $us = new ManejadorUsuario();
  $usuario = $us->obtenerUsuario($ticket->getIdUsuario());
  $md = new ManejadorDepartamento();
  $dep = $md->obtenerDepartamento($usuario->getIdDepartamento());
  
  //Obtener parametros de archivo
  $manArchivo = new ManejadorArchivo(); 
  $arrArchivos = $manArchivo->obtenerArchivo();
  $nombreArchivo = "no hay archivo";
  $idArchivo = 0;
  $contador = 0;
  
  while($contador < count($arrArchivos)){
      if($arrArchivos[$contador]->getIdArchivo() == $ticket->getIdArchivo()){
          $nombreArchivo = $arrArchivos[$contador]->getNombreArchivo();
          $idArchivo = $arrArchivos[$contador]->getIdArchivo();
      }
      $contador++;
  }
 ?>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php 
//Esto es para validar y actualizar tickets

if(isset( $_POST['id_edit'])){
    $idTicket = $_POST['id_edit'];
    $ticket->setEstado($_POST['estado_ticket']);
    $ticket->setSolucion( $_POST['respuesta_ticket']);
    $hoy = date('Y-m-d H:i:s');
    $ticket->setFechaFinal($hoy);

    
    

         $mt = new ManejadorTicket();
         $mt->actualizarTicket($ticket);
      
         $mtxt = new ManejadorTecnicosXTicket();
         $mtxt->insertarTecnico($idTicket, $idTec);

        ?>
                               <!--  alert -->
                               <div class="alert alert-success" role="alert" style="position:absolute; top:60px; right:15px;">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <span class= "glyphicon glyphicon-ok"></span><strong>¡Con exito!</strong><br>¡El ticket se ha actualizado! 
                                </div>
                               <!--alert-->
      <?php
      header("Location: dashboard.php");
      }
   ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
    <title>Administrar Tickets</title>
        <?php include "./inc/links.php"; ?> 
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
    <body>
        <!--NAVBAR-->
        <?php include "inc/navBar.php";  ?>
      
    <!--Si es administrador-->
     <?php if($_SESSION['idRol']==2){ ?>
    <br><br><br>
      <div class="container" style="background-color: white">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
              <p class="pull-right text-primary">
                  <strong>
                  <?php include "./inc/timezone.php";?>
                 </strong>
               </p>
                <h3 class="animated lightSpeedIn">Solucionar Ticket</h3>
              </div>
            </div>
          </div>
        </div>

             <!--************************************ Page content******************************-->
  
          <div class="container" style="background-color: white">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                		<input type="hidden" name="id_edit" value="<?php echo $_GET['id']?>">
                        <input type="hidden" name="prioridad" value="<?php echo $ticket->getPrioridad()?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id Ticket</label>
                            <div class='col-sm-3'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="Id_ticket" readonly="" value="<?php echo $ticket->getIdTicket();?>">
                                    
                                </div>
                            </div>
                        </div>

                        <!--Nombre-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Nombre</label>
                          <div class="col-sm-3">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="name_ticket" readonly="" value="<?php echo $usuario->getNombre();?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
                         
                         <!--Email-->
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-4">
                              <div class='input-group'>
                                  <input type="email" readonly="" class="form-control"  name="email_ticket" readonly="" value="<?php echo $usuario->getCorreo();?>">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>
                         
                         <!--Departamento-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Departamento</label>
                          <div class="col-sm-3">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="departamento_ticket" readonly="" value="<?php echo utf8_encode($dep->getNombre())?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        <!--Mensaje-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Mensaje</label>
                          <div class="col-sm-8">
                              <textarea class="form-control" readonly="" rows="3"  name="mensaje_ticket" readonly=""><?php echo $ticket->getProblema()?></textarea>
                          </div>
                        </div>
                        
                        <!--Descargar-->
                        <?php 
                        $activar = "";
                        if($idArchivo == 0){
                            $activar = "disabled";
                           }
                         ?>
                        <div class="form-group">
                          <label  class="colo-sm-2 col-md-2 control-label">Archivo</label>
                                <div class="col-sm-8 col-md-4 " name="Fichier1" type="file">
                                   <input type="text" class="form-control" readonly="" value="<?php echo $nombreArchivo; ?>" />
                                </div>	
                                <div class="col-sm-2 col-md-1" name="Fichier1" type="file">		
                                   <span class="output-group-btn">
                                     <a href="inc/descargarArchivo.php?idArchivo=<?php echo $idArchivo?>" <?php echo $activar ?> class="btn btn-info">Descargar</a>
                                   </span>
                                </div>
                        </div>

                        <!--Respuesta-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Respuesta</label>
                          <div class="col-sm-8">
                              <textarea class="form-control" rows="3"  name="respuesta_ticket" placeholder="Escriba la respuesta al ticket"></textarea>
                          </div>
                        </div>

                         <!--Estado-->
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class='col-sm-3'>
                                <div class="input-group">
                                    <select class="form-control" name="estado_ticket">
                                        <option value="<?php echo $reg['estado_ticket']?>"><?php echo $ticket->getEstado();?> (Actual)</option>
                                        <option value="Pendiente">Activo</option>
                                        <option value="En proceso">Pausa</option>
                                        <option value="Resuelto">Solucionado</option>
                                      </select>
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <!--Botones-->
                        <div class="form-group">
                          <div class="col-sm-12 col-md-4 text-right">
                              <button type="submit" class="btn btn-success">Responder ticket</button>
                          </div>
                          <div class="col-sm-12 col-md-4 text-center">
                                <a href="dashboard.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver Tickets por Resolver</a>
                          </div>

                        </div>
                        
                      </form>
            </div><!--col-md-12-->
          </div><!--container-->
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