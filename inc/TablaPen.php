
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
                                        <th>Tec. Encargado</th>
                                        <th>Editar</th>
                                        
                                    </tr>
                                </thead>

                                <?php
                                     $i = 0;
                                     while($i < count($arrPen)){
                                          $a = $arrPen[$i];
                                         
                               ?>

                                <tbody >
                                    
                                    <tr>
                                        <td><?php echo $a->getIdTicket() ?></td>
                                        <td><?php echo $a->getAsunto() ?></td>
                                        <td style="max-width: 45vh; overflow: hidden;"><?php echo $a->getProblema() ?></td>
                                        <td><?php echo $a->getEstado() ?></td>
                                        <td><?php echo $a->getPrioridad() ?></td>
                                        <td>Departamento</td>
                                        <td>Técnico</td>
                                        <td class="text-center">
                                            <a href="editar.php?id=<?php echo $a->getIdTicket()?>" class="btn btn-sm btn-warning" style="font-size: 16px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                        
                                    </tr>
                                    
                                </tbody>
                                <?php
                                      $i++;
                                     }
                                ?>
                            </table>
                           
                           
                        
                </div>