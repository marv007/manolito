     
                        <div class="table-responsive" style="overflow-x: hidden;">
                           
                            <table class="table table-hover table-striped table-bordered">
                                <thead style="background-color: #30914c; color: white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Asunto</th>
                                        <th>Problema</th>
                                        <th>Estado</th>
                                        <th>Prioridad</th>
                                        <th>Departamento</th>
                                        <th>Fecha creado</th>
                                        <th>Editar</th>
                                        
                                    </tr>
                                </thead>

                                <?php
                                
                                
                                     $i = 0;
                                     while($i < count($arrPen)){
                                          $a = $arrPen[$i];
                                          $md = new ManejadorDepartamento();                                                                                  
                                          $idUs = $a->getIdUsuario();
                                          $mu = new ManejadorUsuario();
                                          $usu = array();               
                                          $usu = $mu->obtenerUsuario($a->getIdUsuario());                                        
                                          $dep = $md->obtenerDepartamento($usu->getIdDepartamento());
                                            
                                          
                                          
                                         
                               ?>

                                <tbody >
                                    
                                    <tr>
                                        <td><?php echo $a->getIdTicket() ?></td>
                                        <td><?php echo $a->getAsunto() ?></td>
                                        <td><div class="celdaProbl" style="overflow:hidden; width: 350px; height: 20px"><?php echo $a->getProblema() ?></div></td>
                                        <td><?php echo $a->getEstado() ?></td>
                                        <td><?php echo $a->getPrioridad() ?></td>
                                        <td><?php echo utf8_encode($dep->getNombre())?></td>
                                        <td><?php echo $a->getfechaInicio() ?></td>
                                        <td class="text-center">
                                            <a href="editar.php?id=<?php echo $a->getIdTicket()?>" class="btn btn-sm btn-warning" style="font-size: 14px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a class="btn btn-sm btn-danger" style="font-size: 14px" data-toggle="modal" data-target="#modalLog"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                        
                                    </tr>
                                    
                                </tbody>

                                
                                <?php
                                      $i++;
                                     }
                                ?>
                            </table>
           
                </div>

     <!--modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalLog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title text-center text-primary" id="myModalLabel">Confirmación</h4>
            </div>
          <form action="borrar.php?id=<?php echo $a->getIdTicket()?>" method="POST" style="margin: 20px;">
           <p>¿Desea borrar el ticket seleccionado? <?php echo $a->getIdTicket()?></p>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Borrar</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
              </div>
          </form>
      </div>
    </div>
</div>

