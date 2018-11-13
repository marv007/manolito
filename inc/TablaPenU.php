
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
                                
                                if(count($arrPen)){
                                     $i = 0;
                                     while($i < count($arrPen)){
                                          $a = $arrPen[$i];
                                                                                  
                                          $dep = $md->obtenerDepartamento($_SESSION['idDepartamento']);
                                            
                                          
                                          
                                         
                               ?>

                                <tbody >
                                    
                                    <tr>
                                        <td><?php echo $a->getIdTicket() ?></td>
                                        <td><?php echo $a->getAsunto() ?></td>
                                        <td style="max-width: 45vh; overflow: hidden;"><?php echo $a->getProblema() ?></td>
                                        <td><?php echo $a->getEstado() ?></td>
                                        <td><?php echo $a->getPrioridad() ?></td>
                                        <td><?php echo $dep->getNombre() ?></td>
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