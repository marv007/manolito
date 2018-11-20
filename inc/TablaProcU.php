
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
                                        
                                        
                                    </tr>
                                </thead>

                                <?php
                                
                                
                                     $i = 0;
                                     if(count($arrProc)>0){
                                     while($i < count($arrProc)){
                                          $a = $arrProc[$i];
                                          $md = new ManejadorDepartamento();                                                                                  
                                          $idUs = $a->getIdUsuario();
                                          $mu = new ManejadorUsuario();
                                          $usu = array();               
                                          $usu = $mu->obtenerUsuario($_SESSION['idUsuario']);                                        
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
                                        
                                        
                                    </tr>
                                    
                                </tbody>
                                <?php
                                      $i++;
                                     }
                                    }
                                ?>
                            </table>
                           
                           
                        
                </div>