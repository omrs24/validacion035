
    <?php 
        $empleadoID = $_REQUEST["empleadoID"];
        $apellido_empleado = "";
        $nombre_empleado = "";
        $correo_empleado = "";
        $rfcurp_empleado = "";
        $compania_empleado = "";
        $sucursal_empleado = "";
        
        if(isset($empleadoID)) {
            $queryUser = "SELECT * FROM valid035_users WHERE ID = '$empleadoID'";
            $resultUser = $db->query($queryUser);
            $rowUser = $resultUser->fetch();
            
            $nombre_empleado = $rowUser["nombre"];
            $apellido_empleado = $rowUser["apellido"];
            $correo_empleado = $rowUser["correo"];
            $rfcurp_empleado = $rowUser["RFCURP"];
            $compania_emlpeado = $rowUser["compania"];
            $sucursal_empleado = $rowUser["sucursal"];
        }
    ?>
    <div class="row d-flex justify-content-center contenedor-titulo mt-2">
        <div class="col">
            <i class="icon-users"></i>&nbsp;&nbsp;A&ntilde;adir Empleados 
        </div>
    </div>
    <hr>
    <div class="container mt-3">
        <h3>Datos Generales</h3>
        <div class="row mt-3">
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Nombre</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Nombre</span>
                    </div>
                    <input type="text" placeholder="Nombre" name="nombre-empleado" id="nombre-empleado" value="<?php echo $nombre_empleado;?>" class="form-control mr-3">
                    <input type="hidden" id="empleadoID" name="empleadoID" value="<?php echo $empleadoID; ?>">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-8 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Apellidos</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Apellidos</span>
                    </div>
                    <input type="text" placeholder="Apellidos" name="apellidos-empleado" id="apellidos-empleado" value="<?php echo $apellido_empleado;?>" class="form-control mr-3">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Correo</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Correo</span>
                    </div>
                    <input type="text" placeholder="Correo" name="correo-empleado" id="correo-empleado" value="<?php echo $correo_empleado;?>" class="form-control mr-3">
                </div>
            </div>
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">RFC O CURP</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">RFC O CURP</span>
                    </div>
                    <input type="text" placeholder="RFC O CURP" name="rfcocurp-empleado" id="rfcocurp-empleado" value="<?php echo $rfcurp_empleado;?>" class="form-control mr-3 pwd1">
                    <div class="input-group-append">
                        <!--<button class="btn btn-outline-secondary mr-3 showpass1" type="button"><i class="fas fa-eye"></i></button>
                        icon-eye-close-->
                    </div>
                </div>
            </div>
        </div>
        <!--password inputs-->
        <div class="row mt-3">
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Compa&ntilde;&iacute;a</span>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Compa&ntilde;&iacute;a</span>
                    </div>
                    <select class="form-control mr-3" id="ddlcompaniaempleado" name="ddlcompaniaempleado">
                        <option value="" disabled selected>Selecciona...</option>
                        	<?php
                			$myQuery = $db->query("SELECT ID, CONCAT(nombre, ' (', ID, ')') nombre FROM valid035_companies ORDER BY nombre");
                			while($row = $myQuery->fetch()){
                                if ($compania_emlpeado == $row["ID"])
                                {
                                    $selected = 'selected="selected"';
                                }
                                else
                                {
                                    $selected = '';
                                }					
                				echo "<option value='".$row["ID"]."' ".$selected.">".$row["nombre"]."</option>";
                			};
                			?>
                    </select>
                </div>
            </div>
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Sucursal</span>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Sucursal</span>
                    </div>
                    <select class="form-control mr-3" id="ddlsucursalempleado" name="ddlsucursalempleado">
                        <option value="" disabled selected>Selecciona...</option>
                        	<?php
                			$myQuery = $db->query("SELECT ID, CONCAT(name, ' (', ID, ')') name FROM valid035_offices ORDER BY name");
                			while($row = $myQuery->fetch()){
                                if ($sucursal_empleado == $row["ID"])
                                {
                                    $selected = 'selected="selected"';
                                }
                                else
                                {
                                    $selected = '';
                                }			
                				echo "<option value='".$row["ID"]."' ".$selected.">".$row["name"]."</option>";
                			};
                			?>
                    </select>
                </div>
            </div>
        </div>
        <!--botones-->
        <div class="row mt-3 justify-content-around" id="contentDiv">
            <div class="col-1 m-3 d-flex-left">
                <input type="button" class="btn btn-secondary font-weight-bolder" value="Cancelar">
            </div>
            <div class="col-1 m-3 d-flex-left">
                <input type="submit" class="btn btn-primary font-weight-bolder" id="btnCrearEmpleado" value="Guardar">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <h3>Usuarios registrados</h3>
            </div>
            <div class="col-lg-6">
                <div class="row border border-success justify-content-around py-2 rounded">
                    <div class="col-lg-4">
                        <input type="text" name="txtFiltroExcel" id="txtFiltroExcel" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <select name="ddlfiltroexcel" id="ddlfiltroexcel" class="form-control">
                            <option value="0"></option>
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option value="4"></option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <input type="submit" class="btn btn-success font-weight-bolder" id="btnExportXlx" value="Descargar Excel">
                    </div>
                </div>
            </div>
        </div>
        <h6 class="text-dark">Descargar archivo:</h6>
        <div class="row mt-2 mb-5">
            <div class="col-md-9 tablaUsuarios">
                <table class="table table-sm table-striped table-bordered" id="dtUsers">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>RFC O CURP</th>
                            <th>Compa&ntilde;&iacute;a</th>
                            <th>Cuest. 1</th>
                            <th>Cuest. 2</th>
                            <th>Cuest. 3</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $compania = $_SESSION["compania"];
                    $query = "SELECT t1.ID,t1.nombre, t1.apellido,t1.correo,t1.RFCURP,t2.nombre cnombre FROM valid035_users t1 LEFT JOIN valid035_companies t2 ON t1.compania = t2.ID WHERE t1.activo = 'Y' AND t1.admin = 0 AND t2.ID = 2";
                        $result = $db->query($query);
                        while($row = $result->fetch()){
                            $body = "<tr>
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
                                        <td>
                                            $row[cnombre]
                                        </td>
                                        <td>
                                            si
                                        </td>
                                        <td>
                                            si
                                        </td>
                                        <td>
                                            si
                                        </td>
                                        <td>
                                        <i class='fas fa-edit edit-emp' data-id='$row[ID]'></i>
                                        </td>
                                    </tr>"; 
                            echo $body;
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
