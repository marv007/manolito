 <?php 
 session_start(); 

 if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
  }

  require 'clases/manejadorTicket.php';
  require 'clases/manejadorUsuario.php';
 
  //Se usa el manejador ticket para ir a traer un tiquet especifico
  $tk = new ManejadorTicket();
  $ticket = $tk->obtenerTicket($_GET['id']);
  
  //se usa manejador usuario para ir a traer un usuario en especifico
  $us = new ManejadorUsuario();
  $usuario = $us->obtenerUsuario($ticket->getIdUsuario());

 
 ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
    <title>Administrar Tickets</title>
        <?php include "./inc/links.php"; ?> 


    </head>
    <body>
        <!--NAVBAR-->
    <?php include "inc/navBar.php";  ?>
      
    <!--Si es administrador-->
     <?php if($_SESSION['idRol']==1){ ?>
    <br><br>
      <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h1 class="animated lightSpeedIn">Información del Ticket</h1>
                
                <p class="pull-right text-primary"><br>
                  <strong>
                  <?php include "./inc/timezone.php";?>
                 </strong>
               </p>
              </div>
            </div>
          </div>
        </div>

             <!--************************************ Page content******************************-->
  <div class="container">
          <div class="row">
            <div class="col-sm-12">
                <a href="dashboard.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver administrar Tickets</a>
            </div>
          </div>
   </div>
    <br>        
            
          <div class="container">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                		<input type="hidden" name="id_edit" value="<?php echo $GET['id']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id Ticket</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="fecha_ticket" readonly="" value="<?php echo $ticket->getIdTicket();?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <select class="form-control" name="estado_ticket">
                                        <option value="<?php echo $reg['estado_ticket']?>"><?php echo $ticket->getEstado();?> (Actual)</option>
                                        <option value="Pendiente">Activo</option>
                                        <option value="En proceso">Pausa</option>
                                        <option value="Resuelto">Resuelto</option>
                                      </select>
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Nombre</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="name_ticket" readonly="" value="<?php echo $usuario->getNombre();?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="email" readonly="" class="form-control"  name="email_ticket" readonly="" value="<?php echo $usuario->getCorreo();?>">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Departamento</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="departamento_ticket" readonly="" value="Departamento?">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="asunto_ticket" readonly="" value="<?php echo $ticket->getAsunto();?>">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Mensaje</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" readonly="" rows="3"  name="mensaje_ticket" readonly=""><?php echo $ticket->getProblema()?></textarea>
                          </div>
                        </div>
                    
                    <br>
                    
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Actualizar ticket</button>
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
