
                        <div class="table-responsive" style="overflow-x: hidden;">
                           
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
                                        
                                    </tr>
                                </thead>

                                <?php
                                     $i = 0;
                                     while($i < count($arrTicket)){
                                          $a = $arrTicket[$i];
                               ?>

                                <tbody id="myTable">
                                    
                                    <tr>
                                        <td><?php echo $a->getIdTicket() ?></td>
                                        <td><?php echo $a->getAsunto() ?></td>
                                        <td style="max-width: 45vh; overflow: hidden;"><?php echo $a->getProblema() ?></td>
                                        <td><?php echo $a->getEstado() ?></td>
                                        <td><?php echo $a->getPrioridad() ?></td>
                                        <td>Departamento</td>
                                        <td>Técnico</td>
                                        
                                    </tr>
                                    
                                </tbody>
                                <?php
                                      $i++;
                                     }
                                ?>
                            </table>
                            <ul class="pagination pagination-lg pager" id="myPager"></ul>
                                
                           
                        
                </div>