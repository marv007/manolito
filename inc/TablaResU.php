
<div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                           
                            <table class="table table-hover table-striped table-bordered">
                                <thead style="background-color: #30914c; color: white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Asunto</th>
                                        <th>Problema</th>
                                        <th>Estado</th>
                                        <th>Fecha resuelto</th>
                                        <th>Departamento</th>
                                        <th>Tec. Encargado</th>
                                        
                                    </tr>
                                </thead>

                                <?php
                                    $a = array();
                                     $i = 0;
                                     while($i < count($arrRes)){
                                          $a = $arrRes[$i];
                                          $md = new ManejadorDepartamento();                                                                                  
                                          $idUs = $a->getIdUsuario();
                                          $mu = new ManejadorUsuario();
                                                        
                                          $usu = $mu->obtenerUsuario($_SESSION['idUsuario']);                                        
                                          $dep = $md->obtenerDepartamento($usu->getIdDepartamento());
                               ?>

                                <tbody>
                                    
                                    <tr>
                                        <td><?php echo $a->getIdTicket() ?></td>
                                        <td><?php echo $a->getAsunto() ?></td>
                                        <td><div class="celdaProbl" style="overflow:hidden; width: 350px; height: 20px"><?php echo $a->getProblema() ?></div></td>
                                        <td><?php echo $a->getEstado() ?></td>
                                        <td><?php echo $a->getFechaFinal() ?></td>
                                        <td><?php echo utf8_encode($dep->getNombre())?></td>
                                        <td>Técnico</td>
                                       
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