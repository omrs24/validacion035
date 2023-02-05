<div class="row d-flex justify-content-center contenedor-titulo mt-2">
    <div class="col">
        <i class="far fa-chart-bar"></i>&nbsp;&nbsp;Resultados
    </div>
</div>
<hr>
<div class="container mt-3">
    <div class="row justify-content-end">
        <div class="col-md-4">
            <input type="submit" class="btn btn-success font-weight-bolder" id="btnExportXlx2" value="Descargar Excel">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-sm table-striped table-bordered" id="dtResult">
                <thead class="thead-dark">
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>RFC CURP</th>
                    <th>Contesto</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            Juan
                        </td>
                        <td>
                            Hernandez
                        </td>
                        <td>
                            juan.hernandez@domain.com
                        </td>
                        <td>
                            XXXXXXXX
                        </td>
                        <td>
                            SI
                        </td>
                        <td>
                            <button type='button' class='btn btnUser' data-id='1' data-toggle='modal' data-target='#VerResult'><i class='fas fa-eye'></i></button>
                        </td>
                    </tr>
                <?php
                    /*$myQuery = "SELECT t1.ID,t1.nombre,t1.apellido,t1.correo,t1.RFCURP,t2.p1 FROM valid035_users t1 LEFT JOIN valid035_test2b t2 ON t1.ID = t2.employee";
                    $result = $db->query($myQuery);
                    while($row = $result->fetch()){
                        $contesto = $row['p1'] ? 'si' : "no";
                        $body = "<tr>
                                        <td>
                                            ".$row['ID']."
                                        </td>
                                        <td>
                                        ".strtoupper($row['nombre'])."
                                        </td>
                                        <td>
                                        ".strtoupper($row['apellido'])."
                                        </td>
                                        <td>
                                            $row[correo]
                                        </td>
                                        <td>
                                        ".strtoupper($row['RFCURP'])."
                                        </td>
                                        <td>". $contesto ."
                                        </td>
                                        <td>
                                        <button type='button' class='btn btnUser' data-id='". $row["ID"] ."' data-toggle='modal' data-target='#VerResult'><i class='fas fa-eye'></i></button>
                                        </td>
                                    </tr>"; 
                        echo $body;
                    }*/
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="VerResult" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Usuario: <span id="txtUsuario">Juan Hernandez</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="border border-rounded h-50">
                                    <div class="bg-danger text-white font-weight-bolder h-25 w-25">
                                        <p class="text-center my-auto">Muy Alto</p>
                                    </div>
                                    <div class="bg-secondary text-white font-weight-bolder h-25 w-25">
                                        Alto
                                    </div>
                                    <div class="bg-warning text-white font-weight-bolder h-25 w-25">
                                        Medio
                                    </div>
                                    <div class="bg-success text-white font-weight-bolder h-25 w-25">
                                        Bajo
                                    </div>
                                    <div class="bg-primary text-white font-weight-bolder h-25 w-25">
                                        Nulo
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="categorias shadow-lg p-3 h-100">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Resultado por categorias</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <b>Ambiente de trabajo: </b>
                                                </div>
                                                <div class="col-md-6">
                                                    <span id="txtAmbienteTrabajo">12</span> 
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <b>Factores propios de la actividad: </b>
                                                </div>
                                                <div class="col-md-6">
                                                    <span id="txtFactoresPropios">31</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <b>Organizacion del tiempo de trabajo: </b>
                                                </div>
                                                <div class="col-md-6">
                                                    <span id="txtOrganizacionTiempo">21</span><br>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <b>Liderazgo y relaciones de trabajo: </b>
                                                </div>
                                                <div class="col-md-6">
                                                    <span id="txtLiderazgoRelaciones">12</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <b>Entorno organizacional: </b> <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <span id="txtEntornoOrg">12</span><br>
                                                </div>
                                            </div>
                                            <hr>
                                        </div> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="dominios shadow-lg p-3 h-100">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Resultado por dominio</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-0 bg-light">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Condiciones en el ambiente de trabajo: </b>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <span id="txtCondicAmbiente">32</span> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Carga de Trabajo: </b>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtCargaTrabajo">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Falta de control sobre el trabajo: </b>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtControlTrabajo">5</span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Jonada de trabajo: </b>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtJornadaTrabajo">3</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0 bg-light">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Interferencia en la relacion trabajo-familia: </b> <br>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtInterfTF">4</span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Liderazgo: </b> <br>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtLiderazgo">4</span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Relaciones de trabajo: </b> <br>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtRelacionesTrabajo">12</span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Violencia: </b> <br>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtViolencia">12</span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0 bg-light">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Reconocimiento del desempe&ntilde;o: </b> <br>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtReconoDesemp">21</span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <b>Insuficiente sentido de pertenencia e, Inestabilidad: </b> <br>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span id="txtInsuficienciaSentido">34</span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>