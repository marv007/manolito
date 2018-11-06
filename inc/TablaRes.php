
<div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                           
                            <table class="table table-hover table-striped table-bordered">
                                <thead style="background-color: #30914c; color: white">
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Asunto</th>
                                        <th class="text-center">Problema</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Prioridad</th>
                                        <th class="text-center">Departamento</th>
                                        <th class="text-center">Tec. Encargado</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>

                                <?php
                                     $i = 0;
                                     while($i < count($arrRes)){
                                          $a = $arrRes[$i];
                               ?>

                                <tbody>
                                    
                                    <tr>
                                        <td class="text-center"><?php echo $a->getIdTicket() ?></td>
                                        <td class="text-center"><?php echo $a->getAsunto() ?></td>
                                        <td class="text-center"><?php echo $a->getProblema() ?></td>
                                        <td class="text-center"><?php echo $a->getEstado() ?></td>
                                        <td class="text-center"><?php echo $a->getPrioridad() ?></td>
                                        <td class="text-center">Departamento</td>
                                        <td class="text-center">Técnico</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>

                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                            <form action="" method="POST" style="display: inline-block;">
                                                <input type="hidden" name="id_del" value="aa">
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                                <?php
                                      $i++;
                                     }
                                ?>
                            </table>
                           
                               <!-- <h2 class="text-center">No hay tickets registrados en el sistema</h2> -->
                           
                        </div>
                       <!--PAGINADOR-->
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                               
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                               
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                
                                
                                
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                               
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                               
                            </ul>
                        </nav>
                        
                    </div>
                </div>