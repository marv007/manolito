
                        <div class="table-responsive" style="overflow-x: hidden;">
                           
                            <table class="table table-hover ">
                                <thead style="background-color: #30914c; color: white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Asunto</th>
                                        <th>Problema</th>
                                        <th>Estado</th>
                                        <th>Prioridad</th>
                                        <th>Departamento</th>
                                        <th>Tec. Encargado</th>
                                        
                                        
                                    </tr>
                                </thead>

                                <?php
                                     $i = 0;
                                     while($i < count($arrTicket)){
                                          $a = $arrTicket[$i];                                          
                                          $md = new ManejadorDepartamento();                                                                                  
                                          $idUs = $a->getIdUsuario();
                                          $mu = new ManejadorUsuario();
                                          $usu = array();               
                                          $usu = $mu->obtenerUsuario($a->getIdUsuario());                                        
                                          $dep = $md->obtenerDepartamento($usu->getIdDepartamento());
                               ?>

                                <tbody id="myTable">
                                    
                                    <tr>
                                        <td><?php echo $a->getIdTicket() ?></td>
                                        <td><?php echo $a->getAsunto() ?></td>
                                        <td><div class="celdaProbl" style="overflow:hidden; width: 350px; height: 20px"><?php echo $a->getProblema() ?></div></td>
                                        <td><?php echo $a->getEstado() ?></td>
                                        <td><?php echo $a->getPrioridad() ?></td>
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