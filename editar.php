 <?php 
 session_start(); 

 if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
  }

  require 'clases/manejadorTicket.php';
  require 'clases/manejadorUsuario.php';
  require 'clases/manejadorDepartamento.php';
  require 'clases/manejadorTecnicosXTicket.php';
 
  //Se usa el manejador ticket para ir a traer un tiquet especifico
  $mt = new ManejadorTicket();
  $ticket = $mt->obtenerTicket($_GET['id']);
  
  //se usa manejador usuario para ir a traer un usuario en especifico
  $us = new ManejadorUsuario();
  $usuario = $us->obtenerUsuario($ticket->getIdUsuario());
  $md = new ManejadorDepartamento();
  $dep = $md->obtenerDepartamento($usuario->getIdDepartamento());
  //Arreglo de usuarios tecnicos
  $tec = $us->obtenerTecnicos();
  
  //Traer tecnico del respectivo ticket 
  $tXt = new ManejadorTecnicosXTicket();
  $tecnObject = $tXt->obtenerTecxticket($_GET['id']); 
  $tecnId = $tecnObject->getIdUsuario();
  
     if($tecnId == ""){
         $tecnico = new Usuario();
         $tecnico->setNombre("");
     }else{
        $usuarioTec = new ManejadorUsuario();
        $tecnico = $usuarioTec->obtenerUsuario($tecnId);
     }
  
 ?>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php 
//Esto es para validar y actualizar tickets

if(isset( $_POST['id_edit'])){
    $idTicket = $_POST['id_edit'];
    $idTec = $_POST['tecnico'];
    $pri = $_POST['prioridad'];



       if($idTec == "Sin Tecnico" || $pri == "Sin Prioridad"){ ?>
                               <!--  alert -->
                               <div class="alert alert-danger" role="alert" style="position:absolute; top:60px; right:15px;">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <span class= "glyphicon glyphicon-ok"></span><strong>¡Error!</strong><br>¡Tienes que asignar un tecnico y dar prioridad! 
                                </div>
                               <!--alert-->
      <?php }else{
         $mt = new ManejadorTicket();
         $mt->actualizarTicket($idTicket, $pri);
      
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
   }?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
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
                <h2 class="animated lightSpeedIn">Información del Ticket</h2>
                
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
                		<input type="hidden" name="id_edit" value="<?php echo $_GET['id']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id Ticket</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="Id_ticket" readonly="" value="<?php echo $ticket->getIdTicket();?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        
                         <!--Estado-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class='col-sm-10'>
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

                        <!--Nombre-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Nombre</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="name_ticket" readonly="" value="<?php echo $usuario->getNombre();?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
                         
                         <!--Email-->
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="email" readonly="" class="form-control"  name="email_ticket" readonly="" value="<?php echo $usuario->getCorreo();?>">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>
                         
                         <!--Departamento-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Departamento</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="departamento_ticket" readonly="" value="<?php echo utf8_encode($dep->getNombre())?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        <!--Asunto-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="asunto_ticket" readonly="" value="<?php echo $ticket->getAsunto();?>">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        <!--Mensaje-->
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Mensaje</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" readonly="" rows="3"  name="mensaje_ticket" readonly=""><?php echo $ticket->getProblema()?></textarea>
                          </div>
                        </div>
                        
                        <!--Tecnico-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Técnico:</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                        <select class="form-control" name="tecnico">
                             <!--Validacion si hay tecnico asignado, sino establecer SIN TECNICO-->
                        <?php 
                            
                            if($tecnico->getNombre()==""){
                                $tecnico->setNombre("Sin Tecnico");  
                             }?>
                            <option value="<?php echo $tecnico->getNombre()?>"><?php echo $tecnico->getNombre() ?> (Actual)</option>>
                            <!--Cargando todos los tecnicos-->
                            <?php
                            
                                $i = 0;
                                while($i < count($tec)){
                                     ?>
                                     <option value="<?php echo $tec[$i]->getIdUsuario() ?>"><?php echo $tec[$i]->getNombre() ?></option>
                                     <?php
                                
                                    $i++;
                                }
                            
                            ?>
                            
                        </select>
                        </div>
                        </div>
                        </div>
                         
                         <!--Prioridad-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Prioridad:</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                        <select class="form-control" name="prioridad">
                            <!--Validacion si hay prioridad asignada, sino establecer SIN PRIORIDAD-->
                            <?php 
                            $prioridad = $ticket->getPrioridad();
                            if($ticket->getPrioridad()==""){
                                $prioridad = "Sin Prioridad";  
                             }?>
                            <option value="<?php echo $prioridad?>"><?php echo $prioridad ?> (Actual)</option>
                            
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                            
                        </select>
                        </div>
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



   


